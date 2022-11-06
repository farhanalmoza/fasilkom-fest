<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Cover;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class CoverService
{
    public function store($request)
    {
        $cover = new Cover();
        $cover->name = $request->name;
        $cover->email = $request->email;
        $cover->no_wa = $request->noWa;
        $cover->agency = $request->agency;
        $cover->occupation = $request->occupation;
        
        $buktiBayar = $request->file('buktiBayar');
        $identity = $request->file('identity');
        $pathBuktiBayar = 'pictures/bukti_bayar/';
        $pathIdentity = 'pictures/kartu_pelajar/';

        if ($buktiBayar) {
            foreach ($buktiBayar as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $image = Image::make($file->getRealPath());
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->stream();
                Storage::put('public/' . $pathBuktiBayar . $filename, $image);
            }
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(Storage::path('public/' . $pathBuktiBayar . $filename));
            $cover->bukti_bayar = $pathBuktiBayar . $filename;
        }
        if ($identity) {
            foreach ($identity as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $image = Image::make($file->getRealPath());
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->stream();
                Storage::put('public/' . $pathIdentity . $filename, $image);
            }
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(Storage::path('public/' . $pathIdentity . $filename));
            $cover->identity = $pathIdentity . $filename;
        }

        $create = $cover->save();

        // get link group wa from competitions
        $competition = Competition::where('id', '16')->first();
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }

    public function getAll()
    {
        $cover = Cover::all();
        return $cover;
    }
}