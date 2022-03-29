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
            <form action="{{url('/DateExportDevice') }}" method="POST" class="searchdate" style="padding-left: 60%;">
            @csrf
            <div class="row">
                <div class="col-md-3" style="width: 33%">
                    <label class="control-label">Từ</label>
                    <input type="date" id="fromDate" name="fromDate"  required/>
                </div>
                <div class="col-md-3" style="width: 34%">
                    <label class="control-label">Đến</label>
                    <input type="date" id="toDate" name="toDate"  required/>
                </div>
                <div class="col-md-3" style="padding-top: 10px;">
                    <label class="control-label"></label>
                    <button type="submit" name="search">Tìm</button>
                </div>
            </div>
            </form>
                            <div class="card card-plain">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">THIẾT BỊ ĐÃ XUẤT</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Mã</th>
                                                    <th>Tên thiết bị</th>
                                                    <th>Ngày xuất</th>
                                                    <th>Tình trạng</th>
                                                    <th>Ghi chú</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listDevice as $list)
                                                <tr>
                                                    <td class="text-center">{{ $list ->idDevice }}</td>
                                                    <td>{{ $list ->name  }}</td>
                                                    <td>{{ DateTime::createFromFormat('Y-m-d', $list->updated)->format('d-m-Y') }}</td>
                                                    <td>@if ($list->statusdevice == 1)
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
                                                    <td>{{ $list ->note }}</td>
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
