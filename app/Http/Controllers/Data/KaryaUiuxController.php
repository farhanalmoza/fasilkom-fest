<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\KaryaUiuxService;
use Illuminate\Http\Request;

class KaryaUiuxController extends Controller
{
    protected $karya;
    public function __construct() { $this->karya = app()->make(KaryaUiuxService::class); }

    public function store(Request $request)
    {
        $data = [
            'team_id' => $request->input('team_id'),
            'screen' => $request->input('screen'),
            'proposal' => $request->input('proposal'),
        ];

        return $this->karya->addPenyisihan($data);
    }

    public function show($team_id)
    {
        return $this->karya->getPenyisihan($team_id);
    }

    public function update(Request $request, $team_id)
    {
        $data = [
            'demo' => $request->input('demo'),
            'prototype' => $request->input('prototype'),
        ];

        return $this->karya->updateKaryaUiux($data, $team_id);
    }
}