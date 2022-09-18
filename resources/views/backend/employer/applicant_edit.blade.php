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
                <form action="{{ route('employer.update', $applicant->id) }} " method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th>Company Name</th>
                            <td><input class="form-control" type="text" name="company_name" value="{{ $applicant->company_name }} "></td>
                        </tr>
                        <tr>
                            <th>Company Phone</th>
                            <td><input class="form-control" type="text" name="company_phone" value="{{ $applicant->company_phone }} "></td>
                        </tr>
                        <tr>
                            <th>Company Address</th>
                            <td><input class="form-control" type="text" name="company_address" value="{{ $applicant->company_address }} "></td>
                        </tr>
                        <tr>
                            <th>Enterpreneur</th>
                            <td><select id="entrepreneur" name="entrepreneur" class="form-control">
                                <option value="Yes" {{($applicant->enterpreneur == 'Yes')? 'selected' : ''}}> Yes </option>
                                <option value="No" {{($applicant->enterpreneur == 'No')? 'selected' : ''}}> No </option>
                            </select></td>
                        </tr>
                        <tr>
                            <th>Business Type</th>
                            <td><input class="form-control" type="text" name="business_type" value="{{ $applicant->business_type }} "></td>
                        </tr>
                        <tr>
                            <th>Business Description</th>
                            <td><input class="form-control" type="text" name="business_description" value="{{ $applicant->business_description }} "></td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td><input class="form-control" type="text" name="website" value="{{ $applicant->website }} "></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input class="form-control" type="text" name="email" value="{{ $applicant->email }} "></td>
                        </tr>
                        <tr>
                            <th>Trade License</th>
                            <td>
                                <a href="{{asset('storage/employer/'.$applicant->code.'/'.$applicant->trade_license)}}" download> Click to download Trade License
                            </a>
                            <input type="file" name="trade_license" class="form-control-file" id="trade_license">
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
