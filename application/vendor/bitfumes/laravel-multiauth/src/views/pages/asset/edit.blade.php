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
            <form id="selectForm" method="post" action="{{route('admin.asset.update', $asset->id)}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                  <input value="{{$asset->name}}" placeholder="Enter Asset Name" id="name" type="text" class="form-control" name="name" required>
                                    @if ($errors->has('name'))
                                      <div class="error text-danger">{{ $errors->first('name') }}</div>
                                   @endif
                                </div>
                                <div class="form-group">
                                    <select class = "form-control select2" name="category_id" required>
                                        @foreach ($categories as $category)
                                          <option {{$asset->id == $category->id ? 'selected': ''}} value= "{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>                            
                                    @if ($errors->has('category_id'))
                                    <div class="error text-danger">{{ $errors->first('category_id') }}</div>
                                   @endif
                                </div>
                         
                                <div class="form-group">
                                  <textarea name="description" class="form-control" placeholder="Enter Asset Description">{{$asset->description}}</textarea>
                                </div>
                                <div class="form-group">
                                  <input value="{{$asset->price}}" type="number" name="price" class="form-control" placeholder="Price" required>
                                    @if ($errors->has('price'))
                                      <div class="error text-danger">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <select name="status" class="form-control select2">
                                    <option {{$asset->status == "unpaid" ? "selected":''}} value="unpaid">Unpaid</option>
                                    <option  {{$asset->status == "paid" ? "selected":''}} value="paid">Paid</option>
                                  </select>
                                   @if ($errors->has('status'))
                                     <div class="error text-danger">{{ $errors->first('status') }}</div>
                                   @endif
                               </div>
                               
                            </div>
                            <div class="col-lg-4" >
                                <div id="dropify">
                                  <input name="image" data-default-file="{{asset('application/public')}}/{{$asset->image}}" data-height="280"  data-allowed-file-extensions="jpg png bmp" data-max-file-size="2M" type="file" class="dropify" />
                                </div>
                                @if ($errors->has('image'))
                                  <div class="error text-danger">{{ $errors->first('image') }}</div>
                               @endif
                               <label class="text-danger  mg-t-10">*Image size should be (500 x 375) px.</label>
                            </div>
                        </div>
                          
                        <div class="row mg-t-20">
                          <div class="col-lg-12">
                              <label class="section-title tx-14">Enter Option Details</label> 
                          </div>
                        </div>
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                              <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                        <th class="align-middle" width='45%'>Option Name</th>
                                        <th class="align-middle"  width='45%' >Value</th>
                                        <th class="align-middle" width='10%'><button id="add" class="btn btn-primary btn-block"> <i class="fa fa-plus"></i> Add</button></th>
                                    </tr>      
                                  </thead>
                                  
                                  <tbody>
                                    @foreach (DB::table('asset_option')->where('asset_id', $asset->id)->get() as $item)
                                        <tr>
                                          <td>
                                            <input type="hidden" name="row_id[]" value="{{$item->id}}">
                                            <select name="option_id[]" class="form-control select2" required>
                                                @foreach ($options as $option)
                                                  <option {{$item->option_id == $option->id ? 'selected': ''}} value="{{$option->id}}">{{$option->name}}</option>
                                                @endforeach
                                            </select>
                                          </td>
                                          <td><input value="{{$item->value}}"  class="form-control value" type="number" name="value[]" required></td>
                                          <td>
                                            <button id="{{$item->id}}" class="btn btn-danger btn-block removeExist"> Remove</button>
                                          </td>
                                        </tr>
                                    @endforeach
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

   
        var count= '{{DB::table("asset_option")->where("asset_id", $asset->id)->count()}}';
        count = parseInt(count);
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
        // // Action of Click Remove Button
        $(document).on('click', '.removeExist', function(e){
          e.preventDefault()
          count--;

          var id= $(this).attr('id');
         
     
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              
              if (result.value) {
                $(this).closest("tr").remove();
                $.ajax({
                  url:'{{route("admin.asset.delete.option")}}',
                  type: "get",
                  data:{id:id},
                  success:function(data){
                   if(data=='success'){
                       
                      $.toast({
                          heading: 'Success',
                          text: 'Option has been deleted successfully',
                          showHideTransition: 'fade',
                          position: 'bottom-right',
                          icon: 'success'
                      })
                   }else{
                     alert(data)
                   }
                  }
                })
               
              }
            })
        });

        $(document).on('click', '.remove', function(e){
          e.preventDefault()
          count--;
          $(this).closest("tr").remove();
        });
        
        $('#selectForm').parsley(); 

      })
    </script>
@endsection