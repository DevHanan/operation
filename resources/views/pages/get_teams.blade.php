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
                        <a href="{{ URL::to('get_teams') }}" class="btn btn-primary">Activate</a>
                        <a href="{{ URL::to('get_teams',array('user_id'=> $value['user_id'] , 'team_id'=> $value['teams_team_id'])) }}" class="btn btn-danger">Deactivate</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <input type="password" class="form-control" name="password">
    </div>
</section>

