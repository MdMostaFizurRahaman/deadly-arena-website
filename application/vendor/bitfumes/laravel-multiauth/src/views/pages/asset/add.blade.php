@extends('multiauth::layouts.app')

@section('title')
    Assets
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Assets</li>
        </ol>
      <h6 class="slim-pagetitle">Create Asset</h6>
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
            <label class="section-title">Enter Asset Details</label> 
            <form id="selectForm" method="post" action="{{route('admin.asset.store')}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input placeholder="Enter Asset Name" id="name" type="text" class="form-control" name="name" required>
                                    @if ($errors->has('name'))
                                      <div class="error text-danger">{{ $errors->first('name') }}</div>
                                   @endif
                                </div>
                                <div class="form-group">
                                    <select class = "form-control select2" name="category_id" required>
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                          <option value= "{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>                            
                                    @if ($errors->has('category_id'))
                                    <div class="error text-danger">{{ $errors->first('category_id') }}</div>
                                   @endif
                                </div>
                         
                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Enter Asset Description"></textarea>
                                </div>
                                <div class="form-group">
                                   <input type="number" name="price" class="form-control" placeholder="Price" required>
                                    @if ($errors->has('price'))
                                      <div class="error text-danger">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <select name="status" class="form-control select2">
                                    <option value="unpaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                  </select>
                                   @if ($errors->has('status'))
                                     <div class="error text-danger">{{ $errors->first('status') }}</div>
                                   @endif
                               </div>
                               
                            </div>
                            <div class="col-lg-4" >
                                <div id="dropify">
                                        <input name="image" data-height="280"  
                                        data-allowed-file-extensions="jpg png bmp" data-max-file-size="2M" type="file" class="dropify" required />
                                        <label class="text-danger  mg-t-10">*Image size should be (500 x 375) px.</label>
                                </div>
                                @if ($errors->has('image'))
                                  <div class="error text-danger">{{ $errors->first('image') }}</div>
                               @endif
                            </div>
                        </div>
                          
                        <div class="row mg-t-20">
                          <div class="col-lg-12">
                            <label class="section-title tx-14">Enter Option Details </label> 
                          </div>
                        </div>
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                              <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                        <th width='45%'>Option Name</th>
                                        <th width='45%' >Value</th>
                                        <th width='10%'>Action</th>
                                    </tr>      
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td>
                                          <select name="option_id[]" class="form-control select2" required>
                                            <option selected disabled>Select Option</option>
                                              @foreach ($options as $option)
                                                <option value="{{$option->id}}">{{$option->name}}</option>
                                              @endforeach
                                          </select>
                                        </td>
                                        <td><input class="form-control value" type="number" name="value[]" required></td>
                                        <td><button class="btn btn-primary btn-block" id="add"><i class="fa fa-plus fa-fw"></i> Add</button></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                          <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
                          <a href="{{route('admin.asset')}}" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                      </div><!-- card-body -->
                  
        
                </div>
            </form>
          </div><!-- section-wrapper -->
      </div><!-- row -->
</div>
@endsection


@section('scripts')

    <script>
      $(function(){
        $('.dropify').dropify();
        // Action of Click Add Button 
        var count= 1;
        total_row = '{{count($options)}}';
        total_row =parseInt(total_row);
        $(document).on('click', '#add', function(e){
          e.preventDefault();

          if(total_row >count ){
            html = '<tr id='+count+'>';
            html += '<td><select  name="option_id[]" class="form-control select2" required>';
            html += '<option selected disabled>Select Option</option>@foreach ($options as $option)<option value="{{$option->id}}">{{$option->name}}</option>@endforeach'
            html +='</select></td>'
            html += '<td><input type="number" name="value[]" class="form-control value" required /></td>';
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td>';
            html += '</tr>'
            count++;
            $('tbody').append(html);
          }else{
          
           
            $.toast({
                heading: 'Error',
                text: 'You can not add more field than your total options.',
                showHideTransition: 'fade',
                position: 'bottom-right',
                icon: 'error'
            })
          }
      
        
        });
      
     
        // Action of Click Remove Button
        $(document).on('click', '.remove', function(){
          count--;
          $(this).closest("tr").remove();
        });

        $('#selectForm').parsley(); 
      })
    </script>
@endsection