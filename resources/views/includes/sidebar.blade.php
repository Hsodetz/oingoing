<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-dark elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-principal">
      <img src="{{ asset('/imagenes/waynakay.png') }}" alt="AdminLTE Logo" class="brand-image ml-4"
           style="opacity: .8; width: 10rem;">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block">
          @guest
          <span>  </span>
          @else
          <div class="image">
            @include('includes.sidebarfoto')
          </div>
          @endguest
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{ route('home') }}" class="nav-link active">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @can('schools.index')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school text-primary"></i>
            <p>
              Colegios
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('schools.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado </p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

        @can('fathers.show')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-check text-primary"></i>
            <p>
              Padres
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @canatleast(['fathers.index', 'fathers.index'])
            <li class="nav-item">
              <a href="{{route('fathers.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado</p>
              </a>
            </li>
            @endcanatleast
            
            <li class="nav-item">
              <a href="{{route('fathers.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Asignar atributos </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fathers.edit', Auth()->user()->id) }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Editar atributos  </p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

        @can('students.show')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate text-primary"></i>
            <p>
              Estudiantes
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @canatleast(['students.index', 'students.index'])
            <li class="nav-item">
              <a href="{{route('students.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado</p>
              </a>
            </li>
            @endcanatleast
            
            <li class="nav-item">
              <a href="{{route('students.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Asignar atributos </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('students.edit', Auth()->user()->id) }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Editar atributos </p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

        @can('teachers.show')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie text-primary"></i>
            <p>
              Profesores
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @canatleast(['teachers.index', 'teachers.index'])
            <li class="nav-item">
              <a href="{{route('teachers.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado</p>
              </a>
            </li>
            @endcanatleast
            
            <li class="nav-item">
              <a href="{{route('teachers.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Asignar atributos </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('teachers.edit', Auth()->user()->id) }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p> Editar atributos </p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        

        @can('roles.index')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-primary"></i>
            <p>
              Roles
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('roles.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado de Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('roles.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Crear Roles</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

        @can('permissions.index')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon far fa-keyboard text-primary"></i>
            <p>
              Permisos
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('permissions.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado de Permisos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('permissions.create')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Crear Permisos</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

        @can('users.index')
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users text-primary"></i>
            <p>
              Usuarios
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ver Listado de Usuarios</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
