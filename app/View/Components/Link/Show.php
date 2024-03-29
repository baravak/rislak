<?php

namespace App\View\Components\Link;

use Illuminate\View\Component;

class Show extends Component
{
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.link.show');
    }
}
