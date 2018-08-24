<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use App\Family;

class FamilyController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $person = People::findOrFail($request->person);
        $numberNoDocument = Family::FamilyNoDocument();
        return view('family.createNewFamily', compact('person','numberNoDocument'));
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
            $noDocument = 0;
            if ($request->noDocument) {
                $noDocument = 1;
                $family = new Family();
                $family->person           = $request->person;
                $family->noDocument       = $noDocument;
                $family->nationality      = 'v';
                $family->document         = $request->document;
                $family->birthCertificate = 'null';
                $family->firstName        = ucwords($request->firstName);
                $family->lastName         = ucwords($request->lastName);
                $family->gender           = $request->gender;
                $family->birthdate        = $request->birthdate;
                $family->kin              = $request->kin;
                $family->civilStatus      = $request->civilStatus;
                $family->save();
                $countNoDocument = explode('-', $request->document); 
                return response()->json(['status'=>200,'count'=>$countNoDocument[1]]);
            }else{
                $family = new Family();
                $family->person           = $request->person;
                $family->noDocument       = $noDocument;
                $family->nationality      = 'v';
                $family->document         = $request->document;
                $family->birthCertificate = 'null';
                $family->firstName        = ucwords($request->firstName);
                $family->lastName         = ucwords($request->lastName);
                $family->gender           = $request->gender;
                $family->birthdate        = $request->birthdate;
                $family->kin              = $request->kin;
                $family->civilStatus      = $request->civilStatus;
                $family->save();
                return response()->json(['status'=>200]);
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPerson()
    {
        $people = People::pluck("firstName","id")->all();
        return view('family.index',compact('people'));
    }

    public function getDataFamily($id)
    {
        $family = Family::findOrFail($id);
        return response()->json($family);
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
        Family::findOrFail($id)->delete();
        return response()->json(['status'=> 200]);
    }
}
