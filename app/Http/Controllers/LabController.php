<?php

namespace App\Http\Controllers;

use App\Models\LabModel;
use App\Models\Device_on_labModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(Request $request)
    {
        //nhan tất cả dữ liệu bằng querry builder
        // $listLab = LabModel::paginate(6);
        // $listLab = DB::table('lab')->select('DB::raw('idLab', status');
        $search = $request->get('search');
        $listLab = LabModel::where('status', '=', '1')
            ->where('name', 'LIKE', "%$search%")->paginate(6);
        return view('Lab.index', [
            'listLab' => $listLab,
            'search' => $search,
        ]);
    }

    public function create()
    {
        $valuestatus = LabModel::all();
        return view('Lab.create', [
            "valuestatus" => $valuestatus,
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('nameLab');
        $status = $request->get('status');
        $Lab = new LabModel();
        $Lab->name = $name;
        $Lab->status = $status;
        $Lab->save();
        return redirect(route('Lab.index'));
    }

    public function edit($id)
    {
        $Lab = LabModel::find($id);
        $editLab = LabModel::find($id);
        return view('Lab.edit', [
            'editLab' => $Lab,
            'edit' => $editLab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('nameLab');
        $status = $request->get('status');
        LabModel::where('idLab', $id)->update([
            'name' => $Lab,
            'status' => $status,
        ]);
        return redirect(route('Lab.index'));
    }

    public function show(Request $request, $id)
    {
        $search = $request->get('search');
        $idLab = $id;
        $listDevice = Device_on_labModel::where('device_on_lab.status', '=', 2)
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device.idDevice', 'device.name', 'device.statusdevice', 'device.import', 'device.updated', 'device.note')
            ->where('device_on_lab.idLab', '=', $id)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('Lab.view', [
            'idlab' => $idLab,
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }
}
