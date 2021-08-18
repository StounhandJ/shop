<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard("admin")->check()) return redirect(route("admin.index"));

        $user = User::where("email", $request->query("email"))
                ->where("password", $request->query("password"));
        if (is_null($user)) return redirect(route("admin.login"))->withErrors([
            "login"=> "fail login"
        ]);
        Auth::guard("admin")->login($user, true);

        return redirect(route("admin.index"));
    }

    public function logout()
    {
        Auth::guard("admin")->logout();

        return redirect(route("index"));
    }
}
