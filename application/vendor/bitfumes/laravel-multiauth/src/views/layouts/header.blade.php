<div class="slim-header">
    <div class="container">
      <div class="slim-header-left">
        <h2 class="slim-logo"><a href="index.html">Deadly Arena</a></h2>
      </div><!-- slim-header-left -->
      <div class="slim-header-right">
        <div class="dropdown dropdown-c">
          <a href="#" class="logged-user" data-toggle="dropdown">
            <img src="{{asset('application/public')}}/{{Auth::user()->image}}" alt="">
            <span>{{Auth::user()->name}}</span>
            <i class="fa fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <nav class="nav">
              @admin('super')
              <a class="nav-link" href="{{ route('admin.show') }}"><i class="icon ion-person"></i> User</a>
              <a class="nav-link" href="{{ route('admin.roles') }}"><i class="icon ion-ios-bolt"></i> Roles</a>
              {{-- <a class="nav-link" href="{{ route('admin.setting') }}"><i class="icon ion-ios-gear"></i> Settings</a> --}}
              @endadmin
              <a href="{{route('admin.profile', Auth::user()->id)}}" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>
              <a class="nav-link" href="{{ route('admin.password.change') }}"><i class="icon ion-key"></i> Change Password</a>
              <a class="nav-link" href="/admin/logout" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="icon ion-forward"></i> {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </nav>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- header-right -->
    </div><!-- container -->
  </div><!-- slim-header -->