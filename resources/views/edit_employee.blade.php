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
              <form action="{{ route('employee_update',$employee->id) }}" method="post" enctype="multipart/form-data">
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

                <div class="mb-3">
                  <label for="" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                      <input type="file" id="image" class="form-control" name="image">
                  </div>
              </div>
              <div class="mb-3">
                  <div class="col-sm-10">
                      <img class="card-img-top img-fluid img-thumbnail rounded" height="250" width="250" id="showImage" src="{{ asset('upload') }}/{{ $employee->image }}" alt="Card image cap" style="width: 12rem">
                  </div>
              </div>
              
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Gender</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="Male" {{ ($employee->gender == 'Male')? 'checked': '' }} >Male
                        <input type="radio" name="gender" value="Female" {{ ($employee->gender == 'Female')? 'checked': '' }}>Female
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="col-sm-2 col-form-label" for="basic-default-name" for="skills">Skills :</label>
                     <input type="checkbox" name="skills[]" value="Laravel" {{ (Str::contains($employee->skills, 'Laravel'))? 'checked':'' }}/> Laravel
                     <input type="checkbox" name="skills[]" value="Codeigniter" {{ (Str::contains($employee->skills, 'Codeigniter'))? 'checked': '' }}> Codeigniter
                     <input type="checkbox" name="skills[]" value="Ajax" {{ (Str::contains($employee->skills, 'Ajax'))? 'checked': '' }} > Ajax
                     <input type="checkbox" name="skills[]" value="VUE JS" {{ (Str::contains($employee->skills, 'VUE JS'))? 'checked': '' }} > VUE JS
                     <input type="checkbox" name="skills[]" value="MySQL" {{ (Str::contains($employee->skills, 'MySQL'))? 'checked': '' }} > MySQL
                     <input type="checkbox" name="skills[]" value="API" {{ (Str::contains($employee->skills, 'API'))? 'checked': '' }}  > API
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $('#image').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => {
              $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
      });
  });
</script>
@endsection
