<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Models\Menu;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $menus = menu::paginate(6);
                return view('user.home', compact('menus'));
            } else{
                $data=menu::all();
                return view('admin.menu', compact('data'));
            }
        } else{
            return view('auth.login');
        }
        
    }

    public function detail($id){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $menu = menu::find($id);
                return view('user.detail-menu', compact('menu'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }

    public function search(Request $request){
        if(Auth::id()){
            $usertype = Auth::user()->user_type;
            if($usertype == 0){
                $search=$request->search;
                $menus = menu::where('nama_menu', 'like', '%'.$search.'%')->get();
                return view('user.home', compact('menus'));
            } else{
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        } else{
            return view('auth.login');
        }
    }
}
