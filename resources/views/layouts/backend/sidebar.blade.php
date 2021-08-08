<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->status == 'user')
          <img src="{{asset('backend/img/cat.jpg')}}" class="img-circle" alt="User Image">
          @else
          <img src="{{asset('backend/img/cat2.jpg')}}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="{{route('admin.home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->status == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('allpost')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{route('new')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li><a href="#">
        <i class="fa fa-folder"></i> 
        <span>Categories</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        <ul class="treeview-menu">
            <li><a href="/post/kategori/1"><i class="fa fa-circle-o"></i> Article</a></li>
            <li><a href="/post/kategori/2"><i class="fa fa-circle-o"></i> Adopt</a></li>
            <li><a href="/post/kategori/3"><i class="fa fa-circle-o"></i> Edukasi</a></li>
          </ul>
        </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Adoption Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('adopt-confirm')}}"><i class="fa fa-circle-o"></i>Adopter Candidates</a></li>
            <li><a href="{{route('adopt-confirm-list')}}"><i class="fa fa-circle-o"></i> Confirmed Adopter</a></li>
          </ul>
        </li>
        @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>My Adoption</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('adopt-list')}}"><i class="fa fa-circle-o"></i> Adoption List</a></li>
          </ul>
        </li>   
        @endif     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>