<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Email;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('list-data', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validatedData = $request->all();
		
		foreach ($validatedData['nama'] as $item => $value){
				$data2 = array(
					'nama' => $validatedData['nama'][$item],
					'alamat' => $validatedData['alamat'][$item],
					'jenkel' => $validatedData['jenkel'][$item]
				);
				Siswa::create($data2);
				$dataemail = array(
					'pemilik' => $validatedData['nama'][$item],
					'judul' => $validatedData['email1'][$item]
				);
				Email::create($dataemail);
		}
		
        return redirect()->route('home')->with('tambah_data', 'Penambahan Data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('detail-data', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('edit-data', [
            'data' => $data
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required|max:30',
            'alamat' => 'required',
			'jenkel' => 'required|max:15'
        ]);
        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);
        return redirect()->route('home')->with('edit_data', 'Pengeditan Data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
		return redirect()->route('home')->with('hapus_data', 'Penghapusan data berhasil');
    }
}