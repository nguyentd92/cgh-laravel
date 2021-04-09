<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Permissions\ProductPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignInPage() {
        $user = auth()->user();

        return view('auth.sign-in');
    }

    public function showRegisterPage() {
        return view('auth.register');
    }

    public function signIn(Request $request) {

        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$user) {
            return redirect('/sign-in');
        }

        return redirect('/products');
    }

    public function signOut() {
        Auth::logout();

        return redirect('/sign-in');
    }

    public function register(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $name = $request->full_name;

        $user = new User();
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->name = $name;

        $user->save();

        return redirect('/sign-in');
    }
}
