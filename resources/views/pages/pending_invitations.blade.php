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
            <form>
                <input type="password" class="form-control" id="password">
                <label style="display: none" class="label label-danger" id="invalid_password">Invalid Password</label>
                <br><br>
            <table class="table">
                <th>User Name</th>
                <th>User Email</th>
                <th>Action</th>
                @foreach($data as $value)
                <tr id="trow{{ $value['team_id'] }}">
                    <td>{{ $value['user_name'] }}</td>
                    <td>{{ $value['user_email'] }}</td>
                    {{--<td>{{ $value['team_id'] }}</td>--}}
                    <td>
                        <input type="hidden" id="team_id{{ $value['team_id'] }}" value="{{ $value['team_id'] }}">
                        <button type="button" onclick="accept({{ $value['team_id'] }})" class="btn btn-success">Accept</button>
                        <button id="button{{ $value['team_id'] }}}" type="button" onclick="decline({{ $value['team_id'] }})" class="btn btn-danger">Decline</button>
                    </td>
                </tr>
                @endforeach
            </table>
            </form>
        </div>
    </div>
</section>

<script>
    function accept(team_id)
    {
        if(confirm('Do you want to accept invitation??'))
        {
            var data = {
                team_id: $('input#team_id' + team_id).val(),
                password: $('input#password').val(),
                action: 'accept_invitation'

            };
            console.log(data);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:8000/test/accept_invitation',
                    data: data
                    ,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    },
                    success: function(the_response){
                        //console.log(the_response);
                        var resp = JSON.parse(the_response);
                        //console.log(resp);

                        if(resp.status == '400') {

                            $('#invalid_password').fadeOut(5).fadeIn('slow');
                        }else{

                            $("tr#trow"+team_id).remove();
                        }
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });

    //            $(this).parents(".record").animate("fast").animate({
    //                opacity : "hide"
    //            }, "slow");
        }

    }

    function decline(team_id)
    {
        var data = {
            team_id: $('input#team_id' + team_id).val(),
            password: $('input#password').val(),
            action: 'decline_invitation'

        };
        console.log(data);

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/test/decline_invitation',
            data: data
            ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
            success: function(the_response){
                //console.log(the_response);
                var resp = JSON.parse(the_response);
                //console.log(resp);

                if(resp.status == '400') {

                    $('#invalid_password').fadeOut(5).fadeIn('slow');
                }
            },
            error: function (err) {
                console.log(err)
            }
        });
    }
</script>
