<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\PembicaraService;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    protected $speaker;

    public function __construct()
    {
        $this->speaker = app()->make(PembicaraService::class);
    }

    public function getAll()
    {
        return $this->speaker->getAll();
    }

    public function store(Request $request) {
        $files = $request->file('files');

        $data = [
            'name'      => $request->input('name'),
            'headline'  => $request->input('headline'),
            'email'     => $request->input('email'),
            'linkedin'  => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
        ];

        return $this->speaker->add($data, $files);
    }

    public function show($id)
    {
        return $this->speaker->getById($id);
    }

    public function update(Request $request, $id)
    {
        // variabel
        $files = $request->file('files');
        
        $data = [
            'name'      => $request->input('name'),
            'headline'  => $request->input('headline'),
            'email'     => $request->input('email'),
            'linkedin'  => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
        ];
        if (!$files) {
            $data['photo'] = $request->input('files');
        }
        return $this->speaker->update($data, $files, $id);
    }
}
