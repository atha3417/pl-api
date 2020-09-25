<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmitButton extends Component
{
    public $color;
    public $text;
    public $float;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $text, $float = "left")
    {
        $this->color = $color;
        $this->text = $text;
        $this->float = $float;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.submit-button');
    }
}
