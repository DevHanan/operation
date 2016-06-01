@extends('layouts.layout')

<style>
    #change_password
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #change_password p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #change_password img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>
<section id="change_password">
    <div class="overlay">
        <div class="container">
            <form method="post">
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="email">Enter Your Email</label>
                    <input type="text" class="form-control"  name="email" id ="email">
                </div>
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="password">Enter New Password</label>
                    <input type="password" class="form-control"  name="password" id ="password">
                </div>
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control"  name="password_confirmation" id ="password_confirmation">
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</section>