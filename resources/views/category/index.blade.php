@extends('layouts.layout')

@section('title', 'Data')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Data Category</h6>
                </div>

                <div class="card-body">
                    <table class="table caption-top">
                        <a href="{{ route('category-create') }}" class="btn btn-primary">Create</a>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Category</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp

                            @forelse ($category as $item)
                                <tr>
                                    <td scope="row">{{ $i++ }}</td>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $item->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('category-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                        <form action="{{ route('category-destroy', $item->id) }}" method="POST">
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
        </div>
    </div>
@endsection
