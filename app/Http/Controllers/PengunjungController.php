<?php

namespace App\Http\Controllers;

use App\Models\listing;
use App\Models\User;
use App\Models\visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    public function index(){
        $users = Auth::user();
        $user = User::find($users->id);
        $visitors = visitor::where('agen_id', '=',$user->id)
                            ->orderBy('tanggal','DESC')
                            ->get();
        return view('page_agen.pengunjung.pengunjung', compact('visitors'));
    }

    public function delete($id){
        $visitors = visitor::where('agen_id',$id)->get();
        // dd($visitors);
        if(count($visitors) > 0){
            foreach ($visitors as $visitor){
                $visitor->delete();
            }
        }
        return redirect('/pengunjung')->with('status', 'Data Pengunjung Anda berhasil di Hapus');
    }
}
