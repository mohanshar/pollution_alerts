<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userpost;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class UserPostingController extends Controller
{
    public function userPostingShow()
    {
        if (!(Auth::guard('admin')->check())) {
            return redirect()->route('admin.login');
        }

        $posts = userpost::paginate(3)->onEachSide(3);
        // UserPosting::paginate(10);
        return view('UserPosting.UserPostingIndex', compact('posts'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('UserPosting.create_post');
    }

    public function submit(Request $request)
    {

        $image_url = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $new_name = Str::random(5) . time() . $file->getClientOriginalName();
            $path = public_path('/uploads');
            $file->move($path, $new_name);
            $image_url = asset('uploads/' . $new_name);
        }

        if (!Auth::check()) {
            return redirect('/post')->with('alert', 'Login to submit the post!');
        }

        User::where('user_id', Auth::user()->id)->get();

        $data = [
            'user_id' => Auth::check() ? Auth::user()->id : '',
            'name' => Auth::check() ? Auth::user()->name : '',
            'postedby' => $request->get('postedby'),
            'location' => $request->get('location'),
            'mobile_no' => $request->get('mobile_no'),
            'description' => $request->get('problem'),
            'image' => $image_url ?? '',
            'status' => $request->get('status'),
            'approved_declined' => $request->get('apde'),
            'date_time' => $request->get('date-time'),
        ];

        $postedby = $request->get('postedby');
        $mobile_no = $request->get('mobile_no');
        $status = $request->get('status');

        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = '+18595350613';

        try {
            $client = new Client($sid, $token);
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                $mobile_no,
                array(
                    'from' => $twilio_number,
                    'body' => ['Hello! '. $postedby . ', Your post has been ' . $status . '!']
                )
            );
            // dd('done');
        } catch (Exception $ex) {
            dd($ex);
        }

        userpost::insert($data);
        return redirect()->back()
        ->with('success','Sent successfully!');
    }

    public function delete($id)
    {
        $post = userpost::find($id);
        if ($post) {
            userpost::destroy($id);
        }
        return redirect()->back()
        ->with('success','Delete successfully!');
    }

    public function edit($id)
    {

        $post = userpost::where('id', $id)->first();
        if ($post) {
            return view('UserPosting.status', compact('post'));
        }
    }

    public function approvedDeclinedFunction(Request $request, $id)
    {

        $data = [
            'postedby' => $request->get('postedby'),
            'mobile_no' => $request->get('mobile_no'),
            'status' => $request->get('status'),
            'user_id' => Auth::check() ? Auth::user()->id : '',
        ];

        userpost::where('id', $id)->update($data);

        $postedby = $request->get('postedby');
        $mobile_no = $request->get('mobile_no');
        $status = $request->get('status');

        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = '+18595350613';

        try {
            $client = new Client($sid, $token);
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                $mobile_no,
                array(
                    'from' => $twilio_number,
                    'body' => ['Hello! '. $postedby . ', Your post has been ' . $status . '!']
                )
            );
            // dd('done');
        } catch (Exception $ex) {
            dd($ex);
        }

        return redirect()->route('userpost.show')
        ->with('success','Send successfully!');
    }
}
