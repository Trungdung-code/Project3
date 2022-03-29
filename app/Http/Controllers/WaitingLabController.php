<?php

namespace App\Http\Controllers;

use App\Models\WaitingLabModel;
use App\Models\Device_on_LabModel;

use Illuminate\Http\Request;

class WaitingLabController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listLab = WaitingLabModel::where('status', '=', '1')
            ->where('name', 'LIKE', "%$search%")->paginate(6);
        return view('WaitingLab.index', [
            'listLab' => $listLab,
            'search' => $search,
        ]);
    }

    public function create()
    {
        $valuestatus = WaitingLabModel::all();
        return view('WaitingLab.create', [
            "valuestatus" => $valuestatus,
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('nameLab');
        $status = $request->get('status');
        $Lab = new WaitingLabModel();
        $Lab->name = $name;
        $Lab->status = $status;
        $Lab->save();
        return redirect(route('WaitingLab.index'))->with('success', 'Thêm phòng chờ thành công!');
    }

    public function edit($id)
    {
        $Lab = WaitingLabModel::find($id);
        $editLab = WaitingLabModel::find($id);
        return view('WaitingLab.edit', [
            'editLab' => $Lab,
            'edit' => $editLab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('nameLab');
        $status = $request->get('status');
        WaitingLabModel::where('idWLab', $id)->update([
            'name' => $Lab,
            'status' => $status,
        ]);
        return redirect(route('WaitingLab.index'));
    }

    public function show(Request $request, $id)
    {
        $search = $request->get('search');
        $idWLab = $id;
        $listDevice = Device_on_labModel::where('device_on_lab.status', '=', 1)
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device.idDevice', 'device.name', 'device.statusdevice', 'device.import')
            ->where('device_on_lab.idWLab', '=', $id)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(15);
        return view('WaitingLab.view', [
            'idlab' => $idWLab,
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }
}
