
    <div class="slim-navbar">
        <div class="container">
          <ul class="nav">
            <li class="nav-item {{Request::is('admin/home') ? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.home')}}">
                <i class="icon ion-home"></i>
                <span>Dashboard</span>
              </a>
            </li>
   
            <li class="nav-item {{Request::is('admin/category') || Request::is('admin/category/*')? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.category')}}">
                <i class="icon ion-funnel"></i>
                <span>Categories</span>
              </a>
            </li>
            <li class="nav-item {{Request::is('admin/option') || Request::is('admin/option/*')? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.option')}}">
                  <i class="icon ion-clipboard"></i>
                  <span>Options</span>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/asset') || Request::is('admin/asset/*')? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.asset')}}">
                    <i class="icon ion-briefcase"></i>
                    <span>Assets</span>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/player') || Request::is('admin/player/*')? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.player')}}">
                    <i class="icon ion-person-stalker"></i>
                    <span>Players</span>
                </a>
            </li>
           
          <li class="nav-item {{Request::is('admin/post') || Request::is('admin/post/*')? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.post')}}">
              <i class="icon ion-chatbox"></i>
                <span>Post</span>
            </a>
          </li>
          
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="icon ion-stats-bars"></i>
                    <span>Reports</span>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/setting') || Request::is('admin/setting/*')? 'active' : ''}}">
              <a class="nav-link" href="{{route('admin.settings')}}">
                  <i class="icon ion-ios-gear"></i>
                  <span>Settings</span>
              </a>
            </li>
          </ul>
        </div><!-- container -->
      </div><!-- slim-navbar -->
  