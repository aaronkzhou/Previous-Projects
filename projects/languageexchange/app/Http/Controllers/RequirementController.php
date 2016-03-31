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
    	$this->validate($request,[
    		'name'=>'required|max:255',
    		'location'=>'required|max:255',
    		'mainlang'=>'required|max:255',
    		'practicelang'=>'required|max:255',
            'description'=>'required|max:100000',
            'age'=>'required|numeric'
    	]);
    	$request->user()->requirements()->create([
    		'name'=>$request->name,
    		'location'=>$request->location,
    		'sex'=>$request->sex,
    		'mainlang'=>$request->mainlang,
    		'practicelang'=>$request->practicelang,
            'description'=>$request->description,
            'age'=>$request->age
            ]);
        $file=$request->file;
        Storage::disk('public')->put($file, 'Contents');
        return redirect('/');
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
                        'name'=>input::get('name'),
                        'age'=>input::get('age'),
                        'location'=>input::get('location'),
                        'sex'=>input::get('sex'),
                        'mainlang'=>input::get('mainlang'),
                        'practicelang'=>input::get('practicelang'),
                        'description'=>Form::textarea('description')
                    ));
    }
    public function getalloverallinfo(){
        //echo requirement::all();
        return response()->json(requirement::all());
    }
    public function getspecifyinfo(Request $request){
       return response()->json(requirement::where('user_id',$request->user()->id)->get());
    }

}

