@extends('welcome')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Employee</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add Employee</h5>
              <small class="text-muted float-end">Input Information</small>
            </div>
            <div class="card-body">
              <form action="{{ route('employee_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Employee :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name...." />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Email :</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email..." />
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                  </div>
                </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Image :</label>
                    <div class="col-sm-10">
                      <input type="file" accept="image/*" class="form-control" id="image" name="image" placeholder="image" />
                      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name" for="gender">Gender :</label>
                    <div class="col-sm-10">
                      <input type="radio" class="form-check-input" id="genderM" name="gender" value="Male"/>
                      <label for="genderM" class="form-check-label">Male</label>
                      <input type="radio" class="form-check-input" id="genderF" name="gender" value="Female"/>
                      <label for="genderF" class="form-check-label">Female</label>
                    </div>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  <div class="col-sm-12">
                    <label class="col-sm-2 col-form-label" for="basic-default-name" for="skills">Skills :</label>
                     <input type="checkbox" name="skills[]" value="Laravel" /> Laravel
                     <input type="checkbox" name="skills[]" value="Codeigniter" /> Codeigniter
                     <input type="checkbox" name="skills[]" value="Ajax" /> Ajax
                     <input type="checkbox" name="skills[]" value="VUE JS" /> VUE JS
                     <input type="checkbox" name="skills[]" value="MySQL" /> MySQL
                     <input type="checkbox" name="skills[]" value="API" /> API
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
