<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー登録画面
     * 
     * @param void
     */
    public function showRegister()
    {
        return view('userOption/register');
    }
    /**
     * ユーザー登録実行
     * 
     * @param Request $reqest
     * @return void
     */
    public function register(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        $file_name = $request->file('profImage')->getClientOriginalName();

        if (!is_null($file_name)) {
            $request->file('profImage')->storeAs('profImage', $file_name, 'public');

        }

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profImage' => $file_name,
        ]);

        Auth::login($user);

        return redirect('/');
    }
    /**
     * ユーザープロフィール画面 
     * 
     */
    public function profile()
    {
        return view('userOption.profile')->with('name', Auth::user()->name);
    }
    /**
     * ログイン画面
     * 
     */
    public function showLogin()
    {
        if (!empty(Auth::user())) {
            return redirect('/');
        } else {
            return view('userOption.login');
        }
    }
    /**
     * ログイン実行
     * 
     */
    public function login(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        // 認証試行
        $credentials = $request->only('email', 'password');
        if (AUth::attempt($credentials, $request->boolean('remember'))) {
            // 認証成功
            $request->session()->regenerate();    // セッション固定攻撃を防ぐ

            return redirect('/');
        } else {
            return back();
        }
    }
    /**
     * ログアウト実行
     * 
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
