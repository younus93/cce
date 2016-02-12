@extends('layouts.app')
<div id="page-wrapper">

    @section('content')
        {{--</div>--}}
        {{--<div class="container-fluid">--}}
        <div class="row" style="margin:-273px 50px;">
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
        </div>
</div>
