@extends('layouts.app')

@section('content')
    <h1 class="m-3">Categories</h1>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" method="post" class="d-flex align-items-center m-3">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="
        Add a category name here "
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Restaurants</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>
                        <form id="category-{{ $category->id }}"
                            action="{{ route('admin.categories.update', $category->slug) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="name"
                                value="{{ $category->name }}">
                        </form>

                    </td>

                    <td>{{ $category->restaurant && count($category->restaurant) > 0 ? count($category->restaurant) : 0 }}
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $category->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
