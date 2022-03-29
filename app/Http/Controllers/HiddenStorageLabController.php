<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HiddenStorageLabModel;

class HiddenStorageLabController extends Controller
{
    //
    public function index()
    {
        $listLab = HiddenStorageLabModel::where('status', '=', '0')->paginate(6);
        return view('StorageLab.hiddenlab', [
            "listLab" => $listLab,
        ]);
    }
}
