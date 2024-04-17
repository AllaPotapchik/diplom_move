@extends('layouts.admin_panel')
@section('title', 'Добавить направление')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить направление</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-6">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                            </div>
                        @endif
                        <div class="card card-primary">

                            <form method="post" action="{{route('dance_type_admin.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" class="form-control" id="name" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" class="form-control" id="description" name="description" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Преимущества</label>
                                        <input type="text" class="form-control" id="benefits" name="benefits" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
