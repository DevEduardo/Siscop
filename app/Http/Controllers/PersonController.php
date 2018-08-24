<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Cities;
use App\People;
use App\Family;
use App\Studies;
use App\Estates;
use App\Parishes;
use App\Direction;
use App\Formations;
use App\Municipalities;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::pluck("firstName","id")->all();
        return view('person.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $estate = \DB::table('estados')->pluck("estado","id_estado")->all();
        return view('person.createNewPerson',compact('estate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     ucwords()
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
               
                $person = new People();
                $person->nacionality = 'v';
                $person->document    = $request->document;
                $person->firstName   = ucwords($request->firstName);
                $person->lastName    = ucwords($request->lastName);
                $person->birthdate   = $request->birthdate;
                $person->gender      = $request->gender;
                $person->phone       = $request->phone;
                $person->telephone   = $request->telephone;
                $person->email       = $request->email;
                $person->civilStatus = $request->civilStatus;
                $person->save();

                if ($request->file('picture')) {
                    $path = Storage::disk('public')->put('storage',  $request->file('picture'));
                    $person->fill(['picture' => asset($path)])->save();
                }
                return response()->json(['status'=>'200','person'=>$person->id]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $person           = People::findOrFail($request->person);
        $address          = Direction::FindPerson($request->person);
        $study            = Studies::FindPerson($request->person);
        $formations       = Formations::FindPerson($request->person);
        $families         = Family::FindPerson($request->person);
        $estates          = Estates::select('id_estado','estado')->get();
        $citys            = Cities::select('id_ciudad','ciudad')->get();
        $parishes         = Parishes::select('id_parroquia','parroquia')->get();
        $municipalities   = Municipalities::select('id_municipio','municipio')->get();
        $numberNoDocument = Family::FamilyNoDocument();
        return view('person.editPerson',compact('numberNoDocument','person','address','study','formations','families','estates','citys','city','parishes','municipalities'));
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
               
                $person = People::findOrFail($id);
                $person->nacionality = 'v';
                $person->document    = $request->document;
                $person->firstName   = ucwords($request->firstName);
                $person->lastName    = ucwords($request->lastName);
                $person->birthdate   = $request->birthdate;
                $person->gender      = $request->gender;
                $person->phone       = $request->phone;
                $person->telephone   = $request->telephone;
                $person->email       = $request->email;
                $person->civilStatus = $request->civilStatus;
                $person->save();

                if ($request->file('picture')) {
                    $path = Storage::disk('public')->put('storage',  $request->file('picture'));
                    $person->fill(['picture' => asset($path)])->save();
                }
                return response()->json(['status'=>'200','person'=>$person->id]);
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
