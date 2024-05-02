@extends('admin.style.main')



@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>
    <form class="forms-sample" action="{{ route('admin.update',$admin->id) }}" method="post">
        @csrf
        @method('PUT')
    <div class="form-group">
    <div style="color:red">@error('name') {{ $message }} @enderror</div>
    <label for="exampleInputName1">Name</label>
    <input value="{{ $admin->name??old('name') }}" type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
    </div>
    <div class="form-group">
        <div style="color:red">@error('email') {{ $message }} @enderror</div>
    <label for="exampleInputEmail3">Email address</label>
    <input value="{{ $admin->email??old('email') }}" type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
    </div>

    <div class="form-group">
        <div style="color:red">@error('gender') {{ $message }} @enderror</div>
    <label for="exampleSelectGender">Gender</label>
    <select name="gender" class="form-control" id="exampleSelectGender">
    <option value="1"   @selected($admin->gender==1)>Male</option>
    <option value="0"   @selected($admin->gender==0)>Female</option>
    </select>
    </div>

    <div class="form-group">
        <div style="color:red">@error('permission') {{ $message }} @enderror</div>
        @foreach (config('permissions')["permission"] as $per)
        <div class="form-check">
          <label class="form-check-label">
            <input @foreach ($admin->permission as  $admin_per)   @checked($per==$admin_per)      @endforeach
             type="checkbox" name="permission[]" value="{{ $per }}" class="form-check-input"> {{ $per }}
             <i class="input-helper"></i></label>
        </div>

        @endforeach

      </div>



    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
    <button class="btn btn-light">Cancel</button>
    </form>
    </div>
@endsection

