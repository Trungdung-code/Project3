@extends('layout.layout')
@section('main')
<div class="container-fluid">
            <h1>&nbsp;&nbsp;&nbsp;Sửa thông tin phòng Lab</h1>
            <form action="{{ route('Lab.update',$editLab->idLab)  }}" method="post">
                @method("PUT")
                @csrf
                                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tên phòng Lab</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="nameLab" class="form-control" value="{{$editLab->name}}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Tình trạng</label>
                                                <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                <div class="custom-select">
                                                    <div class="select-container">
                                                    <select name="status" class="khungselect" value="{{ $edit->status }}">
                                                        <label value="{{ $edit->status }}" ></label>
                                                        <option value="1">Hoạt động</option>
                                                        <option value="0">Không hoạt động</option>
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
                                                    <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            </form>
</div>
@endsection
