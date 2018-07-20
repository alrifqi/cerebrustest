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
                <form method="post" action="{{ URL::route('backend.create') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        <span class="help-block">
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group @if($errors->has('nama')) has-error @endif">
                        <label for="nama">Nama Lengkap</label>
                        <input type="nama" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                        <span class="help-block">
                            @if($errors->has('nama'))
                                {{ $errors->first('nama') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group @if($errors->has('telepon')) has-error @endif">
                        <label for="telepon">No. Telepon</label>
                        <input type="text" class="form-control" id="telepon" placeholder="No Telepon" name="telepon" value="{{ old('telepon') }}">
                        <span class="help-block">
                            @if($errors->has('telepon'))
                                {{ $errors->first('telepon') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group @if($errors->has('tgl_lahir')) has-error @endif">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tgl Lahir" name="tgl_lahir" data-date-format="yyyy-mm-dd" value="{{ old('tgl_lahir') }}">
                        <span class="help-block">
                            @if($errors->has('tgl_lahir'))
                                {{ $errors->first('tgl_lahir') }}
                            @endif
                        </span>
                    </div>

                    <div class="form-group @if($errors->has('alamat')) has-error @endif">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" row="3">{{ old('alamat') }}</textarea>
                        <span class="help-block">
                            @if($errors->has('alamat'))
                                {{ $errors->first('alamat') }}
                            @endif
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                        <input type="submit" value="Batal" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $('#tgl_lahir').datepicker();
        $('#telepon').keydown(function(e){
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 || (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@endsection