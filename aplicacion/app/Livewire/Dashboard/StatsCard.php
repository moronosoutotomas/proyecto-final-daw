<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class StatsCard extends Component
{
    public $title;
    public $value;
    public $icon;
    public $color;
    public $description;
    public $trend;

    public function mount($title, $value, $icon, $color, $description = '', $trend = '')
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->color = $color;
        $this->description = $description;
        $this->trend = $trend;
    }

    public function render()
    {
        return view('livewire.dashboard.stats-card');
    }
}
