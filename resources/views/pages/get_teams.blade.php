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
                        {{--<td>{{ $value['Is_active'] }}</td>--}}
                        <td>
                            {{--<a href="{{ URL::to('get_teams') }}" class="btn btn-primary">Active</a>--}}
                            {{--<a href="{{ URL::to('get_teams',array('user_id'=> $value['user_id'] , 'team_id'=> $value['teams_team_id'])) }}" class="btn btn-danger">Deactivate</a>--}}
                            <input type="hidden" id="team_id{{ $value['user_id'] }}"  value="{{ $value['teams_team_id'] }}">
                            <input type="hidden" id="user_id{{ $value['user_id'] }}"  value="{{ $value['user_id'] }}">
                            {{--@if( $value['Is_active'] == 0)--}}
                                <input type="hidden" id="is_active{{ $value['user_id'] }}"  value="{{ $value['Is_active'] }}">
                                <button id="button1" onclick="activate({{ $value['user_id'] }})" type="button" class="btn btn-primary">Activate</button>
                                {{--<button id="button2" onclick="activate({{ $value['user_id'] }})" type="button" class="btn btn-danger">Deactivate</button>--}}
                            {{--@endif--}}
                            {{--@if( $value['Is_active'] == 1)--}}
                                {{--<input type="hidden" id="is_active{{ $value['user_id'] }}"  value="{{ $value['Is_active'] }}">--}}
                                {{--<button id="button1" onclick="activate({{ $value['user_id'] }})" type="button" class="btn btn-primary" disabled>Activate</button>--}}
                                {{--<button id="button2" onclick="activate({{ $value['user_id'] }})" type="button" class="btn btn-danger">Deactivate</button>--}}
                            {{--@endif--}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>
</section>

<script>


//    button.addEventListener('click',activate);
//    button.innerHTML='Activate';
//var button1 = document.getElementById('button1');
//var button2 = document.getElementById('button2');

   function activate(id){

       //$('#button2').prop('disabled', false);

       var is_active = $('input#is_active'+id).val();
       if(is_active == 1)
       {
//           $('#button1').prop('disabled', true);
//           $('#button2').prop('disabled', false);
           var data= {
               team_id:$('input#team_id'+id).val(),
               user_id:$('input#user_id'+id).val(),
               is_active:is_active,
               password:$('input#password').val()


           };
           console.log(data);
           $.ajax({
               type: 'POST',
               url: 'http://localhost:8000/get_teams',
               data:data
               ,
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
               },
               success: function (data) {
                   console.log(data)
               },
               error: response
           });
//
           function response()
           {
               var resp = JSON.parse(response);
               console.log(resp);

               if (typeof(resp) == 'string')
               {
                   return 1;
               }

               else{
                   $('#invalid_password').fadeOut(5).fadeIn('slow');
               }
           }

       }else{
           if(is_active == 0)
           {
               $('#button2').prop('disabled', true);
               $('#button1').prop('disabled', false);
               var data= {
                   team_id:$('input#team_id'+id).val(),
                   user_id:$('input#user_id'+id).val(),
                   is_active:is_active,
                   password:$('input#password').val()


               };
               console.log(data);
               $.ajax({
                   type: 'POST',
                   url: 'http://localhost:8000/get_teams',
                   data:data
                   ,
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                   },
                   success: function(data){
                       // console.log(data);
                   },
                   error: function(e){
                       console.log(e);
                   }
               });
           }
       }


//       this.removeEventListener('click',activate);
//       //button2.addEventListener('click',activate);
//       this.innerHTML = 'activate';

//        var data= {
//            team_id:$('input#team_id'+id).val(),
//            user_id:$('input#user_id'+id).val(),
//            is_active:is_active,
//            password:$('input#password').val()
//
//
//        };
//        console.log(data);
//        $.ajax({
//            type: 'POST',
//            url: 'http://localhost:8000/get_teams',
//            data:data
//            ,
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
//            },
//            success: function(data){
//               // console.log(data);
//            },
//            error: function(e){
//                console.log(e);
//            }
//        });

//      this.removeEventListener('click',activate);
//       //button1.addEventListener('click',activate);
//       this.innerHTML = 'Activate';

    }

   function deactivate(id){

       $('#button2').prop('disabled', true);
       $('#button1').prop('disabled', false);

//       this.removeEventListener('click',deactivate);
//       this.addEventListener('click',activate);
//       this.innerHTML = 'Activate';

       var data= {
           team_id:$('input#team_id'+id).val(),
           user_id:$('input#user_id'+id).val(),
           is_active:$('input#is_active'+id).val(),
           password:$('input#password').val()

       };
       console.log(data);
       $.ajax({
           type: 'POST',
           url: 'http://localhost:8000/get_teams',
           data:data
           ,
           headers: {
               'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
           },
           success: function(data){
               // console.log(data);
           },
           error: function(e){
               console.log(e);
           }
       });

   }
</script>