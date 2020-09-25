<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RedirectButton extends Component
{
    public $to;
    public $text;
    public $color;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($to, $text, $color = 'danger', $class = '')
    {
        $this->to = $to;
        $this->text = $text;
        $this->color = $color;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.redirect-button');
    }
}
