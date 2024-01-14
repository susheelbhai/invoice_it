<?php

namespace App\View\Components\Layout\Partner;

use Closure;
use App\Models\Theme;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class App extends Component
{
    public function __construct()
    {
        $user = Auth::guard('partner')->user();
        $theme = Theme::find($user->theme_id);
        $theme = $theme['name'];
        // $theme = 'theme3';
        $user = [
            'login' => $user,
            'theme' => $theme,
        ];
        Session::put('user',$user);
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.partner.app');
    }
}
