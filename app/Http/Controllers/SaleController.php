<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function storeSale(Request $request)
    {


        $response = [
            'current_state_id' => $request->current_state_id
        ];

        if($response){
            $sale = new Sale();

            $sale->current_state_id = $request->input('current_state_id');
            $sale->user_id = auth()->id();
            $sale->on_sale = 0;
            $sale->save();
        }
        return response()->json($response);
    }

    public function updateSale(Request $request)
    {

        foreach ($request->sale_id as $one_field) {
            DB::table("sales")->where('sale_id',$one_field)->update(['on_sale' =>  1]);
        }

            return redirect()->route('add-sale');

    }

    public function getSale()
    {
        $saleCurrentStatesDrinks = Sale::join('current_states','sales.current_state_id' ,'=', 'current_states.current_state_id')
            ->join('drinks','current_states.drink_id' ,'=', 'drinks.drink_id')
            ->join('measures','drinks.measure_id' ,'=', 'measures.id_measure')
            ->select("*" )->where('on_sale',  '=', 0)
            ->get();
        $data['data'] = $saleCurrentStatesDrinks;

        return response()->json($data);
    }

    public function deleteSale($id)
    {
         Sale::where('sale_id', $id)->delete();
    }


}
