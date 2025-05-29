<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item nav-category">Data</li> --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
                <i class="menu-icon mdi mdi-archive"></i>
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('brand.index') }}">Brand</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('engine.index') }}">Engine</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('motor.index') }}">Motor</a></li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}">Customer</a></li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaction" aria-expanded="false"
                aria-controls="transaction">
                <i class="menu-icon mdi mdi-cart"></i>
                <span class="menu-title">Transaction</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role == 'Cashier')
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('transaction.index') }}">Transaction</a></li>
                    @elseif (Auth::user()->role == 'Admin')
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('report.index') }}">Report</a></li>
                    @endif
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item nav-category">Forms and Datas</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="menu-icon mdi mdi-layers-outline"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">pages</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
</nav>
