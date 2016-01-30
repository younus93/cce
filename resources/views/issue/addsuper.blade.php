@extends('layouts.app')

@section('content')
    {{--Add class--}}
    <div class="row">
        <hr>
        <h3>Super Issue Addition</h3>
        <form action="/issue/add-superclass" method="POST">
            {!! csrf_field() !!}

            <div class="row">
                <div class="form-group">
                    <label class="col-md-4 control-label">Super Issue</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="class_name">
                    </div>
                    <button class="btn btn-primary">Add Super Issue</button>
                </div>
            </div>
        </form>
    </div>

    {{--Add SubClass--}}
    <div class="row">
        <hr>
        <h3>Sub Issue</h3>
        <form action="/issue/add-subissue" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="col-md-4 control-label">Select Super Issue</label>

                <div class="col-md-6">
                    <select class="form-control" name="class_id">
                        @foreach($superClass as $s)
                            <option value="{{$s->id}}">{{$s->class_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Sub Issue Lable</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="subclass_name">
                </div>
            </div>
            <button class="btn btn-warning">Add Sub Issue</button>
        </form>
    </div>


@stop