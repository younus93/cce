
@extends('layouts.app')
    @section('contents')

        <div class="container-fluid" style="margin-top:-269px;margin-left:-210px; ">
            <H3 style="margin:9px -5px 15px -8px;" > Issue Form </H3>
          {{--/  {{ Form::open(array('url' => 'RegisterController/viewsubissue', 'method' => 'post'))}}--}}
            <lable> Main Issue: </lable>
            <select id="mainissue" name="mainissue" style ="margin-left:19px; width:150px;  height:30px" >
                <option value="">Select Main Issue</option>
                @foreach($mainissue as $key)
            <option value="{{$key->id}}">{{$key->issue_name}}</option>
                @endforeach

            </select>

            <br>
            <br>
            <form method="post" action="{{url('register/form')}}" >
            <lable> Sub Issue: </lable>
            <select id="subissue" name="subissue" style ="margin-left:19px; width:200px; height:50px" >
                <option value="">Slecte Sub Issue</option>
                @foreach($subissue as $subissues)
                    <option value="{{ $subissues->id }}">{{ getsubissuename($subissues->id) }}</option>
                @endforeach
            </select>
            <br>
            <br>


                {!! csrf_field() !!}
                Question: <textarea name="ques" style ="margin-left:19px; width:250px;" ></textarea> <br> <br>
                Answer: <textarea  name="ans" style ="margin-left:29px; width:250px;"></textarea> <br><br>
                <input type="submit" value="submit">

            </form>
            {{--{{ Form::close() }}--}}
        </div>


        </div>
@stop
@section('scripts')



<script type="text/javascript">

        console.log("sjfdhg");
        $("#mainissue").change(function() {
            $.get('loadsubcat/' + $(this).val(), function(data) {
                $("#subissue").html(data);
            });
        });




</script>

    @stop

