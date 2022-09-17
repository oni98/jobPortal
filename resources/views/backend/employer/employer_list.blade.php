@extends('backend.layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header row">
          <div class="col-md-6"><h3 class="card-title">Employer Application List</h3></div> 
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('backend.partials.message')
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>SL</th>
              <th>Id</th>
              <th>Company Name</th>
              <th>Company Phone</th>
              <th>Company Address</th>
              <th>Business Type</th>
              <th>Website</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($employers as $employer)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $employer->code }}</td>
                    <td>{{ $employer->company_name }}</td>
                    <td>{{ $employer->company_phone }}</td>
                    <td>{{ $employer->company_address }}</td>
                    <td>{{ $employer->business_type }}</td>
                    <td><a href="https://{{ $employer->website }}" target="_blank">{{ $employer->website }}</a></td>
                    <td>
                        <a href="{{route('employer.view', $employer->id)}}" class="btn btn-primary" title="View Details"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger" href="{{ route('employer.destroy', $employer->id) }}" class="nav-link" title="Delete Application"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{$employer->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="delete-form-{{$employer->id}}" action="{{ route('employer.destroy', $employer->id) }}" method="POST" style="display: none;">
                          @method('DELETE')
                            @csrf
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div><!-- /.container-fluid -->
@endsection