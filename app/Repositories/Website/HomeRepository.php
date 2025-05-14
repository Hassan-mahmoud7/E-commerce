<?php

namespace App\Repositories\Website;

use App\Models\Slider;

class HomeRepository
{
    public function getSlider()
    {
        return Slider::latest()->get();
    }
}
