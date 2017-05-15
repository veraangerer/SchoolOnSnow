<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.adminIndex');
    }

    public function getSchools()
    {
        $results = \DB::table('schools')->get();
        return view('pages.schools')->with('results', $results);
    }

    public function getLocations()
    {
        $results = \DB::table('locations')->orderBy('state')->get();
        return view('pages.locations')->with('results', $results);
    }

    public function getOffersPerLocation($id)
    {
        $results[0] = \DB::table('locations')->where('id', $id)->get()[0]->name;
        $results[1] = \DB::table('offers')->where('location_Id', $id)->get();
        return view('pages.locationOffers')->with('results', $results);
    }

    public function getTeachersPerSchool($id)
    {
        $results[0] = \DB::table('schools')->where('idNumber', $id)->get()[0]->name;
        $results[1] = \DB::table('teachers')->where('school_Id', $id)->get();
        return view('pages.schoolTeachers')->with('results', $results);
    }

    public function getClassesPerSchool($id)
    {
        $results[0] = \DB::table('schools')->where('idNumber', $id)->get()[0]->name;
        $results[1] = \DB::table('classes')->where('school_Id', $id)->get();
        return view('pages.schoolClasses')->with('results', $results);
    }
    public function getStudentsPerClass($id)
    {
        $results[0] = \DB::table('classes')->where('id', $id)->get()[0]->name;
        $results[1] = \DB::table('students')->where('class_Id', $id)->get();
        return view('pages.classStudents')->with('results', $results);
    }
}