@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Xuất thiết bị</h1>
            <form action="{{ route('HideDevice.update',$edit->idDevice)  }}" method="post">
                @method("PUT")
                @csrf
                                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tên thiết bị</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="namedevice" class="form-control" value="{{$edit->name}}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tình trạng</label>
                                                <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                <div class="custom-select">
                                                    <div class="select-container">
                                                    <select name="status" class="khungselect2" value="{{ $edit->status }}">
                                                        <option value="">Bình thường</option>
                                                        <option value="1">Hỏng</option>
                                                        <option value="2">Lỗi</option>
                                                        <option value="3">Mất</option>
                                                        <option value="4">Đang sửa</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Ghi chú</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="note" class="form-control" value="{{ $edit->note }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Ngày xuất</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="date" name="namedevice" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Xuất</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            </form>
</div>
@endsection
