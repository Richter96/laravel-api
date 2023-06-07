@extends('layouts.admin')


@section('content')
<div class="container-md">
    <div class="row justify-content-center g-2 py-4">
        <div class="col">
            <form action="{{route('admin.types.store',)}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">NOME</span>
                    <input type="text" class="form-control" placeholder="inserisci nome type" aria-label="Username" aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="image">LINK IMMAGINE</span>
                    <input type="text" class="form-control" placeholder="link immagine" aria-label="link immagine" aria-describedby="image">
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
                            <img class="card-img-top" src="{{$type->image}}" alt="{{$type->name}}">
                            <div class="card-body">
                                <h4 class="card-title">{{$type->name}}</h4>
                                <a name="" id="" class="btn btn-info" href="{{route('admin.types.edit', $type)}}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
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
