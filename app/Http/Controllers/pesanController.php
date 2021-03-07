<?php

namespace App\Http\Controllers;

use App\Models\listing;
use App\Models\message;
use App\Models\multiimage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pesanController extends Controller
{
    public function index(Request $request)
    {
        $users = Auth::user();
        $user = User::find($users->id);
        $listing = listing::all();

        if($request->has('search')){
            // $listings = \App\Models\listing::where('nama_listing','LIKE','%'. $request->search . '%', 'AND', 'user_id', 'LIKE','%' . $user->id . '%')->paginate(15);
            $messages = message::where('isi_pesan',  'like', '%' . $request->search . '%')
                                ->where('agen_id', '=', $user->id)
                                ->orderBy('updated_at','DESC')
                                ->get();
            // dd($listings);
            
        }
        else{
            // $listings = listing::all();
            $messages = message::where('agen_id', '=',$user->id)
                                ->orderBy('updated_at','DESC')
                                ->get();
            
        }
        // $messages->appends($request->all());
        // $listing = listing::where('user_id', $user->id)->get();
        // $listing = listing::where('user_id', '==' ,$user->id)->get();
        // $messages = message::where('listing_id', $listing)->get();
        return view('page_agen.pesan.pesan', compact('messages'));
    }

    public function view($id)
    {
        $message = message::find($id);
        $dt = Carbon::now();
        // dd($dt->toDateTimeString());
        message::where('id',$id)
                ->update([
                    'pesan_terbaca' => $dt->addHours(7)->toDateTimeString()
                ]);
        // dd($message);
        return view('page_agen.pesan.view-pesan', compact('message'));
    }

    public function userToagen(Request $request, $id)
    {
        $request->validate([
            'isi_pesan' => 'required'
        ]);
        // dd($request->isi_pesan);
        // dd(date("d M Y",time()));
        // dd(today()->format('l, d F Y H:i'));
        $listing = listing::find($id);
        $images = multiimage::where('listing_id', $id)->get();
        $user = Auth::user();
        // dd($listing->user_id);
        
        message::create([
            'isi_pesan' => $request->isi_pesan,
            // 'tanggal' => date("d M Y",time()),
            'user_id' => Auth::user()->id,
            'listing_id' => $listing->id,
            'agen_id' => $listing->user_id
        ]);
        return redirect()->back()->with('status', 'Pesan Anda sudah terkirim ! Tunggu Agen menghubungi Anda ');
    }

    public function destroy($id)
    {
        $message = message::find($id);
        // dd($message);
        $message->delete();
        return redirect('/pesan')->with('status', 'Pesan berhasil di Hapus');
    }
}
