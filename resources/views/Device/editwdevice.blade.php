@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Sửa thiết bị phòng chờ</h1>
            <form action="{{ route('EditWDevice.update',$edit->idDevice)  }}" method="post">
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
                                            <label class="col-md-3 label-on-left">Chuyển phòng chờ</label>
                                                <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                <div class="custom-select">
                                                    <div class="select-container">
                                                    <select name="lab" class="khungselect2">
                                                            @foreach ($lab as $idlab)
                                                                <option value="{{  $idlab->idWLab }} ">
                                                                    {{ $idlab->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Ngày nhập</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="date" name="import" class="form-control" value="{{$edit->import}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            </form>
</div>
@endsection
