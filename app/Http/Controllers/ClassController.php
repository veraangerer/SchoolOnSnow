<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassController extends Controller
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
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $data = $request->all();
        $output->writeln("<info>".print_r($data, true)."</info>");
        $id = \DB::table('classes')->insertGetId(
            ['school_Id' => $data['school_Id'], 'name' => $data['name'], 'sumstudents' => $data['sumstudents']]
        );
        $output->writeln("<info>Added Entry to database, new user with id ".$id."</info>");
        return response()->json(['success' => 'true', 'id' => $id]);
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
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $data = $request->all();
        $output->writeln("<info>"."Admin Altered Class with the ID: ".print_r($data['tdID'], true)."</info>");
        \DB::table('classes')
            ->where('id', $data['tdID'])
            ->update(['name' => $data['name']]);
        \DB::table('classes')
            ->where('id', $data['tdID'])
            ->update(['sumstudents' => $data['sumstudents']]);
        return response()->json(['success' => 'true', 'id' => $data['tdID']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>Admin Deleted the class with the id".print_r($id, true)."</info>");
        \DB::table('classes')->where('id', $id)->delete();
        return null;
    }
}
