<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $divisi;

    public function __construct()
    {
        $this->divisi = app()->make(RoleService::class);
    }

    public function getAll() {
        return $this->divisi->getAll();
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->input('name'),
            // slug lowercase from name
            'slug' => strtolower($request->input('name')),
            'description' => $request->input('desc'),
        ];
        return $this->divisi->add($data);
    }
}
