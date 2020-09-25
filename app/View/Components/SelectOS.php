<?php

namespace App\View\Components;

use App\Models\Os;
use Illuminate\View\Component;

class SelectOS extends Component
{
    public $field;
    public $label;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field, $label)
    {
        $this->options = Os::orderBy('name', 'ASC')->get();
        $this->field = $field;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select-os');
    }
}
