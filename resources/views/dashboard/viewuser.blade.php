@extends('layouts.app')
<div id="page-wrapper">

@section('content')
        <div class="container-fluid" style="margin-top:-269px; ">
            <div class="row">
                {{--<div class="col-md-6">--}}
                <h3>User</h3>
                <a href="{{url('dashboard/users')}}" type="button" class="btn btn-warning" style="margin:-40px 386px; height:31px;">Back</a>

                <table class="table table-hover">
                    <tr>
                        <td>Id</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            @if($user->name == "")
                                {{"-"}}
                            @elseif($user->name !="")
                            {{$user->name}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                </table>
                </div>
            </div>
    </div>