@extends('layouts.layout')
<style>
    #login
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #login p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #login img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>
<section id="login">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <br><br>
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <form  method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                        <div class="form-group col-lg-offset-3 col-lg-6">
                            <label for="Email1">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-lg-offset-3 col-lg-6">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                            <br>
                            <a href="{{ url('pages/forgot') }}"> Forget Password ??</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
