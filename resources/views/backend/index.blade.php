@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-md-12">
            <a href="{{ URL::route('backend.add') }}" class="btn btn-primary pull-right">Add</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = $persons->firstItem(); ?>
                @foreach($persons as $person)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $person->nama_lengkap }}</td>
                    <td>{{ $person->email }}</td>
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


