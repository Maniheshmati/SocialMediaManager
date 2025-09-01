<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableFooter extends Component
{

    public $model;
    /**
     * Create a new component instance.
     */
    public function __construct($model = null)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.table-footer');
    }
}
