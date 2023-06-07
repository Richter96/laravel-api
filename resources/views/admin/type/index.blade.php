@extends('layouts.admin')


@section('content')
<div class="container-md">
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <form action="{{route('admin.types.store')}}">
                @csrf
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="submit" id=" ">Add</button>
                    <input type="text" class="form-control" placeholder="" aria-label="Add" aria-describedby="">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" aria-label="Button" aria-describedby="">
                    <button class="btn btn-outline-secondary" type="button" id="">Button</button>
                </div>

            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>

@endsection
