<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactPhoneNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneBookController extends Controller
{
    // DEFAULT CONSTRUCTOR
    public function __construct()
    {
        $this->contact = new Contact();
        $this->contactPhoneNumber = new ContactPhoneNumber();
    }

    /**
     * DISPLAY ADD CONTACT PAGE
     *
     */
    public function showAddContact()
    {
        return view('add-contact');
    }

    /**
     * CREATE A CONTACT 
     * 
     */
    public function createContact(Request $request)
    {
        $response = DB::transaction(function () use ($request) {
            $contactId = $this->contact->addContact(
                $this->setGeneralData($request)
            );

            $this->contactPhoneNumber->addPhoneData(
                $this->setPhoneData($request, $contactId)
            );

            return true;
        });

        if (!$response) {
            return redirect()->to('/failed');
        }

        return redirect()->to('/contacts');
    }

    /**
     * DISPLAY THE CONTACT PAGE
     * 
     */
    public function showContact()
    {
        // Get user ID from the session data
        $userId = session()->get('user')['id'];

        $data['contacts'] = $this->contact->getAllContact($userId);

        return view('contact', $data);
    }

    /**
     * VIEW SINGLE CONTACT DETAILS
     * 
     * @param   string  $contactId      The contact ID
     * 
     */
    public function showViewContact(int $contactId)
    {
        $data['contacts'] = $this->contact->getSingleContact($contactId);

        return view('view-contact', $data);
    }

    /**
     * DELETE SINGLE CONTACT
     * 
     * @param   string  $contactId      The contact ID
     * 
     */
    public function deleteContact(int $contactId)
    {
        $this->contact->deleteContact($contactId);

        return redirect()->to('/contacts');
    }

    /**
     * DISPLAY EDIT SINGLE CONTACT PAGE
     */
    public function showEditContact(int $contactId)
    {
        $data['contacts'] = $this->contact->getSingleContact($contactId);

        return view('edit-contact', $data);
    }

    /**
     * UPDATE SINGLE CONTACT
     */
    public function updateContact(Request $request)
    {
        $contactData = $this->setGeneralData($request);
        $phoneData = $this->setPhoneData($request, $request->contactId);

        $this->contact->updateContact($request->contactId, $contactData, $phoneData);

        return back()->with('status', 'Contact updated!');
    }


    //---------------------------------------------------------------------

    //  PRIVATE
    //  FUNCTIONS

    /**
     * SET GENERAL CONTACT DATA
     *
     * @param   object  $request        The post request contains the contact data
     *
     * @return  array                   Return the associative array with table columns
     */
    private function setGeneralData(Request $request)
    {
        return [
            'user_id' => session()->get('user')['id'],
            'name' => $request->name,
            'email' => $request->email,
            'address_line_1' => $request->contact_address_1,
            'address_line_2' => $request->contact_address_2,
            'city' => $request->contact_postcode,
            'postcode' => $request->contact_city,
            'state' => $request->contact_state,
            'country' => (empty($request->contact_country)) ? null : $request->contact_country,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * SET CONTACT'S PHONE DATA
     *
     * @param   object  $request        The post request contains the contact phone data
     *
     * @return  array                   Return the array of phone data
     */
    private function setPhoneData(Request $request, int $contactId)
    {
        $phoneData = [];

        for ($i = 0; $i < count($request->type); $i++) {
            $singleData = [
                'contact_id' => $contactId,
                'type' => $request->type[$i],
                'phone_number' => $request->phone_number[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            array_push($phoneData, $singleData);
        }

        return $phoneData;
    }
}
