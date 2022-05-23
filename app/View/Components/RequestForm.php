<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RequestForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $action;
    public $types;
    public $request;
    public function __construct($action, $types, $request = null)
    {
        $this->action = $action;
        $this->types = $types;
        $this->request = $request;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('requests.partials.form-control');
    }
}
