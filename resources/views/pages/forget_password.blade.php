@extends('layouts.layout')
<style>
    #forget_password
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #forget_password p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #forget_password img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>
<section id="forget_password">
    <div class="overlay">
        <div class="container">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="email">Enter Your Email</label>
                    <input type="text" class="form-control"  name="email" id ="email">
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</section>