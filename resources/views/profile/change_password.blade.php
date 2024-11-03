@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        @include('_message')
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <form method="post" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" required
                                            value="{{ old('old_password') }}" name="old_password"
                                            placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" required
                                            value="{{ old('new_password') }}" name="new_password"
                                            placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" required
                                            value="{{ old('confirm_password') }}" name="confirm_password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
