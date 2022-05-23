<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ThreadForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $types;
    public $action;
    public $thread;

    public function __construct($action, $types, $thread = null)
    {
        $this->action = $action;
        $this->types = $types;
        $this->thread = $thread;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('threads.partials.form-control');
    }
}
