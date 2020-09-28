<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};

class UserSettingsController extends Controller
{
    public function attendEvent($eventId, $eventToken){

    }

    // Utility function to update contacts
    public function updateContacts(Request $request){
        // Ensure that the user has logged in
        if (!Auth::check()) return redirect("/home");

        // Set the User ID
        $userid = Auth::user()->id;

        // Create Draft
        $draft = [];

        foreach($request->all() as $key => $value) {
            switch ($key){
                case "action-change-phone":
                    if ($value != '') $draft["phone"] = $value;
                break;
                case "action-change-line":
                    if ($value != '') $draft["line"] = $value;
                break;
                case "action-change-whatsapp":
                    if ($value != '') $draft["whatsapp"] = $value;
                break;
            }
        };

        // Save "updated_at"
        $draft["updated_at"] = now();

        DB::table('users')->where('id', $userid)->update($draft);

        return redirect('/home');
    }
}
