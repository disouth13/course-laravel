@extends('layouts.layout')

@section('title', 'Edit Data')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Input Data Postingan</h6>
                </div>
                <form class="row g-3" action="{{ route('posts.update', $post->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="Title" class="form-label ">Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                class="form-control @error('title')
                                is-invalid
                            @enderror"
                                id="title">
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
                            @enderror"
                                id="content">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Image</label>
                            <input type="file" name="image"
                                class="form-control @error('image')
                                is-invalid
                            @enderror"
                                id="uploadGambar">

                            <img src="{{ asset('storage/posts/' . $post->image) }}" style="width: 100px;" alt=""
                                srcset="">
                            @error('image')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                Simpan</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
