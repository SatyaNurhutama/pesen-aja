<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class AdminController extends Controller
{

    public function uploadmenu(Request $request){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $data=new menu;
                $image=$request->gambar;
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->gambar->move('image', $imagename);
                
                $data->image=$imagename;
                $data->nama_menu = $request->nama_menu;
                $data->deskripsi = $request->deskripsi;
                $data->harga = $request->harga;
                $data->save();
        
                return redirect()->back()->with('message', 'Menu Berhasil Ditambahkan');
            }
            else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function showmenu(){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $data=menu::paginate(8);
                return view('admin.menu', compact('data'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function deletemenu($id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $data=menu::find($id);
                $data->delete();
                return redirect()->back()->with('message', 'Menu Berhasil Dihapus');
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function editmenu(Request $request, $id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $data=menu::find($id);
                $image=$request->gambar;
                if($image){
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->gambar->move('image', $imagename);
                    $data->image=$imagename;
                }
                $data->nama_menu = $request->nama_menu;
                $data->deskripsi = $request->deskripsi;
                $data->harga = $request->harga;
                $data->save();
                return redirect()->back()->with('message', 'Menu Berhasil Diedit');
            }
            else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
        
    }

    public function search(Request $request){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $search=$request->search;
                $data = menu::where('nama_menu', 'like', '%'.$search.'%')->get();
                return view('admin.menu', compact('data'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function pesanan(){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $orders=order::all();
                return view('admin.pesanan', compact('orders'));
            }
            else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function updatestatus($id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $order=order::find($id);
                $order->status='selesai';
                $order->save();
                return redirect()->back()->with('message', 'Pesanan telah selesai');   
            }else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function deleteorder($id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 1){
                $order=order::find($id);
                $order->delete();
                return redirect()->back()->with('message', 'Pesanan berhasil dihapus');
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }

        } else{
            return view('auth.login');
        }
        
    }
}
