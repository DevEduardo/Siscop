<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabuladors;

class SettingController extends Controller
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

    public function getTabulador()
    {
    	$tab = Tabuladors::all();
    	$id = $tab->count();
    	
    	if ($tab->count() > 0) {
    		$tabulador = Tabuladors::findOrFail($id);
    		$newtabulador =1;
    		return view('settings.tabulador',compact('newtabulador','tabulador'));
    	}else{
    		$newtabulador = 0;
    		return view('settings.tabulador',compact('newtabulador'));
    	}
    }

    public function postTabulador(Request $request)
    {
    	$tabulador = new Tabuladors();

		$salaryB    = $request->salary + (($request->salary * $request->porcentB) / 100);
		$salaryBI   = $request->salary + (($request->salary * $request->porcentBI) / 100);
		$salaryBII  = $salaryBI + (($salaryBI * $request->porcentBII) / 100);
		$salaryBIII = $salaryBII + (($salaryBII * $request->porcentBIII) / 100);
		$salaryT    = $request->salary + (($request->salary * $request->porcentT) / 100);
		$salaryTI   = $request->salary + (($request->salary * $request->porcentTI) / 100);
		$salaryTII  = $salaryTI + (($salaryTI * $request->porcentTII) / 100);
		$salaryP    = $request->salary + (($request->salary * $request->porcentP) / 100);
		$salaryPI   = $request->salary + (($request->salary * $request->porcentPI) / 100);
		$salaryPII  = $salaryPI + (($salaryPI * $request->porcentPII) / 100);
		$salaryPIII = $salaryPII + (($salaryPII * $request->porcentPIII) / 100);

		$tabulador->salary      = $request->salary;
		$tabulador->salaryB     = $salaryB;
		$tabulador->salaryBI    = $salaryBI;
		$tabulador->salaryBII   = $salaryBII;
		$tabulador->salaryBIII  = $salaryBIII;
		$tabulador->salaryT     = $salaryT;
		$tabulador->salaryTI    = $salaryTI;
		$tabulador->salaryTII   = $salaryTII;
		$tabulador->salaryP     = $salaryP;
		$tabulador->salaryPI    = $salaryPI;
		$tabulador->salaryPII   = $salaryPII;
		$tabulador->salaryPIII  = $salaryPIII;
		
		$tabulador->porcentB    = $request->porcentB;
		$tabulador->porcentBI   = $request->porcentBI;
		$tabulador->porcentBII  = $request->porcentBII;
		$tabulador->porcentBIII = $request->porcentBIII;
		$tabulador->porcentT    = $request->porcentT;
		$tabulador->porcentTI   = $request->porcentTI;
		$tabulador->porcentTII  = $request->porcentTII;
		$tabulador->porcentP    = $request->porcentP;
		$tabulador->porcentPI   = $request->porcentPI;
		$tabulador->porcentPII  = $request->porcentPII;
		$tabulador->porcentPIII = $request->porcentPIII;
		$tabulador->save();
    	return response()->json(['status'=>200]);
    }


    public function getSalary($grade)
    {
    	$tab = Tabuladors::all();
    	$id = $tab->count();
    	if ($id > 0) {
    		$tabulador = Tabuladors::find($id);
    		$salary = 0;
    		switch ($grade) {
    			case '0':
    				# code...B
    				$salary = $tabulador->salaryB;
    				break;
    			case '1':
    				# code...BI
    				$salary = $tabulador->salaryBI;
    				break;
    			case '2':
    				# code...BII
    				$salary = $tabulador->salaryBII;
    				break;
    			case '3':
    				# code...BIII
    				$salary = $tabulador->salaryBIII;
    				break;
    			case '4':
    				# code...T
    				$salary = $tabulador->salaryT;
    				break;
    			case '5':
    				# code...TI
    				$salary = $tabulador->salaryTI;
    				break;
    			case '6':
    				# code...TII
    				$salary = $tabulador->salaryTII;
    				break;
    			case '7':
    				# code...P
    				$salary = $tabulador->salaryP;
    				break;
    			case '8':
    				# code...PI
    				$salary = $tabulador->salaryPI;
    				break;
    			case '9':
    				# code...PII
    				$salary = $tabulador->salaryPII;
    				break;
    			case '10':
    				# code...PIII
    				$salary = $tabulador->salaryPIII;
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    		return response()->json(mil($salary));
    	}

    	
    }
}
