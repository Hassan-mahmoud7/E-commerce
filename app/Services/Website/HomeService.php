<?php

namespace App\services\Website;

use App\Repositories\Website\HomeRepository;

class HomeService
{
    protected $homeRepository;
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }
    public function getSlider()
    {
        return $this->homeRepository->getSlider();
    }
    
}
