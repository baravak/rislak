"use strict";
(function(){
    templateResult = function(data, el, evaluate, expression){
        var template_id = el.getAttribute('x-template-id') || el.id
        var template = document.querySelector(`[x-template-result="${template_id}"]`)
        if(template){
            var temp_dom = template.content.cloneNode(true).childNodes[1];
            temp_dom.setAttribute('x-data', `result = ${JSON.stringify(data)}`);
        }
        return template && data.text != 'Searching…' ? temp_dom : data.text
    }
    templateSelection = function(data, el, evaluate, expression){
        var template_id = el.getAttribute('x-template-id') || el.id
        var template = document.querySelector(`[x-template-selection="${template_id}"]`)
        if(template){
            var temp_dom = template.content.cloneNode(true).childNodes[1];
            temp_dom.setAttribute('x-data', `result = ${JSON.stringify(data)}`);
        }
        return template ? temp_dom : templateResult.call(this, data, el, evaluate, expression)
    }
    var loaded = false
    var init = [];
    function initFuction(el, evaluate, expression, effect){
        $(el).select2({
            width: '100%',
            minimumInputLength: 0,
            dir: "rtl",
            templateResult : function(data){return templateResult.call(this, data, el, evaluate, expression)},
            templateSelection : function(data){return templateSelection.call(this, data, el, evaluate, expression)},
            ajax: {
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Data-xhr-base', el.getAttribute('data-xhrBase') || 'select2')
                },
                processResults : function(data){
                    return {
                        results: data.data || data
                    }
                },
                data: function (params) {
                    return {
                        q: params.term || ''
                    }
                },
              url: function(){
                return el.getAttribute('data-url')
              },
              dataType: 'json'
            }
          })
          $(el).on('select2:select', function(e) {
              var event = new CustomEvent('select', {detail: e})
              this.dispatchEvent(event)
          })
          $(el).on('select2:unselect', function(e) {
            var event = new CustomEvent('unselect', {detail: e})
            this.dispatchEvent(event)
        })
    }
    $(document).ready(function(){
        loaded = true
        init.forEach((i) => {
            i()
        })
    })
    Alpine.directive('select2', (el, { value, modifiers, expression }, { Alpine, effect, cleanup, evaluate, evaluateLater }) => {
        var _init = initFuction.bind(this, el, evaluate, expression, effect)
        if(loaded) _init()
        else init.push(_init)
    })
})()



