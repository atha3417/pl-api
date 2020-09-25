<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * The input type.
     *
     * @var string
     */
    public $type;

    /**
     * The field name.
     *
     * @var string
     */
    public $field;

    /**
     * The field label.
     *
     * @var string
     */
    public $label;

    /**
     * The field value.
     *
     * @var string
     */
    public $value;

    /**
     * Is required field.
     *
     * @var string
     */
    public $required;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     *, $value = "" @param  string  $field
     * @param  string  $required
     *, $value = "" @return void
     */
    public function __construct($type = 'text', $field, $label = "", $value = "", $required = 'false')
    {
        $this->type = $type;
        $this->field = $field;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
