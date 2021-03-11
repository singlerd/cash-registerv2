<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinkController extends Controller
{

    public function storeDrink(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'purchase_price' => 'required',
            'sold_price' => 'required',
            'drink_image' => 'required|mimes:png|max:2048'
        ],[
            'name.required' => 'Naziv pića je obavezno polje',
            'manufacturer.required' => 'Proizvođač je obavezno polje',
            'purchase_price.required' => 'Nabavna cena je obavezno polje',
            'sold_price.required' => 'Prodajna cena je obavezno polje',
            'drink_image.required' => 'Slika je obavezna',
            'drink_image.mimes' => 'Slika mora sadrzati .png eksetnziju',
            'drink_image.max' => 'Slika moze da zauzima najvise 2 MB.',

        ]);

        $imageName = time(). '.' .$request->drink_image->extension();
        $request->drink_image->move( public_path().'/storage/drinks' , $imageName);
        $drink = new Drink();
        $drink->id_measure = $request->input('measures');
        $drink->name = $request->input('name');
        $drink->manufacturer = $request->input('manufacturer');
        $drink->purchase_price = $request->input('purchase_price');
        $drink->sold_price = $request->input('sold_price');
        $drink->drink_image =  $imageName;

        $drink->save();

        return redirect()->route('list-drinks')->with('success', 'Uspešno sačuvano u bazi podataka.');
    }

    public function show()
    {
        return view('drinks.add');
    }

    // Getting the page for specified drink
    public function edit($id)
    {
        $drink = Drink::where('drink_id', $id)->first();
        $measures = Measure::all();

        if ($drink)
            return view('drinks.edit-drink',['drink' => $drink, 'measures' =>$measures]);
        else
            return redirect()->route('drink.index')->with('error', 'Ne postoji');
    }

    // Update the specified drink
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'purchase_price' => 'required',
            'sold_price' => 'required',
            'drink_image' => 'required|mimes:png,jpg|max:2048'

        ],[
            'name.required' => 'Naziv pića je obavezno polje',
            'manufacturer.required' => 'Proizvođač je obavezno polje',
            'purchase_price.required' => 'Nabavna cena je obavezno polje',
            'sold_price.required' => 'Prodajna cena je obavezno polje',
            'drink_image.required' => 'Slika je obavezna',
            'drink_image.mimes' => 'Slika mora sadrzati .png ili .jpg eksetnziju',
            'drink_image.max' => 'Slika moze da zauzima najvise 2 MB.',

        ]);
        $imageName = time(). '.' .$request->drink_image->extension();
        $request->drink_image->move( public_path().'/storage/drinks' , $imageName);

         $drink = Drink::where('drink_id',$request->drink_id)->update(['name' => $request->name,'purchase_price' => $request->purchase_price,'sold_price' => $request->sold_price,'manufacturer' => $request->manufacturer,'measure_id' => $request->measures, 'drink_image' => $imageName ]);

        if($drink)
            return redirect()->route('list-drinks')->with('success', 'Uspešno sačuvano u bazi podataka.');
        else
            return redirect()->route('list-drinks')->with('error', 'error');
    }

    public function destroy(Request $request)
    {
//        $drink = DB::table('drinks')->where('id_drink',$request->id_drink)->delete();
        $drink = Drink::where('drink_id',$request->drink_id)->delete();
        if($drink)
            return redirect()->route('list-drinks')->with('success', 'Uspešno ste obrisali podatke');
        else
            return redirect()->route('list-drinks')->with('error', 'Error');
    }
}
