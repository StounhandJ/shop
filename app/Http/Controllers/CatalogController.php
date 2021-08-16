<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function category(CatalogRequest $request)
    {
        dd($request->get_category());
    }
}
