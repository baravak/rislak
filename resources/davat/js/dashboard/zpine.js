function amontifa(_amount, _unit){
    return {
        _amount : _amount,
        _unit: new Boolean(_unit),
        init: function(){
            this.$el.setAttribute('x-text', "("+_amount+" || 0).toString().replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،') + (_unit ? ' تومنء' : null)");
        }
    }
}
