<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobConnectedController extends Controller
{
    public function connect()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
