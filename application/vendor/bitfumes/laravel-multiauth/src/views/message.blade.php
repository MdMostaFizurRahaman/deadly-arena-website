@if (session()->has('message') || session()->has('status'))
<div class="alert alert-outline alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ session()->get('message') }}
</div>
    {{-- <div class="alert alert-success">{{ session()->get('message') }}</div> --}}
@endif

@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-outline alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> {{ $error }}
    </div>
        {{-- <div class="alert alert-danger">{{ $error }}</div> --}}
    @endforeach
@endif