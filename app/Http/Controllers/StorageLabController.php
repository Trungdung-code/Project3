<?php

namespace App\Http\Controllers;

use App\Models\StorageLabModel;
use App\Models\Device_on_labModel;
use Illuminate\Http\Request;

class StorageLabController extends Controller
{
    //
    public function index(Request $request)
    {
        //nhan tất cả dữ liệu bằng querry builder
        // $listLab = LabModel::paginate(6);
        // $listLab = DB::table('lab')->select('DB::raw('idLab', status');
        $search = $request->get('search');
        $listLab = StorageLabModel::where('status', '=', '1')
            ->where('name', 'LIKE', "%$search%")->paginate(6);
        return view('StorageLab.index', [
            'listLab' => $listLab,
            'search' => $search,
        ]);
    }

    public function create()
    {
        $valuestatus = StorageLabModel::all();
        return view('StorageLab.create', [
            "valuestatus" => $valuestatus,
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('nameLab');
        $status = $request->get('status');
        $Lab = new StorageLabModel();
        $Lab->name = $name;
        $Lab->status = $status;
        $Lab->save();
        return redirect(route('StorageLab.index'))->with('success', 'Thêm phòng kho thành công!');
    }

    public function edit($id)
    {
        $Lab = StorageLabModel::find($id);
        $editLab = StorageLabModel::find($id);
        return view('StorageLab.edit', [
            'editLab' => $Lab,
            'edit' => $editLab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $Lab = $request->get('nameLab');
        $status = $request->get('status');
        StorageLabModel::where('idSLab', $id)->update([
            'name' => $Lab,
            'status' => $status,
        ]);
        return redirect(route('StorageLab.index'));
    }

    public function show(Request $request, $id)
    {
        $search = $request->get('search');
        $idSLab = $id;
        $listDevice = Device_on_labModel::where('device_on_lab.status', '=', 3)
            ->join('device', 'device_on_lab.idDevice', '=', 'device.idDevice')
            ->select('device.idDevice', 'device.name', 'device.updated', 'device.statusdevice', 'device.note')
            ->where('device_on_lab.idSLab', '=', $id)
            ->where('name', 'LIKE', "%$search%")
            ->paginate(10);
        return view('StorageLab.view', [
            'idlab' => $idSLab,
            'listDevice' => $listDevice,
            'search' => $search,
        ]);
    }
}
