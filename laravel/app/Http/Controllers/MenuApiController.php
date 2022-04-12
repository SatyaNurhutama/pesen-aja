<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Menu;

class MenuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all()->toJson(JSON_PRETTY_PRINT);
        return response($menus, 200);
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
        $validateData = Validator::make($request->all(), [
            'nama_menu' => 'required|min:3|max:250',
            'deskripsi' => 'required|min:3|max:2000',
            'harga' => 'required|min:3|max:250',
            'image' => 'required|file|image|max:1000',
            ]);
        if ($validateData->fails()) {
            return response($validateData->errors(), 400);
        } else{
            $data=new menu;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('image', $imagename);
                
            $data->image=$imagename;
            $data->nama_menu = $request->nama_menu;
            $data->deskripsi = $request->deskripsi;
            $data->harga = $request->harga;
             $data->save();
            return response()->json([
                "message" => "Menu record created"
                ], 201);
        }
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
        if (Menu::where('id', $id)->exists()) {
            $validateData = Validator::make($request->all(), [
                'nama_menu' => 'required|min:3|max:250',
                'deskripsi' => 'required|min:3|max:2000',
                'harga' => 'required|min:3|max:250',
                'image' => 'required|file|image|max:1000',
                ]);
            if ($validateData->fails()) {
                return response($validateData->errors(), 400);
            } else{
                $data=menu::find($id);
                $image=$request->image;
                if($image){
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->image->move('image', $imagename);
                    $data->image=$imagename;
                }
                $data->nama_menu = $request->nama_menu;
                $data->deskripsi = $request->deskripsi;
                $data->harga = $request->harga;
                $data->save();
                return response()->json([
                    "message" => "Menu record updated"
                    ], 201);
            }
        } else {
            return response()->json([
            "message" => "Menu not found"
            ], 404);
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
        if (Menu::where('id', $id)->exists()) {
            $data=menu::find($id);
            $data->delete();
            return response()->json([
            "message" => "Menu record deleted"
            ], 201);
        }else {
            return response()->json([
            "message" => "Menu not found"
            ], 404);
        }
    }
}
