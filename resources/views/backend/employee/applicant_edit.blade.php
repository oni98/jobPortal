@extends('backend.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-md-6">
                    <h3 class="card-title">Edit Applicant Details</h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('backend.partials.message')
                <form action="{{ route('employee.update', $applicant->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td><input name="name" value="{{ $applicant->name }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><input name="phone" value="{{ $applicant->phone }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input name="email" value="{{ $applicant->email }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Skills</th>
                            <td><input name="skill" value="{{ $applicant->skill }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Profession</th>
                            <td><input name="profession" value="{{ $applicant->profession }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Education Qualification</th>
                            <td>
                                <select id="education" name="education" class="form-control">
                                    <option value="Masters or equivalent or more"
                                        {{ $applicant->education == 'Masters or equivalent or more' ? 'selected' : '' }}>
                                        Masters or equivalent or more</option>
                                    <option value="Honors or equivalent"
                                        {{ $applicant->education == 'Honors or equivalent' ? 'selected' : '' }}> Honors or
                                        equivalent</option>
                                    <option value="HSC or equivalent"
                                        {{ $applicant->education == 'HSC or equivalent' ? 'selected' : '' }}> HSC or
                                        equivalent</option>
                                    <option value="SSC or equivalent"
                                        {{ $applicant->education == 'SSC or equivalent' ? 'selected' : '' }}>SSC or
                                        equivalent </option>
                                    <option value="under SSC"
                                        {{ $applicant->education == 'under SSC' ? 'selected' : '' }}> under SSC </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td><input name="birth_date" value="{{ $applicant->birth_date }}" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="Male" {{ $applicant->gender == 'Male' ? 'selected' : '' }}> Male
                                    </option>
                                    <option value="Female" {{ $applicant->gender == 'Female' ? 'selected' : '' }}> Female
                                    </option>
                                    <option value="Other" {{ $applicant->gender == 'Other' ? 'selected' : '' }}> Other
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>
                                <select id="religion" name="religion" class="form-control">
                                    <option value="Islam" {{ $applicant->religion == 'Islam' ? 'selected' : '' }}> Islam
                                    </option>
                                    <option value="Hindu" {{ $applicant->religion == 'Hindu' ? 'selected' : '' }}> Hindu
                                    </option>
                                    <option value="Cristian" {{ $applicant->religion == 'Cristian' ? 'selected' : '' }}>
                                        Cristian </option>
                                    <option value="Buddhism" {{ $applicant->religion == 'Buddhism' ? 'selected' : '' }}>
                                        Buddhism </option>
                                    <option value="Other" {{ $applicant->religion == 'Other' ? 'selected' : '' }}> Other
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td><input name="nationality" value="{{ $applicant->nationality }}" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" name="photo" class="form-control-file">
                                <img src="{{ asset('storage/profile/' . $applicant->code . '/' . $applicant->photo) }}"
                                    alt="" width="20%">
                            </td>
                        </tr>
                        <tr><td colspan="2"><button class="btn btn-info btn-block">Update</button></td></tr>
                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endsection
