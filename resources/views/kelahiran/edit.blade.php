@extends('layouts.app')

@section('title', 'Edit Data Kelahiran')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Kelahiran</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_bayi">Nama Bayi *</label>
                                    <input type="text" class="form-control @error('nama_bayi') is-invalid @enderror" 
                                           id="nama_bayi" name="nama_bayi" value="{{ old('nama_bayi', $kelahiran->nama_bayi) }}" required>
                                    @error('nama_bayi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir *</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                           id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $kelahiran->tanggal_lahir->format('Y-m-d')) }}" required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin *</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="orangtua_id">Orang Tua *</label>
                                    <select class="form-control @error('orangtua_id') is-invalid @enderror" 
                                            id="orangtua_id" name="orangtua_id" required>
                                        <option value="">Pilih Orang Tua</option>
                                        @foreach($orangtua as $ortu)
                                            <option value="{{ $ortu->id }}" {{ old('orangtua_id', $kelahiran->orangtua_id) == $ortu->id ? 'selected' : '' }}>
                                                {{ $ortu->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('orangtua_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah *</label>
                                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" 
                                           id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $kelahiran->nama_ayah) }}" required>
                                    @error('nama_ayah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu *</label>
                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" 
                                           id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $kelahiran->nama_ibu) }}" required>
                                    @error('nama_ibu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                           id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $kelahiran->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="berat_badan">Berat Badan (kg)</label>
                                            <input type="number" step="0.01" class="form-control @error('berat_badan') is-invalid @enderror" 
                                                   id="berat_badan" name="berat_badan" value="{{ old('berat_badan', $kelahiran->berat_badan) }}">
                                            @error('berat_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="panjang_badan">Panjang Badan (cm)</label>
                                            <input type="number" step="0.01" class="form-control @error('panjang_badan') is-invalid @enderror" 
                                                   id="panjang_badan" name="panjang_badan" value="{{ old('panjang_badan', $kelahiran->panjang_badan) }}">
                                            @error('panjang_badan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_akte">No Akte Kelahiran</label>
                                    <input type="text" class="form-control @error('no_akte') is-invalid @enderror" 
                                           id="no_akte" name="no_akte" value="{{ old('no_akte', $kelahiran->no_akte) }}">
                                    @error('no_akte')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" name="alamat" rows="3">{{ old('alamat', $kelahiran->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kelahiran.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection