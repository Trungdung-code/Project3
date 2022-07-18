@extends('layout.layout')

@section('main')
    <div class="container-fluid">
        <form class="navbar-form navbar-right" role="search">
            <div class="form-group form-search is-empty">
                <input type="text" class="form-control" placeholder=" {{ $search }} " name="search">
                <span class="material-input"></span>
            </div>
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
            </button>
        </form>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">PHÒNG LAB {{ $idlab }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã</th>
                                    <th>Tên thiết bị</th>
                                    <th>Ngày nhập</th>
                                    <th>Tình trạng</th>
                                    <th>Ghi chú</th>
                                    <th class="text-right">Sửa</th>
                                    <th class="text-right">Chuyển</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listDevice as $list)
                                    <tr>
                                        <td class="text-center">{{ $list->idDevice }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ DateTime::createFromFormat('Y-m-d', $list->updated)->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            @if ($list->statusdevice == 1)
                                                Hỏng
                                            @elseif($list->statusdevice == 2)
                                                Lỗi
                                            @elseif($list->statusdevice == 3)
                                                Mất
                                            @elseif($list->statusdevice == 4)
                                                Đang sửa
                                            @else
                                                Bình thường
                                            @endif
                                        </td>
                                        <td>{{ $list->note }}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons"><a class="chuyendevice"
                                                        href="{{ route('Device.edit', $list->idDevice) }}">edit</a></i>
                                            </button>
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons"><a class="chuyendevice"
                                                        href="{{ route('SendStorage.edit', $list->idDevice) }}">edit</a></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $listDevice->appends(['search' => $search])->links('pagination::bootstrap-4') }}
    </div>
@endsection
