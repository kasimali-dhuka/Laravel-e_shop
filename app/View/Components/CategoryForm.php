<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryForm extends Component
{
    public $data;
    public $form;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data=null, $form)
    {
        $this->data = $data;
        $this->form = $form;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-form', [
            'data' => $this->data,
            'form' => $this->form
        ]);
    }
}
