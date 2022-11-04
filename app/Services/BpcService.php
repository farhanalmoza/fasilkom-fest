<?php
namespace App\Services;

use App\Models\Bpc;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BpcService
{
    // get detail by user_id
    public function getDetail($user_id)
    {
        $bpc = Bpc::join('users', 'users.id', '=', 'bpc.user_id')
            ->select('bpc.*', 'users.email')
            ->where('bpc.user_id', $user_id)
            ->first();
        if ($bpc) { return $bpc; }
        return null;
    }

    public function updateDetailTim($data, $bmc, $identitas_1, $identitas_2, $identitas_3, $id)
    {
        $bpc = Bpc::find($id);
        if ($bpc) {
            $bpc->team_name = $data['teamName'];
            $bpc->instansi = $data['instansi'];
            $bpc->no_wa = $data['no_wa'];
            $bpc->member_1 = $data['member_1'];
            $bpc->member_2 = $data['member_2'];
            $bpc->member_3 = $data['member_3'];
            $bpc->verified = '1';
            // upload pdf bmc
            if ($bmc) {
                $path = 'documents/bmc/';
                if($bpc->bmc) {
                    Storage::delete('public/'.$bpc->bmc);
                }
                foreach($bmc as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $bpc->bmc = $path . $filename;
            }
            if ($identitas_1) {
                $path = 'pictures/identitas/';
                if($bpc->identitas_1) {
                    Storage::delete('public/'.$bpc->identitas_1);
                }
                foreach($identitas_1 as $file) {
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
                $bpc->identitas_1 = $path . $filename;
            }
            if ($identitas_2) {
                $path = 'pictures/identitas/';
                if($bpc->identitas_2) {
                    Storage::delete('public/'.$bpc->identitas_2);
                }
                foreach($identitas_2 as $file) {
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
                $bpc->identitas_2 = $path . $filename;
            }
            if ($identitas_3) {
                $path = 'pictures/identitas/';
                if($bpc->identitas_3) {
                    Storage::delete('public/'.$bpc->identitas_3);
                }
                foreach($identitas_3 as $file) {
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
                $bpc->identitas_3 = $path . $filename;
            }
            $update = $bpc->save();
        }
        if($update) {
            return response(['message' => 'Pendaftaran tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Pendaftaran tim gagal diunggah!'], 500);
        }
    }

    public function updateTahap2($proposal, $buktiBayar, $id)
    {
        $bpc = Bpc::find($id);
        if ($bpc) {
            if ($proposal) {
                $path = 'documents/proposal-bpc/';
                if($bpc->proposal) {
                    Storage::delete('public/'.$bpc->proposal);
                }
                foreach($proposal as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $bpc->proposal = $path . $filename;
            }
            
            if ($buktiBayar) {
                $path = 'pictures/bukti_bayar/';
                if($bpc->bukti_bayar) {
                    Storage::delete('public/'.$bpc->bukti_bayar);
                }
                foreach($buktiBayar as $file) {
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
                $bpc->bukti_bayar = $path . $filename;
            }
            $update = $bpc->save();
        }
        if($update) {
            return response(['message' => 'Proposal tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Proposal tim gagal diunggah!'], 500);
        }
    }

    public function updateFinal($ppt, $id)
    {
        $bpc = Bpc::find($id);
        if ($bpc) {
            if ($ppt) {
                $path = 'documents/ppt-bpc/';
                if($bpc->ppt) {
                    Storage::delete('public/'.$bpc->ppt);
                }
                foreach($ppt as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $bpc->ppt = $path . $filename;
            }
            $update = $bpc->save();
        }
        if($update) {
            return response(['message' => 'PPT final berhasil diunggah!']);
        } else {
            return response(['message' => 'PPT final gagal diunggah!'], 500);
        }
    }

    public function lolosFinal($request, $id) {
        $bpc = Bpc::find($id);
        if ($bpc) {
            $bpc->finalis = $request->finalis;
            $update = $bpc->save();
        }
        if($update) {
            return response(['message' => 'Tim berhasil lolos tahap final!']);
        } else {
            return response(['message' => 'Tim gagal lolos tahap final!'], 500);
        }
    }

    public function getAll()
    {
        // join users table where id = user_id
        $bpc = Bpc::join('users', 'bpc.user_id', '=', 'users.id')
            ->select('bpc.*', 'users.email')
            ->get();
        return $bpc;
    }
}