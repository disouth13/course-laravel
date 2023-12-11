@extends('layouts.layout')

@section('title', 'Data Show')

@section('content')
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/posts/' . $post->image) }}" class="card-img-top" alt="Test">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
