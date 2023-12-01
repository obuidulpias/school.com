@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
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
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>First Name <span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required value="{{ old('name') }}"
                                                name="name" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Last Name<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required
                                                value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Addmission Number<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('addmission_number') }}" name="addmission_number"
                                                placeholder="Addmission Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Roll Number</label>
                                            <input type="text" class="form-control" value="{{ old('roll_number') }}"
                                                name="roll_number" placeholder="Roll Rumber">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Class<span style="color: red;"> *</span></label>
                                            <select class="form-control" required name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach ($getAllClass as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Gender<span style="color: red;"> *</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth<span style="color: red;"> *</span></label>
                                            <input type="date" class="form-control" required
                                                value="{{ old('date_of_birth') }}" name="date_of_birth"
                                                placeholder="Date Of Birth">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Religion</label>
                                            <select class="form-control" name="religion">
                                                <option value="">Select Religion</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Christian">Buddha</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_group">
                                                <option value="">Select Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Admission Date<span style="color: red;"> *</span></label>
                                            <input type="date" class="form-control" required
                                                value="{{ old('admission_date') }}" name="admission_date"
                                                placeholder="Admission Date">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number') }}"
                                                name="mobile_number" placeholder="Mobile Rumber">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Caste</label>
                                            <input type="text" class="form-control" value="{{ old('caste') }}"
                                                name="caste" placeholder="Caste">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Height</label>
                                            <input type="text" class="form-control" value="{{ old('height') }}"
                                                name="height" placeholder="Height">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" value="{{ old('weight') }}"
                                                name="weight" placeholder="Weight">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Email<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required
                                                value="{{ old('email') }}" name="email" placeholder="email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Password<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required
                                                value="{{ old('password') }}" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Status</label>
                                            <select class="form-control" required name="status">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
