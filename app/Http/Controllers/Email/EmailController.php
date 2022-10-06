<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function create()
    {
        $template = Template::get();
        $store = Store::get();
        return view('email.create', compact('template', 'store'));
    }

    function template_description(Request $request)
    {
        $template = Template::where('name', $request->name)->first();
        return response($template->description);
    }

    function send_mail(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'subject' => 'required',
            'store' => 'required',
        ]);

        $str = $request->description;
        $name = $request->store;

        foreach ($name as $key => $value) {

            $stores = Store::where('name', $value)->first();

            if (strrpos($str, '**name**') >= 0) {
                $body = str_replace('**name**', $stores->name, $str);
                if (strrpos($body, '**domain**') >= 0) {
                    $body = str_replace('**domain**', $stores->domain, $body);
                }
            }

            if (strrpos($str, '**domain**') >= 0) {
                $body = str_replace('**domain**', $stores->domain, $str);
                if (strrpos($body, '**name**') >= 0) {
                    $body = str_replace('**name**', $stores->name, $body);
                }
            }

            $data = ['body' => $body];
            $user['to'] = $stores->email;
            $subject = $request->subject;
            Mail::send('email.body', $data, function ($message) use ($user, $subject) {
                $message->to($user['to']);
                $message->subject($subject);
            });
        }

        return redirect('email');
    }
}
