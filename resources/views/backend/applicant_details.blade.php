@extends('backend.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-md-12">
                    <h3 class="card-title">Applicant Details</h3>
                    <div><a href="{{route('employee.edit', $applicant->id)}}" class="btn btn-info float-right">Edit</a></div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('backend.partials.message')
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{ $applicant->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $applicant->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $applicant->email }}</td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td>{{ $applicant->skill }}</td>
                    </tr>
                    <tr>
                        <th>Profession</th>
                        <td>{{ $applicant->profession }}</td>
                    </tr>
                    <tr>
                        <th>Education Qualification</th>
                        <td>{{ $applicant->education }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $applicant->birth_date }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $applicant->gender }}</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td>{{ $applicant->religion }}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{ $applicant->nationality }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img src="{{asset('storage/profile/'.$applicant->code.'/'.$applicant->photo)}}" alt="" width="20%"></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endsection
