<?php

namespace App\View\Components\Form\Element;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class Button1 extends Component
{
    public $title;
    public $type;
    public function __construct($title, $type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function render(): View|Closure|string
    {
        return view('components.'.Session::get('user')['theme'].'.form.element.button1');
    }

}
