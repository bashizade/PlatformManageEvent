<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $modal_id;
    public $header;
    public $button;
    public $colorbtn;
    public function __construct($modalID,$header,$button,$colorbtn = "blue")
    {
        $this->modal_id = $modalID;
        $this->header = $header;
        $this->button = $button;
        $this->colorbtn = $colorbtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
