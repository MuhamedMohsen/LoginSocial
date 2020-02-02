<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_view(){

        return view('admin.login');
    }


    public function loginPath(){
        return back();
    }
    public function redirectPath($type){


        if($type == 1){

            return route('admin.home');
        }


    }

    public function Do_login(Request $request){

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        if (\auth()->validate(['email' => $request->email, 'password' => $request->password, 'status' => 0])) {

            return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->withErrors('حسابك غير نشط أو لم يتم التحقق منه');
        }
        $credentials  = array('email' => $request->email, 'password' => $request->password);
        if (\auth()->attempt($credentials, $request->has('remember'))){
            return redirect()->intended($this->redirectPath(1));
        }
        return back()

            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'عنوان البريد الإلكتروني أو كلمة المرور غير صحيحة',
            ]);
    }
}
