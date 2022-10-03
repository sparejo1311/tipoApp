<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEditRequest;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
{
    function __construct() {
        //$this-> middleware('logged', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
        $this-> middleware('logged', ['except' => ['index', 'show']]);        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::all()->sortBy('nombre');
        return view('tipo.index', ['activeTipo' => 'active',
                                        'tipos' => $tipos,
                                        'subTitle' => 'Type list',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create', ['activeTipo' => 'active',
                                        'subTitle' => 'Add type',
                                        'title' => 'Type',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|min:2|max:100',
            'descripcion' => 'required|string|min:2',
        ];
        $messages = [
            'nombre.max'      => 'name is too long',
            'nombre.min'      => 'name is too short',
            'nombre.required' => 'name is required',
            'descripcion.min'      => 'descripcion is too short',
            'descripcion.required' => 'descripcion is required',
        ];
        $validator = Validator::make($request->all() ,$rules, $messages);
        if ($validator->fails()) {
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }
        $tipo = new Tipo($request->all());
        try {
            $tipo->save();
            $message = 'The type has been inserted with id number: ' . $tipo->id;
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['store' => 'An unexpected error occurred while inserting.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        return view('tipo.show', ['activeTipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Show type',
                                        'title' => 'Type',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipo.edit', ['activeTipo' => 'active',
                                        'tipo' => $tipo,
                                        'subTitle' => 'Edit Type',
                                        'title' => 'Type',]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(TipoEditRequest $request, Tipo $tipo)
    {
        try {
            $tipo->update($request->all());
            //$producto->fill($request->all());
            //$producto->save();
            $message = 'The type has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('tipo')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        try {
            $tipo->delete();
            $message = 'The type ' . $tipo->nombre . ' has been removed.';
        } catch(\Exception $e) {
            $message = 'The type ' . $tipo->nombre . ' has not been removed.';
        }
        return redirect('tipo')->with('message', $message);
    }
}
