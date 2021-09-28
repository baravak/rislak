(function(davat){
    var _name = {};
    var liveCheck = function(selector, url, name){
        if(_name[name]) return;
        var send = function(){
            var ids = [];
            $('['+selector+']').each(function(){
                ids.push($(this).attr(selector));
            });
            if(!ids.length){
            _name[name] = undefined;
            return ;
            }
            _name[name] = true;
            var data = {};
            data[name] = ids;
            new Statio({
                type : 'render',
                url : url,
                ajax : {
                    data : data,
                    complete : function(){
                        if($('['+selector+']').length){
                            timeout = setTimeout(function(){
                                _name[name] = undefined;
                                send();
                            }, 5000);
                        }else{
                            _name[name] = undefined;
                        }
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
