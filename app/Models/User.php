<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  ADD USERS
     *
     * @param   array   $data       The array of the user data.
     *
     * @return  bool                Return the boolean after insertion
     */
    public function addUser(array $data)
    {
        return $this->insert($data);
    }

    /**
     * GET USER DATA USING EMAIL
     *
     * @param   string  $email      The email of the user.
     *
     * @return  object              Return the user data in object
     */
    public function getUserDataByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * GET USER DATA BY USER ID
     *
     * @param   int     $userId     The user ID.
     *
     * @return  object              Return user data in object
     *
     */
    public function getUserDataById(int $userId)
    {
        return $this->where('id', $userId)->first();
    }

    /**
     * UPDATE USER DATA
     *
     * @param   array   $data       The data to be updated
     * 
     * @return  boolean             Return update result in boolean
     */
    public function updateUserData(int $userId, array $data)
    {
        return $this->where('id', $userId)
            ->update($data);
    }
}
