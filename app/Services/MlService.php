<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Ml;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class MlService
{
    public function store($request)
    {
        $ml = new Ml();
        $ml->email = $request->input('email');
        $ml->team_name = $request->input('teamName');
        $ml->team_leader = $request->input('leader');
        $ml->no_wa = $request->input('noWa');
        
        $buktiBayar = $request->file('buktiBayar');
        $pathBuktiBayar = 'pictures/bukti_bayar/';

        $formulir = $request->file('formulir');
        $pathFormulir = 'documents/formulir/';

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
            $ml->bukti_bayar = $pathBuktiBayar . $filename;
        }

        if ($formulir) {
            foreach ($formulir as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' . $pathFormulir, $filename);
            }
            $ml->formulir = $pathFormulir . $filename;
        }

        $create = $ml->save();

        // get link group wa from competitions
        $competition = Competition::where('id', '13')->first();
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }
}