<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Sold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoldController extends Controller{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Store sold, then redirect the user
     *
     */
    public function storeSold(Request $request)
    {

        foreach ($request->id_sale as $one_field) {
            $sold = DB::table("solds")->insert(['id_sale' =>  $one_field]);
            DB::table("sales")->update(['on_sale' =>  0]);
        }

        return redirect()->route('add-sale');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Count sold
     */
    public function countSold($id)
    {
        $count = DB::table("sales")->where('id_current_state', '=' ,$id)->count();
        $data['count-sold'] = $count;
        return response()->json($data);
    }
}
