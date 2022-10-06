<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function authUser()
    {
        return redirect('/login');
    }

    function login()
    {
        if (isset($_COOKIE['remember'])) {
            $user = $_COOKIE['remember'];
            $pass = $_COOKIE['remember_me'];
            $check = 'ok';
            return view('login', ['user' => $user, 'pass' => $pass, 'check' => $check]);
        } else {
            $check = 'no';
            return view('login', compact('check'));
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    function main()
    {
        return view('main', ['userinfo' => Auth::user()]);
    }

    function signup()
    {
        return view('signup');
    }

    function forgot_password()
    {
        return view('forgot_password');
    }

    function register(Request $request)
    {
        $request->validate([
            'fname' => 'alpha',
            'lname' => 'alpha',
            'gender' => 'required',
            'mail' => ['email', 'unique:users,email'],
            'mobile' => ['numeric', 'unique:users,mobile_no', 'digits:10'],
            'uname' => ['required', 'unique:users,username'],
            'pass' => 'required',
            'con_pass' => ['required', 'same:pass']
        ]);


        $user = new User;

        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->gender = $request->gender;
        $user->email = $request->mail;
        $user->mobile_no = $request->mobile;
        $user->username = $request->uname;
        $user->password = Hash::make($request->pass);

        $user->save();

        $data = DB::table('users')->where('username', $request->uname)->first();
        $request->session()->put('userLogged', $data->id);

        return redirect('main');
    }

    function verify(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($mail = User::where('email', $request->email)->orwhere('username', $request->email)->orwhere('mobile_no', $request->email)->first()) {
            $creden = 1;
        } else {
            return back()->with('invalid', 'Please enter valid username and password');
        }
        $credentials = ['email' => $mail->email, 'password' => $request->password];
        $remember_me  = ($request->has('remember')) ? TRUE : FALSE;

        if (Auth::attempt($credentials)) {

            if ($remember_me) {
                setcookie("remember", $request->email, time() + (86400 * 15), "/login");
                setcookie("remember_me", $request->password, time() + (86400 * 15), "/login");
            } else {
                setcookie("remember", $request->email, time() - (86400 * 15), "/login");
                setcookie("remember_me", $request->password, time() - (86400 * 15), "/login");
            }

            $request->session()->regenerate();
            return redirect()->intended('main');
        } else {
            return back()->with('invalid', 'Please enter valid username and password');
        }
    }

    function send_link(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'exists:users,email']]);

        $token = Str::random(60);
        DB::table('users')->where('email', $request->email)->update(['token' => $token]);

        $data = ['path' => 'http://lara-curd.test/set_password?token=' . $token];
        $user['to'] = $request->email;
        Mail::send('link', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('Conformation');
        });
        return redirect('forgot_password');
    }

    function set_password(Request $request)
    {
        $token = $request->token;
        $data = DB::table('users')->where('token', $token)->first();
        if ($data) {
            return view('set_password', ['id' => $data->id]);
        } else {
            return view('error');
        }
    }

    function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('login');
    }
}
