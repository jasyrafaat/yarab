@extends('admin.style.main')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" action="{{ route("product.store") }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">price</label>
            <input type="text" class="form-control" name="price" id="exampleInputEmail3" placeholder="price">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">sale</label>
            <input type="text" class="form-control" name="sale" id="exampleInputPassword4" placeholder="sale">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">count</label>
            <input type="text" class="form-control" name="count" id="exampleInputPassword4" placeholder="count">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">cateogry</label>
            <select name="cateogry" class="form-control" id="exampleSelectGender">
                @foreach (config("cateogry.cat") as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" multiple name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>

          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
