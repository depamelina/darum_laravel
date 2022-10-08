<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('template/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Darum Telkom</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fa-solid text-primary fa-fw fa-house"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Master
      </div>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('city.index') }}">
          <i class="fa-solid fa-fw text-primary  fa-map-location-dot"></i>
          <span>Kota/Kabupaten</span>
        </a>
        <!-- <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="{{ route('city.index') }}">Tampil Data</a>
          </div>
        </div> -->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fa-solid fa-fw text-primary fa-building"></i>
          <span>Data Perumahan</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="{{ route('space.index') }}">Tampil Data</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/centre-point">
          <i class="fa-solid fa-fw text-primary  fa-map-pin"></i>
          <span>Titik Tengah</span>
        </a>
        <!-- <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="/centre-point">Tampil Data</a>
          </div>
        </div> -->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>UI Colors</span>
        </a>
      </li> --> 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Perumahan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fa-solid fa-fw text-primary fa-building"></i>
          <span>Data Perumahan</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="{{ route('space.index') }}">Tampil Data</a>
            <!-- <a class="collapse-item" href="{{ route('space.print') }}">Export Data</a> -->
          </div>
          
        </div>
        
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
        </a>
      </li> --> 
    </ul>