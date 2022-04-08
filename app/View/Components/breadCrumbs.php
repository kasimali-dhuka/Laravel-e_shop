<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadCrumbs extends Component
{
    public $crumbs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($crumbs)
    {
        $this->crumbs = $crumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <div class="py-3 mb-4 shadow-sm bg-warning border-top">
                    <div class="container">
                        <h6 class="mb-0">
                            @forelse($crumbs as $title => $route)
                                <a href="{{ $route }}" class="text-dark text-decoration-none"> {{ $title }} </a> 
                                @if (!$loop->last) / @endif
                            @empty
                            @endforelse
                        </h6>
                    </div>
                </div>
            </div>
        blade;
    }
}
