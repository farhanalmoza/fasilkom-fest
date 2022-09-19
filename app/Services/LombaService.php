<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Competition;
use App\Models\Role;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LombaService
{
    public function getAll()
    {
        // join category table to get category name
        $lomba = Competition::join('categories', 'competitions.id_category', '=', 'categories.id')
            ->select('competitions.*', 'categories.name as category_name')
            ->get();
        return $lomba;
    }

    public function add($data, $files)
    {
        $competition = new Competition();
        $competition->name = $data['name'];
        $competition->slug = $data['slug'];
        $competition->peserta = $data['peserta'];
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
        $path = 'pictures/thumbnail_lomba/';
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
        $lomba = Competition::join('categories', 'competitions.id_category', '=', 'categories.id')
            ->select('competitions.*', 'categories.name as category_name')
            ->where('competitions.id', $id)
            ->first();
        
        $kategori = Category::all();
        $rolePeserta = Role::where('parent', 0)->get();
        $data = [
            'lomba' => $lomba,
            'kategori' => $kategori,
            'rolePeserta' => $rolePeserta
        ];
        return $data;
    }

    public function update($data, $files, $id)
    {
        $competition = Competition::find($id);
        $competition->name = $data['name'];
        $competition->slug = $data['slug'];
        $competition->peserta = $data['peserta'];
        $competition->description = $data['description'];
        $competition->id_category = $data['id_category'];
        $competition->start_date = $data['start_date'];
        $competition->end_date = $data['end_date'];
        $competition->location = $data['location'];
        
        // upload image to storage and get the path to store in database 
        // delete old picture if exists
        if($files) {
            if($competition->pict) {
                Storage::delete('public/'.$competition->pict);
            }
            $path = $this->uploadImage($files);
            $competition->pict = $path;
        } else {
            $competition->pict = $data['pict'];
        }

        $update = $competition->save();

        if($update) {
            return response(['message' => 'Lomba berhasil diupdate!']);
        } else {
            return response(['message' => 'Gagal mengupdate lomba!'], 500);
        }
    }

    public function delete($id)
    {
        $competition = Competition::find($id);
        if($competition->pict) {
            Storage::delete('public/'.$competition->pict);
        }
        $delete = $competition->delete();

        if($delete) {
            return response(['message' => 'Lomba berhasil dihapus!']);
        } else {
            return response(['message' => 'Gagal menghapus lomba!'], 500);
        }
    }
}