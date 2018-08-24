<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Studies;

class StudyController extends Controller
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
               
                $study = new Studies();
                $study->person      = $request->person;
                $study->instruction = $request->instruction;
                $study->grade       = ucwords($request->grade);
                $study->egressDate  = $request->egressDate;
                $study->save();

                if ($request->file('picture')) {
                    $path = Storage::disk('public')->put('storage',  $request->file('picture'));
                    $study->fill(['picture' => asset($path)])->save();
                }
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
               
                $study = Studies::findPerson($id);
                $study->person      = $request->person;
                $study->instruction = $request->instruction;
                $study->grade       = ucwords($request->grade);
                $study->egressDate  = $request->egressDate;
                $study->save();

                if ($request->file('picture')) {
                    $path = Storage::disk('public')->put('storage',  $request->file('picture'));
                    $study->fill(['picture' => asset($path)])->save();
                }
                return response()->json(['status'=>'200','person'=>$request->person]);
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
