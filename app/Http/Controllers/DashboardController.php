<?php

namespace App\Http\Controllers;

use App\ClosedEnquiry;
use App\DataIn;
use App\EnquiryUser;
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
        $closedEnquiry = ClosedEnquiry::All();
        $user = EnquiryUser::All();
        return view('dashboard.index')->with([
            'newCalls'      =>  $data,
            'openEnquiry'   =>  $openEnquiry,
            'closedEnquiry' => $closedEnquiry,
            'user'=>$user
        ]);
    }
    public function newcallindex(){
        $data = DataIn::all();
        return view('dashboard.newcall')->with([
            'newCalls'      =>  $data,
        ]);
    }
    public function view($id){
        $user = DataIn::find($id);
        return view('dashboard.view')->with(['user'=>$user]);
    }
    public function rescallindex(){
        $openEnquiry = OpenEnquiry::All();
        return view('dashboard.rescall')->with([
            'openEnquiry'   =>  $openEnquiry,
        ]);
  }
    public function closedTickets()
    {
        $closedEnquiry = ClosedEnquiry::All();
        return View('dashboard.closed')->with(['closedEnquiry' => $closedEnquiry]);
        /*
         * TODO
         * 1. Datatable Implementation
         */

    }
    public function closedview($id){

        $closedview = ClosedEnquiry::findOrFail($id);
         return View('dashboard.closedview')->with(['closedview'=>$closedview]);
    }
    public function users(){
        $user = EnquiryUser::All();
        return View('dashboard.users')->with(['user'=>$user]);
    }


}
