<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class ApkUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $alluser = \App\Models\User::where('nama_user','LIKE','%'. $request->search . '%', 'AND', 'user_tipe','!=', 'Admin')->get();
        }
        else{
            $alluser = User::where('user_tipe','!=', 'Admin')->get();
        }
        // $alluser = User::all();
        //$alluser = DB::table('users')->get();
        return view('page_admin.user.tabeluser',['users' => $alluser]);
    }

    public function indexprofile()
    {
        $user = Auth::user();
        return view('page_user.editprofile', compact('user'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('page_user.update_profile', compact('user'));
    }

    public function editpassprofile()
    {
        $user = Auth::user();
        return view('page_user.update-pass', compact('user'));
    }

    public function updateprofile(Request $request,User $id)
    {
        $request->validate([
            'nama_user' => 'required|max:30',ValidationRule::unique('users')->ignore($id->id),
            'email' => 'required|email|max:50',ValidationRule::unique('users')->ignore($id->id),
            'no_telepon' => 'required|regex:/(08)[0-9]{9}/'
            // 'broker_agen' => 'max:50',ValidationRule::requiredIf($id->user_tipe=='Agen')
        ]);
            // dd($id->user_tipe);
        User::where('id', $id->id)
                ->update([
                    'nama_user' => $request->nama_user,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                    'broker_agen' => $request->broker_agen
                ]);
        return redirect('/editprofile')->withInput()->with('status', 'Data Anda berhasil di Ubah');
    }

    public function updatepassprofile(Request $request,User $id)
    {
        $request->validate([
            'password' => 'required',
            'confirm' => 'required|same:password',
        ]);

        User::where('id', $id->id)
                ->update([
                    'password' => bcrypt($request->password)
                ]);
        return redirect('/editprofile')->with('status', 'Password Anda berhasil di Ubah');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //dd($request);
        $request->validate([
            'nama_user' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'no_telepon' => 'required|regex:/(08)[0-9]{9}/',
            'user_tipe' => 'required',
        ]);
        
        // $alluser = new User;
        // $alluser->nama_user = $request->nama_user;
        // $alluser->email = $request->email;
        // $alluser->password = bcrypt($request->password);
        // $alluser->no_telepon = $request->no_telepon;
        // $alluser->user_tipe = $request->user_tipe;

        // $alluser->save;

        User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_telepon' => $request->no_telepon,
            'user_tipe' => $request->user_tipe

        ]);

        return redirect('/user_management')->with('status', 'Data user berhasil di buat');
        //return view('page_user.tabeluser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        return view('page_admin.user.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $id)
    {
        $request->validate([
            // 'email' => 'required|email',ValidationRule::unique('users')->ignore($id->id),
            'user_tipe' => 'required'
        ]);
            // dd($request);
        User::where('id', $id->id)
                ->update([
                    // 'nama_user' => $request->nama_user,
                    // 'email' => $request->email,
                    // 'password' => bcrypt($request->password),
                    // 'no_telepon' => $request->no_telepon,
                    'user_tipe' => $request->user_tipe
                ]);
        return redirect('/user_management')->withInput()->with('status', 'Data user berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        User::destroy($id->id);
        return redirect('/user_management')->with('status', 'Data user berhasil di Hapus');
    }
}
