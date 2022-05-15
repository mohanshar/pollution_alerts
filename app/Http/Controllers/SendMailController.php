<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {

        $mail = [
            $name = $request->get('name'),
            $email = $request->get('email'),
            'user_id' => Auth::check() ? Auth::user()->id : '',
        ];

        // dd($mail);

        if (!Auth::check()) {
            return redirect('/')->with('error', 'Login to send an E-mail!');
        }

        User::where('user_id', Auth::user()->id)->get();

        $data = array('name' => $name, 'body' => '
        Welcome to the world of pollution Control System!!
        Pollution control, in environmental engineering, any of a variety of means employed to limit damage done to the environment by the discharge of harmful substances and energies. Specific means of pollution control might include refuse disposal systems such as sanitary landfills, emission control systems for automobiles, sedimentation tanks in sewerage systems, the electrostatic precipitation of impurities from industrial gas, or the practice of recycling. For full treatment of major areas of pollution control, see air pollution control, wastewater treatment, solid-waste management, and hazardous-waste management.
        ');

        Mail::send('Mail Sender.news', $data, function ($message) use ($name, $email) {
            $message->to($email, $name)

                ->subject('PCS Welcome Message!');

            $message->from('ms0063443@gmail.com', 'Pollution Control System');
        });

        return redirect('/')->with('success', 'Hello! "' . $name . '" e-mail has been sent to your "' . $email . '" successfully.');
    }
}
