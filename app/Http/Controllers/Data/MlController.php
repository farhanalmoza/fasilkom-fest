<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\MlService;
use Illuminate\Http\Request;

class MlController extends Controller
{
    protected $ml;
    public function __construct() {  $this->ml = app()->make(MlService::class); }

    public function store(Request $request) {
        return $this->ml->store($request);
    }
}
