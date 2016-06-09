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
                <label style="display: none" class="label label-danger" id="invalid_password">Invalid Password</label>
                <br><br>
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
                            <input type="hidden" id="team_id{{ $value['user_id'] }}"  value="{{ $value['teams_team_id'] }}">
                            <input type="hidden" id="user_id{{ $value['user_id'] }}"  value="{{ $value['user_id'] }}">
                            <button id="button{{$value['user_id']}}" onclick="user_status({{ $value['user_id'] }})" type="button" class="btn btn-primary">Activate</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</section>

<script>

   function user_status(id) {

       var button = $('button#button' + id);
       //console.log("button : ",button);

       if (button.text() == 'Activate') {

           // Activate request
           var data = {
               team_id: $('input#team_id' + id).val(),
               user_id: $('input#user_id' + id).val(),
               password: $('input#password').val(),
               action: 'activate'

           };
           //console.log(data);
           $.ajax({
               type: 'POST',
               url: 'http://localhost:8000/test/testStatus',
               data: data
               ,
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
               },
               success: function(the_response){
                   var resp = JSON.parse(the_response);

                   if(resp.status == '400') {

                       $('#invalid_password').fadeOut(5).fadeIn('slow');
                   }
                   else {
                       button.text('Deactivate');
                   }

               },
              error: function (err) {
               console.log(err)
               }
           });

       } else {
           // deactivate request
           var data = {
               team_id: $('input#team_id' + id).val(),
               user_id: $('input#user_id' + id).val(),
               password: $('input#password').val(),
               action: 'deactivate'

           };
           //console.log(data);
           $.ajax({
               type: 'POST',
               url: 'http://localhost:8000/test/testStatus',
               data: data
               ,
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
               },
               success: function(the_response){
                   var resp = JSON.parse(the_response);


                   if(resp.status == '400') {

                       $('#invalid_password').fadeOut(5).fadeIn('slow');
                   }else{
                       button.text('Activate');
                   }
               },

               error: function (err) {
                   console.log(err);
               }
           });
       }
   }
</script>