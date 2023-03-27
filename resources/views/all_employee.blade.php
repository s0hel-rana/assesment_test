@extends('welcome')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Employee</h4>
        <div class="card">
            <h5 class="card-header"><a class="btn btn-sm btn-info" href="{{ route('add_employee') }}">Add Employee</a></h5>
            <h5 class="card-header">Available Employee Information</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                 {{-- @if (count($employees) > 0) --}}
                 @foreach ($employees as $key => $employee )
                 <tr>
                   <td>{{ ++$key }}</td>
                   <td>{{ $employee->name }}</td>
                   <td>{{ $employee->email }}</td>
                   <td><img src="{{ asset('/upload/'.$employee->image) }}" alt="" style="height:80px;width:120px;"></td>
                   <td>{{ $employee->gender }}</td>
                   <td>{{ $employee->skill }}</td>
                   {{-- <td>
                       @php
                           $skill = json_decode($employee->skill)
                       @endphp
                       @foreach ($skill as $skil )
                           {{ $skil }}
                       @endforeach
                   </td> --}}
                   <td>
                       <a href="{{ route('employee_edit',$employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                       <a href="{{ route('employee_delete',$employee->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                   </td>
                 </tr>
                 @endforeach

                 {{-- @else
                     <tr>
                        <td colspan="3">Employe not found!</td>
                     </tr>
                 @endif --}}
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection