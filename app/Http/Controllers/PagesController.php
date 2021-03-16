<?php
// **Name of Controllers are always in singular but for me is more readable like this if we see the logic

namespace App\Http\Controllers;

use App\Models\CurrentState;
use App\Models\Drink;
use App\Models\Measure;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the home blade file view for web.php
     */
    public function getHome()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the list-drinks blade file view in drinks directory for web.php
     * Contains values from drinks and measures tables to display drinks in table
     */
    public function getDrinks()
    {
        $drinks = DB::table('drinks')
            ->join('measures','drinks.measure_id' ,'=', 'measures.id_measure')
            ->select('drinks.drink_name','drinks.drink_id','drinks.measure_id', 'drinks.manufacturer', 'drinks.created_at','drinks.purchase_price','drinks.sold_price', 'measures.measure' )
            ->get();

        return view('drinks.list-drinks',['drinks' => $drinks]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the add-drink blade file view in drinks directory for web.php
     * Contains values from measures table for select option
     */
    public function getAddDrink()
    {
       $measures = Measure::all();
       return view('drinks.add-drink',['measures' => $measures]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the list-measures blade file view in measures directory for web.php
     * Contains values from measures table to display measures in table
     */
    public function getListMeasures()
    {
        $measures = Measure::all();
        return view('measures.list-measures',['measures' => $measures]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the edit-measures blade file view in measures directory for web.php
     * Returns with specified values
     *
     */
    public function getUpdateMeasure($id)
    {
        $measure = DB::table('measures')->where('id_measure', $id)->first();
        return view('measures.edit-measures',['measure' => $measure]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the add-measures blade file view in measures directory for web.php
     * Contains values from measures table
     */
    public function getAddMeasure()
    {
        $measures = Measure::all();
        return view('measures.add-measures',['measure' => $measures]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the add-current-state blade file view in current-states directory for web.php
     */
    public function getCurrentState()
    {

        return view('current-states.add-current-state');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the add-sale blade file view in sales directory for web.php
     * Contains values from current-states and drinks table
     */
    public function getSales()
    {
     $currentStatesAndDrinks = CurrentState::join('drinks','current_states.drink_id', 'drinks.drink_id')
        ->select('drinks.drink_name','drinks.drink_image', 'current_states.current_state_id')
        ->get();

        return view('sales.add-sale',['currentStatesAndDrinks' => $currentStatesAndDrinks]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the add-sold blade file view in solds directory for web.php
     */
    public function getSolds()
    {
        return view('solds.add-sold');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method returns the change-current-state blade file view in current-states directory for web.php
     */
    public function getChangeCurrentState()
    {
        $drinks = Drink::all();
        return view('current-states.change-current-state', ['drinks' => $drinks ]);
    }

}
