@extends('layouts.layout')

@section('title', 'Data')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Input Data Postingan</h6>
                </div>
                <form class="row g-3" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="Title" class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control  @error('title')
                            is-invalid
                        @enderror">
                            @error('title')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea type="text" name="content"
                                class="form-control @error('content')
                            is-invalid
                    @enderror">
                        {{ old('content') }}</textarea>
                            @error('content')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">


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
