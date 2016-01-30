<?php

namespace App\Http\Controllers;

use App\DataIn;
use App\EnquiryUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class APIController extends Controller
{
    public function get()
    {
        /*
         * TODO
         * 1. add user here and display cluster of calls of the same user in dashboard
         */
        $data = new DataIn(Input::all());
        $data['server_time'] = Carbon::now();
        $data->save();
    }
}
