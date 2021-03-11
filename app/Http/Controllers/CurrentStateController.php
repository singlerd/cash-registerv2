<?php

namespace App\Http\Controllers;

use App\Models\CurrentState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentStateController extends Controller
{
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

    public function deleteCurrentState(Request $request)
    {
        $deleteCurrentState = DB::table('current_states')->where('id_current_state',$request->id_current_state)->delete();
        if($deleteCurrentState)
            return redirect()->route('add-current-state')->with('success', 'Uspešno ste izbrisali podatke.');
    }

    public function getCurrentStates()
    {
//        $currentStates =  DB::table("current_states")->select('current_states.*','drinks.*','sales.*')
//            ->join('drinks','current_states.drink_id' ,'=', 'drinks.drink_id')
//            ->leftJoin(DB::raw("(SELECT SUM(sales.current_state_id) AS sumed FROM sales) `sales` "), "current_states.current_state_id", "sales.current_state_id")
//            ->get();

        $sql = "
                SELECT b.on_sale,a.current_state_id ,d.name, a.transferred_quantity,a.purchase_quantity,COUNT(b.current_state_id) as countSale,d.sold_price, b.current_state_id AS current_state_id_from_sales, m.measure FROM
                (SELECT * FROM current_states) a
                LEFT JOIN (SELECT current_state_id,on_sale FROM sales) b
                ON a.current_state_id = b.current_state_id
                JOIN drinks d
                ON a.drink_id = d.drink_id
                JOIN `measures` m
                ON d.measure_id =  m.id_measure
                GROUP BY a.current_state_id, b.current_state_id, b.on_sale
                ";
        $currentStates =  DB::select($sql);
        $data['current-states'] = $currentStates;

        return response()->json($data);
    }

    public function updatePurchasingDrink($id, Request $request)
    {
        $updated_data = DB::table('current_states')->where('current_state_id',$id)->update(['purchase_quantity' => $request->data]);
        $data['update-current-states'] = $updated_data;

        return response()->json($data);
    }

    public function updateTransferredQuantity($id, Request $request)
    {
        $updated_data = DB::table('current_states')->where('current_state_id',$id)->update(['transferred_quantity' => $request->data]);
        $data['update-current-states'] = $updated_data;

        return response()->json($data);
    }

    public function updateTotalSale($id, Request $request)
    {
        $updated_data = DB::table('current_states')->where('current_state_id',$id)->update(['purchase_quantity' => $request->data]);
        $data['update-current-states'] = $updated_data;

        return response()->json($data);
    }

    public function print()
    {
        $sql = "
                SELECT b.on_sale,a.current_state_id ,d.name, a.transferred_quantity,a.purchase_quantity,COUNT(b.current_state_id) as countSale,d.sold_price, b.current_state_id AS current_state_id_from_sales, m.measure FROM
                (SELECT * FROM current_states) a
                LEFT JOIN (SELECT current_state_id,on_sale FROM sales) b
                ON a.current_state_id = b.current_state_id
                JOIN drinks d
                ON a.drink_id = d.drink_id
                JOIN `measures` m
                ON d.measure_id =  m.id_measure
                GROUP BY a.current_state_id, b.current_state_id, b.on_sale
                ";
        $currentStates =  DB::select($sql);

        return view("current-states.print-current-state",['currentStates' => $currentStates]);
    }
}
