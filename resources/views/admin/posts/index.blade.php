@extends('layouts.admin')

@section('content')
<div class="container">

    @if (session('message'))
    <div class="alert alert-primary" role="alert">
        <strong>{{session('message')}}</strong>
    </div>

    @endif

    <h1>POSTS</h1>


    <a class="btn btn-primary my-3" href="{{route('admin.projects.create')}}" role="button">Create new post</a>

    <div class="table-responsive">
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">SLUG</th>
                    <th scope="col">DESCRIPTION</th>
                    <th class="col-2" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($posts as $post)
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td>
                        <img width="100" class="img-fluid" src="{{$post->image}}" alt="{{$post->title}}">
                    </td>

                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->text}}</td>
                    <td>
                        <div class="row row-cols-3">

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{route('admin.posts.show', $post)}}" role="button"><i class="fas fa-eye fa-sm fa-fw"></i></a>
                            </div>

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{ route('admin.posts.edit', $post) }}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                            </div>
                            <div class="icon d-inline">
                                <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-sm fa-fw w-50"></i>
                                    </button>
                                </form>
                            </div>

                    </td>

                </tr>

                @empty
                <tr class="">
                    <td>No results</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>

</div>



@endsection
