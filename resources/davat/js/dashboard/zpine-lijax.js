Alpine.directive('lijax', (el, { value, modifiers, expression }, { Alpine, effect, cleanup, evaluate, evaluateLater }) => {
    var ignore_event_changer = ['click']
    if(!el._lijaxEvent){
        el._lijaxEvent = {}
    }
    function getValue(){
        return el.value
    }
    el._lijaxOldValue = getValue()
    function setUp(e){
        var event = el._lijaxEvent[e.type]
        if(event.timeout){
            clearTimeout(event.timeout)
        }
        if(el._lijaxOldValue == getValue() && ignore_event_changer.indexOf(e.type) === -1) return
        if(!event.delay){
            el._lijaxOldValue = getValue()
            LijaxFire.call(el)
        }else{
            _self = this
            event.timeout = setTimeout(function(){
                if(el._lijaxOldValue == getValue() && ignore_event_changer.indexOf(e.type) === -1) return
                el._lijaxOldValue = getValue()
                LijaxFire.call(el)
            }, event.delay)
        }
    }
    var event = value
    if(el._lijaxEvent[event]){
        el.removeEventListener(event, el._lijaxEvent[event].event)
    }
    var modifier = modifiers[0] && /^\d+ms$/.test(modifiers[0]) ? parseInt(modifiers[0].substr(0, modifiers[0].length -2)) : undefined
    el._lijaxEvent[event] = {
        delay : modifier,
        event : setUp
    }
    el.addEventListener(event, setUp)
})


Alpine.directive('statio', (el, { value, modifiers, expression }, { Alpine, effect, cleanup, evaluate, evaluateLater }) => {
    el.addEventListener('click', (e)=>{
        if (/^\#(.*)$/.test(el.getAttribute('href'))){
            return true;
        }
        new Statio({
            url: el.getAttribute('href'),
            type: el.classList.contains('action') ? 'render' : 'both',
            context: el,
            ajax: {
                headers : el.getAttribute('data-xhrBase') ? {
                    'Data-xhr-base': el.getAttribute('data-xhrBase')
                } : null
            }
        });
        e.preventDefault();
    })
})

