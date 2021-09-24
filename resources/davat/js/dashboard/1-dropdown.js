;(function(davat){
    function dropdown(){
        var _self = this;
        $('.dropdown-toggle', this).on('click', function(){
            if(!$('button + div', _self).is('.dropdown-open')){
                $('button + div', _self).fadeIn('fast').addClass('dropdown-open');
            }else{
                $('button + div.dropdown-open', _self).fadeOut('fast').removeClass('dropdown-open');
            }
        });
    }
    davat.dropdown = function(e){
        e.each(function(){
            dropdown.call(this);
        });
        $(document).on('click', function(e){
            var target = $(e.target);
            var parent = target.parents('.dropdown-open').eq(0);
            if(e.target == $('.datepicker-container')[0] || $(e.target).parents('.datepicker-container').length){
                return;
            }
            if(!parent.length && $('.dropdown-open').length){
                if($('.dropdown-open').eq(0).prev()[0] == target[0] || target.parents('.dropdown-toggle')[0] == $('.dropdown-open').eq(0).prev()[0]){
                    parent = $('.dropdown-open').eq(0);
                }
            }
            $('button + div.dropdown-open').each(function(){
                if($(this)[0] != parent[0]){
                    $(this).fadeOut('fast').removeClass('dropdown-open');
                }
            });
            // if(e.target != $('.dropdown-toggle', _self)[0] && $(e.target).parents('.dropdown-toggle')[0] != $('.dropdown-toggle', _self)[0]){
            //     $('button + div.dropdown-open', _self).fadeOut('fast').removeClass('dropdown-open');
            // }
        });
    }
})(davat);
