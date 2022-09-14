(function(){
    var pannel = $('[data-nav]');
    var current = 0;
    var indexs = [];
    var blockEvents = false;
    var items = $('[data-nav][data-type="item"]');
    pannel.each(function(i){
        var slug = $(this).attr('data-nav');
        var title = $(this).attr('data-title');
        indexs.push(slug);
        var nav = $('<option></option>').attr('value', slug).html(title);
        if(i == 0) nav.attr('selected', 'selected');
        $('[data-nav-count]').append(nav);
    });
    function find(slug){
        return indexs.indexOf(slug);
    }
    function next(){
        var crnt = current;
        var next = indexs[Math.min(current + 1, indexs.length - 1)];
        if(crnt == Math.min(current + 1, indexs.length - 1)){
            blockEvents = false;
            return;
        }
        location.hash = '#' + next;
    }


    function prev(){
        var crnt = current;
        var prev = indexs[Math.max(0, current - 1)];
        if(crnt == Math.max(0, current - 1)){
            blockEvents = false;
            return;
        }
        location.hash = '#' + prev;
    }

    function display(pointer){
        pannel.addClass('hidden').css('display', 'none');
        pannel.eq(current).trigger('pannel:hide');
        pannel.eq(pointer).css('display', 'none').removeClass('hidden').fadeIn('slow', function(){
            $('[data-nav-count]').removeAttr('disabled');
            blockEvents = false;
            pannel.eq(pointer).trigger('pannel:show');
        });
        current = pointer;
        if(pannel.eq(pointer).attr('data-type') == 'item'){
            $('[data-nav-text]').html(pannel.eq(pointer).attr('data-nav') + '/' + items.length);
        }else{
            $('[data-nav-text]').html('0/' + items.length);
        }
        var progress = (current / (pannel.length - 1)) * 100;
        $('#progress').css('width', progress + '%');
    }
    $('[data-nav-next]').on('click', function(){
        if(blockEvents) return false;
        blockEvents = true;
        next();
    });

    $('[data-nav-prev]').on('click', function(){
        if(blockEvents) return false;
        blockEvents = true;
        prev();
    });
    $('[data-nav-count]').on('change', function(){
        $(this).attr('disabled', 'disabled');
        location.hash = '#' + $(this).val();
    });
    $(window).on('hashchange', function(){
        var slug = location.hash.replace(/^#/, '') || indexs[0];
        var index = find(slug);
        $('[data-nav-count]').val(slug);
        display(index > -1 ? index : 0);
    });
    $(window).trigger('hashchange');
    $(document).on('keyup', function(e){
        if (blockEvents){
            return true;
        }

        if (e.ctrlKey  || e.shiftKey  || e.altKey || ['Control', 'Shift', 'Alt', 'Meta'].indexOf(e.key) != -1){
            return true;
        }
        var black_list = ['TEXTAREA', 'INPUT'];
        if (e.key == 'Enter' || e.key == 'ArrowLeft')
        {
            
            if(black_list.indexOf(e.target.nodeName) == -1){
                next();
            }
        } else if (e.key == 'ArrowRight') {
            if(black_list.indexOf(e.target.nodeName) == -1){
                prev();
            }
        }
        if (/^(Digit|Numpad)\d$/.test(e.code))
        {
            var id = e.code.replace(/Digit|Numpad/, '');
            if(pannel.eq(current).is('[data-type="item"]') && pannel.eq(current).has('[data-keyboard='+id+']')){
                if(pannel.eq(current).is('[data-isnull]')) return;
                var answer = $('[data-keyboard='+id+']', pannel.eq(current));
                if(answer.attr('type') == 'radio'){
                    answer[0].checked = true;
                    answer.trigger('change');
                }
            }
        }
    });
    $('input, textarea, select', '[data-type="item"]').on('change', function(){
        if($(this).is('[data-mute]')) return;
        var data = $(this).attr('data-merge') ? JSON.parse($(this).attr('data-merge')) : [];
        if($(this).is(':radio, :hidden, textarea, input[type=number]')){
            data[1] = $(this).val();
            $(this).parents('[data-type="item"]').attr('data-answer', $(this).val());
        }
        if($(this).parents('[data-answer-description]').length){
            data = {
                item : data[0],
                description: $(this).val()
            };
        }
        if($(this).is('[data-nullable]')){
            if($(this).is(':checked')){
                data[1] = null;
            }else{
                return;
            }
        }
        if($(this).parents('[data-answer-type]').attr('data-answer-type') == 'matrix_radio' && $(this).is('select')){
            var parent = $(this).parents('[data-answer-type]');
            var item = parent.attr('data-nav');
            var row = $('[data-matrixindex][data-matrix-row]', parent).val();
            var col = $('[data-matrixindex][data-matrix-col]', parent).val();
            if(row !== null && col !== null){
                data = JSON.parse($(`#item-${item}-${row}-${col}`).attr('data-merge')) 
                data[1] = `${row},${col}`;
                $(`#item-${item}-${row}-${col}`)[0].checked = true
            }
        }
        queue(data);
        findEmpty();
    });
    $('input', '[data-type="item"]').on('change', function(){
        if(['optional', 'optional_images', 'range', 'matrix_radio'].indexOf($(this).parents('[data-nav]').attr('data-answer-type')) == -1
        || !$(this).parents('[data-nav]').is('[data-autonext]')) return true;
        if($(this).is(':radio')){
            $(this).next().css('opacity', '');
            $('[name="'+ $(this).attr('name') + '"]').not('[value="' + $(this).val() + '"]').next().fadeTo('fast', .2);
            var _self = this;
            setTimeout(function(){
                next();
                $('[name="'+ $(_self).attr('name') + '"]').next().css('opacity', '');
            }, 300);
        }
    });
    var queues_list = [];
    var requesting = false;
    var tryTimes = [1, 3, 5, 10, 15];
    var tryCount = 0;
    function queue(data){
        queues_list.push(data);
        if(requesting) return false;
        tryCount = -1;
        $('[data-sync-status]').html('درحال ذخیره‌کردن...');
        send();
    }

    function send(){
        requesting = true;
        var data = queues_list.splice(0);
        $.ajax({
            dataType: "json",
            url: '/$/'+sample_id+'/items',
            method: 'post',
            scriptCharset: "utf-8",
            data: {items : data}
        }).always(function (response, status){
            if (status != 'success')
            {
                for (var i = 0; i < data.length; i++) {
                    queues_list.push(data[i]);
                }
                $('[data-sync-status]').html('در تلاش برای ذخیره‌کردن...');
                trySend();
            }
            else
            {
                if (queues_list.length){
                    tryCount = -1;
                    send();
                    $('[data-sync-status]').html('درحال ذخیره‌کردن...');
                } else{
                    requesting = false;
                    $('[data-sync-status]').html('بدون تغییر');
                }
            }
        });
    }

    function trySend(){
        tryCount = Math.min(tryCount + 1, tryTimes.length - 1);
        setTimeout(send, tryTimes[tryCount] * 1000);
        // setTimeout(send, 1000);
    }
    $('[data-nav][data-nullable]').on('pannel:hide', function(){
        var checkbox = $('input[data-nullable]', this);
        if(checkbox.is(':checked')){
            checkbox.trigger('change')
        }
    })
    $('[data-nav="information"]').on('pannel:hide', function(){
        $('form', this).trigger('submit');
    });

    function findEmpty(){
        var empty = [];
        var last = null;
        items.each(function(i){
            if(['optional', 'optional_images'].indexOf($(this).attr('data-answer-type')) >= 0){
                if(!$(this).attr('data-answer')){
                    if(last === null){
                        last = i + 1;
                    }
                }else{
                    if(last !== null){
                        empty.push([last, i]);
                    }
                    last = null;
                }
            }
        });
        if(last !== null){
            empty.push([last, items.length]);
        }
        empty.forEach(function(e, i){
            if(e[0] == e[1]){
                empty[i] = e[0];
            }else if(e[1] - e[0] == 1){
                empty[i] = e[0] + ' و ' + e[1];
            }else{
                empty[i] = e[0] + ' تا ' + e[1];
            }
            empty[i] = $('<a href="#'+e[0]+'"></a>').text(empty[i]);
        });
        $('#nav-empty-answers').html('');
        $('#nav-empty-answers').append(empty);
    }
    findEmpty();
    $('[data-nullable]').each(function(i, el){
        function change(){
            var parent = $(this).parents('[data-nav]');
            var item = parent.attr('data-nav')
            var inputs = $('input, textarea, select',`#answer-content-panel-${item}`);
            if($(this).is(':checked')){
                inputs.attr('disabled', 'disabled');
                parent.attr('data-isnull', 1);
                $(`#answer-content-panel-${item}`).fadeTo('fast', 0.3);
            }else{
                parent.removeAttr('data-isnull', 1);
                inputs.removeAttr('disabled');
                $(`#answer-content-panel-${item}`).fadeTo('fast', 1);
            }
        }
        $(el).on('change', change)
        change.call(el)
    })
})();
