@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Thêm phòng kho</h1>
            <form action="{{ route('StorageLab.store') }}" method="post">
                @csrf
                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tên phòng kho</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="nameLab" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tình trạng</label>
                                            <div class="col-md-9">
                                                <div class="custom-select2">
                                                    <div class="select-container2">
                                                    <select name="status" class="khungselect">
                                                        <option value="1">Hoạt động</option>
                                                        <option value="0">Không hoạt động</option>
                                                    </select>
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
