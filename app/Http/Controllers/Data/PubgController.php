<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\PubgService;
use Illuminate\Http\Request;

class PubgController extends Controller
{
    protected $pubg;
    public function __construct() {  $this->pubg = app()->make(PubgService::class); }

    public function store(Request $request) {
        return $this->pubg->store($request);
    }
}
