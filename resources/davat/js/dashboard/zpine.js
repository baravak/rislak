function amontifa(_amount, _unit){
    return {
        _amount : _amount,
        _unit: new Boolean(_unit),
        init: function(){
            this.$el.setAttribute('x-text', "("+_amount+" || 0).toString().replace(/\\B(?=(\\d{3})+(?!\\d))/g, '،') + (_unit ? ' تومنء' : null)");
        }
    }
}

Alpine.directive('currency', (el, { value, modifiers, expression }, { Alpine, effect, cleanup, evaluate, evaluateLater }) => {
    var amount = evaluateLater(expression)
    effect(()=>{
            amount(change => {
                el.innerText = (evaluate(expression) || 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،')
                el.innerText += ['', ' تومانءء', ' تومانءء', ' تومانءءء'][modifiers[0] || 0]
        })
    })
})
