<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHeader extends Component
{
    public $searchPlaceholder;
    public $searchId;
    public $searchName;
    public $filterId;
    public $filterName;

    public function __construct($searchPlaceholder = null, $searchId = null, $searchName = null, $filterName = null, $filterId = null)
    {
        $this->searchPlaceholder = $searchPlaceholder;
        $this->searchId = $searchId;
        $this->searchName = $searchName;
        $this->filterId = $filterId;
        $this->filterName = $filterName;
    }

    public function render()
    {
        return view('components.admin.table-header');
    }
}
