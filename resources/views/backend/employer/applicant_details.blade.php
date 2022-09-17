@extends('backend.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-md-12">
                    <h3 class="card-title">Applicant Details</h3>
                    <div><a href="{{route('employer.edit', $applicant->id)}}" class="btn btn-info float-right">Edit</a></div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('backend.partials.message')
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Company Name</th>
                        <td>{{ $applicant->company_name }}</td>
                    </tr>
                    <tr>
                        <th>Company Phone</th>
                        <td>{{ $applicant->company_phone }}</td>
                    </tr>
                    <tr>
                        <th>Company Address</th>
                        <td>{{ $applicant->company_address }}</td>
                    </tr>
                    <tr>
                        <th>Enterpreneur</th>
                        <td>{{ $applicant->entrepreneur }}</td>
                    </tr>
                    <tr>
                        <th>Business Type</th>
                        <td>{{ $applicant->business_type }}</td>
                    </tr>
                    <tr>
                        <th>Business Description</th>
                        <td>{{ $applicant->business_description }}</td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td><a href="https://{{ $applicant->website }}" target="_blank">{{ $applicant->website }}</a></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $applicant->email }}</td>
                    </tr>
                    <tr>
                        <th>Trade License</th>
                        <td><a href="{{asset('storage/employer/'.$applicant->code.'/'.$applicant->trade_license)}}" download> Click to download Trade License
                        </a></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endsection
