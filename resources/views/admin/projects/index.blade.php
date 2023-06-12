@extends('layouts.admin')

@section('content')
<div class="container">

    @include('partials.message')

    <h1>MY PROJECTS</h1>


    <a class="btn btn-primary my-3" href="{{route('admin.projects.create')}}" role="button">Create new Project</a>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">SLUG</th>
                    <th scope="col-4">DESCRIPTION</th>
                    <th scope="col">TIPOLOGIA</th>
                    <th scope="col">TECHNOLOGI</th>
                    <th class="col-2" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($projects as $project)
                <tr>
                    <td scope="row">{{$project->id}}</td>
                    <td>
                        <img width="100" class="img-fluid" src="{{ asset('storage/' . $project->image)}}" alt="{{$project->title}}">
                    </td>

                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>
                        <div class="col">
                            <p>{{$project->description}}</p>
                        </div>
                    </td>
                    <td>
                        @if ($project->type)
                        <div class="">
                            {{$project->type->name}}
                        </div>
                        @else
                        <div class="">
                            nessun type disponibile
                        </div>
                        @endif

                    </td>
                    <td>
                        <ul>
                            @forelse($project->technologies as $technology)
                            <li>{{$technology?->name}}</li>
                            @empty
                            <li class=" list-unstyled">nessuna technology selezionata</li>
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <div class="row row-cols-3">

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{route('admin.projects.show', $project)}}" role="button"><i class="fas fa-eye fa-sm fa-fw"></i></a>
                            </div>

                            <div class="icon d-inline">
                                <a name="" id="" class="bg-violet-500 btn btn-primary w-1rem" href="{{ route('admin.projects.edit', $project) }}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                            </div>

                            <div class="icon d-inline">

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger w-1rem" data-bs-toggle="modal" data-bs-target="#modal-{{$project->id}}">
                                    <i class="fas fa-trash fa-sm fa-fw w-50 "></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="modalTitle-{{$project->id}}">Eliminare definitivamente questo progetto?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-bg-warning text-uppercase">
                                                {{$project->title}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                                <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">YES</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Optional: Place to the bottom of scripts -->
                                <script>
                                    const myModal = new bootstrap.Modal(document.getElementById('modal-{{$project->id}}'), options)

                                </script>
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
