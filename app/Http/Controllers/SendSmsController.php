<?php

namespace App\Http\Controllers;

// require_once "Twilio/autoload.php";

use App\Models\sendsms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Twilio\Rest\Client;

class SendSmsController extends Controller
{
    public function showuserpost()
    {
        if (!(Auth::guard('admin')->check())) {
            return redirect()->route('admin.login');
        }
        $notificaions = sendsms::all();
        return view('UserPosting.showuserpost', compact('notificaions'));
    }

    public function sendsms(Request $request)
    {

        $notificaion = [
            'name' => Auth::check() ? Auth::user()->name : '',
            'sender' => $request->get('sender'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'user_id' => Auth::check() ? Auth::user()->id : '',
        ];

        if (!Auth::check()) {
            return redirect('/')->with('error', 'Login to send an SMS!');
        }

        User::where('user_id', Auth::user()->id)->get();

        $name = $request->get('name');
        $phone = $request->get('phone');
        $description = $request->get('description');

        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = '+18595350613';

        try {
            $client = new Client($sid, $token);

            $client->messages->create(
                // Where to send a text message (your cell phone?)
                $phone,
                array(
                    'from' => $twilio_number,
                    'body' => $description
                )
            );
            // dd('done');
        } catch (Exception $ex) {
            dd($ex);
            // dd($ex);
        }

        sendSMS::insert($notificaion);
        return redirect('/')->with('success', 'Hello! "' . $name . '", Your message has been sent successfully!');
    }
}
