function amontifa(_amount, _unit){
    return {
        _amount : _amount,
        _unit: new Boolean(_unit),
        init: function(){
            this.$el.setAttribute('x-text', "("+_amount+" || 0).toString().replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،') + (_unit ? ' تومنء' : null)");
        }
    }
}

function amontity(){
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
    return {
        _amountRef : undefined,
        focus : function(){
            if(this.$el.value === '0'){
                this.$el.setSelectionRange(0, 1)
            }
        },
        keydown : function(e){
            removeFirstZiro.call(this.$el, e)
        },
        keyup: function(e){
            const _value = this.$el.value
            if(!this.$el.value) {
                this.$el.value = '0'
                this.$el.setSelectionRange(0, 1)
                return
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
            this[this._amountRef] = value
            let length = value.length
            this.$el.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '،')
            if(_value != this.$el.value){
                const ov = length%3
                const additionalStart = start <= ov? start : start + Math.floor((start-1) / 3)
                const additionalEnd = end <= ov? end : end + Math.floor((end-1) / 3)
                this.$el.setSelectionRange(additionalStart, additionalEnd)
            }
        },
        init: function(){
            _self = this
            this._amountRef = this.$el.getAttribute('x-fill')
            this.$el.setAttribute('x-on:focus', 'focus')
            this.$el.setAttribute(':value', `${this._amountRef}.toString().replace(/[^\\d]/g, '').replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،') || '0'`)
            this.$el.setAttribute('x-on:keydown', 'keydown')
            this.$el.setAttribute('x-on:keyup', 'keyup')
        }
    }
}
