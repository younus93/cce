
@extends('layouts.app')
<div id="page-wrapper">

    @section('content')
        <div class="container-fluid" style="margin-top:-269px; ">
            <div class="row">
                {{--<div class="col-md-6">--}}
                <h3>User</h3>
                <a href="{{url('dashboard/closed-tickets')}}" type="button" class="btn btn-warning" style="margin:-40px 386px; height:29px; padding:4px; width:64px;">Back</a>

                <table class="table table-hover">
                    <tr>
                        <td>Id</td>
                        <td>{{ $closedview->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ \App\Helpers\Helper::getUserData($closedview['enquiry_user_id'],0) }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ \App\Helpers\Helper::getUserData($closedview['enquiry_user_id'],1) }}</td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>{{ $closedview->remarks }}</td>
                    </tr>
                </table>
            </div>
        </div>
</div>

