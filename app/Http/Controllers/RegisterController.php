<?php

namespace App\Http\Controllers;

use App\MainIssue;
use App\SubIssue;
use App\UserEnquries;
use Illuminate\Http\Request;
use \app\Helpers\Helper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserEnquries::All();
        return View('register.index')->with(['users'=>$users]);
    }

  public function delete($id){
    $rec = UserEnquries::find($id);
    $rec->delete();
    return View('register.index');
  }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function form(){
        return View('register.create');
    }

    public function create( REQUEST $request){

        $data = $request->input();
        $ques = $request->input('ques');
        $ans = $request->input('ans');
        $id = $request->input('subissue');
        $data = new UserEnquries();
        $data->questions = $ques;
        $data->answers = $ans;
        $data->subissue_id = $id;
        $data->save();
        return View('register.index');
      }

    public function getrecords(){
        $users = UserEnquries::all();
        return Datatables::of($users)
//            ->addColumn('actions', function ($data) {
//                return "<a class='btn btn-xs btn-success' href='/register/index/$data->id/view/'> View </a>"." ".
//                "<a class='btn btn-xs btn-danger' href='/register/form/$data->id/create'> Add Issue </a>";
//            })
                ->editColumn('subissue_id','{{ getsubissuename($subissue_id)}} ')
            ->make(true);
        return View('register.index');
    }
    public function getsubissuename($id){
        $subissuename = SubIssue::findOrFail($id);
//        dd($subissuename->subissue_name);
        return $subissuename->subissue_name;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $mainissue = MainIssue::All();
        $subissue =SubIssue::All();
        return View('register.view')->with(['mainissue'=>$mainissue,'subissue' => $subissue]);
    }
    public function viewsubissue($id){
        $subissue = DB::table('SubIssue')->where('issue_id', $id)->get();
        dd($subissue);
        return View::make('thisview')->with(['subissue' => $subissue]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
