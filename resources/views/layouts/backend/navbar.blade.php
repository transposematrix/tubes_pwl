<header class="main-header">
    <!-- Logo -->
    <a href="{{route('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" src="{{asset('template/images/paw.svg')}}"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Paw </b>Rescue</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(Auth::user()->status == 'user')
              <img src="{{asset('backend/img/cat.jpg')}}" class="user-image" alt="User Image">
            @else
            <img src="{{asset('backend/img/cat2.jpg')}}" class="user-image" alt="User Image">
            @endif
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              @if(Auth::user()->status == 'user')
                <img src="{{asset('backend/img/cat.jpg')}}" class="img-circle" alt="User Image">
              @else
              <img src="{{asset('backend/img/cat2.jpg')}}" class="img-circle" alt="User Image">
              @endif
                <p>
                  {{Auth::user()->name}} - {{Auth::user()->status}}
                  <small>Member since {{Auth::user()->created_at}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a href="{{route('keluar')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>