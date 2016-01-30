@extends('layouts.app')

@section('content')

    <div class="row">
        <hr>
        <h3>Add New issue</h3>
        <div class="col-md-6">
            <form action="/issue/add-issue" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-md-4 control-label">Select Super Issue</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="q">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Select Sub Issue</label>
                    <select contenteditable="false" class="form-control" name="subclass_id" id="subclass_name">
                        <option disabled selected>--Select an sub issue--</option>
                        @foreach($subClass as $s)
                            <option value="{{$s->id}}">{{$s->subclass_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Question</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="issue_question">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Answer</label>

                    <div class="col-md-6">
                        <textarea name="issue_answer" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <button class="btn btn-danger">Add Issue</button>
            </form>
        </div>
        <div class="col-md-6">
            Add instructions
        </div>
    </div>
    <script>
        $(function() {
            $("#q").autocomplete({
                source: "{{url('issue/autocomplete-super')}}",
                minLength: 2,
                select: function( event, ui ) {
                    $('#data').val(ui.item.id);
                    $('#search_text').val(ui.item.value);
                    $('#search').hide();
                }
            });
        });
    </script>


@stop