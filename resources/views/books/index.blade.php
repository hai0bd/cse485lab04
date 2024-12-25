@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Books List</h1>

        {{-- Thông báo thành công --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-smcd  btn-block">
                <i class="bi bi-plus-circle"></i> Add
            </a>
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Author</th>
                <th class="text-center">Category</th>
                <th class="text-center">Year</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($book as $book)
                <tr>
                    <td class="text-center">{{ $book->id }}</td>
                    <td class="text-start">{{ $book->name }}</td>
                    <td class="text-start">{{ $book->author }}</td>
                    <td class="text-start">{{ $book->category }}</td>
                    <td class="text-center">{{ $book->year }}</td>
                    <td class="text-center">{{ $book->quantity }}</td>
                    <td class="text-center">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> <!-- View Icon -->
                        </a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> <!-- Edit Icon -->
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                                <i class="bi bi-trash"></i> <!-- Delete Icon -->
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
   

@endsection