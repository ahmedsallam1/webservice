<?php

namespace App\Services;

use App\User;
use App\Status;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @var Status
     */
    private $statusModel;

    public function __construct(Status $statusModel)
    {
        $this->statusModel = $statusModel;
    }
	/**
	 * @param array $user
	 * @return User
	 */
	public function create(array $user)
	{
		$user['avatar'] = $user['avatar']->getClientOriginalName();
		$user['password'] = Hash::make($user['password']);
		$user['api_token'] = Str::random(60);

		return User::create($user);
	}

	/**
	 * @param array $status
	 * @return Status
	 */
	public function addStatus(array $status)
	{
		$this->statusModel->status = $status['status'];
		$this->statusModel->user()->associate(auth()->user());

		$this->statusModel->save();

		return $this->statusModel;
	}
}