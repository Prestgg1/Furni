<?php

namespace App\View\Components;

use App\Models\Menus;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
  public $title;
  /**
   * Create a new component instance.
   */
  public function __construct($title)
  {
    $this->title = $title;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
  
    return view('components.Header',['menus'=>Menus::orderBy('order','ASC')->get()]);
  }
}
