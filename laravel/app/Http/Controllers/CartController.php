<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    public function cart(){   
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $user=auth()->user();
                $carts=cart::where('no_telepon', $user->no_telepon)->get();
                $count=cart::where('no_telepon', $user->no_telepon)->count();
                return view('user.cart', compact('count', 'carts'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function deletecart($id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $data=cart::find($id);
                $data->delete();
                return redirect()->back()->with('message', 'Pesanan Berhasil Dihapus');
            }
            else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function confirmorder(Request $request){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $user = auth()->user();
                $nama = $user->nama;
                $no_telepon = $user->no_telepon;
                $count = DB::table('carts')->count();

                if($count > 0){
                    foreach($request->namamenu as $key=>$namamenu){
                        $order = new order;
                        $order->nama_menu=$request->namamenu[$key];
                        $order->gambar=$request->gambarmenu[$key];
                        $order->jumlah=$request->jumlahmenu[$key];
                        $order->total_harga=$request->hargamenu[$key];
                        $order->nama=$nama;
                        $order->no_telepon=$no_telepon;
                        $order->status='proses';
                        $order->save();
                    }
                    DB::table('carts')->where('no_telepon', $no_telepon)->delete();
                    return view('user.sukses');
                } else{
                    return redirect()->back()->with('message', 'Tidak ada pesanan dalam keranjang');
                }
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
            
        } else{
            return view('auth.login');
        }
        
        
    }
}
