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
            if($validator->passes()){
                $attempt = [
                    'admin_login' => $post['admin_login'],
                    'password' => $post['admin_password'],
                    'admin_status' => 1,
                ];
                $redirectJson = json_decode(base64_decode($redirect));
                $post['admin_remember_me'] = isset($post['admin_remember_me']);

                if(Auth::attempt($attempt, $post['admin_remember_me'])){
                    session()->flash('success', 'You log in successfully!');

                    if ($redirectJson){
                        return redirect()->to($redirectJson->url);
                    } else {
                        return redirect()->route('admin.index');
                    }
                } else {
                    session()->flash('danger', 'You not log in successfully!');
                }
            } else {
                session()->flash('danger', 'Validation error!');
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
