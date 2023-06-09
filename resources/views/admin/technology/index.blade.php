@extends('layouts.admin')


@section('content')
<h1>Technologies</h1>
<div class="row py-5">

    <div class="col-6">
        @include('partials.errors')
        @include('partials.message')
        <form action="{{route('admin.technologies.store')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror " placeholder="new Technology" aria-label="Button" name="name" id="name">
                <button class="btn btn-outline-secondary" type="submit">Add</button>
            </div>

        </form>
    </div>
    <div class="col-6">

        <div class="table-responsive-md">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">projects Count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($technologies as $technology)
                    <tr class="">
                        <td scope="row">{{$technology->id}}</td>
                        <td>{{$technology->name}}</td>
                        <td>{{$technology->slug}}</td>
                        <td>
                            <span class="badge bg-dark">{{ $technology->projects->count()}}</span>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-info d" href="{{route('admin.technologies.edit', $technology)}}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>

                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId-{{$technology->id}}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{$technology->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$technology->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{$technology->id}}">Eliminare Definitivamente?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{$technology->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                                            <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId-{{$technology->id}}'), options)

                            </script>

                        </td>
                    </tr>
                    @empty
                    <tr class="">
                        <td scope="row"> 👈 Add your first technology </td>
                    </tr>

                    @endforelse


                </tbody>
            </table>
        </div>


    </div>

</div>
@endsection
