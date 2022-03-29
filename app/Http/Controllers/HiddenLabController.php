<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabModel;

class HiddenLabController extends Controller
{
    public function index()
    {
        $listLab = LabModel::where('status', '=', '0')->paginate(6);
        return view('Lab.hiddenlab', [
            "listLab" => $listLab,
        ]);
    }
}
