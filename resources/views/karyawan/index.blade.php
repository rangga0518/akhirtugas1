@extends('layouts.default')

@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="py-4">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-pen"></i></a>
            </div>

            {{--  Nampilin Flash Data --}}
            @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
            @endif
            {{--  End Flash Data --}}

            <table id="myTable" >
                <thead>
                  <tr>
                    <th >ID</th>
                    <th >Nama</th>
                    <th >Jenis Kelamin</th>
                    <th >Umur</th>
                    <th >Nomer Hp</th>
                    <th >Jabatan</th>
                    <th >Pendidikan</th>
                    <th >Status</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($karyawan as $karyawan)
                        <tr>
                        <td>{{ $loop->iteration }}</></td>
                        <td>{{ $karyawan->nama}}</td>
                        <td>{{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                        <td>{{ $karyawan->umur }}</td>
                        <td>{{ $karyawan->nomor_telepon }}</td>
                        <td>{{ $karyawan->jabatan->jabatan }}</td>
                        <td>{{ $karyawan->pendidikan->pendidikan }}</td>
                        <td>{{ $karyawan->status->status }}</td>
                        {{-- <td class="btn btn-primary">
                            <i class="fas fa-pen"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fas fa-trash"></i>
                        </td> --}}
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                
                                <a href="{{ route('karyawan.edit', ['karyawan' => $karyawan->id]) }}" class="btn btn-warning mr-4"><i class="fa-1x text-decoration-none fas fa-edit"></i></a>

                                <form action="{{ route('karyawan.destroy', ['karyawan' => $karyawan->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                          
                    @empty
                        <td colspan="8" class="text-center">Data Kosong</td>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection