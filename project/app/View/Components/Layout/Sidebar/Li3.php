<?php

namespace App\View\Components\Layout\Sidebar;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class Li3 extends Component
{
    public $name;
    public $icon;
    public function __construct($name, $icon)
    {
        $this->name = $name;
        $this->icon = $icon;
    }

    public function render(): View|Closure|string
    {
        return view('components.'.Session::get('user')['theme'].'.layout.sidebar.li3');
    }
}
