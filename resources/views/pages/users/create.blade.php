@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>



                <div class="card">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')
                                is-invalid
                            @enderror"
                                        name="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                            {{-- <div class="form-group">
                                <label>Position</label>
                                <input type="text"
                                    class="form-control @error('position')
                                is-invalid
                            @enderror"
                                    name="position">
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text"
                                    class="form-control @error('department')
                                is-invalid
                            @enderror"
                                    name="department">
                                @error('department')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="employee" class="form-label">Employee</label>
                                <input type="text" class="form-control" name="employee" id="employee" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="admin" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="supervisor" class="selectgroup-input">
                                        <span class="selectgroup-button">Supervisor</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="staff" class="selectgroup-input">
                                        <span class="selectgroup-button">Staff</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-employee">
            <div class="modal-dialog modal-lg" role="main">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Employee</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Employees</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="search">Search</label>
                                    <input type="search" class="form-control" id="search">
                                </div>
                                <table class="table table-hover" id="employee-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            {{-- <th scope="col">Jabatan</th> --}}
                                            <th scope="col">Position</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->id }}</td>
                                                <td>{{ $employee->name }}</td>
                                                {{-- <td>{{ $employee->jabatan->title}}</td> --}}
                                                <td>{{ $employee->position->title }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary select-employee"
                                                        data-employee-id="{{ $employee->id }}"
                                                        data-employee-name="{{ $employee->name }}">Select</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#employee').click(function() {
                $('#modal-employee').modal('show');
            });
        });
        // $(document).ready(function() {
        //     $('.select-employee').click(function() {
        //         var employeeId = $(this).data('employee-id');
        //         var employeeName = $(this).data('employee-name');
        //         $('#employee').val(employeeName);
        //         $('#employee_id').val(employeeId);
        //         $('#modal-employee').modal('hide');
        //     });
        // });
        $(document).ready(function() {
            $('#search').keyup(function() {
                var searchText = $(this).val().toLowerCase();

                // Loop through all table rows
                $('#employee-table tbody tr').each(function() {
                    var employeeName = $(this).find('td:eq(1)').text().toLowerCase();

                    // If the search text is found in the employee name, show the row, otherwise hide it
                    if (employeeName.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        $(document).ready(function() {
            $('.select-employee').on('click', function() {
                var employeeId = $(this).data('employee-id');
                var employeeName = $(this).data('employee-name');

                // Set the selected employee in the form select element
                $('#employee').append($('<option>', {
                    value: employeeId,
                    text: employeeName
                }));
                // Close the modal
                $('#modal-employee').modal('hide');
            });
        });
    </script>
@endpush
