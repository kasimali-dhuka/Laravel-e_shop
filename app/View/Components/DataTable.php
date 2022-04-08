<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data=null)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table', [
            'data' => $this->data
        ]);
    }
}
