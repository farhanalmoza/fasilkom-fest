<?php
namespace App\Services;

use App\Models\Competition;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LombaService
{
    public function add($data, $files)
    {
        $competition = new Competition();
        $competition->name = $data['name'];
        $competition->description = $data['description'];
        $competition->id_category = $data['id_category'];
        $competition->start_date = $data['start_date'];
        $competition->end_date = $data['end_date'];
        $competition->location = $data['location'];
        
        // upload image to storage and get the path to store in database 
        $path = $this->uploadImage($files);
        $competition->pict = $path;

        $create = $competition->save();

        if($create) {
            return response(['message' => 'Lomba baru berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan lomba!'], 500);
        }
    }

    public function uploadImage($files)
    {
        $path = 'public/thumbnail_lomba/';
        foreach($files as $file) {
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath());
            $image->resize(300, 300, function($constraint) {
                $constraint->aspectRatio();
            });
            $image->stream();
            Storage::put($path . $filename, $image);
        }
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize(Storage::path($path . $filename));
        return $path . $filename;
    }
}