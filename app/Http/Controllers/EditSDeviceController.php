<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceModel;
use App\Models\Device_on_labModel;
use App\Models\StorageLabModel;

class EditSDeviceController extends Controller
{
    public function edit($id)
    {
        $edit = DeviceModel::find($id);
        $Slab = StorageLabModel::all();
        return view('Device.editsdevice', [
            'edit' => $edit,
            'lab' => $Slab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('lab');
        $name = $request->get('namedevice');
        $status = $request->get('status');
        $note = $request->get('note');
        DeviceModel::where('idDevice', $id)->update([
            'name' => $name,
            'statusdevice' => $status,
            'note' => $note,
        ]);
        Device_on_labModel::where('idDevice', $id)->update([
            'idSLab' => $Lab
        ]);
        return redirect(route('StorageLab.index'));
    }
}
