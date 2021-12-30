function amontifa(_amount, _unit){
    return {
        _amount : _amount,
        _unit: new Boolean(_unit),
        init: function(){
            this.$el.setAttribute('x-text', "("+_amount+" || 0).toString().replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،') + (_unit ? ' تومنء' : null)");
        }
    }
}

document.addEventListener('alpine:init', () => {
    removeFirstZiro = function(e){
        let start = e.target.selectionStart;
        let end = e.target.selectionStart;
        const match = this.value.match(/^0+/)
        if(match){
            const length = match[0].length
            this.value = this.value.substr(length)
            this.setSelectionRange(Math.max(0, start -length), Math.max(end-length))
        }
    }
    Alpine.data('amontity', () => ({
        _amountRef : null,
        focus : function(){
            if(this.$el.value === '0'){
                this.$el.setSelectionRange(0, 1)
            }
        },
        keydown : function(e){
            removeFirstZiro.call(this.$el, e)
        },
        keyup : function(e){
            if(e.type == 'paste'){
                const paste  = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text')
                let _start = e.target.selectionStart
                let _end = e.target.selectionEnd
                const val = this.$el.value
                this.$el.value = `${val.substring(0, _start)}${paste}${val.substring(_end)}`
                this.$el.setSelectionRange(_start + paste.length, _start + paste.length)
                e.preventDefault();
                e.stopPropagation();
            }
            const _value = this.$el.value
            if(!this.$el.value) {
                this.$el.value = '0'
                this.$el.setSelectionRange(0, 1)
            }
            removeFirstZiro.call(this.$el, e)
            let value = ''
            let start = e.target.selectionStart;
            let end = e.target.selectionStart;
            this.$el.value.split('').forEach(function(char, i){
                if(!(/\d/.test(char))){
                    start = start > i ? Math.max(0, start -1) : start
                    end = end > i ? Math.max(0, end -1) : end
                    return
                }
                value = `${value}${char}`
            })
            eval(`this.${this._amountRef} = value`)
            let length = value.length
            this.$el.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '،')
            if(_value != this.$el.value){
                const ov = length%3
                const additionalStart = start <= ov? start : start + Math.floor((start-1) / 3)
                const additionalEnd = end <= ov? end : end + Math.floor((end-1) / 3)
                this.$el.setSelectionRange(additionalStart, additionalEnd)
            }
        },
        value : function(){
            return eval(`(this.${this._amountRef} || 0).toString().replace(/[^\\d]/g, '').replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،')`)
        },
        amontity_init: function(){
            this._amountRef = this.$el.getAttribute('x-fill')
        },
        amontity : {
            ['x-init'](){
                return this.amontity_init.call(this, ...arguments)
            },
            ['x-on:focus'](){
                return this.focus.call(this, ...arguments)
            },
            [':value'](){
                return this.value.call(this, ...arguments)
            },
            ['x-on:keydown'](){
                return this.keydown.call(this, ...arguments)
            },
            ['x-on:keyup'](){
                return this.keyup.call(this, ...arguments)
            },
            ['x-on:paste'](){
                return this.keyup.call(this, ...arguments)
            }
        }
    }));
});
