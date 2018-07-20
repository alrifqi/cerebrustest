@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = $persons->firstItem(); ?>
                @foreach($persons as $person)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $person->nama_lengkap }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->no_telepon }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            @include('layouts.pagination', ['data'=>$persons])
          </div>
        </div>
      </div>
    </div> 
  </div>
@endsection


