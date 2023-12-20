@extends('layouts.layout')

@section('title', 'Data')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Input Data Postingan</h6>
                </div>
                <form class="row g-3" action="{{ route('category-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                Simpan</button>
                            <button type="submit" class="btn btn-secondary">
                                Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
