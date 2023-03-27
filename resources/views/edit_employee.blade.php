@extends('welcome')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Employee</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Employee</h5>
              <small class="text-muted float-end">Edit Information</small>
            </div>
            <div class="card-body">
              <form action="{{ route('employee_update',$employee->id) }}" method="post">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" />
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Gender</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="gender" name="gender" value="{{ $employee->gender }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="skill" name="skill" value="{{ $employee->skill }}" />
                    </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
@endsection