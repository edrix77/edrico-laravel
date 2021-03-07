<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use App\Models\facility;
use App\Models\facilitylisting;
use App\Models\kabupaten;
use App\Models\listing;
use App\Models\multiimage;
use App\Models\visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {   
        return view('home');
         
    }

    public function cari_listing(Request $request)
    {
        
        
        if($request->has('search')){
            $listings = \App\Models\listing::where('Status','=','Aktif')
                                            ->where('nama_listing','LIKE','%'. $request->search . '%')
                                            ->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')
                                            ->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')
                                            ->orderBy('tanggal_update','DESC')
                                            ->get();    
        }
        else{
            $listings = listing::where('Status','=','Aktif')
                                 ->orderBy('tanggal_update','DESC')->get();
        }
        // $listings->appends($request->all());
        // $listings = $listings->appends([
        //     'search' => $request->search,
        //     'tipe_listing' => $request->tipe_listing,
        //     'tipe_hunian' => $request->tipe_hunian
        // ]);
        $criterias = criteria::all();
        //  dd($listing->multigambar);
        //$listing = listing::all();
        //return redirect('/');
        //$user = Auth::user();
        //dd($user);
        return view('cari-listing',[
            'listings' => $listings,
            'criterias' => $criterias,
            'request' =>$request
                    ]);
    }

    public function carilisting(Request $request)
    {
        if($request->has('search')){
            $listings = \App\Models\listing::where('Status','=','Aktif')
                                            ->where('nama_listing','LIKE','%'. $request->search . '%')
                                            ->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')
                                            ->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')
                                            ->orderBy('tanggal_update','DESC')
                                            ->get();    
        }
        else{
            $listings = listing::orderBy('tanggal_update','DESC')->get();
        }
        // if($request->has('search')){
        //     $listings = \App\Models\listing::where('nama_listing','LIKE','%'. $request->search . '%')->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')->simplePaginate(5);    
        // }
        // else{
        //     $listings = listing::orderBy('updated_at','DESC')->simplePaginate(5);
        // }
        // $listings->appends($request->all());
        $criterias = criteria::all();
        //  dd($listing->multigambar);
        //$listing = listing::all();
        //return redirect('/');
        //$user = Auth::user();
        //dd($user);
        return view('cari-listing',[
            'listings' => $listings,
            'criterias' => $criterias,
            'request' =>$request
                    ]);
    }

    public function detail($id)
    {
        
        $listing = listing::find($id);
        $images = multiimage::where('listing_id', $id)->get();
        $facilitieslistings = facilitylisting::where('listing_id',$id)->get();
        
        $facilities = facility::all();
        $user = Auth::user();
        $visitors = visitor::where('user_id',$user->id)
                            ->where('listing_id',$listing->id)
                            ->get();
// dd($visitors);

        if($listing->user_id != $user->id)
        {   
            if(count($visitors) == 0)
            {
                visitor::create([
                    'user_id' => $user->id,
                    'agen_id' => $listing->user_id,
                    'listing_id' => $listing->id
                    // 'tanggal' => 
                ]);

                listing::where('id',$id)->update(['views' => DB::raw('views + 1')]);
            }
        }
        // dd($facilitieslistings);
        return view('detail',[
            'images' => $images,
            'listing' => $listing,
            'user' => $user,
            'facilitieslistings' => $facilitieslistings,
            'facilities' => $facilities
            ]);
    }

    // public function detailpesan(request $request)
    // {
    //     dd($request);
    // }

    public function about()
    {
        // $user = Auth::user();
        return view('about');
    }

    public function rekomendasi()
    {
        
        $districts = kabupaten::all();
        $facilities = facility::all();
        // $user = Auth::user();
        return view('page_user.rekomendasi', compact('districts','facilities'));
    }

    public function hasilrekomendasi()
    {
        return view('page_user.hasilrekomendasi');
    }
}
