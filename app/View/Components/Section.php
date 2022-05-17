<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Section extends Component
{
  public static $count = 0;

  public $id, $origin, $cubic, $distance;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(
    public $duration = 800,
    public $delay = 0,
    public $class = "",
    public $style = "",
    $origin = "Y",
    $cubic = null,
    $distance = "30px"
  ) {
    $this->id = self::$count++;
    if ($origin[0] == "-") {
      $this->origin = strtoupper($origin[1]);
      $this->distance = "-$distance";
    } else {
      $this->origin = $origin;
      $this->distance = $distance;
    }
    if ($cubic) {
      $this->cubic = "cubic-bezier$cubic";
    }
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view("components.section");
  }
}
