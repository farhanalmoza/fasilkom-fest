<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\KategoriService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $kategori;

    public function __construct() { $this->kategori = app()->make(KategoriService::class); }

    public function getAll() { return $this->kategori->getAll(); }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
        ];
        return $this->kategori->create($data);
    }

    function destroy($id) { return $this->kategori->delete($id); }
}
