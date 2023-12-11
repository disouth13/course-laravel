@extends('layouts.layout')

@section('title', 'List Data')

@section('content')
    <section class="mt-3">
        <div class="card">
            <h5 class="card-header"><a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                    Tambah Post</a>
            </h5>
            <div class="card-body">
                <table class="table caption-top">
                    <caption>List of Post</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @forelse ($posts as $item)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td><img style="width: 100px" src="{{ asset('storage/posts/' . $item->image) }}"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $item->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                    <form action="{{ route('posts.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse






                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
