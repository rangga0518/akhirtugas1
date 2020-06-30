@extends('layouts.default')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Form Pendidikan</div>
                    <div class="card-body">
                        <form action="{{ route('status.update', ['status' => $status->id ]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="custom-select" name="status" id="status" class="form-control" >
                                            <option value="Karyawan Magang" {{ (old('status') ??$status->status ) == 'Karyawan Magang' ? 'selected' : '' }}>
                                                Karyawan Magang
                                            </option>
                                            <option value="Karyawan Kontrak" {{ (old('status') ??$status->status ) == 'Karyawan Kontrak' ? 'selected' : '' }}>
                                                Karyawan Kontrak
                                            </option>
                                            <option value="Karyawan Tetap" {{ (old('status') ??$status->status ) == 'Karyawan Tetap' ? 'selected' : '' }}>
                                                Karyawan Tetap
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