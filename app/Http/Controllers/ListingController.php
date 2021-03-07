<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use App\Models\facility;
use App\Models\facilitylisting;
use App\Models\kabupaten;
use Illuminate\Http\Request;
use App\Models\listing;
use App\Models\message;
use App\Models\multiimage;
use App\Models\User;
use App\Models\visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    
    public function index(Request $request)
    {   
        $users = Auth::user();
        $user = User::find($users->id);
        // dd($user->id);
        // dd($user->id);
        


        if($request->has('search')){
            // $listings = \App\Models\listing::where('nama_listing','LIKE','%'. $request->search . '%', 'AND', 'user_id', 'LIKE','%' . $user->id . '%')->paginate(15);
            $listings = listing::where('nama_listing',  'like', '%' . $request->search . '%')->where('user_id', $user->id)->get();
            // dd($listings);
            
        }
        else{
            // $listings = listing::all();
            $listings = listing::where('user_id', 'LIKE','%' . $user->id . '%')->get();
            // dd($listings);
        }
        // $listings->appends($request->all());
        // dd($listings);
        $criterias = criteria::all();
        return view('page_agen.listing', compact(['listings','criterias']));
    }

    public function create()
    {
        $user = Auth::user();
        $districts = kabupaten::all();
        $facilities = facility::all();
        return view('page_agen.create', compact(['user','districts','facilities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        // dd($request->nama_file);
        $request->validate([
            'nama_listing' => 'required|max:150',
            'tipe_listing' => 'required',
            'tipe_hunian' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'sertifikat' => 'required',
            'listing_image' => 'required',
            'kabId' => 'required',

            'luas_tanah' => 'numeric|min:1',
            'luas_bangunan' => 'numeric|min:1',
            'jlh_kmr_tidur' => 'numeric|min:0',
            'jlh_kmr_mandi' => 'numeric|min:1',
            'jlh_lantai' => 'numeric|min:1',
            'daya_listrik' => 'numeric|min:3',
            'harga' => 'numeric|min:1'
        ]);

        $dt = Carbon::now();

        $listing = listing::create([
            'user_id'   => Auth::user()->id,
            'nama_listing' => $request->nama_listing,
            'tipe_listing' => $request->tipe_listing,
            'tipe_hunian' => $request->tipe_hunian,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'sertifikat' => $request->sertifikat,
            'kabId' => $request->kabId,
            'views' => 0,
            'tanggal_update' => $dt->addHours(7)->toDateTimeString()
            ]);

        $kriteria = criteria::create([
            'listing_id' => $listing->id,
            'luas_tanah' => $request->luas_tanah,
            'luas_bangunan' => $request->luas_bangunan,
            'jlh_kmr_tidur' => $request->jlh_kmr_tidur,
            'jlh_kmr_mandi' => $request->jlh_kmr_mandi,
            'jlh_lantai' => $request->jlh_lantai,
            'daya_listrik' => $request->daya_listrik,
            'harga' => $request->harga
        ]);
        $kriteria->save();
        $listing->save();
        
        if(!empty($request->input('fasilitas'))){
        $facilitieslistings = $request->input('fasilitas');
        foreach($facilitieslistings as $facilitylisting)
        {
            facilitylisting::create([
                'listing_id' => $listing->id,
                'fasilitas_id' => $facilitylisting
            ]);
        }
        }
        
        if($request->hasFile('listing_image')){
            $listing_gambar = $request->file('listing_image');
            foreach($listing_gambar as $listing_image)
            {
                $name = $listing->id . ' - ' . pathinfo($listing_image->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . rand(1,999);
                $extension = $listing_image->getClientOriginalExtension();
                $newName = $name . '.' . $extension;

                // Storage::putFileAs('public/assets/images/image_listing', $listing_image, $newName);
                Storage::putFileAs('public/assets/images', $listing_image, $newName);
                multiimage::create([
                        'listing_id' => $listing->id,    
                        'nama_file' => 'assets/images/' . $newName
                    ]);
                    
            }
        }

        return redirect('/listing')->with('status', 'Produk listing berhasil di buat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = listing::find($id);
        // $kab = kabupaten::where('kabId',$id)->get();
        $kabupaten = kabupaten::all();
        $criterias = criteria::all();
        $facilitieslistings = facilitylisting::where('listing_id',$id)->get();
        $facilities = facility::all();
        // $kab = kabupaten::find($listing->kabId);
        // dd($facilitieslistings[0]->listing_id);
        return view('page_agen.edit', compact(['listing','kabupaten','criterias','facilitieslistings','facilities']));
        //return view('page_agen.edit', ['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $images = multiimage::where('listing_id',$id)->get();
        $request->validate([
            'nama_listing' => 'required|max:150',
            'tipe_listing' => 'required',
            'tipe_hunian' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'sertifikat' => 'required',
            'status' => 'required',
            

            'luas_tanah' => 'numeric|min:1',
            'luas_bangunan' => 'numeric|min:1',
            'jlh_kmr_tidur' => 'numeric|min:0',
            'jlh_kmr_mandi' => 'numeric|min:1',
            'jlh_lantai' => 'numeric|min:1',
            'daya_listrik' => 'numeric|min:3',
            'harga' => 'numeric|min:1'
        ]);

        if(count($images) == 0){
            $request->validate([
                'listing_image' => 'required',
            ]);
        }
        
        if(!empty($request->input('fasilitas'))){
        $facilitieslistings = facilitylisting::where('listing_id',$id)->get();
        if(count($facilitieslistings) > 0){
            foreach ($facilitieslistings as $facilitylisting){
                // Storage::delete('public/' . $image->nama_file);
                $facilitylisting->delete();
            }
        }
        }

        if(!empty($request->input('fasilitas'))){
            $facilitieslistings = $request->input('fasilitas');
            foreach($facilitieslistings as $facilitylisting)
            {
                facilitylisting::create([
                    'listing_id' => $id,
                    'fasilitas_id' => $facilitylisting
                ]);
            }
        }
        
        $dt = Carbon::now();
        $lis = listing::where('id', $id)
                ->update([
                    'nama_listing' => $request->nama_listing,
                    'tipe_listing' => $request->tipe_listing,
                    'tipe_hunian' => $request->tipe_hunian,
                    'alamat' => $request->alamat,
                    'deskripsi' => $request->deskripsi,
                    'sertifikat' => $request->sertifikat,
                    'kabId' => $request->kabId,
                    'Status' => $request->status,
                    'tanggal_update' => $dt->addHours(7)->toDateTimeString()
                ]);
                

        criteria::where('listing_id',$id)
                ->update([
                    'luas_tanah' => $request->luas_tanah,
                    'luas_bangunan' => $request->luas_bangunan,
                    'jlh_kmr_tidur' => $request->jlh_kmr_tidur,
                    'jlh_kmr_mandi' => $request->jlh_kmr_mandi,
                    'jlh_lantai' => $request->jlh_lantai,
                    'daya_listrik' => $request->daya_listrik,
                    'harga' => $request->harga
                ]);
                // dd($request->jlh_kmr_tidur);
                
        if($request->hasFile('listing_image')){
            $listing_gambar = $request->file('listing_image');
            foreach($listing_gambar as $listing_image)
            {
                $name = $id . ' - ' . pathinfo($listing_image->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . rand(1,999);
                $extension = $listing_image->getClientOriginalExtension();
                $newName = $name . '.' . $extension;
                
                // Storage::putFileAs('public/assets/images/image_listing', $listing_image, $newName);
                Storage::putFileAs('public/assets/images', $listing_image, $newName);
                multiimage::create([
                    'listing_id' => $id,    
                    'nama_file' => 'assets/images/' . $newName
                    ]);
                    
                }
            }
        return redirect('/listing')->withInput()->with('status', 'Data listing berhasil di Update');
    }

    public function image_delete(Request $request, $id)
    {
        $images = multiimage::find($id);
        
        $listing = listing::find($images->listing_id);
        $kabupaten = kabupaten::all();
        
        Storage::delete('public/' . $images->nama_file);

        $images->delete();

        return back()->with('status', 'Gambar berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {   
        $listing = listing::find($id);
        $images = multiimage::where('listing_id',$id)->get();
        $criterias = criteria::where('listing_id',$id)->get();
        $messages = message::where('listing_id',$id)->get();
        $visitors = visitor::where('listing_id',$id)->get();
        if(count($images) > 0){
            foreach ($images as $image){
                Storage::delete('public/' . $image->nama_file);
                $image->delete();
            }
        }
        // dd($messages);
        if(count($criterias) > 0){
            foreach ($criterias as $criteria){
                $criteria->delete();
            }
        }

        if(count($messages) > 0){
            foreach ($messages as $message){
                $message->delete();
            }
        }

        if(count($visitors) > 0){
            foreach ($visitors as $visitor){
                $visitor->delete();
            }
        }

        $facilitieslistings = facilitylisting::where('listing_id',$id)->get();
        if(count($facilitieslistings) > 0){
            foreach ($facilitieslistings as $facilitylisting){
                Storage::delete('public/' . $image->nama_file);
                $facilitylisting->delete();
            }
        }
        $listing->delete();
        // listing::destroy($id->id);
        return redirect('/listing')->with('status', 'Data listing Anda berhasil di Hapus');
    }

}
