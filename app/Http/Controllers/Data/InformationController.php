<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Services\InformasiService;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    protected $informasi;

    public function __construct()
    {
        $this->informasi = app()->make(InformasiService::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->informasi->getDetail($id);
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
        return $this->informasi->update($request, $id);
    }
}
