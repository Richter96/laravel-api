@extends('layouts.admin')


@section('content')
<div class="container-md">


    <div class="row justify-content-center g-2 py-4">
        <div class="col">
            @include('partials.errors')
            @include('partials.message')
            <form action="{{route('admin.types.store',)}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">NOME</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="inserisci nome type" aria-label="Username" aria-describedby="name" name="name" id="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="image">LINK IMMAGINE</span>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" placeholder="link immagine" aria-label="link immagine" aria-describedby="image" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-light">Add</button>
            </form>
        </div>
        <div class="col">
            <div class="container">
                <div class="row row-cols-2 g-4">
                    @foreach ($types as $type)
                    <div class="col d-flex">
                        <div class="card">
                            <div class="card-header">
                                <img class="card-img-top" src="{{$type->image}}" alt="{{$type->name}}">
                            </div>
                            <div class="card-body text_card">
                                <h4 class="card-title">{{$type->name}}</h4>
                                <a name="" id="" class="btn btn-info" href="{{route('admin.types.edit', $type)}}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId-{{$type->id}}">
                                    Launch
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{$type->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$type->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{$type->id}}">Eliminare definitivamente?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{$type->name}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.types.destroy', $type)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submitt" class="btn btn-primary">YES</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Optional: Place to the bottom of scripts -->
                                <script>
                                    const myModal = new bootstrap.Modal(document.getElementById('modalId-{{$type->id}}'), options)

                                </script>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
