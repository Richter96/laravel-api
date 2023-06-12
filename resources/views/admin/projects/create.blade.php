@extends('layouts.admin')


@section('content')
<div class="container">
    <h1 class="my-4">Inserisci un nuovo progetto</h1>

    @include('partials.errors')

    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- title --}}
        <div class="mb-3">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="Inserisci un titolo " value="{{ old('title') }}">
            <small id=" helpId" class="form-text text-muted">max 200 charatteri</small>

        </div>

        {{-- img --}}
        <div class="mb-3">
            <label for="image" class="form-label">IMMAGINE</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="helpId" placeholder="http://" value="{{ old('image') }}">
            <small id=" helpId" class="form-text text-muted">inserire url dell'immagine</small>
        </div>


        {{-- link ghit --}}
        <div class="mb-3">
            <label for="link_ghit" class="form-label">LINK GIHTUB</label>
            <input type="text" class="form-control @error('link_ghit') is-invalid @enderror" name="link_ghit" id="link_ghit" aria-describedby="helpId" placeholder="http://" value="{{ old('link_ghit') }}">
            <small id=" helpId" class="form-text text-muted">inserire link Ghitub</small>

        </div>


        {{-- link site --}}
        <div class="mb-3">
            <label for="link_site" class="form-label">LINK SITO</label>
            <input type="text" class="form-control @error('link_site') is-invalid @enderror" name="link_site" id="link_site" aria-describedby="helpId" placeholder="http://" value="{{ old('link_site') }}">
            <small id=" helpId" class="form-text text-muted">inserire link Site</small>
        </div>

        {{-- type --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">TIPO PROGETTO</label>
            <select class="form-select form-select-md" aria-describedby="helpId" name="type_id" id="type_id" @error('link_site') is-invalid @enderror>
                <option selected>selezionare il tipo</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        {{-- technology --}}
        <div class='form-group mb-3'>
            <p>TECHNOLOGY:</p>
            <div class=" overflow-scroll technology_box border-1 border p-1 rounded">
                @foreach ($technologies as $technology)
                <div class="form-check @error('technologies') is-invalid @enderror">
                    <label class='form-check-label'>
                        <input name='technologies[]' type='checkbox' value='{{ $technology->id}}' class="form-check-input" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        {{ $technology->name }}
                    </label>
                </div>
                @endforeach
                @error('technologies')
                <div class='invalid-feedback'>{{ $message}}</div>
                @enderror
            </div>
        </div>

        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">DESCRIZIONE</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" placeholder="Inserisci qui la descrizione">{{ old('description') }}</textarea>
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
