@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Chuyển thiết bị sang phòng Lab</h1>
            <form action="{{ route('Device_on_lab.update', $edit->idDevice)  }}" method="post">
                @method("PUT")
                @csrf
                                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Chọn phòng Lab</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <div class="custom-select">
                                                        <div class="select-container">
                                                        <select name="lab" class="khungselect2">
                                                            @foreach ($lab as $idlab)
                                                                <option value="{{  $idlab->idLab }} ">
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
                                                    <input type="date" name="updated" class="form-control" value="{{ $time->format('Y-m-d') }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Chuyển</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            </form>
</div>
@endsection
