<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * create new user.
     *
     * @param  UserCreateRequest  $request
     * @return array
     */
    public function create(UserCreateRequest $request, UserService $service)
    {
    	$user = $service->create($request->all());

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }
}
