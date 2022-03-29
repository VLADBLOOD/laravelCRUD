<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redirect;

class Notifications
{
    public static function successMessage($message){
        return Redirect::back()->with([
            'message' => $message,
            'type' => 'success'
        ]);
    }

    public static function errorMessage($message){
        return Redirect::back()->with([
            'message' => $message,
            'type' => 'danger'
        ]);
    }
}
