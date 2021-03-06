@extends('layouts.plane')

@section('body')
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-leaf"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-leaf"></i> Projeto<b>ESTUFA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              @if(!empty($sensorsWithoutAmbient))
              <span class="label label-warning">{{ count($sensorsWithoutAmbient) }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem {{ count($sensorsWithoutAmbient) }} avisos</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($sensorsWithoutAmbient as $sensorWithoutAmbient)
                  <li>
                    <a href="{{ url('/admin/sensor/'.$sensorWithoutAmbient->id_sensor.'/edit') }}">
                      <i class="fa fa-sitemap text-yellow"></i> O Sensor <b>{{ $sensorWithoutAmbient->description }}</b> está sem ambiente!
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              @if(!empty($sensorsNotRegistered))
              <span class="label label-danger">{{ count($sensorsNotRegistered) }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem {{ count($sensorsNotRegistered) }} problemas</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($sensorsNotRegistered as $sensorNotRegistered)
                  <li>
                    <a href="{{ url('/admin/sensor/create/'.$sensorNotRegistered->id_sensor) }}">
                      <i class="fa fa-sitemap text-yellow"></i> O Sensor <b>{{ $sensorNotRegistered->id_sensor }}</b> está enviando leituras sem cadastro!
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('/vendor/bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->role->description }}
                  <small>Membro desde {{ Auth::user()->created_at->format('d/m/Y') }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/admin/user/account/'.Auth::user()->id_user) }}" class="btn btn-default btn-flat"><i class="fa fa-cog"></i> Minha Conta</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/admin/auth/logout') }}" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/vendor/bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->role->description }}</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisa...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      @include('common.menu')
      <!-- /.Sidebar Menu-->

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page_title')
        <small>@yield('page_subtitle')</small>
      </h1>
      <ol class="breadcrumb">
        @yield('breadcrumb')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 1.0 BETA
    </div>
    <strong>Copyright &copy; 2016 <a href="http://nectar.videira.ifc.edu.br">NECTAR - IFC Videira</a>.</strong> Todos os direitos reservados.
  </footer>
  <!-- /.Main Footer -->

  <!-- Control Sidebar -->
  @include('common.controlSidebar')
  <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->
  @endsection

