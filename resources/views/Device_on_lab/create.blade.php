@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Thêm thiết bị</h1>
            <form action="{{ route('Device_on_lab.store') }}" method="post">
                @csrf
                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tên thiết bị</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="nameDevice" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Ngày nhập</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="date" name="importDate" class="form-control" value="{{ $time->format('Y-m-d') }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Phòng chờ</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <div class="custom-select">
                                                        <div class="select-container">
                                                        <select name="waitinglab" class="khungselect2">
                                                            @foreach ($create as $selectlab)
                                                                <option value="{{  $selectlab->idWLab }} ">
                                                                    {{ $selectlab->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                </div>
            </form>
</div>
@endsection

