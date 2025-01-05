<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\SettingRepository;
use App\Utils\ImageManger;

class SettingService
{
    protected $settingRepository, $imageManger;
    public function __construct(SettingRepository $settingRepository, ImageManger $imageManger)
    {
        $this->settingRepository = $settingRepository;
        $this->imageManger = $imageManger;
    }
    public function getSetting($id)
    {
        $setting = $this->settingRepository->getSettingById($id);
        return $setting ?? abort(404);
    }
    public function updateSetting($id, $data)
    {
        $setting = $this->getSetting($id);
        if (isset($data['logo']) && $data['logo'] != NUll) {
            $this->imageManger->deleteImageFromLocal($setting->logo);
            $file_name = $this->imageManger->uploadSingleImage('/', $data['logo'], 'settings');
            $data['logo'] = $file_name;
        }
        if (isset($data['favicon']) && $data['favicon'] != NUll) {
            $this->imageManger->deleteImageFromLocal($setting->favicon);
            $file_name = $this->imageManger->uploadSingleImage('/', $data['favicon'], 'settings');
            $data['favicon'] = $file_name;
        }

        $setting = $this->settingRepository->updateSetting($setting, $data);
        return !$setting ? false : $setting;
    }
}
