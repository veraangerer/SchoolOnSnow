<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\Console\Helper\Table;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.offer');
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
        \DB::table('offers')->insert(
            ['location_Id' => $data['location_Id'],
                'ppDpA' => $data['ppa'],
                'ppDpC' => $data['ppc'],
                'startSeason' => $data['startDate'],
                'endSeason' => $data['endDate'],
                'overnight' => 0]
        );
        $output->writeln("<info>Added Entry to database</info>");
        return response()->json(['success' => 'true', 'id' => $data['tdID']]);
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
        $output->writeln("<info>"."Admin Altered Offer with the ID: ".print_r($data['tdID'], true)."</info>");
        $output->writeln("<info>"."Given EndDate: ".print_r($data['endDate'], true)."</info>");
        \DB::table('offers')
            ->where('id', $data['tdID'])
            ->update(['ppDpA' => $data['ppa']]);
        \DB::table('offers')
            ->where('id', $data['tdID'])
            ->update(['ppDpC' => $data['ppc']]);
        \DB::table('offers')
            ->where('id', $data['tdID'])
            ->update(['startSeason' => $data['startDate']]);
        \DB::table('offers')
            ->where('id', $data['tdID'])
            ->update(['endSeason' => $data['endDate']]);
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
        $output->writeln("<info>Admin Deleted the offer with the id".print_r($id, true)."</info>");
        \DB::table('offers')->where('id', $id)->delete();
        return null;
    }
}
