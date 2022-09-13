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

    public function show($id) {
        return $this->divisi->getDetail($id);
    }

    public function update(Request $request, $id) {
        $data = [
            'name' => $request->input('name'),
            'slug' => strtolower($request->input('name')),
            'description' => $request->input('desc'),
        ];
        return $this->divisi->update($id, $data);
    }

    public function destroy($id) {
        return $this->divisi->delete($id);
    }
}
