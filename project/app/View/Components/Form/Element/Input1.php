<?php

namespace App\View\Components\Form\Element;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class Input1 extends Component
{
    public $name;
    public $label;
    public $type;
    public $options;
    public $value;
    public $placeholder;
    public $required;
    public function __construct($name, $label="#", $type="text", $options=[], $value="", $placeholder="", $required="")
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->options = $options;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('components.'.Session::get('user')['theme'].'.form.element.input1');
    }
}
