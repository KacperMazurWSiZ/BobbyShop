<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login($redirect = '')
    {
        if (request()->isMethod('POST')){
            $post = request()->get("form");
            $validator = Validator::make($post, [
                'admin_login' => 'required',
                'admin_password' => 'required'
            ]);
            if($validator->fails()){
                return redirect()->route('admin.login')->withErrors($validator);
            }

                $attempt = [
                    'admin_login' => $post['admin_login'],
                    'password' => $post['admin_password'],
                    'admin_status' => 1,
                ];
                $redirectJson = json_decode(base64_decode($redirect));

                if(Auth::attempt($attempt)){
                    session()->flash('success', 'You log in successfully!');

                    if ($redirectJson){
                        return redirect()->to($redirectJson->url);
                    } else {
                        return redirect()->route('admin.index');
                    }
                } else {
                    session()->flash('danger', 'You not log in successfully!');
                }


        }
        return view('administrator.auth.login');
    }

    public function logout(){
        Auth::logout();
        session()->flash('success', 'Logout successfully!');
        return redirect()->route('admin.login');
    }
}
