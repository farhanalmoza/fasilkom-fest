<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Photography;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class PhotographyService
{
    public function store($request)
    {
        $photography = new Photography();
        $photography->name = $request->name;
        $photography->email = $request->email;
        $photography->no_wa = $request->noWa;
        $photography->agency = $request->agency;
        $photography->origin = $request->origin;
        $photography->occupation = $request->occupation;
        
        $buktiBayar = $request->file('buktiBayar');
        $pathBuktiBayar = 'pictures/bukti_bayar/';

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
            $photography->bukti_bayar = $pathBuktiBayar . $filename;
        }

        $create = $photography->save();

        // get link group wa from competitions
        $competition = Competition::where('id', '17')->first();
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }
}