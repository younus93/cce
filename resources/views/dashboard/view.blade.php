@extends('layouts.app')
<div id="page-wrapper">

    @section('content')
        <div class="container-fluid" style="margin-top:-269px; ">
            <div class="row">
                {{--<div class="col-md-6">--}}
                <h3>User</h3>
                <a href="{{url('dashboard/newcall')}}" type="button" class="btn btn-warning" style="margin:-40px 386px; height:31px;">Back</a>

                <table class="table table-hover">
                    <tr>
                        <td>Id</td>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->who }}</td>
                    </tr>
                    <tr>
                        <td>DateTime</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$user['DateTime'])->toDayDateTimeString() }}</td>
                    </tr>
                    <tr>
                        <td>ServerTime</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$user['server_time'])->toDayDateTimeString() }}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>