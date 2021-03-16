<?php

namespace App\Http\Controllers;

use App\Models\CurrentState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentStateController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Store current state. At the beginning check if exists.
     */

    public function storeCurrentState(Request $request)
    {
        $request->validate([
            'drink' => 'required',
            'quantity' => 'required',
        ],[
            'drink.required' => 'Naziv pića je obavezno polje',
            'quantity.required' => 'Obavezno polje',
        ]);

        $checkIfExist=DB::table('current_states')->where('drink_id',  $request->input('drink'))->first();
        If($checkIfExist == true)
             return redirect()->route('add-current-state')->with('error', 'Ne možete dva ista proizvoda uneti u trenutno stanje.');
        else
            $currentState = new CurrentState();
            $currentState->drink_id = $request->input('drink');
            $currentState->transferred_quantity = $request->input('quantity');
            $currentState->purchase_quantity = 0;

            $currentState->save();
            return redirect()->route('add-current-state')->with('success', 'Uspešno sačuvano u bazi podataka.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Delete the specified current state
     */
    public function deleteCurrentState(Request $request)
    {
        $deleteCurrentState = DB::table('current_states')->where('id_current_state',$request->id_current_state)->delete();
        if($deleteCurrentState)
            return redirect()->route('add-current-state')->with('success', 'Uspešno ste izbrisali podatke.');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Getting current states with raw sql. This method is used for API
     */
    public function getCurrentStates()
    {

        $sql = "
                SELECT b.on_sale,a.current_state_id ,d.drink_name, a.transferred_quantity,a.purchase_quantity,COUNT(b.current_state_id) as countSale,d.sold_price, b.current_state_id AS current_state_id_from_sales, m.measure, m.measure_per_bottle,d.purchase_price  FROM
                (SELECT * FROM current_states) a
                LEFT JOIN (SELECT current_state_id,on_sale FROM sales) b
                ON a.current_state_id = b.current_state_id
                JOIN drinks d
                ON a.drink_id = d.drink_id
                JOIN `measures` m
                ON d.measure_id =  m.id_measure
                GROUP BY a.current_state_id, b.current_state_id, b.on_sale, m.measure_per_bottle, d.purchase_price
                ";
        $currentStates =  DB::select($sql);
        $data['current-states'] = $currentStates;

        return response()->json($data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * This method is used for updating one field in current-states/change (Promena stanja)
     * Used for fifth column, when user change the value
     */
    public function updatePurchasingDrink($id, Request $request)
    {
        $updated_data = DB::table('current_states')->where('current_state_id',$id)->update(['purchase_quantity' => $request->data]);
        $data['update-current-states'] = $updated_data;

        return response()->json($data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * This method is used for updating one field in current-states/change (Promena stanja)
     * Used for fourth column, when user change the value
     */
    public function updateTransferredQuantity($id, Request $request)
    {
        $updated_data = DB::table('current_states')->where('current_state_id',$id)->update(['transferred_quantity' => $request->data]);
        $data['update-current-states'] = $updated_data;

        return response()->json($data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * This method is used for printing actual data in current state
     */
    public function print()
    {
        $sql = "
                SELECT b.on_sale,a.current_state_id ,d.drink_name, a.transferred_quantity,a.purchase_quantity,COUNT(b.current_state_id) as countSale,d.sold_price, b.current_state_id AS current_state_id_from_sales, m.measure,m.measure_per_bottle,d.purchase_price  FROM
                (SELECT * FROM current_states) a
                LEFT JOIN (SELECT current_state_id,on_sale FROM sales) b
                ON a.current_state_id = b.current_state_id
                JOIN drinks d
                ON a.drink_id = d.drink_id
                JOIN `measures` m
                ON d.measure_id =  m.id_measure
                GROUP BY a.current_state_id, b.current_state_id, b.on_sale,m.measure_per_bottle,d.purchase_price
                ";
        $currentStates =  DB::select($sql);

        return view("current-states.print-current-state",['currentStates' => $currentStates]);
    }
}
