@extends('backend.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-md-6">
                    <h3 class="card-title">Employee Application List</h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('backend.partials.message')
                <button class="excel-btn" onclick="ExportToExcel('xlsx')"><i class="fas fa-file-excel"></i></button>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tbl_exporttable_to_xls1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Skills</th>
                                <th>Profession</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $employee->code }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->skill }}</td>
                                    <td>{{ $employee->profession }}</td>
                                    <td>
                                        <a href="{{ route('employee.view', $employee->id) }}" class="btn btn-primary"
                                            title="View Details"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-danger" href="{{ route('employee.destroy', $employee->id) }}"
                                            class="nav-link" title="Delete Application"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $employee->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $employee->id }}"
                                            action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                            style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endsection

@push('custom_script')
    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('tbl_exporttable_to_xls1');
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            return dl ?
                XLSX.write(wb, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                }) :
                XLSX.writeFile(wb, fn || ('EmployeeList.' + (type || 'xlsx')));
        }
    </script>
@endpush
