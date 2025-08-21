<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public $title, $value, $description, $icon, $iconColor;

    public function __construct($title, $value, $description, $icon, $iconColor = '#3b82f6')
    {
        $this->title = $title;
        $this->value = $value;
        $this->description = $description;
        $this->icon = $icon;
        $this->iconColor = $iconColor;
    }

    public function render()
    {
        return view('components.admin.stat-card');
    }
}
