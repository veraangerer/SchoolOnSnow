<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Request;

use App\Http\Requests;
use App\Student;
use App\Wish;

class StudentController extends Controller
{
    public function index(){

    }

    public function createStudent(){


        $request = Request::all();

        //validate the data
     /*  $this->validate($request, array(
            'firstName' => 'required|max:255',
            'lastName'  => 'required|max:255',
            'bDay' => 'required',
            'class_Id' =>'required',
            'telPrimary' => 'required',
            'telSecondary' => 'required',
            'skillLevel' => 'required',
        ));
    */
        //store the data
        $student = new Student;
        $student->firstName = $request['firstName'];
        $student->lastName = $request['lastName'];
        $student->bDate = $request['bDate'];
        $student->class_Id = $request['class_Id'];
        $student->telPrimary = $request['telPrimary'];
        $student->telSecondary = $request['telSecondary'];
        $student->canTakePhotos = $request['canTakePhotos'];
        $student->hasTicket = $request['hasTicket'];
        $student->skillLevel = $request['skillLevel'];
        $student->wish_Id= (int)$request['wish_Id'];
       // dd((int)$request['wish_Id']);

        $student->save();

       // return view('pages.showStudent', $student->id);
        return view('pages.registerChildAccomplished');

    }

    public function show($id){

    }

    public function edit($id){
        $student = Student::find($id);
        $student->save();
    }

    public function delete($id){
        Student::destroy($id);
    }

    public function create(){
        $wish = Request::all();
        $wish_Id = (int) $wish['wish_Id'];

        $wishtable = \DB::table('elementary_wishes')->where('id', $wish_Id)->get();
        $class_Id =  \DB::table('elementary_wishes')->where('id', $wish_Id)->value('class_Id');
       // $cities_countries_id = \DB::table('elementary_offer_cities_countries')->where('cities_id', (int)$request['city'])->value('id');


        //dd($class_Id);


        if (sizeof($wishtable) > 0)
        {
            //dd($wishtable);
            //dd($wish_Id);
            return view('pages.registerChildForm')->with('wish_Id', $wish_Id)->with('class_Id', $class_Id);//->with('class_id', $class_id->class_id);
            //return redirect()->action('StudentController@getForm', ['wish_Id' => $wish_Id]);
            //return "Something wrong";
        }
        //else return "Code ist nicht vorhanden - Bitte prüfen";
        else return view('pages.404');

    }

}