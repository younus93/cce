@extends('layouts.app')
<div id="page-wrapper">

    @section('content')

        <div class="row" style="margin:-273px 50px;">
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
                            <a class="btn btn-primary" href="{{ url('dashboard/closedview/'.$c['id']) }}">View</a>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
</div>
