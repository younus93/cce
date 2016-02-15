<style type="text/css">
.page-header1{
    border-bottom: 1px solid #eee;
    margin: 22px -8px;
    padding-bottom: 10px;
}

</style>
@extends('layouts.app')
<div id="page-wrapper">

    @section('content')

        {{--<div class="container">--}}
        <div class="container-fluid" style="margin-top:-269px; ">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header1" style="color:#00b3ee;">New Calls</h2></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold;"> New Calls Details</div>
                    <div class="panel-body">
                        <div class="row">
                <table class="table table-hover">
                    <tr style="border-top:0px;">
                        <th>Id</th>
                        <th>Phone Number</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th>View</th>
                    </tr>
                    @foreach($newCalls as $c)
                        <tr>
                            <td>{{ $c['id'] }}</td>
                            <td>{{ $c['who'] }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['DateTime'])->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('enquiry/create-ticket/'.$c['id']) }}">Create Ticket</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('dashboard/view/'.$c['id']) }}">View</a>

                            </td>
                        </tr>
                    @endforeach
                </table>
                        </div>
                        </div>
            </div>
            </div>
        </div>
        </div>
        </div>
