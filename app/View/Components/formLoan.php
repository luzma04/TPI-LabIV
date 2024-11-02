<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formLoan extends Component
{
    public $action;
    public $method;

    public function __construct($action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function render()
    {
        return view('components.form-loan');
    }
}
