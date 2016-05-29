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
            <div class="form">
                <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label form="name">Name</label>
                        <input  type="text" class="form-control" name="name" value="{{ $data['action'] }}">
                </div>
                <div class="form-group col-lg-offset-3 col-lg-6">
                    <label form="email">Email</label>
                    <input  type="text" class="form-control" name="name" value="{{ Session::get('email') }}">
                </div>
            </div>
        </div>
    </div>
</section>