<?php
namespace App\Services;

use App\Models\Speaker;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PembicaraService
{
    public function getAll()
    {
        return Speaker::all();
    }

    public function add($data, $files)
    {
        $speaker = new Speaker();
        $speaker->speaker_name = $data['name'];
        $speaker->headline = $data['headline'];
        $speaker->email = $data['email'];
        $speaker->linkedin = $data['linkedin'];
        $speaker->instagram = $data['instagram'];
        
        // upload image to storage and get the path to store in database 
        $path = $this->uploadImage($files);
        $speaker->photo = $path;

        $create = $speaker->save();

        if($create) {
            return response(['message' => 'Pembicara baru berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan pembicara!'], 500);
        }
    }

    public function uploadImage($files)
    {
        $path = 'pictures/speaker/';
        foreach($files as $file) {
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath());
            $image->resize(300, 300, function($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            Storage::put('public/'.$path . $filename, $image);
        }
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize(Storage::path('public/'.$path . $filename));
        return $path . $filename;
    }
}