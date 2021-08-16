<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subdomain\SubdomainCreateRequest;
use App\Models\Subdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubdomainController extends Controller
{
    public function create(SubdomainCreateRequest $request)
    {
        if ($request->existsTemplate())
        {
            Subdomain::create($request->query("template"), Auth::user());
            return "Good";
        }
        return "Not Found Template";
    }
}
