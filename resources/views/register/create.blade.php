@extends('layouts.app')
<div id="page-wrapper">

@section('content')
        <div class="container-fluid" style="margin-top:-269px; ">
            <H3 style="margin:9px -5px 15px -8px;" > ISSUE FORM</H3>
           <form method="post" action="{{url('register/form')}}" >
               {!! csrf_field() !!}
               Sub-Issue id: <input type="number" name="no"> <br> <br>
               Question: <textarea name="ques" style ="margin-left:19px; width:250px;" ></textarea> <br> <br>
               Answer: <textarea  name="ans" style ="margin-left:29px; width:250px;"></textarea> <br><br>
              <input type="submit" value="submit">

           </form>



          {{--<lable> Main Issue: </lable>--}}

            {{--<select id="dropdown" onchange="dropdown(value);">--}}
                {{--<option value="0">Select Process</option>--}}
                {{--<option value="{{$key}}">{{$issue->issue_name}}</option>--}}

        {{--</select>--}}
    </div></div>


<script type="text/javascript">


</script>


</script>