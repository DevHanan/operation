@extends('layouts.layout')
<style>
    #register
    {
        background:  url('../images/Transparent-business.jpg') no-repeat;
        background-size: cover;
        color: #fff;
        margin-top: 70px;
        text-align: center;
        width: 100%;
    }
    #register p
    {
        font-weight: 400;
        font-style: italic;
        line-height: 2em;
    }
    #register img
    {
        display: inline-block;
        margin-top: 30px;
    }
</style>

<section id="register">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <br>
                <div class="wow fadeIn" data-wow-delay="0.3s">
                  <form method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group col-lg-offset-3 col-lg-6">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" required>
                      </div>
                      <div class="form-group col-lg-offset-3 col-lg-6">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" id="email" placeholder="User Email" required>
                      </div>
                      <div class="form-group col-lg-offset-3 col-lg-6">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="User Password" required>
                          <br>
                          <button class="btn btn-block btn-primary">Register</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
</section>

