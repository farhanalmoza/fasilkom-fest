<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\VideographyService;
use Illuminate\Http\Request;

class VideographyController extends Controller
{
    protected $videography;
    public function __construct() {  $this->videography = app()->make(VideographyService::class); }

    public function store(Request $request) {
        return $this->videography->store($request);
    }
}
