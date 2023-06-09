@extends('layouts.admin')


@section('content')
<div class="container-md">
    <div class="row justify-content-center g-2 py-4">
        <div class="col-6">
            <form action="{{ route('admin.technologies.update', $technology)}}" method="post">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">NOME</span>
                    <input type="text" class="form-control" placeholder="inserisci nome technology" aria-label="Username" aria-describedby="name" value="{{ old('name', $technology->name)}}" name="name" id="name">
                </div>
                <button type="submit" class="btn btn-light">MODIFICA</button>
                <a name="" id="" class="btn btn-primary" href="{{route('admin.technologies.index')}}" role="button">ANNULLA</a>
            </form>
        </div>
    </div>
</div>

@endsection
