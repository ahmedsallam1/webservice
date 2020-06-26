<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public static $createRules = [
        'first_name' => [
            'required',
        ],
        'last_name' => [
            'required',
        ],
        'country_code' => [
            'in:eg,au',
        ],
        'gender' => [
            'in:male,female',
        ],
        'email' => [
            'required',
            'unique:users',
            'email'
        ], 
        'phone_number' => [
            'required',
            'numeric',
            'unique:users',
            // 'max:15',
            'regex:/^\++?[0-9]\d{6,14}$/',
        ],
        'birthdate' => [
            'required',
            'date_format:Y-m-d',
            'before:now',
        ],
        'avatar' => [
            'required',
            'mimes:jpeg,jpg,png'
        ],
    ];

    public static $customMessages = [
        'required' => 'blank',
        'in' => 'inclusion',
        'numeric' => 'not_a_number',
        'regex' => 'invalid',
        'min' => 'too_short',
        'max' => 'too_long',
        'before' => 'in_the_future',
        'unique' => 'taken',
        'mimes' => 'invalid_content_type',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'country_code',
        'gender',
        'email',
        'phone_number',
        'birthdate',
        'avatar',
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany(Status::class);
    }
}
