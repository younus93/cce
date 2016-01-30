<?php

namespace App\Http\Controllers;

use App\ClosedEnquiry;
use App\DataIn;
use App\OneRingData;
use App\OpenEnquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     *User must be logged in to use this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Returns the dashboard with new calls and open enquiries
     *
     * @return $this
     */
    public function index()
    {
        $data = DataIn::all();
        $openEnquiry = OpenEnquiry::All();
        return view('dashboard.index')->with([
            'newCalls'      =>  $data,
            'openEnquiry'   =>  $openEnquiry
        ]);
    }

    public function closedTickets()
    {
        /*
         * TODO
         * 1. Datatable Implementation
         */

    }


}
