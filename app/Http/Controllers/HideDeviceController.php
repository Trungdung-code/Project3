<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device_on_labModel;
use App\Models\DeviceModel;
use App\Models\StorageLabModel;

class HideDeviceController extends Controller
{
    public function edit($id)
    {
        $edit = DeviceModel::find($id);
        $Slab = StorageLabModel::all();
        return view('Device.edit-hide', [
            'edit' => $edit,
            'lab' => $Slab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('namedevice');
        $status = $request->get('status');
        $note = $request->get('note');
        DeviceModel::where('idDevice', $id)->update([
            'name' => $name,
            'statusdevice' => $status,
            'note' => $note,
        ]);
        Device_on_labModel::where('idDevice', $id)->update([
            'status' => 4,
            'idSLab' => null,
        ]);
        return redirect(route('StorageLab.index'));
    }

    public function Hide(Request $request)
    {
        $search = $request->get('search');
        $listDevice = Device_on_labModel::where('device_on_lab.status', '=', 4)
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('name', 'LIKE', "%$search%")
            ->paginate(15);
        return view('Device.hide', [
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }
}
