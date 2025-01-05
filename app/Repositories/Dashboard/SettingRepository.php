<?php

namespace App\Repositories\Dashboard;

use App\Models\Setting;

class SettingRepository
{
    public function getSettingById($id) 
    {
        $setting = Setting::find($id);
        return $setting;
    }
    public function updateSetting($setting, $data)
    {
        return $setting->update($data);
    }
}
