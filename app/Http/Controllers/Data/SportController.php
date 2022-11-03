<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\SportService;
use Illuminate\Http\Request;

class SportController extends Controller
{
    protected $sport;
    public function __construct() {  $this->sport = app()->make(SportService::class); }

    public function store(Request $request) {
        return $this->sport->store($request);
    }

    public function index()
    {
        return view('committee.sport.index');
    }
}
