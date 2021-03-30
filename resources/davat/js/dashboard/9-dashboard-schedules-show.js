$('body').on('statio:dashboard:room:schedules:create', function () {
    $('#field').on('select2:select select2:unselect', function(e){
        var values = $(this).val();
        if(values.length > 0){
            $('#field_count').text('('+values.length+')');
        }else{
            $('#field_count').text('');
        }
        var ids = $('#payment_fields label').map(function(key, value){ return $(this).attr('for')}).toArray();
        var removes = [...ids];
        $(this).select2('data').forEach(function(value, key, all){
            var id = 'amount-' + value._resultId;
            var exists = ids.indexOf(id);
            if(exists !== -1) {
                delete removes[exists];
                return ;
            }
            var input = $('#payment_fields_pattern').clone();
            ids.push(id);
            input.removeAttr('id');
            $('label', input).attr('for', id);
            $('label .field_title', input).html(value.text);
            $('input', input).attr('id', id);
            input.removeClass('hidden');
            input.appendTo('#payment_fields');
        });
        removes.filter(Boolean).forEach(function(id, key){
            $('#' + id).parents('.amount_fields').remove();
        });
    });
    $('[name=repeat_status]').on('change', function(){
        if($('#repeat-status-weeks').is(':checked')){
            $('input', '#repeat-range').attr('disabled', 'disabled');
            $('#repeat-range').fadeTo('fast', .3);
            $('#repeat').fadeTo('fast', 1).removeAttr('disabled');
        }else{
            $('input', '#repeat-range').removeAttr('disabled');
            $('#repeat-range').fadeTo('fast', 1);
            $('#repeat').fadeTo('fast', .3).attr('disabled', 'disabled');
        }
    }).eq(0).trigger('change');

    $('#clients_type').on('change', function(){
        $('#client_selection_input')[$(this).val() == 'client' ? 'show' : 'hide']();

        $('#case_selection_input')[$(this).val() == 'case' ? 'show' : 'hide']();
    }).trigger('change');

    $('#group_session').on('change', function(){
        $('#clients-number-input')[$(this).is(':checked') ? 'show' : 'hide']();
    }).trigger('change');

    $('#ch-closed-at').on('change', function(){
        var elements = $('[data-for=closed-at]');
        $('[data-for=closed-at] [name=closed_at_type]:checked').trigger('change');
        if($(this).is(':checked') && !$(this).is(':disabled')){
            $('input', elements).removeAttr('disabled');
            $(elements).fadeTo('fast', 1);
        }else{
            $('input', elements).attr('disabled', 'disabled');
            $(elements).fadeTo('fast', .3);
        }
    });

    $('[name=closed_at_type]').on('change', function(){
        var type = $(this).val();
        var select, unselect;
        if(type == 'relative'){
            select = $('[data-for=closed-at] [data-for=relative]');
            unselect = $('[data-for=closed-at] [data-for=absolute]');
        }else{
            unselect = $('[data-for=closed-at] [data-for=relative]');
            select = $('[data-for=closed-at] [data-for=absolute]');
        }
        $('input', select).removeAttr('disabled');
        select.show();

        $('input', unselect).attr('disabled', 'disabled');
        unselect.hide();
    });

    $('[name=opens_at_type]').on('change', function(){
        var type = $(this).val();
        var select, unselect;
        if(type == 'relative'){
            select = $('[data-for=opens-at] [data-for=relative]');
            unselect = $('[data-for=opens-at] [data-for=absolute]');
        }else{
            unselect = $('[data-for=opens-at] [data-for=relative]');
            select = $('[data-for=opens-at] [data-for=absolute]');
        }
        $('input', select).removeAttr('disabled');
        select.show();

        $('input', unselect).attr('disabled', 'disabled');
        unselect.hide();
    });

    $('#ch-opens-at').on('change', function(){
        var elements = $('[data-for=opens-at]');
        $('[data-for=opens-at] [name=opens_at_type]:checked').trigger('change');
        if($(this).is(':checked') ){
            $('input', elements).removeAttr('disabled');
            $(elements).fadeTo('fast', 1);

            $('#ch-closed-at').removeAttr('disabled');
            $('#ch-closed-at').parent().fadeTo('fast', 1);
        }else{
            $('input', elements).attr('disabled', 'disabled');
            $(elements).fadeTo('fast', .3);

            $('#ch-closed-at').attr('disabled', 'disabled');
            $('#ch-closed-at').parent().fadeTo('fast', .3);
        }
        $('#ch-closed-at').trigger('change');
    }).trigger('change');
});