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

    public function getById($id)
    {
        return Speaker::where('id_speaker', $id)->first();
    }

    public function update($data, $files, $id)
    {
        $speaker = Speaker::where('id_speaker', $id)->first();
        $speaker->speaker_name = $data['name'];
        $speaker->headline = $data['headline'];
        $speaker->email = $data['email'];
        $speaker->linkedin = $data['linkedin'];
        $speaker->instagram = $data['instagram'];
        
        // upload image to storage and get the path to store in database 
        // delete old picture if exists
        if($files) {
            if($speaker->photo) {
                Storage::delete('public/'.$speaker->photo);
            }
            $path = $this->uploadImage($files);
            $speaker->photo = $path;
        } else {
            $speaker->photo = $data['photo'];
        }

        $update = Speaker::where('id_speaker', $id)->update([
            'speaker_name' => $speaker->speaker_name,
            'headline' => $speaker->headline,
            'email' => $speaker->email,
            'linkedin' => $speaker->linkedin,
            'instagram' => $speaker->instagram,
            'photo' => $speaker->photo
        ]);

        if($update) {
            return response(['message' => 'Pembicara berhasil diupdate!']);
        } else {
            return response(['message' => 'Gagal mengupdate pembicara!'], 500);
        }
    }

    public function delete($id)
    {
        $speaker = Speaker::where('id_speaker', $id)->first();
        if($speaker->photo) {
            Storage::delete('public/'.$speaker->photo);
        }
        $delete = Speaker::where('id_speaker', $id)->delete();
        if($delete) {
            return response(['message' => 'Pembicara berhasil dihapus!']);
        } else {
            return response(['message' => 'Gagal menghapus pembicara!'], 500);
        }
    }
}