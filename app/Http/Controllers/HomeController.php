<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Stake;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $competitors = Competitor::count();
        $stakes = Stake::all();

        return view('home', compact('competitors','stakes'));
    }

    public function count_competitors($idStake){
        $competitors = Competitor::join('ward','competitor.idWard','=','ward.idWard')
                                    ->join('stake','ward.idStake','=','stake.idStake')
                                    ->where('stake.idStake',$idStake)->count();
        return $competitors;
    }

        
}
