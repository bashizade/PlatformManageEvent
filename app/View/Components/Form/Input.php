<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $placeholder;
    public $label;
    public $name;
    public $option;
    public function __construct($type,$placeholder,$label,$name,$option = " ")
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->name = $name;
        $this->option = $option;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
