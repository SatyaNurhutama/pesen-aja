<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\User;
use App\Models\Cart;

class DetailController extends Controller
{
    
    public function addCart(Request $request, $id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $user=auth()->user();
                $menu=menu::find($id);
                $cart=new cart;
                
                $cart->nama=$user->nama;
                $cart->no_telepon=$user->no_telepon;
                $cart->nama_menu=$menu->nama_menu;
                $cart->gambar=$menu->image;
                $cart->jumlah=$request->jumlah;
                $cart->total_harga=$menu->harga;
                $cart->save();
                return redirect()->back()->with('message', 'Menu berhasil ditambahkan ke keranjang', compact('menu'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }
    
}
