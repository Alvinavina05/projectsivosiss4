<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\kandidat;
use App\Models\Ketua;
use App\Models\wakil;
use App\Models\Voting;


class DashController extends Controller
{

    public function __construct(){
        $this ->akun = new Akun();
        $this ->kandidat = new kandidat();
        $this ->ketua = new Ketua();
        $this ->wakil = new Wakil();
        $this ->voting = new Voting();
        
    }

    // dashboard
    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{
            $data = [
                't_akun'=>$this->akun->alldata(),
                't_akunvote'=>$this->akun->BelumVoting(),
                't_kandidat'=>$this->kandidat->alldata(),
                't_ketua'=>$this->ketua->alldata(),
                't_voting' => $this->voting->alldata(), 
                't_wakil'=>$this->wakil->alldata(), 
            ];
        return view('admin.dashboard' ,$data);
    }
}


}