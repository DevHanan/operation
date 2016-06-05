@extends('layouts.layout')


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
            <form>
                <input type="password" class="form-control" id="password">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                            <input type="hidden" id="team_id{{ $value['user_id'] }}"  value="{{ $value['teams_team_id'] }}">
                            <input type="hidden" id="user_id{{ $value['user_id'] }}"  value="{{ $value['user_id'] }}">
                            <button id="button" onclick="activate({{ $value['user_id'] }})" type="button" class="btn btn-primary">Active</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</section>
<script>

   function activate(id){

        var data= {
            team_id:$('input#team_id'+id).val(),
            user_id:$('input#user_id'+id).val(),
            password:$('input#password').val()

        };
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/get_teams',
            data:data
            ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
            success: function(data){
                console.log(data);
            },
            error: function(e){
                console.log(e);
            }
        });

    }

</script>