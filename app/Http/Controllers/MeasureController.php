<?php
namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasureController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Validate the fields
     * Update measure, then redirect the user with message
     */
    public function updateMeasure(Request $request)
    {
        $validated = $request->validate([
            'name_measure' => 'required',
            'measure' => 'required',
            'measure_per_bottle' => 'required',
        ],[
            'name_measure.required' => 'Naziv pića je obavezno polje',
            'measure.required' => ' obavezno polje',
            'measure_per_bottle' => ' obavezno polje',
        ]);
        if($validated) {

            $drink = DB::table('measures')->where('id_measure', $request->id_measure)->update(['name_measure' => $request->name_measure, 'measure' => $request->measure, 'measure_per_bottle' => $request->measure_per_bottle]);
            if ($drink)
                return redirect()->route('list-measures')->with('success', 'Uspešno sačuvano u bazi podataka.');
            else
                return redirect()->route('list-measures')->with('error', 'error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Delete measure, redirect the user with message if deletion succeeded.
     */
    public function deleteMeasure(Request $request)
    {
        $drink = DB::table('measures')->where('id_measure',$request->id_measure)->delete();
        if($drink)
            return redirect()->route('list-measures')->with('success', 'Uspešno ste obrisali podatke');
        else
            return redirect()->route('list-measures')->with('error', 'Error');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Validate the fields
     * Add measure and redirect the user with message
     */
    public function addMeasure(Request $request)
    {
        $validated = $request->validate([
            'name_measure' => 'required',
            'measure' => 'required',
            'measure_per_bottle' => 'required',
        ],[
            'name_measure.required' => 'Naziv pića je obavezno polje',
            'measure.required' => ' obavezno polje',
            'measure_per_bottle' => ' obavezno polje',
        ]);

        if($validated) {
            $measure = new Measure();
            $measure->name = $request->input('name_measure');
            $measure->measure = $request->input('measure');
            $measure->measure_per_bottle = $request->input('measure_per_bottle');

            $measure->save();
        }
        return redirect()->route('add-measure')->with('success', 'Uspešno sačuvano u bazi podataka.');
    }
}
