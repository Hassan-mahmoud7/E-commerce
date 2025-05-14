<?php

namespace App\Services\Dashboard;

use App\Utils\ImageManger;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\SliderRepository;

class SliderService
{
    protected $sliderRepository , $imageManager;
    public function __construct(SliderRepository $sliderRepository , ImageManger $imageManager)
    {
        $this->imageManager = $imageManager;
        $this->sliderRepository = $sliderRepository;
    }
    public function getSliders()
    {
        return $this->sliderRepository->getSliders();
    }
     public function getAllSlidersForDatatable()
    {
        $sliders = $this->getSliders();
        return DataTables::of($sliders)
            ->addIndexColumn()
            ->addColumn('file_name', function ($item) {
                return view('dashboard.sliders.dataTable.images', compact('item'));
            })
            ->addColumn('note', function ($item) {
                return $item->note;
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.sliders.dataTable.actions', compact('item'));
            })
            ->rawColumns(['file_name','action'])
            ->make(true);
    }
    public function getSlider($id)
    {
        $slider = $this->sliderRepository->getSlider($id);
        return $slider ?? false;
    }
    public function createSlider($data)
    {
        if (array_key_exists('file_name',$data) && $data['file_name'] != NUll) {
        $data['file_name'] = $this->imageManager->uploadSingleImage('/',$data['file_name'], 'sliders');
        }
        $slider = $this->sliderRepository->createSlider($data);
        return $slider ?? false;
    }
    public function deleteSlider($id)
    {
        $slider = $this->getSlider($id);
        if (isset($slider->file_name) &&  $slider->file_name != null) {
           $this->imageManager->deleteImageFromLocal($slider->file_name);
        }
        return $this->sliderRepository->deleteSlider($slider);
        
    }
}
