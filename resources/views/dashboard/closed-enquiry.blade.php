
@extends('layouts.app')
<div id="page-wrapper">

    @section('content')

        <div class="container-fluid" style="margin-top:-269px; ">
        <div class="row">
            {{--<div class="col-md-6">--}}
                <h3>User</h3>
                <table class="table table-hover">
                    <tr>
                        <td>Id</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php if(isset($user->name)!= " "){
                                echo $user->name;}else{
                                echo "-";
                            } ?>
                            </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                </table>
            {{--</div>--}}
            <div class="col-md-6">
                <h3>Closed Tickets</h3>
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Remarks</th>
                        <th>Created Time</th>
                        <th>Responded Time</th>
                    </tr>
                    @foreach($closed as $o)
                        <tr>
                            <td>{{ $o['id'] }}</td>
                            <td>{{ $o['remarks'] }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$o['in_time'])->toDayDateTimeString() }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$o['responded_time'])->toDayDateTimeString() }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h3>Current Ticket Status ID : {{ $current['id'] }}</h3>
                <form action="{{ url('enquiry/closedupdate') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="text"  name="id" value="{{ $current['id'] }}" hidden/>
                    <table>
                        <tr>Remarks</tr>
                        <tr><textarea autofocus name="remarks" id="" cols="30" rows="10">{{ $current['remarks'] }}</textarea></tr>
                    </table>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios1" value="0" checked>
                            Enquiry Resolved
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios1" value="1">
                            Enquiry NOT Resolved
                        </label>
                    </div>
                    <button class="btn btn-danger">Update Status</button>
                </form>
            </div>

            {{--<div class="col-md-6">--}}
                {{--<h3>Closed Tickets</h3>--}}
                {{--<table class="table table-hover">--}}
                    {{--<tr>--}}
                        {{--<th>ID</th>--}}
                        {{--<th>Remarks</th>--}}
                        {{--<th>Created Time</th>--}}
                        {{--<th>Responded Time</th>--}}
                    {{--</tr>--}}
                    {{--@foreach($closed as $o)--}}
                        {{--<tr>--}}
                            {{--<td>{{ $o['id'] }}</td>--}}
                            {{--<td>{{ $o['remarks'] }}</td>--}}
                            {{--<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$o['in_time'])->toDayDateTimeString() }}</td>--}}
                            {{--<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$o['responded_time'])->toDayDateTimeString() }}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</table>--}}
            </div>
        </div>
    </div>
        </div>
