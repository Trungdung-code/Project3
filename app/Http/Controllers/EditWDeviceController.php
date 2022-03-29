<?php

namespace App\Http\Controllers;

use App\Models\DeviceModel;
use App\Models\Device_on_labModel;
use App\Models\WaitingLabModel;

use Illuminate\Http\Request;

class EditWDeviceController extends Controller
{
    public function edit($id)
    {
        $edit = DeviceModel::find($id);
        $Wlab = WaitingLabModel::all();
        return view('Device.editwdevice', [
            'edit' => $edit,
            'lab' => $Wlab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('lab');
        $name = $request->get('namedevice');
        $import = $request->get('import');
        DeviceModel::where('idDevice', $id)->update([
            'name' => $name,
            'import' => $import,
        ]);
        Device_on_labModel::where('idDevice', $id)->update([
            'idWLab' => $Lab,
            'status' => 1,
        ]);
        return redirect(route('WaitingLab.index'));
    }
}
