<?php

namespace App\Http\Controllers\Admin;
use App\Apartment;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\FormApartmentRequest;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::orderBy('id', 'DESC')->paginate(10);
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormApartmentRequest $request)
    {
        $data = $request->all();

        $new_apartment = new Apartment();

        $new_apartment->fill($data);

        $new_apartment->save();

        return redirect()->route('admin.apartments.show', $new_apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        if($apartment){
            return view('admin.apartments.show', compact('apartment'));
        } else {
            abort(404, 'Errore 404 | Pagina non trovata');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {

        if($apartment){
            return view('admin.apartments.edit', compact('apartment'));
        } else {
            abort(404, 'Errore 404 | Pagina non trovata');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(FormApartmentRequest $request, Apartment $apartment)
    {

         $data = $request->all();

         $apartment->fill($data);

         $apartment->update();

         return redirect()->route('admin.apartments.index', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->messages()->delete();
        $apartment->delete();
        return redirect()->route('admin.apartments.index')->with('delete_success', "L'appartamento $apartment->title è stato eliminato con successo!");
    }
}
