<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Illuminate\Html;
use App\Http\Requests;
use Validator;
use Redirect;
use App\School;
use App\Sclass;
use App\Teacher;
use App\ElementaryOffer;
use Auth;

class SchoolController extends Controller
{
    public function create()
    {
        $packages = \DB::table('elementary_offer_packages')->lists('name', 'id');
        $countries = \DB::table('elementary_offer_countries')->lists('name', 'id');
        $cities = \DB::table('elementary_offer_cities')->lists('name', 'id');

        return view('pages.registerClassForm')->with('packages', $packages)->with('countries', $countries)->with('cities', $cities);
    }

    public function store(Request $request){
        //Validation START
        $rules = array(
            //School
            'idNumber' => 'required|max:10',
            'name' => 'required',
            'address' => 'required',
            'postcode' => 'required|numeric|min:2',
            'schools_city' => 'required',
            'schools_country' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            //Class
            'name_class' => 'required',
            'sumstudents' => 'required|numeric|min:1',
            //Teacher
            'firstName1' => 'required',
            'lastName1' => 'required',
            'telephone1' => 'required|numeric|min:4',
            'email1' => 'required|email',
            'firstName2' => 'required',
            'lastName2' => 'required',
            'telephone2' => 'required|numeric|min:4',
            'email2' => 'required|email',
            //Offer
            'package_id' => 'required',
            'country' => 'required',
            'city' => 'required',
            'primaryDateStart' => 'required|date',
            'primaryDateEnd' => 'required|date',
            'secondaryDateStart' => 'required|date',
            'secondaryDateEnd' => 'required|date',
        );

        $messages = [
            'idNumber.required' => 'Die Schulkennzahl muss eingetragen werden und darf nicht leer sein.',
            'name.required' => 'Der Name der Schule darf nicht leer sein.',
            'address.required' => 'Die Adresse der Schule darf nicht leer sein.',
            'postcode.required' => 'Die PLZ der Schule darf nicht leer sein.',
            'postcode.numeric' => 'Die PLZ muss eine Nummer sein.',
            'schools_city.required' => 'Der Ort der Schule darf nicht leer sein.',
            'schools_country.required' => 'Das Land der Schule darf nicht leer sein',
            'firstName.required' => 'Der Vorname des Direktors bzw. der Direktorin darf nicht leer sein.',
            'lastName.required' => 'Der Nachname des Direktors bzw. der Direktorin darf nicht leer sein.',
            'telephone.required' => 'Die Telefonnummer der Schule darf nicht leer sein.',
            'email.required' => 'Die offizielle Email der Schule darf nicht leer sein.',

            'name_class.required' => 'Die Bezeichnung der Klasse zb. 1A darf nicht leer sein.',
            'sumstudents.required' => 'Die Gesamtanzahl der Schüler die das Angebot wahrnehmen darf nicht leer sein.',
            //Teacher
            'firstName1.required' => 'Der Vorname des verantwortlichen Lehrers darf nicht leer sein.',
            'lastName1.required' => 'Der Nachname des verantwortlichen Lehrers darf nicht leer sein.',
            'telephone1.required' => 'Die Telefonnumber/Mobilnummer des verantwortlichen Lehrers darf nicht leer sein.',
            'email1.required' => 'Die E-mail des verantwortlichen Lehrers darf nicht leer sein.',
            'firstName2.required' => 'Der Vorname des Ersatzlehrers darf nicht leer sein.',
            'lastName2.required' => 'Der Nachname des Ersatzlehrers darf nicht leer sein.',
            'telephone2.required' => 'Die Telefonnumber/Mobilnummer des Ersatzlehrers darf nicht leer sein.',
            'email2.required' => 'Die E-mail des Ersatzlehrers darf nicht leer sein.',
            //Offer
            'package_id.required' => 'Bitte wählen Sie ein Paket aus, dass die Schule in Anspruch nimmt.',
            'country.required' => 'Der gewünschte Zielland darf nicht leer sein.',
            'city.required' => 'Der gewünschte Zielort darf nicht leer sein.',
            'primaryDateStart.required' => 'Das gewünschte Start-Datum darf nicht leer sein.',
            'primaryDateEnd.required' => 'Das gewünschte End-Datum darf nicht leer sein.',
            'secondaryDateStart.required' => 'Das gewünschte Start-Datum darf nicht leer sein. (Ersatztermin)',
            'secondaryDateEnd.required' => 'Das gewünschte Start-Datum darf nicht leer sein. (Ersatztermin)',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('registerClassForm')
                ->withInput()
                ->withErrors($validator);

        } else {

            $findSchoolID = \DB::table('schools')->where('idNumber', (int)$request['idNumber'])->get();

            if (sizeof($findSchoolID) === 0) {
                //Add new School
                $school = new School;
                $school->idNumber = $request['idNumber']; //SKZ
                $school->name = $request['name'];
                $school->address = $request['address'];
                $school->postcode = $request['postcode'];
                $school->city = $request['schools_city'];
                $school->country = $request['schools_country'];
                //Principalship
                $school->firstName = $request['firstName'];
                $school->lastName = $request['lastName'];
                $school->telephone = $request['telephone'];
                $school->email = $request['email'];
                $school->save();
            }

            //Add new Class
            $schoolClass = new Sclass; //schiach weil Class geschützt ;-)
            $schoolClass->school_Id = $request['idNumber']; //SKZ
            $schoolClass->name = $request['name_class'];
            $schoolClass->sumstudents = $request['sumstudents'];
            $schoolClass->save();
            $class_id = $schoolClass->id; //save instantly for offer down under  :-P  !!! DANGER

            //Add new Teachers
            $teacher1 = new Teacher;
            $teacher1->school_id = $request['idNumber'];
            $teacher1->firstName = $request['firstName1'];
            $teacher1->lastName = $request['lastName1'];
            $teacher1->telephone = $request['telephone1'];
            $teacher1->email = $request['email1'];
            $teacher1->isContact = 1;
            $teacher1->save();
            //ErsatzTeacher
            $teacher2 = new Teacher;
            $teacher2->school_id = $request['idNumber'];
            $teacher2->firstName = $request['firstName2'];
            $teacher2->lastName = $request['lastName2'];
            $teacher2->telephone = $request['telephone2'];
            $teacher2->email = $request['email2'];
            $teacher2->isSub = 1;
            $teacher2->save();

            //Offer
            $wish = new ElementaryOffer();
            $wish->id = $this->generateRndNumber(); // = Number 4 PDF
            $wish->package_id = $request['package_id'];
            $wish->class_id = $class_id;

            //Get ID from cities_coutries with city_id of form
            $cities_countries_id = \DB::table('elementary_offer_cities_countries')->where('cities_id', (int)$request['city'])->value('id');
            $wish->cities_countries_id = $cities_countries_id;

            $wish->primaryDateStart = $request['primaryDateStart'];
            $wish->primaryDateEnd = $request['primaryDateEnd'];
            $wish->secondaryDateStart = $request['secondaryDateStart'];
            $wish->secondaryDateEnd = $request['secondaryDateEnd'];

            $user = Auth::user();
            $wish->user_id = $user->id;
            $wish->save();

        }
        return view('pages.registerChildAccomplished');
    }

    //Couldn't find out how to recursivly use this function, cz Laravel hissed on it =^.^=      Result = ugly solution with while
    public function generateRndNumber () {
        $length = 10;
        $result = '';

        $checkRndNr = true;

       for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        $findID = \DB::table('elementary_wishes')->where('id', '=', $result)->value('id');

        while(true) {
            if (is_null($findID)) {
                return $result;
            } else {
                for($i = 0; $i < $length; $i++) {
                    $result .= mt_rand(0, 9);
                }
            }
        }

    }
}








