<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::orderBy('updated_at', 'desc')->paginate(5);
        return view('Mahasiswa.index', ['mahasiswas' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Generate NIM
        $mahasiswas = Mahasiswa::all();
        if ($mahasiswas->count() > 0) {
            $last = $mahasiswas->last();
            $nim = $last->nim + 1;
        } else {
            $nim = 20200121001;
        }

        // Validate Data Mahasiswa
        $request->validate([
            'nama_mhs' => 'required|unique:mahasiswas|max:100|min:3',
            'email' => 'required|unique:mahasiswas|max:100|min:3',
            'umur' => 'integer|required|max:100',
            'alamat' => 'required'
        ]);

        //  Insert Data Mahasiswa
        try {
            $mhs = new Mahasiswa;
            $mhs->nim = $nim;
            $mhs->nama_mhs = $request->nama_mhs;
            $mhs->email = $request->email;
            $mhs->umur = $request->umur;
            $mhs->alamat = $request->alamat;
            $mhs->save();
        } catch (\Throwable $th) {
            // return error
            return redirect('/mahasiswa')->with('error', $th->getMessage());
        }
      
        //    Redirect to Index
        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa ' . $request->nama_mhs . ' Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('Mahasiswa.show', ['mahasiswa' => Mahasiswa::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "HOOH";
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
