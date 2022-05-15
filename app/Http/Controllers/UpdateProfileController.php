<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Nette\Utils\Image;
// use Intervention\Image\ImageManagerStatic as Image;

class UpdateProfileController extends Controller
{
    public function changeProfile()
    {
        return view('frontend.layouts.includes.profile');
    }

    public function upload(Request $request)
    {
        $validator = [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'max:255'],

        ];

        DB::table('users')->update([
            'user_id' => Auth::check() ? Auth::user()->id : '',
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email'),
        ]);

        return redirect('changeprofile')->withErrors($validator)->withInput();
    }

}
