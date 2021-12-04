function alpinePopper(){
    return {
        popper: false,
        focus: false,
        init : function(){
            this.$el.querySelector('[x-ref="trigger"]').setAttribute('x-on:mouseenter', 'popper = !focus ? true : popper')
            this.$el.querySelector('[x-ref="trigger"]').setAttribute('x-on:mouseout', 'popper = !focus ? false : popper')
            this.$el.querySelector('[x-ref="trigger"]').setAttribute('x-on:focus', 'popper = true; focus = true')
            this.$el.querySelector('[x-ref="trigger"]').setAttribute('x-on:blur', 'popper = false; focus = false')
            this.$el.querySelector('[x-ref="popper"]').setAttribute('x-show', 'popper')
        }
    }
}
