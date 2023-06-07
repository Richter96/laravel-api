@extends('layouts.admin')


@section('content')
<div class="container">
    @include('partials.errors')

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Inserisci un titolo" value="{{ old('title') }}">
            <small id="helpId" class="form-text text-muted">max 200 charatteri</small>
            @error('title')
            <div class="alert alert-danger" role="alert">
                <strong>Name, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>
        {{-- img --}}
        <div class="mb-3">
            <label for="image" class="form-label">IMMGAIN</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="helpId" placeholder="http://" value="{{ old('image') }}">
            <small id="helpId" class="form-text text-muted">inserire url dell'immagine</small>
            @error('image')
            <div class="alert alert-danger" role="alert">
                <strong>Image, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>
        {{-- text --}}
        <div class="mb-3">
            <label for="text" class="form-label">DESCRIZIONE</label>
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text" rows="5" placeholder="Inserisci qui la descrizione">{{ old('text') }}</textarea>
            @error('text')
            <div class="alert alert-danger" role="alert">
                <strong>Description, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>


        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success m-1">UPLOAD</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a name="" id="" class="btn btn-danger" href="{{Route('admin.posts.index')}}" role="button">ANNULLA</a>
            </div>
        </div>



    </form>
</div>

@endsection
