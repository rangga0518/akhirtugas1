@extends('layouts.default')

@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id='nama' name='nama' value="{{ old('nama') }}">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                        Laki-Laki
                    </option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="jabatan_id">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->jabatan_id ? 'selected' : '' }}>
                            {{ $jabatan->jabatan }}
                        </option>
                    @endforeach
                    </select>
                    @error('jabatan_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" {{ old('status_id') == $status->status ? 'selected' : '' }}>
                                        {{ $status->status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="nomor_telepon">No Hp</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" autocomplete="off" value="{{ old('nomor_telepon') }}">
                            @error('nomor_telepon')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" name="umur" id="umur" class="form-control @error('umur') is-invalid @enderror" placeholder="Umur" autocomplete="off" value="{{ old('umur') }}">
                        @error('umur')
                            {{ $message }}
                        @enderror
                </div>
                    <div class="form-group">
                        <label for="pendidikan_id">Pendidikan</label>
                        <select name="pendidikan_id" id="pendidikan_id" class="form-control @error('pendidikan_id') is-invalid @enderror">
                            @foreach ($pendidikans as $pendidikan)
                                <option value="{{ $pendidikan->id }}" {{ old('pendidikan_id') == $pendidikan->pendidikan ? 'selected' : '' }}>
                                    {{ $pendidikan->pendidikan }}
                                </option>
                            @endforeach
                        </select>
                    @error('pendidikan_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary mb-2">Save</button>
        </form>
      </div>
    </div>
</div>
@endsection