<?php

namespace App\Http\Controllers;

use App\ClosedEnquiry;
use App\DataIn;
use App\EnquiryUser;
use App\OpenEnquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = DataIn::findOrFail($id);
        $enquiry_user = EnquiryUser::where('phone','=',$data->who)->get();
        $enquiry = new OpenEnquiry();
        if($enquiry_user->count() == 0)
        {
            $enquiry_user = new EnquiryUser();
            $enquiry_user->phone = $data->who;
            $enquiry_user->save();
            $enquiry->enquiry_user_id = $enquiry_user->id;

        }else{
            $enquiry->enquiry_user_id = $enquiry_user[0]->id;
        }
        $enquiry->in_time = $data->DateTime;
        $enquiry->save();
        $data->delete();
        return redirect('enquiry/view-ticket/'.$enquiry->id);
    }

    /**
     * Route enquiry/view-ticket/{id}
     *
     * @param $id
     * @return $this
     */
    public function view($id)
    {
        $current_enquiry = OpenEnquiry::find($id);
        $enquiry_user   = EnquiryUser::findOrFail($current_enquiry->enquiry_user_id);
       // dd($enquiry_user);
        $histroyOpen    = OpenEnquiry::where('enquiry_user_id','=',$enquiry_user->id)->get();
        $histroyClosed  = ClosedEnquiry::where('enquiry_user_id','=',$enquiry_user->id)->get();

        return view('dashboard.view-enquiry')->with([
            'current'   =>  $current_enquiry,
            'user'      =>  $enquiry_user ,
            'open'      =>  $histroyOpen,
            'closed'    =>  $histroyClosed,
            'id'=>$id,
        ]);
    }
    public function user(Request $request,$id,$uid){
        $data = $request->input();
        $name = $request->input('name');
        $updateid =EnquiryUser::findOrFail($uid);
        $updateid->name = $name;
        $updateid->save();
        $current_enquiry = OpenEnquiry::find($id);
        $enquiry_user   = EnquiryUser::find($uid);

        $histroyOpen    = OpenEnquiry::where('enquiry_user_id','=',$enquiry_user->id)->get();
        $histroyClosed  = ClosedEnquiry::where('enquiry_user_id','=',$enquiry_user->id)->get();

        return view('dashboard.view-enquiry')->with([
            'current'   =>  $current_enquiry,
            'user'      =>  $enquiry_user ,
            'open'      =>  $histroyOpen,
            'closed'    =>  $histroyClosed,
            'id'=>$id,
        ]);

    }
    public function closedview($id){
        $current_enquiry = ClosedEnquiry::find($id);
        $enquiry_user   = EnquiryUser::findOrFail($current_enquiry->enquiry_user_id);
        $histroyClosed  = ClosedEnquiry::where('enquiry_user_id','=',$enquiry_user->id)->get();

        return view('dashboard.closed-enquiry')->with([
            'current'   =>  $current_enquiry,
            'user'      =>  $enquiry_user ,
            'closed'    =>  $histroyClosed
        ]);
    }

    public function closedupdate(){

            $status = Input::get('status');
            $enquiry = ClosedEnquiry::findOrFail(Input::get('id'));
            if($status)
            {
                //not resolved
                $enquiry->remarks = Input::get('remarks');
                $enquiry->responded_time = Carbon::now();
                $enquiry->save();
                return redirect('/dashboard/rescall');
            }

//            $closedEnquiry = new ClosedEnquiry();
//            $closedEnquiry->remarks = Input::get('remarks');
//            $closedEnquiry->responded_time = Carbon::now();
//            $closedEnquiry->enquiry_user_id= $enquiry->enquiry_user_id;
//            $closedEnquiry->in_time= $enquiry->in_time;
//            $closedEnquiry->save();
            $enquiry->delete();
            return redirect('/dashboard/rescall');
        }

    /**
     * Updating the status of the ticket in the form at enquiry/view-ticket/{id}
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update()
    {
        $status = Input::get('status');
        $enquiry = OpenEnquiry::findOrFail(Input::get('id'));
        if($status)
        {
            $enquiry->remarks = Input::get('remarks');
            $enquiry->responded_time = Carbon::now();
            $enquiry->save();
            return redirect('/dashboard/rescall');
        }
        $closedEnquiry = new ClosedEnquiry();
        $closedEnquiry->remarks = Input::get('remarks');
        $closedEnquiry->responded_time = Carbon::now();
        $closedEnquiry->enquiry_user_id= $enquiry->enquiry_user_id;
        $closedEnquiry->in_time= $enquiry->in_time;
        $closedEnquiry->save();
        $enquiry->delete();
        return redirect('/dashboard/rescall');
    }

      public function viewuser($id){
          $user = EnquiryUser::find($id);
           return view('dashboard.viewuser')->with(['user'=>$user]);
    }

    /**
     *
     * @param $status
     * @param $id
     * @return $this
     */
    public function info($status,$id)
    {
        /*
         * TODO:
         * 1. Pass data to view
         * 2. display enquiry info button in dashboard && view-enquiry
         */
        if($status == 'o')
            $enquiry = OpenEnquiry::findOrFail($id);
        else
            $enquiry = ClosedEnquiry::findOrFail($id);
        return view('dashboard.info')->with(['data'=>$enquiry, 'status'=>$status]);
    }

}
