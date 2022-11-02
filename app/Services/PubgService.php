<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Pubg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class PubgService
{
    public function store($request)
    {
        $pubg = new Pubg();
        $pubg->team_name = $request->input('teamName');
        $pubg->team_leader = $request->input('leader');
        $pubg->no_wa = $request->input('noWa');
        $pubg->major = $request->input('major');
        $pubg->player_2 = $request->input('player_2');
        $pubg->player_3 = $request->input('player_3');
        $pubg->player_4 = $request->input('player_4');
        $pubg->player_5 = $request->input('player_5');
        
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
            $pubg->bukti_bayar = $pathBuktiBayar . $filename;
        }

        $create = $pubg->save();

        // get link group wa from competitions
        $competition = Competition::where('id', '14')->first();
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }
}