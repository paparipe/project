<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    /** Saves a specific value into the session
        *
        * @param string $key
        *        Label under which the value will be saved.
        *
        * @param mixed $input
        *        Value to be saved in the session.
        *
        * @return bool
        *         Returns true if the value is successfuly saved 
    **/
    public static function saveSession(string $key, $value)
    {
        
        session([$key => $value]); # Store in Session

        return session($key) == $value;

    }

}
