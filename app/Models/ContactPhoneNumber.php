<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPhoneNumber extends Model
{
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * ADD CONTACT'S PHONE NUMBER(S)
     *
     * @param   array   $data       The array of the phone data
     *
     * @return  boolean             Return the result in boolean
     */
    public function addPhoneData(array $data)
    {
        return $this->insert($data);
    }
}
