@extends('layouts.layout')

<style>
    #invite_user
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #invite_user p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #invite_user img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>
<section id="invite_user">
    <div class="overlay">
        <div class="container">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="Email">Enter Your Admin Email</label>
                    <input type="email" class="form-control" name="admin_email"  placeholder="Email">
                </div>
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="Email">Enter Your Admin Password</label>
                    <input type="email" class="form-control" name="admin_password"  placeholder="Password">
                </div>
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label for="Email">Invited Emails Sperated By Enter "New Line"</label>
                    <textarea class="form-control" type="text" name="invited_emails"></textarea>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Invite</button>
                </div>
            </form>
        </div>
    </div>
</section>