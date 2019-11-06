@extends('multiauth::layouts.app')

@section('title')
    Settings
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
      <h6 class="slim-pagetitle">Settings</h6>
      </div><!-- slim-pageheader -->
      
      @if(session()->has("success"))
      <div class="alert alert-outline alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong><i class="fa fa-check-circle"></i> Success!</strong> {{session()->get('success')}}
      </div><!-- alert -->
      @endif

      
      <div class="row row-sm">
        <div class="col-lg-12">
            <div class="section-wrapper">
                <label class="section-title">Update Settings</label>
                <p class="mg-b-20 mg-sm-b-40">These changes will be applied on your website.</p>
                    <div id="accordion" class="accordion-one" role="tablist" aria-multiselectable="true">
                        <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="tx-gray-800 transition collapsed">
                              General Settings
                            </a>
                          </div><!-- card-header -->
            
                          <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                            <div class="card-body">
                               <div class="alert alert-danger alert-solid" style="display:none"></div>
                              <form  action="{{route('admin.settings.general')}}" enctype="multipart/form-data">
                              <div class="row">
                                     
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">Company Name</label>
                                      <input value="{{$settings->company_name }}" class="form-control" type="text" name="company_name" placeholder="Company Name" >
                                    </div>
                                    <div class="form-group">
                                      <label for="">Company Logo</label>
                                      <input class="form-control dropify" data-allowed-file-extensions="png jpg" type="file" name="company_logo" data-default-file="{{asset('application/public')}}/{{$settings->company_logo}}">
                                      <label class="text-danger">* Logo height should be 200x42 px. </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="">Game Name</label>
                                        <input value="{{$settings->game_name}}" class="form-control" type="text" name="game_name" placeholder="Game Name" >
                                      </div>
                                      <div class="form-group">
                                          <label for="">Game Logo</label>
                                          <input class="form-control dropify"  data-allowed-file-extensions="png jpg" type="file" name="game_logo" data-default-file="{{asset('application/public')}}/{{$settings->game_logo}}">
                                          <label class="text-danger">* Logo height should be 200x42 px. </label>
                                      </div>
                                </div>
                              </div>
                                
                                  <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save fa-fw"></i> Save</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="headingTwo">
                            <a class="tx-gray-800 transition collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Hero Image Settings
                            </a>
                          </div>
                          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                            <div class="card-body">
                                <form  action="{{route('admin.settings.heroImage')}}" enctype="multipart/form-data">
                                  <div class="row">     
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="">Hero Image Title</label>
                                          <input value="{{$settings->hero_image_title}}" class="form-control" type="text" name="hero_image_title" placeholder="Title" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hero Image Subtitle</label>
                                            <input value="{{$settings->hero_image_subtitle}}" class="form-control" type="text" name="hero_image_subtitle" placeholder="Subtitle" >
                                        </div>
                                        <div class="form-group">
                                          <label for="">Description</label>
                                        <textarea name="hero_image_description" class="form-control"  rows="3" placeholder="Description">{{$settings->hero_image_description}}</textarea>
                                        </div>
                                       
                                      </div>
                                      <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="">Hero Image</label>
                                            <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="250px" type="file" name="hero_image" data-default-file="{{asset('application/public')}}/{{$settings->hero_image}}">
                                            <label class="text-danger">* Image size should be 1400 x 645px </label>
                                          </div>
                                      </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save fa-fw"></i> Save</button>
                                  </form>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="headingThree">
                            <a class="tx-gray-800 transition collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Promotional Settings
                            </a>
                          </div>
                          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" style="">
                            <div class="card-body">
                              <form  action="{{route('admin.settings.promotion')}}" enctype="multipart/form-data">
                                <div class="row">     
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="">Promotion Title</label>
                                        <input value="{{$settings->promotion_title}}" class="form-control" type="text" name="promotion_title" placeholder="Title" >
                                      </div>
                                      <div class="form-group">
                                          <label for="">Promotion Subtitle</label>
                                          <input value="{{$settings->promotion_subtitle}}" class="form-control" type="text" name="promotion_subtitle" placeholder="Subtitle" >
                                      </div>
                                      <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="promotion_description" class="form-control"  rows="3" placeholder="Description">{{$settings->promotion_description}}</textarea>
                                      </div>
                                     
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="">Promotion Image</label>
                                          <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="250px" type="file" name="promotion_image" data-default-file="{{asset('application/public')}}/{{$settings->promotion_image}}">
                                          <label class="text-danger">* Image size should be 1400 x 735px </label>
                                        </div>
                                    </div>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save fa-fw"></i> Save</button>
                                </form>
                            </div>
                          </div><!-- collapse -->
                        </div><!-- card -->
                        <div class="card">
                            <div class="card-header" role="tab" id="headingfour">
                              <a class="tx-gray-800 transition collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                              Blog Settings
                              </a>
                            </div>
                            <div id="collapsefour" class="collapse" role="tabpanel" aria-labelledby="headingfour" style="">
                              <div class="card-body">
                                <form  action="{{route('admin.settings.blog')}}" enctype="multipart/form-data">
                                  <div class="row">     
                                      <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="">Blog Page Image</label>
                                            <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="230px" type="file" name="blog_image" data-default-file="{{asset('application/public')}}/{{$settings->blog_image}}">
                                            <label class="text-danger">* Image size should be 1400 x 451px </label>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="">Post Page Image</label>
                                            <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="230px" type="file" name="postpage_image" data-default-file="{{asset('application/public')}}/{{$settings->postpage_image}}">
                                            <label class="text-danger">* Image size should be 1400 x 451px </label>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="">User Page Image</label>
                                            <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="230px" type="file" name="userpage_image" data-default-file="{{asset('application/public')}}/{{$settings->userpage_image}}">
                                            <label class="text-danger">* Image size should be 1400 x 451px </label>
                                          </div>
                                      </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save fa-fw"></i> Save</button>
                                  </form>
  
                              </div>
                            </div><!-- collapse -->
                          </div><!-- card -->
                        <div class="card">
                            <div class="card-header" role="tab" id="headingfive">
                              <a class="tx-gray-800 transition collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                Footer Settings
                              </a>
                            </div>
                            <div id="collapsefive" class="collapse" role="tabpanel" aria-labelledby="headingfive" style="">
                              <div class="card-body">
                                  <form  action="{{route('admin.settings.footer')}}" enctype="multipart/form-data">
                                    <div class="row">     
                                        <div class="col-sm-6">
                                          
                                          <div class="form-group">
                                              <label for="">Footer Youtube Link</label>
                                              <input value="{{$settings->footer_youtube}}" class="form-control" type="text" name="footer_youtube" placeholder="Youtube Link" >
                                          </div>
                                          <div class="form-group">
                                              <label for="">Footer Facebook Link</label>
                                              <input value="{{$settings->footer_facebook}}" class="form-control" type="text" name="footer_facebook" placeholder="Facebook Link" >
                                          </div>
                                          <div class="form-group">
                                              <label for="">Footer Google Link</label>
                                              <input value="{{$settings->footer_google}}" class="form-control" type="text" name="footer_google" placeholder="Google Link" >
                                          </div>
                                          <div class="form-group">
                                              <label for="">Footer Twiter Link</label>
                                              <input value="{{$settings->footer_twiter}}" class="form-control" type="text" name="footer_twiter" placeholder="Twiter Link" >
                                          </div>
                                         
                                         
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Footer Title</label>
                                                <input value="{{$settings->footer_title}}" class="form-control" type="text" name="footer_title" placeholder="Footer Title" >
                                              </div>
                                              <div class="form-group">
                                                <label for="">Footer Image</label>
                                              <input class="form-control dropify" data-allowed-file-extensions="png jpg" data-height="200px" type="file" name="footer_image" data-default-file="{{asset('application/public')}}/{{$settings->footer_image}}">
                                              <label class="text-danger">* Image size should be 1400 x 513px </label>
                                            </div>
                                        </div>
                                      </div>
                                      
                                      <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save fa-fw"></i> Save</button>
                                  </form>
                              </div>
                            </div><!-- collapse -->
                          </div><!-- card -->
                      </div><!-- accordion --> 
            </div>
         
        </div><!-- col-12 -->
      </div><!-- row -->
</div>
@endsection


@section('scripts')
    <script>
      $(function(){
        $('.dropify').dropify();
          //Override form submit
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
                data: new FormData(this), // get all form variables
                cache:false,
                contentType: false,
                processData: false,
                success: function(data){
                  if(data.success){
                    $.toast({
                            heading: 'Success',
                            text: data.success,
                            showHideTransition: 'fade',
                            position: 'bottom-right',
                            icon: 'success',
                        })
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