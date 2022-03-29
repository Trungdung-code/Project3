<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HiddenWaitingModel;

class HiddenWaitingLabController extends Controller
{
    public function index()
    {
        $listLab = HiddenWaitingModel::where('status', '=', '0')->paginate(6);
        return view('WaitingLab.hiddenlab', [
            "listLab" => $listLab,
        ]);
    }
}
