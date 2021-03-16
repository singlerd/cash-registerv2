<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Store the sale if the user click on drink
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Update the on_sale column with 1 if the user click on button
     */
    public function updateSale(Request $request)
    {

        foreach ($request->sale_id as $one_field) {
            DB::table("sales")->where('sale_id',$one_field)->update(['on_sale' =>  1]);
//            DB::table("solds")->insert(['id_sale' => $one_field]);
        }

            return redirect()->route('add-sale');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Get sales
     */
    public function getSale()
    {
        $saleCurrentStatesDrinks = Sale::leftJoin('current_states','sales.current_state_id' ,'=', 'current_states.current_state_id')
            ->leftJoin('drinks','current_states.drink_id' ,'=', 'drinks.drink_id')
            ->leftJoin('measures','drinks.measure_id' ,'=', 'measures.id_measure')
            ->select("*" )->where('on_sale',  '=', 0)
            ->get();
        $data['sale'] = $saleCurrentStatesDrinks;

        return response()->json($data);
    }

    public function deleteSale($id)
    {
         Sale::where('sale_id', $id)->delete();
    }

    public function countSale()
    {
        $countSale = Sale::all()->where("on_sale", 0)->count();
        $data['count_sale'] = $countSale;
        return response()->json($data);
    }

}
