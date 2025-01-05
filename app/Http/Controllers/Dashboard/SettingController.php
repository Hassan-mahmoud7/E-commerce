<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\services\Dashboard\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        return view('dashboard.settings.index');
    }
    public function update(SettingRequest $request,$id)
    {
        $data = $request->only(['site_name','small_desc','email','email_support','phone',
        'address','logo','favicon','meta_desc', 'facebook','twitter', 'instagram', 'youtube','site_copyright','promotion_video_url',]);
        $setting = $this->settingService->updateSetting($id , $data);
        if (!$setting) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->back()->with('success', __('dashboard.updated_successfully'));
    }
}
