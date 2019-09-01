  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</p>
          {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-exchange"></i> <span>Transactions</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

        {{-- Start of Admin Only Access --}}
        @if(Auth::user()->user_type == 1)
        <li>
          <a href="#">
            <i class="fa fa-list"></i> <span>Items</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-users"></i> <span>User Management</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-info"></i> <span>Public Info Management</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-gears"></i>
              <span>Setup</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Suppliers</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Item Categories</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Farms</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Municipalities</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Barangays</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Species</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Animals</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Breed</a></li>

            </ul>
          </li>
        @endif
        {{-- End of Admin Only Access --}}




        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>