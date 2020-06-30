@extends('layouts.default')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Form Pendidikan</div>
                    <div class="card-body">
                        <form action="{{ route('pendidikan.update', ['pendidikan' => $pendidikan->id ]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nama_pendidikan">Nama Pendidikan</label>
                                        <select class="custom-select" name="pendidikan" id="pendidikan" class="form-control" >
                                            <option value="SD" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'SD' ? 'selected' : '' }}>
                                                SD
                                            </option>
                                            <option value="SMP" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'SMP' ? 'selected' : '' }}>
                                                SMP
                                            </option>
                                            <option value="SMA/SMK" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'SMA/SMK' ? 'selected' : '' }}>
                                                SMA/SMK
                                            </option>
                                            <option value="D3" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'D3' ? 'selected' : '' }}>
                                                D3
                                            </option>
                                            <option value="S1" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'S1' ? 'selected' : '' }}>
                                                S1
                                            </option>
                                            <option value="S2" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'S2' ? 'selected' : '' }}>
                                                S2
                                            </option>
                                            <option value="S3" {{ (old('pendidikan') ?? $pendidikan->pendidikan )== 'S3' ? 'selected' : '' }}>
                                                S3
                                            </option>
                                        </select>
                                    </div>
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
</div>
@endsection