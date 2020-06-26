<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class StatusController extends Controller
{
    /**
     * create new user.
     *
     * @param  UserCreateRequest  $request
     * @return array
     */
    public function create(Request $request, UserService $service)
    {
    	$status = $service->addStatus($request->all());

        return response()->json($status, 201);
    }
}
