<?php

namespace App\Http\Controllers;

use App\Models\sitesetting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function site_settings()
    {
        if (!(Auth::guard('admin')->check())) {
            return redirect()->route('admin.login');
        }

        $settings = sitesetting::find(1);
        return view('SiteSettings.site_setting', compact('settings'));
    }

    public function settings_update(Request $request)
    {

        $this->validate($request, [
            // 'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_name' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
            'messenger' => ['required', 'string', 'max:255'],
            'copyright' => ['required', 'string', 'max:255'],
        ]);

        $logo_url = '';

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $new_name = Str::random(5) . time() . $file->getClientOriginalName();
            $path = public_path('/web_logo');
            $file->move($path, $new_name);
            $logo_url = asset('web_logo/' . $new_name);
        }

        // dd($logo_url);

        $data = [
            'logo' => $logo_url,
            'site_name' => $request->get('site_name'),
            'whatsapp' => $request->get('whatsapp'),
            'messenger' => $request->get('messenger'),
            'copyright' => $request->get('copyright'),
        ];

        DB::table('sitesettings')->truncate();
        sitesetting::insert($data);
        // dd('Done!');
        return redirect()->back()
        ->with('success','Frontend webpage updated successfully!');;
    }
}
