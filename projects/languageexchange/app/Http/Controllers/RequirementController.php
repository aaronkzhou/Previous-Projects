<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\requirement;
use App\Repositories\RequirementRepository;

class RequirementController extends Controller
{

    protected $requirements;

    public function __construct(RequirementRepository $requirements)
    {

        $this->middleware('auth');
        $this->requirements=$requirements;

    }
    public function welcome(Request $request)
    {
        $user=$request->user()->id;
        return view('index')
        ->with('user',$user);
    }
    public function store(Request $request)
    {
    	echo ($request->name);
        //return redirect('/');
    }
    public function index(Request $request){

        $requirementexistence=requirement::where('user_id',($request->user()->id))->count();
        //($request->user()->id)
    	return view('requirements.index')
        ->with('requirementexistence',$requirementexistence);
    }
    // public function delete(Request $request){
    //     requirement::where('user_id',$request->user()->id)
    //                 ->delete();
    // }
    public function updatepersonalinfo(Request $request){
        requirement::where('user_id',$request->user()->id)
                    ->update(array(
                        'name'=>$request->name,
                        'age'=>$request->age,
                        'location'=>$request->location,
                        'sex'=>$request->sex,
                        'mainlang'=>$request->mainlang,
                        'practicelang'=>$request->practicelang,
                        'description'=>$request->description
                    ));
        $file=$request->file;
        Storage::disk('public')->move($file,'Contents');
        return redirect('/');
    }
    public function getalloverallinfo(){
        return requirement::all();
    }
    public function getspecifyinfo($id){
       return response()->json(requirement::where('user_id',$id)->get());
    }
}

