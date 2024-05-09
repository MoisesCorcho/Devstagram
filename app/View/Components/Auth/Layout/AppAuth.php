<?php

namespace App\View\Components\Auth\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppAuth extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = "",
        public string $header = "",
        public string $contentHeader = "",
        public string $contentFooter = "",
        public string $footerButton,
        public string $footerButtonRoute
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('auth.layout.app');
    }
}
