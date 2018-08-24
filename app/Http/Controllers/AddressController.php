<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipalities;
use App\Direction;
use App\Parishes;
use App\Cities;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getCity($id)
    {
        $cities = Cities::GetCity($id);
        return response()->json($cities);
    }

    public function getMunicipality($id)
    {
        $municipality = Municipalities::GetMunicipality($id);
        return response()->json($municipality);
    }

    public function getParish($id)
    {
        $parish = Parishes::GetParish($id);
        return response()->json($parish);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            /*$v= $this->validate($request,[
                'document'    => 'required',
                'firstName'   => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'lastName'    => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'birthdate'   => 'required|date',
                'gender'      => 'required',
                'phone'       => 'required|numeric',
                'telephone'   => 'required|numeric',
                'email'       => 'required|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:people,email',
                'picture'     => 'required|file',
                'civilStatus' => 'required'
            ]);*/
            $v=0;
            if ($v == 1){
                return redirect()->back()->withInput()->withErrors($v->errors());
            }else{
               
                $address = new Direction();
                $address->person       = $request->person;
                $address->country      = $request->country;
                $address->city         = $request->city;
                $address->estate       = $request->estate;
                $address->municipality = $request->municipality;
                $address->parish       = $request->parish;
                $address->sector       = $request->sector;
                $address->street       = $request->street;
                $address->dwelling     = $request->dwelling;
                $address->save();
                return response()->json(['status'=>'200','person'=>$request->person]);
            }    
        }
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
        if ($request->ajax()) {

            /*$v= $this->validate($request,[
                'document'    => 'required',
                'firstName'   => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'lastName'    => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'birthdate'   => 'required|date',
                'gender'      => 'required',
                'phone'       => 'required|numeric',
                'telephone'   => 'required|numeric',
                'email'       => 'required|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:people,email',
                'picture'     => 'required|file',
                'civilStatus' => 'required'
            ]);*/
            $v=0;
            if ($v == 1){
                return redirect()->back()->withInput()->withErrors($v->errors());
            }else{
               
                $address = Direction::findPerson($id);
                $address->person       = $request->person;
                $address->country      = $request->country;
                $address->city         = $request->city;
                $address->estate       = $request->estate;
                $address->municipality = $request->municipality;
                $address->parish       = $request->parish;
                $address->sector       = $request->sector;
                $address->street       = $request->street;
                $address->dwelling     = $request->dwelling;
                $address->save();
                return response()->json(['status'=>'200']);
            }
            
        }
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
}
