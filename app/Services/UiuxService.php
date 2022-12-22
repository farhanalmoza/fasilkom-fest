<?php
namespace App\Services;

use App\Models\Uiux;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UiuxService
{
    // get detail by user_id
    public function getDetail($user_id)
    {
        $uiux = Uiux::join('users', 'users.id', '=', 'uiux.user_id')
            ->join('karya_uiux', 'karya_uiux.team_id', '=', 'uiux.id')
            ->select('uiux.*', 'users.email', 'karya_uiux.proposal')
            ->where('uiux.user_id', $user_id)
            ->first();
        if ($uiux) { return $uiux; }
        return null;
    }

    public function updateDetailTim($data, $buktiBayar, $orisinalitas, $identitas_1, $identitas_2, $id)
    {
        $uiux = Uiux::find($id);
        if ($uiux) {
            $uiux->team_name = $data['teamName'];
            $uiux->instansi = $data['instansi'];
            $uiux->no_wa = $data['no_wa'];
            $uiux->member_1 = $data['member_1'];
            $uiux->member_2 = $data['member_2'];
            $uiux->verified = '1';
            if ($buktiBayar) {
                $path = 'pictures/bukti_bayar/';
                if($uiux->bukti_bayar) {
                    Storage::delete('public/'.$uiux->bukti_bayar);
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
                $uiux->bukti_bayar = $path . $filename;
            }
            if ($orisinalitas) {
                $path = 'pictures/orisinalitas/';
                if($uiux->orisinalitas) {
                    Storage::delete('public/'.$uiux->orisinalitas);
                }
                foreach($orisinalitas as $file) {
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
                $uiux->orisinalitas = $path . $filename;
            }
            if ($identitas_1) {
                $path = 'pictures/identitas/';
                if($uiux->identitas_1) {
                    Storage::delete('public/'.$uiux->identitas_1);
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
                $uiux->identitas_1 = $path . $filename;
            }
            if ($identitas_2) {
                $path = 'pictures/identitas/';
                if($uiux->identitas_2) {
                    Storage::delete('public/'.$uiux->identitas_2);
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
                $uiux->identitas_2 = $path . $filename;
            }
            $update = $uiux->save();
        }
        if($update) {
            return response(['message' => 'Pendaftaran tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Pendaftaran tim gagal diunggah!'], 500);
        }
    }

    public function updateTahap2($proposal, $buktiBayar, $id)
    {
        $uiux = Uiux::find($id);
        if ($uiux) {
            if ($proposal) {
                $path = 'documents/proposal-uiux/';
                if($uiux->proposal) {
                    Storage::delete('public/'.$uiux->proposal);
                }
                foreach($proposal as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $uiux->proposal = $path . $filename;
            }
            
            if ($buktiBayar) {
                $path = 'pictures/bukti_bayar/';
                if($uiux->bukti_bayar) {
                    Storage::delete('public/'.$uiux->bukti_bayar);
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
                $uiux->bukti_bayar = $path . $filename;
            }
            $update = $uiux->save();
        }
        if($update) {
            return response(['message' => 'Proposal tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Proposal tim gagal diunggah!'], 500);
        }
    }

    public function updateFinal($ppt, $id)
    {
        $uiux = Uiux::find($id);
        if ($uiux) {
            if ($ppt) {
                $path = 'documents/ppt-uiux/';
                if($uiux->ppt) {
                    Storage::delete('public/'.$uiux->ppt);
                }
                foreach($ppt as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $uiux->ppt = $path . $filename;
            }
            $update = $uiux->save();
        }
        if($update) {
            return response(['message' => 'PPT final berhasil diunggah!']);
        } else {
            return response(['message' => 'PPT final gagal diunggah!'], 500);
        }
    }

    public function lolosFinal($request, $id) {
        $uiux = Uiux::find($id);
        if ($uiux) {
            $uiux->finalis = $request->finalis;
            $update = $uiux->save();
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
        $uiux = Uiux::join('users', 'uiux.user_id', '=', 'users.id')
            ->select('uiux.*', 'users.email')
            ->get();
        return $uiux;
    }
}