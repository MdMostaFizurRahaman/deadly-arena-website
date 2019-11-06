@extends('multiauth::layouts.app')

@section('title')
    Players
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Players</li>
        </ol>
      <h6 class="slim-pagetitle">Players</h6>
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
        <div class="col-lg-12 mg-t-20 mg-lg-t-0">
          <div class="section-wrapper">
            <label class="section-title">All Players</label>
            <div class="table-wrapper">
              <table class="table display responsive nowrap" id='datatable'>
                <thead>
                  <tr class="tx-10">
                    {{-- <th class="wd-10p pd-y-5">Image</th> --}}
                    <th width="5%" class="pd-y-5">id</th>
                    <th class="pd-y-5">Name</th>
                    <th class="pd-y-5">Display Name</th>
                    <th class="pd-y-5">Email</th>
                    <th class="pd-y-5">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($players as $player)
                      <tr>
                        {{-- <td class="pd-l-20 align-middle">
                        <img src="{{asset('application/public')}}/{{$player->image}}" class="wd-55" alt="Image">
                        </td> --}}
                        <td class="tx-inverse tx-14 align-middle tx-large">{{$player->id_player}}</td>
                        <td class="tx-inverse tx-14 align-middle tx-large">{{$player->player_name}}</td>
                        <td class="tx-inverse tx-14 align-middle tx-large">{{$player->player_displayname}}</td>
                        <td class="tx-inverse tx-14 align-middle tx-large">{{$player->email}}</td>
                        <td class="tx-inverse tx-14 align-middle tx-large">  
                          <div class="toggle-wrapper">
                            <div  data-id="{{$player->id_player}}"  data-toggle-on="{{$player->player_status==1 ? 'true':'false'}}" data-toggle-height="26"   class="toggle toggle-modern primary"></div>
                        </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-responsive -->     
          </div><!-- section-wrapper -->
        </div><!-- col-6 -->
      </div><!-- row -->
</div>
@endsection


@section('scripts')
    <script>
      $(function(){

        $('.toggle').toggles();

        $('.toggle').on('toggle', function(e, active) {
          
            if (active) {
            var id = $(this).data('id')
            var status = 1;
              $.ajax({
                url:'{{route("admin.player.status.update")}}',
                type: "get",
                data:{id:id, status:status},
                success:function(data){
                  $.toast({
                          heading: 'Success',
                          text: 'Status updated successfully',
                          showHideTransition: 'fade',
                          position: 'bottom-right',
                          icon: 'success'
                      })
                }
              })
            } else {
              var id = $(this).data('id')
              //alert(id);
              var status = 0;
              $.ajax({
                url:'{{route("admin.player.status.update")}}',
                type: "get",
                data:{id:id, status:status},
                success:function(data){
                  $.toast({
                          heading: 'Success',
                          text: 'Status updated successfully',
                          showHideTransition: 'fade',
                          position: 'bottom-right',
                          icon: 'success'
                      })
                }
              })
            }
          });
        
        $('#datatable').DataTable({
          responsive: true,
          "pageLength": 10,
          "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ rows/page',
          }
        });
      })
    </script>
@endsection