@extends('layouts.layout')
{{--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>--}}

{{--<script>--}}
    {{--$('#button').on('submit',function(){--}}

        {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: 'http://localhost:8000/get_teams',--}}
            {{--data: {--}}
                {{--team_id:$('#team_id').val(),--}}
                {{--user_id:$('#user_id').val(),--}}
                {{--password:$('#password').val()--}}
            {{--},--}}
            {{--success: function(data){--}}
                {{--alert(data);--}}
            {{--},--}}
            {{--error: function(e){--}}
                {{--alert(e);--}}
            {{--}--}}
        {{--});--}}

    {{--})--}}

{{--</script>--}}

<style>
    #teams
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #teams p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #teams img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>
<section id="teams">
    <div class="overlay">
        <div class="container">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="password" class="form-control" name="password">
                <table class="table">
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                    @foreach($data as $value)
                    <tr>
                        <td>{{ $value['user_name'] }}</td>
                        <td>{{ $value['user_email'] }}</td>
                        <td>{{ $value['role_name'] }}</td>
                        <td>
                            {{--<a href="{{ URL::to('get_teams') }}" class="btn btn-primary">Active</a>--}}
                            {{--<a href="{{ URL::to('get_teams',array('user_id'=> $value['user_id'] , 'team_id'=> $value['teams_team_id'])) }}" class="btn btn-danger">Deactivate</a>--}}
                            <input type="hidden" name="team_id"  value="{{ $value['teams_team_id'] }}">
                            <input type="hidden" name="user_id"  value="{{ $value['user_id'] }}">
                            <button type="submit" class="btn btn-primary">Active</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</section>

