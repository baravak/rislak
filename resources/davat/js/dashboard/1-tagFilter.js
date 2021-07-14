(function(davat){
    var request = undefined;
    var timeout = undefined;
    var filter = {};
    var tagFilter = function(){
        if($(this).is(':checked')){
            var sub = $(this).attr('data-tagFilter');
            if(!filter[sub]){
                filter[sub]= []
            }
            if(filter[sub].indexOf($(this).val()) === -1){
                filter[sub].push($(this).val());
            }
        }
        $(this).change(function(){
            append.call(this, $(this).val());
        });
    }
    var append = function(tag){
        try{
            request.abort();
        }catch(x){}
        if(timeout){
            clearTimeout(timeout);
        }
        var sub = $(this).attr('data-tagFilter');
        if(!filter[sub]){
            filter[sub] = [];
        }
        if(filter[sub].indexOf(tag) >= 0){
            filter[sub].splice(filter[sub].indexOf(tag), 1);
        }else{
            filter[sub].push(tag);
        }
        timeout = setTimeout(send.bind(this, sub), 750);
    }
    function send(sub){
        var link = new URL($(this).attr('data-url'));
        link.searchParams.set('tag', filter[sub])
        request = new Statio({
            url : link.toString()
        });
    }
    davat.tagFilter = function(element){
        element.each(function(){
            var sub = $(this).attr('data-tagFilter');
            if(filter[sub]){
                delete filter[sub];
            }
        });
        element.each(function(){
            tagFilter.call(this);
        });
    }
})(window.davat);
