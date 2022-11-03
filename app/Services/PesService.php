<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Pes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class PesService
{
    public function store($request)
    {
        $pes = new Pes();
        $pes->email = $request->input('email');
        $pes->name = $request->input('name');
        $pes->npm = $request->input('npm');
        $pes->major = $request->input('major');
        $pes->no_wa = $request->input('noWa');
        
        $buktiBayar = $request->file('buktiBayar');
        $pathBuktiBayar = 'pictures/bukti_bayar/';

        $ktm = $request->file('ktm');
        $pathKtm = 'documents/ktm/';

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
            $pes->bukti_bayar = $pathBuktiBayar . $filename;
        }
        if ($ktm) {
            foreach ($ktm as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $image = Image::make($file->getRealPath());
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->stream();
                Storage::put('public/' . $pathKtm . $filename, $image);
            }
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(Storage::path('public/' . $pathKtm . $filename));
            $pes->ktm = $pathKtm . $filename;
        }

        $create = $pes->save();

        // get link group wa from competitions
        $competition = Competition::where('id', '15')->first();
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }

    public function getAll()
    {
        $pes = Pes::all();
        return $pes;
    }

    public function get($id)
    {
        $pes = Pes::where('id', $id)->first();
        return $pes;
    }
}