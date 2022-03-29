<?php

namespace App\Http\Controllers;

use App\Models\Device_on_labModel;
use App\Models\DeviceModel;
use App\Models\LabModel;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class BackLabController extends Controller
{
    public function edit($id)
    {
        $move = Device_on_labModel::find($id);
        $lab = LabModel::all();
        $mytime = Carbon::now();
        return view('Device_on_lab.backlab', [
            'move' => $move,
            'lab' => $lab,
            "time" => $mytime,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('lab');
        $updated = $request->get('updated');
        Device_on_labModel::where('idDevice', $id)->update([
            'status' => 2,
            'idLab' => $Lab,
            'idSLab' => null,
        ]);

        DeviceModel::where('idDevice', $id)->update([
            'updated' => $updated,
        ]);
        return redirect(route('StorageLab.index'));
    }
}
