<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banks;
use App\People;
use App\Payroll;
use App\Charges;
use App\Variables;
use App\Departaments;
use App\Dependencies;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $people       = People::WithoutContract();
        $charges      = Charges::pluck("position","id")->all();
        $departaments = Departaments::pluck("departament","id")->all();
        $dependencies = Dependencies::pluck("dependence","id")->all();
        $banks        = Banks::pluck("bank","id")->all();
        return view('payroll.index',compact('banks','people','charges', 'dependencies', 'departaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $payroll = new Payroll();

        $dataSalary = explode(' ', $request->salary);
        $salary = str_replace('.', '', $dataSalary[1]);
        $salary = str_replace(',', '.', $salary);

        $payroll->person          = $request->person;
        $payroll->workCondition   = $request->workCondition;
        $payroll->type            = $request->type;
        $payroll->code            = $request->code;
        $payroll->position        = $request->position;
        $payroll->dependence      = $request->dependence;
        $payroll->departament     = $request->departament;
        $payroll->salary          = $salary;
        $payroll->dateOfAdmission = $request->dateOfAdmission;
        $payroll->dueDate         = $request->dueDate;
        $payroll->status          = 1;
        $payroll->grade           = $request->grade;
        $payroll->BankAccount     = $request->bankAccount;
        $payroll->bank            = $request->bank;
        $payroll->save();

        $person = People::find($request->person)->update(['status'=>1]);
        return response()->json(['status'=>200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function code($type)
    {   
        $code = Variables::Code();
        if ($type == '01' ) {
            $num = $code->codeEF + 1;
            $codePayroll = $this->getCode($num, 'EF');
        }elseif ($type == '00') {
            $num = $code->codeEC + 1;
            $codePayroll = $this->getCode($num, 'EC');
        }elseif ($type == '11') {
            $num = $code->codeOF + 1;
            $codePayroll = $this->getCode($num, 'OF');
        }elseif ($type == '10') {
            $num = $code->codeOC + 1;
            $codePayroll = $this->getCode($num, 'OC');
        }
            return response()->json(['code'=>$codePayroll]);
        
    }

    private function getCode($num, $literal)
    {
        $zero = strlen($num);
        if ($zero = 1) {
            $cod = $literal.'-0000';
        }elseif ($zero = 2) {
            $cod = $literal.'-000';
        }elseif ($zero = 3) {
            $cod = $literal.'-00';
        }elseif ($zero = 4) {
            $cod = $literal.'-0';
        }elseif ($zero = 5) {
            $cod = $literal.'-';
        }
        return $codePayroll = $cod.$num;
    }
}
