@extends('admin.style.main')
      <!-- partial -->
@section('content')
<a href="{{ route('admin.create') }}">add User</a>
{{ Auth::guard("admin")->user()->id??"" }}
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Inverse table</h4>
        <p class="card-description"> Add class <code>.table-dark</code>
        </p>
        <table class="table table-dark">
          <thead>
            <tr>
              <th> # </th>
              <th>  name </th>
              <th> Email </th>
              <th> Gender </th>
              <th> Edite/Delete </th>
            </tr>
          </thead>
          <tbody>

            @forelse ($admins as $key=>$admin )
            <tr>
              <td> {{ ++$key }}</td>
              <td> {{ $admin->name }} </td>
              <td> {{ $admin->email }} </td>
              <td> {{ $admin->gender==1?"male":"female" }} </td>
              <td>
                <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-primary">Edite</a>
                <form action="{{ route('admin.destroy',$admin->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger">
                    </form>

            </td>
            </tr>

            @empty

            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
