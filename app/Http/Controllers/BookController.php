<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();

        return response()->json([
            "message" => "Load Data Berhasil",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue
        ]);
        return response()->json([
            "message" => "Data Berhasil Di Tambah",
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Book::find($id);
        if($data){
            return $data;
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Book::find($id);
        if($data){
            $data->title = $request->title ? $request->title : $data->title;
            $data->description = $request->description ? $request->description : $data->description;
            $data->author = $request->author ? $request->author : $data->author;
            $data->publisher = $request->publisher ? $request->publisher : $data->publisher;
            $data->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $data->date_of_issue;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::find($id);
        if($data){
            $data->delete();
            return ["message" => "Data Berhasil Di Hapus"];
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }
}