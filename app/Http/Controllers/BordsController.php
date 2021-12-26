<?php

namespace App\Http\Controllers;

use App\Bord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BordsController extends Controller
{
    public function store($u_id, $p_id)
    {
        // DMボードを新規作成
        $bordSaveData = [
            'post_user' => $u_id,
            'apply_user' => Auth::user()->id,
            'product_id' => $p_id
        ];

        $dm_bord = new Bord;
        $dm_bord->fill($bordSaveData)->save();
        
        return redirect()->route('direct.show', ['id' => $dm_bord->id])->with('flash_message', '案件に応募しました。');
    }
}
