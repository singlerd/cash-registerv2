<?php
namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasureController extends Controller
{
    public function updateMeasure(Request $request)
    {
        $request->validate([
            'measure' => 'required',
        ],[
            'measure.required' => 'Naziv pića je obavezno polje'
        ]);

        $drink = DB::table('measures')->where('id_measure',$request->id_measure)->update(['measure' => $request->measure]);
        if($drink)
            return redirect()->route('list-measures')->with('success', 'Uspešno sačuvano u bazi podataka.');
        else
            return redirect()->route('list-measures')->with('error', 'error');
    }

    public function deleteMeasure(Request $request)
    {
        $drink = DB::table('measures')->where('id_measure',$request->id_measure)->delete();
        if($drink)
            return redirect()->route('list-measures')->with('success', 'Uspešno ste obrisali podatke');
        else
            return redirect()->route('list-measures')->with('error', 'Error');
    }

    public function addMeasure(Request $request)
    {
        $request->validate([
            'measure' => 'required',
        ],[
            'measure.required' => 'Naziv pića je obavezno polje',
        ]);

        $measure = new Measure();
        $measure->measure = $request->input('measure');

        $measure->save();

        return redirect()->route('add-measure')->with('success', 'Uspešno sačuvano u bazi podataka.');
    }
}
