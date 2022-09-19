<?php
namespace App\Services;

use App\Models\Sponsor;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SponsorService {
    public function getAll()
    {
        return Sponsor::all();
    }

    public function getById($id)
    {
        return Sponsor::find($id);
    }

    public function add($data, $files)
    {
        $sponsor = new Sponsor();
        $sponsor->name = $data['name'];
        
        $path = $this->uploadImage($files);
        $sponsor->logo = $path;

        $create = $sponsor->save();

        if($create) {
            return response(['message' => 'Sponsor baru berhasil ditambahkan!']);
        } else {
            return response(['message' => 'Gagal menambahkan sponsor!'], 500);
        }
    }

    public function uploadImage($files)
    {
        $path = 'pictures/sponsor/';
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

    public function update($data, $files, $id)
    {
        $sponsor = Sponsor::find($id);
        $sponsor->name = $data['name'];
        
        // upload image to storage and get the path to store in database 
        // delete old picture if exists
        if($files) {
            if($sponsor->logo) {
                Storage::delete('public/'.$sponsor->logo);
            }
            $path = $this->uploadImage($files);
            $sponsor->logo = $path;
        } else {
            $sponsor->logo = $data['logo'];
        }

        $update = $sponsor->save();

        if($update) {
            return response(['message' => 'Sponsor berhasil diupdate!']);
        } else {
            return response(['message' => 'Gagal mengupdate sponsor!'], 500);
        }
    }

    public function delete($id)
    {
        $sponsor = Sponsor::find($id);
        if($sponsor->logo) {
            Storage::delete('public/'.$sponsor->logo);
        }
        $delete = $sponsor->delete();

        if($delete) {
            return response(['message' => 'Sponsor berhasil dihapus!']);
        } else {
            return response(['message' => 'Gagal menghapus sponsor!'], 500);
        }
    }
}