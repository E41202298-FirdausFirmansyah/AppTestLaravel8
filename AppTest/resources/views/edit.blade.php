@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Edit Data Kebun</h3>
                    <div class="container">
                        <div class="row">
                            @foreach($data as $d)
                            <form action="/update" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mb-4">
                                    <input type="hidden" class="form-control" name="id" value="{{ $d->id }}">
                                </div><div class="form-group mb-4">
                                    <label for="InputKodeKebun">Kode Kebun</label>
                                    <input type="text" class="form-control" name="kodeKebun" required="required" placeholder="Masukkan Kode Kebun" value="{{ $d->kodeKebun }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="InputNamaKebun">Nama Kebun</label>
                                    <input type="text" class="form-control" name="namaKebun" required="required" placeholder="Masukkan Nama Kebun" value="{{ $d->namaKebun }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="InputLuasKebun">Luas Kebun (Meter<sup>2</sup>)</label>
                                    <input type="text" class="form-control" name="luasKebun" required="required" placeholder="Masukkan Luas Kebun" value="{{ $d->luasKebun }}">
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/home" class="btn btn-warning">Kembali</a>
                            </form>
                            @endforeach
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection