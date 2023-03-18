<?php

namespace DanPalmieri\LiveWindUi;

use Livewire\Component;

class LivewireSidebarToggle extends Component
{
    public function toggle($state)
    {
        cookie('svelve_sidebar_open', $state);
    }

    public function render()
    {
        return <<<'blade'
            <span></span>
        blade;
    }
}
