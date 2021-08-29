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
        $data = $request->only(["login", "password"]);
        $data["is_admin"] = true;
        if (!auth()->guard("admin")->attempt($data))
            return redirect(route("admin.login"))->withErrors([
            "login"=> "Неправильные данные"
        ]);
        return redirect(route("admin.index"));
    }

    public function logout()
    {
        Auth::guard("admin")->logout();

        return redirect(route("index"));
    }
}
