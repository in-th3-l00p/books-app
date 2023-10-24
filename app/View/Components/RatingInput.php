<?php

namespace App\View\Components;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingInput extends Component
{
    public function __construct(
        public float $value = 5,
        public int $labelMargin = 1
    ) { }

    public function render(): View|Closure|string {
        return view('components.rating-input');
    }
}
