<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="{{config('app.name')}} Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Dashboard
                        
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('client.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Clients
                        
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('vehicle.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-car"></i>
                    <p>
                        Vehicles
                        
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('device.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-mobile"></i>
                    <p>
                        Devices
                        
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Manage administrators
                        
                    </p>
                </a>
            </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>