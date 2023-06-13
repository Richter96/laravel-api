@extends('layouts.admin')


@section('content')
<div class="container">
    <h1 class="my-4">Modifica {{$project->title}}</h1>

    @include('partials.errors')

    <form action="{{ route('admin.projects.update', $project )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Inserisci un titolo " value="{{ old('title', $project->title) }}">
            <small id=" helpId" class="form-text text-muted">max 200 charatteri</small>
            @error('title')
            <div class="alert alert-danger" role="alert">
                <strong>Name, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>
        {{-- img --}}
        <div class="d-flex gap-3">
            <img class="img-fluid w-25" src="{{ asset('storage/' . $project->image)}}" alt="{{$project->title}}">

            <div class="mb-3">
                <label for="image" class="form-label">INSERISCI UNA NUOVA IMMAGINE</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="helpId" value="{{ old('image', $project->image) }}">
                <small id=" helpId" class="form-text text-muted">seleziona immagine max 995 kb</small>
                @error('image')
                <div class="alert alert-danger" role="alert">
                    <strong>Image, Error:</strong>{{ $message }}
                </div>
                @enderror
            </div>
        </div>
        {{-- link ghit --}}
        <div class="mb-3">
            <label for="link_ghit" class="form-label">LINK GIHTUB</label>
            <input type="text" class="form-control @error('link_ghit') is-invalid @enderror" name="link_ghit" id="link_ghit" aria-describedby="helpId" placeholder="http://" value="{{ old('link_ghit', $project->link_ghit) }}">
            <small id=" helpId" class="form-text text-muted">inserire url link progetto ghitub</small>
            @error('link_ghit')
            <div class="alert alert-danger" role="alert">
                <strong>Image, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>
        {{-- link site --}}
        <div class="mb-3">
            <label for="link_site" class="form-label">LINK SITE</label>
            <input type="text" class="form-control @error('link_site') is-invalid @enderror" name="link_site" id="link_site" aria-describedby="helpId" placeholder="http://" value="{{ old('link_site', $project->link_site) }}">
            <small id=" helpId" class="form-text text-muted">inserire url del sito del progetto</small>
            @error('link_site')
            <div class="alert alert-danger" role="alert">
                <strong>Image, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>
        {{-- type --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">TIPO PROGETTO</label>
            <select class="form-select form-select-md" aria-describedby="helpId" name="type_id" id="type_id" @error('link_site') is-invalid @enderror>
                <option selected>selezionare il tipo</option>
                @foreach ($types as $type)
                <option value="{{$type?->id}}" {{$type?->id == old('type_id', $project->type?->id) ? 'selected' : ''}}>{{$type?->name}}</option>
                @endforeach
            </select>
            <small id=" helpId" class="form-text text-muted">Inserire un type</small>
        </div>
        {{-- technologies --}}
        <div class='form-group mb-3'>
            <p>SELEZIONA LE TECNOLOGIE UTILIZZATE:</p>
            <div class=" overflow-scroll technology_box border-1 border p-1 rounded">
                @foreach ($technologies as $technology)
                <div class="form-check @error('technologies') is-invalid @enderror">
                    <label class='form-check-label'>
                        @if($errors->any())
                        {{-- 1 (if) --}}
                        <input name="technologies[]" type="checkbox" value="{{ $technology->id}}" class="form-check-input" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        @else
                        {{-- 2 (else) --}}
                        <input name='technologies[]' type='checkbox' value='{{ $technology->id }}' class='form-check-input' {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                        @endif
                        {{ $technology->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <small id=" helpId" class="form-text text-muted">scroll for more</small>
            @error('technologies')
            <div class='invalid-feedback'>{{ $message}}</div>
            @enderror
        </div>
        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">DESCRIZIONE</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" placeholder="Inserisci qui la descrizione">{{ old('desctiption', $project->description) }}</textarea>
            @error('description')
            <div class="alert alert-danger" role="alert">
                <strong>Description, Error:</strong>{{ $message }}
            </div>
            @enderror
        </div>


        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success m-1">UPLOAD</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a name="" id="" class="btn btn-danger" href="{{Route('admin.projects.index')}}" role="button">ANNULLA</a>
            </div>
        </div>



    </form>
</div>

@endsection
