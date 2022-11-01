<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

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

        return response()->json([
            "message" => "data berhasil didapatkan",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ['required', 'string', 'max:255'],
            "gender" => ['required', 'string', 'max:255' ],
            "age" => ['required', 'numeric']
        ]);

        Siswa::create($data)->save();

        return response()->json([
            "message" => "berhasil ditambahkan",
            "data" => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::findOrFail($id);

        return response()->json([
            "message" => "berhasil ditambahkan",
            "data" => $data
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
        $data = $request->validate([
            "name" => ['required', 'string', 'max:255'],
            "gender" => ['required', 'string', 'max:255' ],
            "age" => ['required', 'numeric']
        ]);

        $siswa=Siswa::findOrFail($id);
        $siswa->update($data);
        $siswa->save();

        return response()->json([
            "message" => "berhasil diubah",
            "data" => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);

        return response()->json([
            "message" => "berhasil dihapus",
            "data" => []
        ]);
    }
}
