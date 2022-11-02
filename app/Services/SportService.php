<?php
namespace App\Services;

use App\Models\Competition;
use App\Models\Sport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class SportService
{
    public function store($request)
    {
        $sport = new Sport();
        $sport->email = $request->input('email');
        $sport->category = $request->input('category');
        $sport->leader = $request->input('leader');
        $sport->npm = $request->input('npm');
        $sport->no_wa = $request->input('noWa');
        $sport->major = $request->input('major');
        $sport->team_name = $request->input('teamName');
        
        $buktiBayar = $request->file('buktiBayar');
        $pathBuktiBayar = 'pictures/bukti_bayar/';

        $formulir = $request->file('formulir');
        $pathFormulir = 'documents/formulir/';

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
            $sport->bukti_bayar = $pathBuktiBayar . $filename;
        }

        if ($formulir) {
            foreach ($formulir as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' . $pathFormulir, $filename);
            }
            $sport->formulir = $pathFormulir . $filename;
        }

        if ($ktm) {
            foreach ($ktm as $file) {
                $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' . $pathKtm, $filename);
            }
            $sport->ktm = $pathKtm . $filename;
        }

        $create = $sport->save();

        // get link group wa from competitions
        if ($sport->major == '1') {
            $competition = Competition::where('id', '10')->first();
        } else if ($sport->major == '2') {
            $competition = Competition::where('id', '11')->first();
        } else if ($sport->major == '3') {
            $competition = Competition::where('id', '12')->first();
        }
        if ($create) {
            return response()->json(['status' => 'success', 'message' => $competition->group_wa], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data gagal disimpan'], 500);
        }
    }
}