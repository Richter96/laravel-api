<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Single_type = '';
        $types = Type::orderByDesc('id')->get();

        return view('admin.type.index', compact('types', 'Single_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();
        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug;
        Type::create($val_data);

        return to_route('admin.types.index')->with('message', 'type creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        // dd($Single_type);
        $Single_type = $type;
        $types = Type::orderByDesc('id')->get();

        // dd($Single_type);
        return view('admin.type.index', compact('Single_type', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();
        // dd($val_data);
        $slug = Str::slug($type->name);
        $val_data['slug'] = $slug;

        $type->update($val_data);

        return to_route('admin.types.index')->with('message', 'type modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // dd($type);
        $type->delete();

        return to_route('admin.types.index')->with('message', 'Type Eliminato con successo');
    }
}
