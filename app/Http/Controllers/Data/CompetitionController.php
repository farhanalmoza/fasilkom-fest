<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\LombaService;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    protected $lomba;

    public function __construct() { $this->lomba = app()->make(LombaService::class); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return $this->lomba->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $slug = strtolower(preg_replace('/[\W\s\/]+/', '-', $request->input('name')));

        $data = [
            'id_category' => $request->input('id_category'),
            'name'        => $request->input('name'),
            // slug is lowercase and replace space or slash with dash
            'slug'        => $slug,
            'peserta'     => $request->input('peserta'),
            'description' => $request->input('description'),
            'start_date'  => $request->input('start_date'),
            'end_date'    => $request->input('end_date'),
            'location'    => $request->input('location'),
        ];

        return $this->lomba->add($data, $files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->lomba->getById($id);
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
        // variabel
        $files = $request->file('files');
        $slug = strtolower(preg_replace('/[\W\s\/]+/', '-', $request->input('name')));
        
        $data = [
            'id_category' => $request->input('id_category'),
            'name'        => $request->input('name'),
            // slug is lowercase and replace space and slash with dash
            'slug'        => $slug,
            'peserta'     => $request->input('peserta'),
            'description' => $request->input('description'),
            'start_date'  => $request->input('start_date'),
            'end_date'    => $request->input('end_date'),
            'location'    => $request->input('location'),
        ];
        if (!$files) {
            $data['pict'] = $request->input('files');
        }
        return $this->lomba->update($data, $files, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->lomba->delete($id);
    }
}
