<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiTokenController extends Controller
{
    /**
     * create the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function create(Request $request)
    {
    	$user = User::where('phone_number', $request->phone_number)->first();

    	if (!$user) {
        	return response()->json('Not Found!', 404);
    	}

    	if (Hash::check($request->password, $user->password)) {
	        $token = Str::random(60);

	        $user->forceFill([
	            'api_token' => $token,
	        ])->save();

        	return response()->json(['auth-token' => $token], 201);

    	}

		return response()->json('Unauthenticated', 401);
    }
}