@extends('layouts.app')
<div id="page-wrapper">

@section('content')

    {{--<div class="container">--}}
        <div class="container-fluid" style="margin-top:-269px; ">

        <h3>New Calls</h3>
        <table class="table table-hover">
            <tr>
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

        <h3>Calls to be responded</h3>
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Phone Number</th>
                <th>Name</th>
                <th>Last Responded at</th>
                <th>Created At</th>
                <th>Action</th>
                <th></th>
            </tr>
            @foreach($openEnquiry as $c)
                <tr>
                    <td>{{ $c['id'] }}</td>
                    <td>{{ \App\Helpers\Helper::getUserData($c['enquiry_user_id'],0) }}</td>
                    <td>{{ \App\Helpers\Helper::getUserData($c['enquiry_user_id'],1) }}</td>
                    <td>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['responded_time'])->diffForHumans() }}<br>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['responded_time'])->toDayDateTimeString() }}
                    </td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['in_time'])->diffForHumans() }}<br>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['in_time'])->toDayDateTimeString() }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('enquiry/view-ticket/'.$c['id']) }}">View Ticket</a>
                    </td>
                </tr>
            @endforeach
        </table>
    {{--</div>--}}
            {{--<div class="container-fluid">--}}
            {{--<div class="row" style="margin:-273px 50px;">--}}
                <h3>Closed Calls</h3>
                <table class="table table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Phone Number</th>
                        <th>Name</th>
                        <th>Last Responded at</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($closedEnquiry as $c)
                        <tr>
                            <td>{{ $c['id'] }}</td>
                            <td>{{ \App\Helpers\Helper::getUserData($c['enquiry_user_id'],0) }}</td>
                            <td>{{ \App\Helpers\Helper::getUserData($c['enquiry_user_id'],1) }}</td>
                            <td>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['responded_time'])->diffForHumans() }}<br>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['responded_time'])->toDayDateTimeString() }}
                            </td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['in_time'])->diffForHumans() }}<br>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c['in_time'])->toDayDateTimeString() }}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('enquiry/view-ticket/'.$c['id']) }}">View Ticket</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            {{--</div>--}}
            {{--<div class="row" style="margin:-273px 50px;">--}}
                <h3>Users</h3>
                <table class="table table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>ViewUser</th>
                    </tr>
                    @foreach($user as $c)
                        <tr>
                            <td>{{ $c['id'] }}</td>
                            <td>{{ \App\Helpers\Helper::getUserData($c['id'],1) }}</td>
                            <td>{{ \App\Helpers\Helper::getUserData($c['id'],0) }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ url('enquiry/view-user/'.$c['id']) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            {{--</div>--}}
            </div>
</div>
