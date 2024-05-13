<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администратора - @yield('title')</title>
    @vite(['public/admin/admin.js'])

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">Панель администратора</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

{{--            <div class="form-inline">--}}
{{--               <div class="input-group" data-widget="sidebar-search">--}}
{{--                   <input class="form-control form-control-sidebar" type="search" placeholder="Search"--}}
{{--                          aria-label="Search">--}}
{{--                   <div class="input-group-append">--}}
{{--                       <button class="btn btn-sidebar">--}}
{{--                           <i class="fas fa-search fa-fw"></i>--}}
{{--                       </button>--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--           </div>--}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{route('adminMain')}}" class="nav-link">
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all_accepts')}}" class="nav-link ">
                            <p>Подтверждение оплаты</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Направления
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_types')}}" class="nav-link ">
                                    <p>Все направления</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('dance_type_admin.create')}}" class="nav-link ">
                                    <p>Добавить направление</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Расписание
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_schedules')}}" class="nav-link ">
                                    <p>Все занятия</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('schedule_admin.create')}}" class="nav-link ">
                                    <p>Добавить занятие</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Пользователи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_users')}}" class="nav-link ">
                                    <p>Все пользователи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user_admin.create')}}" class="nav-link ">
                                    <p>Добавить пользователя</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Программы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_programs')}}" class="nav-link ">
                                    <p>Все программы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('program_admin.create')}}" class="nav-link ">
                                    <p>Добавить программу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Преподаватели
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_teachers')}}" class="nav-link ">
                                    <p>Все преподаватели</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('teacher_admin.create')}}" class="nav-link ">
                                    <p>Добавить преподавателя</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <p>
                                Уроки
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('all_lessons')}}" class="nav-link ">
                                    <p>Все уроки</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('lesson_admin.create')}}" class="nav-link ">
                                    <p>Добавить урок</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a style="cursor: pointer" class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <p >Выйти</p>
                        </a>
                    </li>
                </ul>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>
</body>
</html>

{{--@extends('layouts.app')--}}
{{--@section('title')--}}
{{--    Расписание--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    @vite(['resources/css/schedule.css'])--}}
{{--    <div class="container back_color">--}}
{{--        <h1>Администратор</h1>--}}
{{--
{{--    </div>--}}
{{--@endsection--}}

