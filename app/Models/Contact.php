<?php

namespace App\Models;

use App\Models\ContactPhoneNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
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
     * RELATIONSHIP ON `contact_phone_numbers`
     *
     * @return  object
     */
    public function phoneNumber()
    {
        return $this->hasMany(ContactPhoneNumber::class, 'contact_id');
    }

    /**
     * ADD CONTACT
     *
     * @param   array   $data       The array of the contact
     *
     * @return  int                 Return the inserted ID
     */
    public function addContact(array $data)
    {
        return $this->insertGetId($data);
    }

    /**
     * GET ALL CONTACTS OF THE CURRENT LOGGED IN USER
     *
     * @param   int     $userId     The ID of the user in the current session
     *
     * @return  object              Return the list of contacts in an object
     */
    public function getAllContact(int $userId)
    {
        return $this->with('phoneNumber')
            ->where('user_id', $userId)
            ->get();
    }

    /**
     * GET A SINGLE CONTACT DATA THAT BELONGED TO THE LOGGED IN USER
     *
     * @param   int     $contactId  The ID of the contact.
     *
     * @return  object              Return the data of the contact in an object
     */
    public function getSingleContact(int $contactId)
    {
        return $this->with('phoneNumber')
            ->where('id', $contactId)
            ->where('user_id', session()->get('user')['id'])
            ->get();
    }

    /**
     * DELETE A CONTACT FROM THE PHONE BOOK
     *
     * @param   int     $contactId  The ID of the contact.
     *
     * @return  boolean             Return the result in boolean
     */
    public function deleteContact(int $contactId)
    {
        $response = DB::transaction(function () use ($contactId) {
            $result = $this->where('id', $contactId)
                ->where('user_id', session()->get('user')['id'])
                ->delete();

            if ($result) {
                ContactPhoneNumber::where('contact_id', $contactId)->delete();
            }

            return true;
        });

        return $response;
    }

    /**
     * UPDATE THE CONTACT
     *
     * @param   int     $contactId          The contact ID
     * @param   array   $contactData        The contact data in array
     * @param   array   $phoneData          The phone data in array
     *
     * @return  boolean                     The result of response in boolean
     */
    public function updateContact(int $contactId, array $contactData, array $phoneData)
    {
        $response = DB::transaction(function () use ($contactId, $contactData, $phoneData) {
            $affected = $this->where('id', $contactId)
                ->update($contactData);

            if ($affected) {
                ContactPhoneNumber::where('contact_id', $contactId)->delete();
                ContactPhoneNumber::insert($phoneData);
            }

            return true;
        });

        return $response;
    }
}
