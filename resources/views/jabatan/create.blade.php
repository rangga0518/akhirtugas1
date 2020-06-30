@extends('layouts.default')
@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">          
                <div class="card">
                    <div class="card-header text-center">Form Jabatan</div>
                    <div class="card-body">
                        <form action="{{ route('jabatan.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="jabatan" autocomplete="off" value="{{ old('jabatan') }}">
                                        @error('jabatan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection