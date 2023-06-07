@extends('layouts.admin')


@section('content')
<div class="container-md">
    <div class="row justify-content-center g-2 py-4">
        <div class="col-6">
            <form action="{{ route('admin.types.update', $type)}}" method="post">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">NOME</span>
                    <input type="text" class="form-control" placeholder="inserisci nome type" aria-label="Username" aria-describedby="name" value="{{ old('name', $type->name)}}" name="name" id="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="image">LINK IMMAGINE</span>
                    <input name="image" id="image" type="text" class="form-control" placeholder="link immagine" aria-label="link immagine" aria-describedby="image" value="{{ old('image', $type->image)}}">
                </div>
                <button type="submit" class="btn btn-light">MODIFICA</button>
                <a name="" id="" class="btn btn-primary" href="{{route('admin.types.index')}}" role="button">ANNULLA</a>
            </form>
        </div>
    </div>
</div>

@endsection
