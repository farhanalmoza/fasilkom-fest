<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\SponsorService;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    protected $sponsor;

    public function __construct()
    {
        $this->sponsor = app()->make(SponsorService::class);
    }

    public function getAll()
    {
        return $this->sponsor->getAll();
    }

    public function show($id)
    {
        return $this->sponsor->getById($id);
    }

    public function store(Request $request)
    {
        $files = $request->file('files');

        $data = [
            'name' => $request->input('name'),
        ];

        return $this->sponsor->add($data, $files);
    }

    public function update(Request $request, $id)
    {
        $files = $request->file('files');
        
        $data = [
            'name' => $request->input('name'),
        ];

        if (!$files) {
            $data['logo'] = $request->input('files');
        }

        return $this->sponsor->update($data, $files, $id);
    }

    public function destroy($id)
    {
        return $this->sponsor->delete($id);
    }
}
