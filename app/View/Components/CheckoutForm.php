<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckoutForm extends Component
{
    private $form_data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($formdata=null)
    {
        $this->form_data = $formdata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkout-form', [
            'data' => $this->form_data
        ]);
    }
}
