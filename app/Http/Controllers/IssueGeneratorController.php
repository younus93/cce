<?php

namespace App\Http\Controllers;

use App\Issue;
use App\SubClass;
use App\SuperClass;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IssueGeneratorController extends Controller
{

    public function index()
    {
        return view('issue.index');
    }

    public function addSuperIssue()
    {
        $superClass = SuperClass::all();
        return view('issue.addsuper')->with(['superClass'=>$superClass]);
    }

    public function addIssue()
    {
        $superClass = SuperClass::all();
        $subClass   = SubClass::all();
        return view('issue.add')->with([
            'superClass'=>$superClass,
            'subClass'  =>$subClass
        ]);

    }

    public function postIssue(Request $request)
    {
        $issue = new Issue($request->input());
        $issue->save();
        return redirect('/issue/add-issue');
    }

    public function postSuperClass(Request $request)
    {
        $class = new SuperClass($request->all());
        $class->save();
        return redirect()->back();

    }
    
    public function postSubClass(Request $request)
    {
        $class = new SubClass($request->all());
        $class->class_id = $request->input('class_id');
        $class->save();
        return redirect()->back();
    }

    public function autocomplete_super()
    {
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('class')
            ->where('class_name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->class_name];
        }
        return ($results);
    }

}
