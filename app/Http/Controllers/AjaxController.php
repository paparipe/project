<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    /** Saves Values in Session
        *
        * @param Request $request
        *		 Values intended for session save
        *
        * @return array
        *         Array with success status value inserted into session
    **/
    public function saveSession(Request $request) {

        $status = [];

        // Run through each value and save them in session
        foreach ($request->all() as $key => $value) {
            $status[$key] = SessionController::saveSession($key, $value);
        }

        return $status;

    }

}
