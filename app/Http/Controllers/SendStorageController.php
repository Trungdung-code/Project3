<?php

namespace App\Http\Controllers;

use App\Models\Device_on_labModel;
use App\Models\DeviceModel;
use App\Models\StorageLabModel;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class SendStorageController extends Controller
{
    public function edit($id)
    {
        $move = Device_on_labModel::find($id);
        $storage = StorageLabModel::all();
        $mytime = Carbon::now();
        return view('Device_on_lab.sendstorage', [
            'move' => $move,
            'storage' => $storage,
            "time" => $mytime,
        ]);
    }

    public function update(Request $request, $id)
    {
        $SLab = $request->get('slab');
        $updated = $request->get('updated');
        Device_on_labModel::where('idDevice', $id)->update([
            'status' => 3,
            'idSLab' => $SLab,
            'idLab' => null,
        ]);

        DeviceModel::where('idDevice', $id)->update([
            'updated' => $updated,
        ]);
        return redirect(route('Lab.index'));
    }
}
