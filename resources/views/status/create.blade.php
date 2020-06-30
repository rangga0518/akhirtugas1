@extends('layouts.default')
@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="py-4">
                <div class="card">
                    <div class="card-header text-center">Form Pendidikan</div>
                    <div class="card-body">
                        <form action="{{ route('status.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="custom-select @error('status') is-invalid @enderror" name="status" id="status"  >
                                            <option value="Karyawan magang" {{ old('status') == 'Karyawan magang' ? 'selected' : '' }}>
                                                Karyawan Magang
                                            </option>
                                            <option value="Karyawan kontrak" {{ old('status') == 'Karyawan kontrak' ? 'selected' : '' }}>
                                                Karyawan Kontrak
                                            </option>
                                            <option value="Karyawan Tetap" {{ old('status') == 'Karyawan Tetap' ? 'selected' : '' }}>
                                                Karyawan Tetap
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-primary">Save</button>
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