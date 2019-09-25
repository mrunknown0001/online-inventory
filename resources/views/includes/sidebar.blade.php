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
        <li class="{{ route('admin.dashboard') == url()->current() || route('emp.dashboard') == url()->current() ? 'active' : ''}}">
          <a href="{{ Auth::user()->user_type == 1 ? route('admin.dashboard') : route('emp.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        {{-- Start of Admin Only Access --}}
        @if(Auth::user()->user_type == 1)
          <li class="{{ route('users') == url()->current() ? 'active' : '' }}">
            <a href="{{ route('users') }}">
              <i class="fa fa-users"></i> <span>User Management</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>
          <li class="{{ route('transactions') == url()->current() ? 'active' : '' }}">
            <a href="{{ route('transactions') }}">
              <i class="fa fa-exchange"></i> <span>Transactions</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>
          <li class="{{ route('audit.trail') == url()->current() ? 'active' : '' }}">
            <a href="{{ route('audit.trail') }}">
              <i class="fa fa-history"></i> <span>Audit Trail</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>
          <li class="treeview {{ route('customers') == url()->current() || route('suppliers') == url()->current() || route('items') == url()->current() || route('item.categories') == url()->current() || route('farms') == url()->current() || route('municipalities') == url()->current() || route('barangays') == url()->current() || route('species') == url()->current() || route('animals') == url()->current() || route('breeds') == url()->current() || route('unit.of.measurements') == url()->current() ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-gears"></i>
              <span>Inventory Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ route('customers') == url()->current() ? 'active' : '' }}"><a href="{{ route('customers') }}"><i class="fa fa-circle-o"></i> Customers</a></li>
              <li class="{{ route('suppliers') == url()->current() ? 'active' : '' }}"><a href="{{ route('suppliers') }}"><i class="fa fa-circle-o"></i> Suppliers</a></li>
              <li class="{{ route('items') == url()->current() ? 'active' : '' }}"><a href="{{ route('items') }}"><i class="fa fa-circle-o"></i> Items</a></li>
              <li class="{{ route('item.categories') == url()->current() ? 'active' : '' }}"><a href="{{ route('item.categories') }}"><i class="fa fa-circle-o"></i> Item Categories</a></li>
              <li class="{{ route('farms') == url()->current() ? 'active' : '' }}"><a href="{{ route('farms') }}"><i class="fa fa-circle-o"></i> Farms</a></li>
              <li class="{{ route('municipalities') == url()->current() ? 'active' : '' }}"><a href="{{ route('municipalities') }}"><i class="fa fa-circle-o"></i> Municipalities</a></li>
              <li class="{{ route('barangays') == url()->current() ? 'active' : '' }}"><a href="{{ route('barangays') }}"><i class="fa fa-circle-o"></i> Barangays</a></li>
              <li class="{{ route('species') == url()->current() ? 'active' : '' }}"><a href="{{ route('species') }}"><i class="fa fa-circle-o"></i> Species</a></li>
              <li class="{{ route('animals') == url()->current() ? 'active' : '' }}"><a href="{{ route('animals') }}"><i class="fa fa-circle-o"></i> Animals</a></li>
              <li class="{{ route('breeds') == url()->current() ? 'active' : '' }}"><a href="{{ route('breeds') }}"><i class="fa fa-circle-o"></i> Breed</a></li>
              <li class="{{ route('unit.of.measurements') == url()->current() ? 'active' : '' }}"><a href="{{ route('unit.of.measurements') }}"><i class="fa fa-circle-o"></i> Unit of Measurement</a></li>

            </ul>
          </li>
        @endif
        {{-- End of Admin Only Access --}}

        {{-- Start of Employee Only Access --}}
        @if(Auth::user()->user_type == 2)

        @endif
        {{-- End of Employee Only Access --}}


        <li class="{{ route('inventories') == url()->current() ? 'active' : '' }}">
          <a href="{{ route('inventories') }}">
          <i class="fa fa-list"></i> <span>Inventory Management</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
          </a>
        </li>

        <li class="{{ route('shipping.permits') == url()->current() ? 'active' : '' }}">
          <a href="{{ route('shipping.permits') }}">
            <i class="fa fa-truck"></i> <span>Shipping Permit Management</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>


        <li class="{{ route('public.info') == url()->current() ? 'active' : '' }}">
          <a href="{{ route('public.info') }}">
            <i class="fa fa-info"></i> <span>Public Info Management</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>


        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>