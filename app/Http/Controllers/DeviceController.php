<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceModel;
use App\Models\Device_on_labModel;
use App\Models\LabModel;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $listDevice = Device_on_labModel::join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device_on_lab.status', '<', 4)
            ->where('name', 'LIKE', "%$search%")
            ->orWhere('device.idDevice', 'LIKE', "%$search%")
            ->orWhere('device.note', 'LIKE', "%$search%")
            ->paginate(15);
        return view('Device.index', [
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }

    public function edit($id)
    {
        $edit = DeviceModel::find($id);
        $lab = LabModel::all();
        return view('Device.edit', [
            'edit' => $edit,
            'lab' => $lab,
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
            'idLab' => $Lab
        ]);
        return redirect()->route('Lab.index');
    }

    public function BrokenDevice(Request $request)
    {
        $search = $request->get('search');
        $listDevice = Device_on_labModel::join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device.statusdevice', '=', 1)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('Device.brokendevice', [
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }

    public function ErrorDevice(Request $request)
    {
        $search = $request->get('search');
        $listDevice = Device_on_labModel::join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device.statusdevice', '=', 2)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('Device.errordevice', [
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }

    public function LostDevice(Request $request)
    {
        $search = $request->get('search');
        $listDevice = Device_on_labModel::join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device.statusdevice', '=', 3)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('Device.lostdevice', [
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }

    public function SearchDate(Request $request)
    {
        $search = $request->get('search');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $listDevice = DB::table('device_on_lab')
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device.import', '>=', $fromDate)
            ->where('device.import', '<=', $toDate)
            ->where('device_on_lab.status', '<', 4)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('device.index', compact('listDevice', 'search'));
    }

    public function SearchDateExport(Request $request)
    {
        $search = $request->get('search');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $listDevice = DB::table('device_on_lab')
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device_on_lab.*', 'device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device.import', '>=', $fromDate)
            ->where('device.import', '<=', $toDate)
            ->where('device_on_lab.status', '=', 4)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('device.hide', compact('listDevice', 'search'));
    }
}
