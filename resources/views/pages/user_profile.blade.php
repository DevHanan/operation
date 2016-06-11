@extends('layouts.layout')

<style>
    #profile
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #profile p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #profile img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>

<section id="profile">
    <div class="overlay">
        <div class="container">
            <table class="table">
                <th>User Name</th>
                <th>User Email</th>
                <tr>
                    <td>{{ $data['user_name'] }}</td>
                    <td>{{ $data['user_email'] }}</td>
                </tr>
            </table>
            <br>
            <a href="{{ url('pages/change_my_password') }}">Change Password</a>
        </div>
    </div>
</section>