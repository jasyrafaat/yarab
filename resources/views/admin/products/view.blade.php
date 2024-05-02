@extends('admin.style.main')


@section('content')
<a href="{{ route("product.create") }}" class="btn btn-primary">Add Product</a>

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
              <th> price </th>
              <th> sale </th>
              <th> count </th>
              <th> cateogry </th>
              <th> image </th>
              <th> Edite/Delete </th>
            </tr>
          </thead>
          <tbody>

            @forelse ($allData as $key=>$allData )
            <tr>
              <td> {{ ++$key }}</td>
              <td> {{ $allData->name }} </td>
              <td> {{ $allData->price }} </td>
              <td> {{ $allData->sale}} </td>
              <td> {{ $allData->count}} </td>
              <td> {{ $allData->cateogry}} </td>
              <td> <img src="{{ asset('storage/images/'.$allData['images'][0]['files']) }}" alt="" srcset=""> </td>
              <td>
                <a href="{{ route('product.edit',$allData->id) }}" class="btn btn-primary">Edite</a>
                <form action="{{ route('product.destroy',$allData->id) }}" method="post">
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
