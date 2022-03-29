<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device_on_labModel;
use App\Models\LabModel;
use App\Models\DeviceModel;
use App\Models\WaitingLabModel;
use Illuminate\Support\Carbon;

class Device_on_labController extends Controller
{
    public function create()
    {
        $createdevice = WaitingLabModel::all();
        $mytime = Carbon::now();
        return view('device_on_lab.create', [
            "create" => $createdevice,
            "time" => $mytime,
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('nameDevice');
        $import = $request->get('importDate');
        $Device = new DeviceModel();
        $Device->name = $name;
        $Device->import = $import;
        $Device->save();

        $layid = $Device->idDevice;


        $idWLab = $request->get('waitinglab');
        $Device_on_lab = new Device_on_labModel();
        $Device_on_lab->idDevice = $layid;
        $Device_on_lab->status = 1;
        $Device_on_lab->idWLab = $idWLab;
        $Device_on_lab->save();
        return redirect()->back()->with('success', 'Thêm thiết bị thành công!');
    }

    public function edit($id)
    {
        $edit = Device_on_labModel::find($id);
        $lab = LabModel::all();
        $mytime = Carbon::now();
        return view('Device_on_lab.sendlab', [
            'edit' => $edit,
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
            'idWLab' => null,
        ]);

        DeviceModel::where('idDevice', $id)->update([
            'updated' => $updated,
        ]);
        return redirect(route('WaitingLab.index'));
    }
}
