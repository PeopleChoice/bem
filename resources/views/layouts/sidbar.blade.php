<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #ce0040 !important:color:#fff !important;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('img/logo.png') }}" width="65px !important" alt="" class="img-circle elevation-3" style="opacity: .8">&nbsp;&nbsp;
      <span class="brand-text font-weight-light">FTAE</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          @isset(Auth()->user()->email)
           <a href="#" class="d-block">{{Auth()->user()->email}}</a>
          @endisset
        </div>
      </div>


      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{ route('admin.ecole.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ecoles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.formation.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Types Formation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.diplome.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diplômes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.programme.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Programmes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.motif.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Motifs appel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.objet.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Objets appel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.resolution.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Résolution Apporter</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reporting
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.filtre') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporting</p>
                </a>
              </li>
              <li class="nav-item">
                <a  href="{{ route('admin.backoffice.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>backoffice</p>
                </a>
              </li>
            </ul>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>