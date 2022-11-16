<?php
namespace App\Services;

use App\Models\Cso;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CsoService
{
    // get detail by user_id
    public function getDetail($user_id)
    {
        $cso = Cso::where('user_id', $user_id)->first();
        if ($cso) { return $cso; }
        return null;
    }

    public function updateDetailTim($data, $buktiBayar, $kartuPelajar_1, $kartuPelajar_2, $kartuPelajar_3, $id)
    {
        $cso = Cso::find($id);
        if ($cso) {
            $cso->team_name = $data['teamName'];
            $cso->sekolah = $data['sekolah'];
            $cso->no_wa = $data['no_wa'];
            $cso->member_1 = $data['member_1'];
            $cso->member_2 = $data['member_2'];
            $cso->member_3 = $data['member_3'];
            $cso->verified = '1';
            if ($buktiBayar) {
                $path = 'pictures/bukti_bayar/';
                if($cso->bukti_bayar) {
                    Storage::delete('public/'.$cso->bukti_bayar);
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
                $cso->bukti_bayar = $path . $filename;
            }
            if ($kartuPelajar_1) {
                $path = 'pictures/kartu_pelajar/';
                if($cso->kartu_pelajar_1) {
                    Storage::delete('public/'.$cso->kartu_pelajar_1);
                }
                foreach($kartuPelajar_1 as $file) {
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
                $cso->kartu_pelajar_1 = $path . $filename;
            }
            if ($kartuPelajar_2) {
                $path = 'pictures/kartu_pelajar/';
                if($cso->kartu_pelajar_2) {
                    Storage::delete('public/'.$cso->kartu_pelajar_2);
                }
                foreach($kartuPelajar_2 as $file) {
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
                $cso->kartu_pelajar_2 = $path . $filename;
            }
            if ($kartuPelajar_3) {
                $path = 'pictures/kartu_pelajar/';
                if($cso->kartu_pelajar_3) {
                    Storage::delete('public/'.$cso->kartu_pelajar_3);
                }
                foreach($kartuPelajar_3 as $file) {
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
                $cso->kartu_pelajar_3 = $path . $filename;
            }
            $update = $cso->save();
        }
        if($update) {
            return response(['message' => 'Pendaftaran tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Pendaftaran tim gagal diunggah!'], 500);
        }
    }

    public function updateTahap2($proposal, $buktiBayar, $id)
    {
        $cso = Cso::find($id);
        if ($cso) {
            if ($proposal) {
                $path = 'documents/proposal-cso/';
                if($cso->proposal) {
                    Storage::delete('public/'.$cso->proposal);
                }
                foreach($proposal as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $cso->proposal = $path . $filename;
            }
            
            if ($buktiBayar) {
                $path = 'pictures/bukti_bayar/';
                if($cso->bukti_bayar) {
                    Storage::delete('public/'.$cso->bukti_bayar);
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
                $cso->bukti_bayar = $path . $filename;
            }
            $update = $cso->save();
        }
        if($update) {
            return response(['message' => 'Proposal tim berhasil diunggah!']);
        } else {
            return response(['message' => 'Proposal tim gagal diunggah!'], 500);
        }
    }

    public function updateFinal($ppt, $id)
    {
        $cso = Cso::find($id);
        if ($cso) {
            if ($ppt) {
                $path = 'documents/ppt-cso/';
                if($cso->ppt) {
                    Storage::delete('public/'.$cso->ppt);
                }
                foreach($ppt as $file) {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/'.$path, $filename);
                }
                $cso->ppt = $path . $filename;
            }
            $update = $cso->save();
        }
        if($update) {
            return response(['message' => 'PPT final berhasil diunggah!']);
        } else {
            return response(['message' => 'PPT final gagal diunggah!'], 500);
        }
    }

    public function lolosFinal($request, $id) {
        $cso = Cso::find($id);
        if ($cso) {
            $cso->finalis = $request->finalis;
            $update = $cso->save();
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
        $cso = Cso::join('users', 'cso.user_id', '=', 'users.id')
            ->select('cso.*', 'users.email')
            ->get();
        return $cso;
    }
}