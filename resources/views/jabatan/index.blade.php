@extends('layouts.default')
@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="py-4">
                <a href="{{ route('jabatan.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-pen"></i></a>
            </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($jabatan as $jabatans)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jabatans->jabatan }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        
                                        <a href="{{ route('jabatan.edit', ['jabatan' => $jabatans->id]) }}" class="btn btn-warning mr-4"><i class="fa-1x text-decoration-none fas fa-edit"></i></a>

                                        <form action="{{ route('jabatan.destroy', ['jabatan' => $jabatans->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <td colspan="4" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection