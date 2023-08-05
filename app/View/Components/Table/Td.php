<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Td extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.td');
    }
}
