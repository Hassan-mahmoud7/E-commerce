<?php

namespace App\Repositories\Dashboard;

use App\Models\Slider;

class SliderRepository
{
    public function getSliders()
    {
        return Slider::latest()->get();
    }
    public function getSlider($id)
    {
        return Slider::findOrFail($id);
    }
    public function createSlider($data)
    {
        return Slider::create($data);
    }
    public function deleteSlider($slider)
    {
        $slider = $slider->delete();
        return $slider;
    }
}
