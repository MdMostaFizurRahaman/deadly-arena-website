@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('styles')
    <link href="{{asset('backend')}}/lib/jquery-toast/jquery.toast.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrap">
                
            <div class="container youplay-content no-banner">
        
                <div class="row">
        
                    <div class="col-md-12">

                        <h3 class="mt-0 mb-20 float-left d-inline-block">{{Str::title(Auth::user()->player_name)}} </h3> 
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 200px;"><p>Display Name</p></td>
                                    <td><p id="player_displayname">{{Auth::user()->player_displayname}}</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;"><p>Email</p></td>
                                    <td><p id="email">{{Auth::user()->email}}</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;"><p>Country</p></td>
                                    <td><p id="player_country">{{Auth::user()->player_country}}</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;"><p>Sex</p></td>
                                    <td><p id="player_sex">{{Str::title(Auth::user()->player_sex)}}</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;"><p>Date of Birth</p></td>
                                    <td><p id="player_dob">{{Auth::user()->player_dob}}</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;"><p>Status</p></td>
                                    <td><p>{{Auth::user()->player_status== 1 ? 'Active' : 'Inactive'}}</p></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Profile</a> 
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                            <form action="{{route('update.profile', Auth::user()->id_player)}}" method="post">
                                    <div class="modal-content">
                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Profile</h4>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input name="id_player" type="hidden" value="{{Auth::user()->id_player}}">
                                                    <input type="text" class="form-control" name='player_displayname' placeholder="Display Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name='email' placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name='player_country'placeholder="Country">
                                                </div>
                                                <div class="form-group">
                                                    <select name="player_sex" class="form-control">
                                                        <option  selected disabled>Select Gender</option>
                                                        <option  value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input  type="date" class="form-control" name='player_dob' placeholder="Date of Birth" >
                                                </div>
                                                
                                                <label class='text-warning'>*Leave blank if you do not want to change a field.</label>
                                           
                                            </div>
                                    
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                    
                                        </div>
                            </form>
                         
                            </div>
                        </div>
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#changePassword">Change Password</a> 
                        <!-- The Modal -->
                        <div class="modal fade" id="changePassword">
                            <div class="modal-dialog">
                            <div class="modal-content">
                        
                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Change Password</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{route('update.password.change', Auth::user()->id_player)}}" method="post">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    
                                            <div class="form-group">
                                                <input  placeholder="Old Password"  type="password" class="form-control" name="old_password" >
                                            </div> 
                                            <div class="form-group">
                                                <input  placeholder="New Password"  type="password" class="form-control" name="password" >
                                            </div> 
                                            <div class="form-group">
                                                <input placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                            </div>
                                        
                                    </div>
                            
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        
                            </div>
                            </div>
                        </div>
                       
        
                        <h3 class="mt-40 mb-20">Purchase History</h3>
                        <table class="table table-bordered">
                            <thead>
                                <th>Asset Name</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                           
                                @foreach (Auth::user()->assets as $asset)
                                <tr>
                                    <td><p>{{Str::title($asset->name)}}</p></td>
                                    <td><p>{{Str::limit($asset->description, 80)}}</p></td>
                                    <td><p>{{$asset->pivot->amount}}</p></td>
                                    <td><p>{{$asset->pivot->created_at}}</p></td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
        
                    </div>
        
                </div>
        
            </div>
        
        

        
                
            </div>
@endsection

@section('scripts')
    <script src="{{asset('backend')}}/lib/jquery-toast/jquery.toast.min.js"></script>
    <script>
        $(function(){
            $("form").on("submit", function (event) {
            event.preventDefault();
         
             
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                url: $(this).attr('action'), // Get the action URL to send AJAX to
                type: "post",
                data: $(this).serialize(), // get all form variables
                success: function(data){
                  if(data.success){
                    $.toast({
                            heading: 'Success',
                            text: data.success,
                            showHideTransition: 'fade',
                            position: 'bottom-right',
                            icon: 'success',
                        })
                    $('#player_displayname').text(data.value.player_displayname);
                    $('#email').text(data.value.email);
                    $('#player_country').text(data.value.player_country);
                    $('#player_sex').text(data.value.player_sex.text(str.charAt(0).toUpperCase() + str.substr(1).toLowerCase()));
                    $('#player_dob').text(data.value.player_dob);
                  }
                  if(data.errors){
                    $.each(data.errors, function(key, value){
                        $.toast({
                            heading: 'Error',
                            text: value,
                            showHideTransition: 'fade',
                            position: 'bottom-right',
                            icon: 'error',
                        })
                  		});
                  }
                }
            });
        });
        })
    </script>
@endsection
