(function(davat){
    var liveCheck = function(selector, url, name){
        var xhr = undefined;
        var timeout = null;
        if(xhr) return;
        var send = function(){
            var ids = [];
            $('['+selector+']').each(function(){
                ids.push($(this).attr(selector));
            });
            if(! ids.length){
                xhr = undefined;
                return;
            }
            xhr = true;
            var data = {};
            data[name] = ids;
            new Statio({
                type : 'render',
                url : url,
                ajax : {
                    data : data,
                    complete : function(){
                        if(timeout) clearTimeout(timeout);
                        timeout = setTimeout(send, 5000);
                    }
                }
            });
        }
        send();
    }
    davat.liveCheck = function(selector, url, name){
        return new liveCheck(selector, url, name);
    }
})(window.davat);
