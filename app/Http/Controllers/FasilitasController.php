<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facility;
use App\Models\facilitylisting;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $facilities = \App\Models\facility::where('nama_fasilitas','LIKE','%'. $request->search . '%')->get();
        }
        else{
            $facilities = facility::all();
        }
        //$fasili = \App\Models\facility::all();
        return view('page_admin.fasilitas.fasilitas',['facilities' => $facilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('page_admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|unique:fasilitas|max:60'
        ]);

        $fasilitas = new facility;
        $fasilitas->nama_fasilitas  = $request->nama_fasilitas;

        $fasilitas->save();

        return redirect('/fasilitas')->with('status', 'Data fasilitas berhasil di buat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(facility $id)
    {
        
        return view('page_admin.fasilitas.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(facility $id)
    {
        return view('page_admin.fasilitas.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,facility $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|unique:fasilitas|max:60,'. ValidationRule::unique('fasilitas')->ignore($id->fasilitas_id)
            // 'nama_fasilitas' => 'required|max:60', ValidationRule::unique('fasilitas')->ignore($id->fasilitas_id)
        ]);
        
        facility::where('fasilitas_id', $id->fasilitas_id)
                    ->update([
                        'nama_fasilitas' => $request->nama_fasilitas
                    ]);
        return redirect('/fasilitas')->with('status', 'Data fasilitas berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = facility::find($id);
        $facilitieslistings = facilitylisting::where('fasilitas_id',$id)->get();
        // dd($facilitieslistings);
        if(count($facilitieslistings) > 0){
            foreach ($facilitieslistings as $facilitylisting){
                $facilitylisting->delete();
            }
        }
        $facility->delete();
        // facility::destroy($id->fasilitas_id);
        return redirect('/fasilitas')->with('status', 'Data fasilitas berhasil di Hapus');
    }
}
