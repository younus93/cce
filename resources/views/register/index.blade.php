@extends('layouts.app')


@section('contents')

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<div style="margin: -246px;">

    <table id="register" class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>SubIssue Id</th>
        <th>Questions</th>
        <th>Answers</th>

    </tr>
    </thead>


</table>
</div>


@stop

@section('scripts')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">

    </script>
    <!-- Bootstrap JavaScript -->

    <script type =text/javascript>

    $(document).ready(function() {

        $('#register').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":"{{ url('register/getrecords') }}",
            columns: [
                { data: 'id', name: 'id'},
                { data: 'subissue_id', name: 'subissue_id' },
                { data: 'questions', name: 'questions' },
                { data: 'answers', name: 'answers' },
            ]
        });
    });

</script>
    @stop




