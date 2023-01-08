@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Dashboard') }}</h4></div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <h6 class="mb-3 alert alert-secondary text-black">{{ __('Selamat Datang, ') }}{{ Auth::user()->name }}</h6>
                    <h3 class="card-title text-center mb-4">Data Kebun</h3>
                    <div class="container">
                        <a href="/tambah" class="btn btn-success mb-3">Tambah Data +</a>
                        <div class="row">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                            <table class="table table-dark table-hover table-bordered">
                                <thead>
                                    <tr class="table-active text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Kode Kebun</th>
                                    <th scope="col">Nama Kebun</th>
                                    <th scope="col">Luas Kebun (Meter<sup>2</sup>)</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data as $d)
                                    <tr>
                                    <th class="text-center" scope="row">{{ $no++ }}</th>
                                    <td>{{ $d->kodeKebun }}</td>
                                    <td>{{ $d->namaKebun }}</td>
                                    <td>{{ $d->luasKebun }}</td>
                                    <td class="text-center">
                                        <a href="/edit/{{ $d->id }}" class="btn btn-info">Edit</a>
                                        <button type="button" onclick="handleDelete({{ $d->id }})" class="btn btn-danger">Delete</button>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade text-black" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="deleteFunction" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('scripts')

<script>
    function handleDelete(id)
    {
        var d = document.getElementById('deleteFunction')
        d.href = "/delete/" + id
        $('#modalDelete').modal('show')
    }
</script>

@endsection