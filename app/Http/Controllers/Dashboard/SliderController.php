<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Services\Dashboard\SliderService;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        return view('dashboard.sliders.index');
    }

    public function getSliders()
    {
        return $this->sliderService->getAllSlidersForDatatable();
    }

    // public function create()
    // {
    //     return view('dashboard.sliders.create');
    // }

    public function store(SliderRequest $request)
    {
        $data = $request->only(['file_name', 'note']);
        $slider = $this->sliderService->createSlider($data);
        if (!$slider) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.create_slider_successfully')], 201);
    }

    public function destroy($id)
    {
        $slider = $this->sliderService->deleteSlider($id);
          if (!$slider) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.delete_slider_successfully')], 200);
    }
}
