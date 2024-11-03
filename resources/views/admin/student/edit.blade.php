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
                                            <input type="text" class="form-control" required
                                                value="{{ old('name', $getRecord->name) }}" name="name"
                                                placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Last Name<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required
                                                value="{{ old('last_name', $getRecord->last_name) }}" name="last_name"
                                                placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Addmission Number<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control"
                                                value="{{ old('addmission_number', $getRecord->addmission_number) }}"
                                                name="addmission_number" placeholder="Addmission Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Roll Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('roll_number', $getRecord->roll_number) }}" name="roll_number"
                                                placeholder="Roll Rumber">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Class<span style="color: red;"> *</span></label>
                                            <select class="form-control" required name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach ($getAllClass as $class)
                                                    <option
                                                        {{ old('class_id', $getRecord->class_id) == $class->id ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Gender<span style="color: red;"> *</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                                    value="Male">
                                                    Male</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                                    value="Female">Female</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Others' ? 'selected' : '' }}
                                                    value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Date Of Birth<span style="color: red;"> *</span></label>
                                            <input type="date" class="form-control" required
                                                value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                                                name="date_of_birth" placeholder="Date Of Birth">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Religion</label>
                                            <select class="form-control" name="religion">
                                                <option value="">Select Religion</option>
                                                <option
                                                    {{ old('religion', $getRecord->religion) == 'Islam' ? 'selected' : '' }}
                                                    value="Islam">Islam</option>
                                                <option
                                                    {{ old('religion', $getRecord->religion) == 'Hindu' ? 'selected' : '' }}
                                                    value="Hindu">Hindu</option>
                                                <option
                                                    {{ old('religion', $getRecord->religion) == 'Christian' ? 'selected' : '' }}
                                                    value="Christian">Christian</option>
                                                <option
                                                    {{ old('religion', $getRecord->religion) == 'Buddha' ? 'selected' : '' }}
                                                    value="Buddha">Buddha</option>
                                                <option
                                                    {{ old('religion', $getRecord->religion) == 'Others' ? 'selected' : '' }}
                                                    value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_group">
                                                <option value="">Select Blood Group</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'A+' ? 'selected' : '' }}
                                                    value="A+">A+</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'A-' ? 'selected' : '' }}
                                                    value="A-">A-</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'B+' ? 'selected' : '' }}
                                                    value="B+">B+</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'B-' ? 'selected' : '' }}
                                                    value="B-">B-</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'O+' ? 'selected' : '' }}
                                                    value="O+">O+</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'O-' ? 'selected' : '' }}
                                                    value="O-">O-</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'AB-' ? 'selected' : '' }}
                                                    value="AB-">AB-</option>
                                                <option
                                                    {{ old('blood_group', $getRecord->blood_group) == 'AB+' ? 'selected' : '' }}
                                                    value="AB+">AB+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Admission Date<span style="color: red;"> *</span></label>
                                            <input type="date" class="form-control" required
                                                value="{{ old('admission_date', $getRecord->admission_date) }}"
                                                name="admission_date" placeholder="Admission Date">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                                                name="mobile_number" placeholder="Mobile Rumber">
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Caste</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('caste', $getRecord->caste) }}" name="caste"
                                                placeholder="Caste">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                            @if (!empty($getRecord->getImage()))
                                                <img src="{{ $getRecord->getImage() }}" style="width: auto; height:50px;"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Height</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('height', $getRecord->height) }}" name="height"
                                                placeholder="Height">
                                            <div style="color: red">{{ $errors->first('height') }}</div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Weight</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('weight', $getRecord->weight) }}" name="weight"
                                                placeholder="Weight">
                                            <div style="color: red">{{ $errors->first('weight') }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label>Email<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" required
                                                value="{{ old('email', $getRecord->email) }}" name="email"
                                                placeholder="email">
                                            <div style="color: red">{{ $errors->first('email') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Status</label>
                                            <select class="form-control" required name="status">
                                                <option {{ old('status', $getRecord->status) == '0' ? 'selected' : '' }}
                                                    value="0">Active</option>
                                                <option {{ old('status', $getRecord->status) == '1' ? 'selected' : '' }}
                                                    value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-8">
                                            <label>Password</label>
                                            <input type="text" class="form-control" value="{{ old('password') }}"
                                                name="password" placeholder="Password">
                                            <p class="text-blue">If you want to change password please add new password.
                                            </p>
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
