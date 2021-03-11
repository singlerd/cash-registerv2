<?php

namespace App\Http\Controllers;

use App\Models\CurrentState;
use App\Models\Drink;
use App\Models\Measure;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getHome()
    {
        return view('home');
    }

    public function getDrinks()
    {
        $drinks = DB::table('drinks')
            ->join('measures','drinks.measure_id' ,'=', 'measures.id_measure')
            ->select('drinks.name','drinks.drink_id','drinks.measure_id', 'drinks.manufacturer', 'drinks.created_at','drinks.purchase_price','drinks.sold_price', 'measures.measure' )
            ->get();

        return view('drinks.list-drinks',['drinks' => $drinks]);
    }

    public function getAddDrink()
    {
       $measures = Measure::all();
       return view('drinks.add-drink',['measures' => $measures]);
    }

    public function getListMeasures()
    {
        $measures = Measure::all();
        return view('measures.list-measures',['measures' => $measures]);
    }

    public function getUpdateMeasure($id)
    {
        $measure = DB::table('measures')->where('id_measure', $id)->first();
        return view('measures.edit-measures',['measure' => $measure]);
    }

    public function getAddMeasure()
    {
        $measures = Measure::all();
        return view('measures.add-measures',['measure' => $measures]);
    }

    public function getCurrentState()
    {

        return view('current-states.add-current-state');
    }

    public function getSales()
    {
//        $currentStatesAndDrinks = DB::table('current_states')
//            ->join('drinks','current_states.id_drink' ,'=', 'drinks.id_drink')
//            ->select('drinks.name','drinks.drink_image', 'current_states.id_current_state')
//            ->get();

        $currentStatesAndDrinks = CurrentState::join('drinks','current_states.drink_id', 'drinks.drink_id')
            ->select('drinks.name','drinks.drink_image', 'current_states.current_state_id')
            ->get();

        return view('sales.add-sale',['currentStatesAndDrinks' => $currentStatesAndDrinks]);
    }

    public function getSolds()
    {
        return view('solds.add-sold');
    }

    public function getChangeCurrentState()
    {
        $drinks = Drink::all();
        return view('current-states.change-current-state', ['drinks' => $drinks ]);
    }

}
