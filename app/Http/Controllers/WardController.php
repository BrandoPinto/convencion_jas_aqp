<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Stake;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index($idStake){
        $stake = Stake::find($idStake);
        $wards = Ward::join('stake', 'ward.idStake', '=', 'stake.idStake')
                        ->where('stake.idStake', $idStake)
                        ->select('ward.idWard','ward.name')
                        ->get();

        return view('ward',compact('stake','wards'));
    }

    public function count_competitors($idWard){
        $competitors = Competitor::join('ward','competitor.idWard','=','ward.idWard')
                                    ->where('ward.idWard',$idWard)->count();
        return $competitors;
    }
}
