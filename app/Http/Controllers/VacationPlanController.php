<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacationPlan;
use App\People;

class VacationPlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings(Request $request)
    {
    	$vacationPlan = new VacationPlan();
    	$vacationPlan->startDate = $request->startDate;
		$vacationPlan->endingDate = $request->endingDate;
		$vacationPlan->minimumAge = $request->minimumAge;
		$vacationPlan->maximumAge = $request->maximumAge;
		$vacationPlan->startDatePlan = $request->startDatePlan;
		$vacationPlan->endingDatePlan = $request->endingDatePlan;
		$vacationPlan->save();
		return response()->json(['status'=>200]);
    }

    public function search()
    {	
    	$people = People::all();
    	return view('vacationPlan.search',compact('people'));
    }
}
