
@extends('layout.layout')

@section('main')
                <div class="container-fluid">
                    <h1>&nbsp;&nbsp;&nbsp;Phòng Lab không hoạt động</h1>
                    <br>
                    <div class="row">
                        @foreach ($listLab as $lab)
                        <div class="col-md-4">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="true">
                                    <a href="{{ route('Lab.show', $lab->idLab) }}">
                                        <img class="img" src="../assets/img/card-1.jpeg">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Fix Header!
                                        </button>
                                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                                            <i class="material-icons"><a href="{{ route('Lab.show', $lab->idLab) }}">art_track</a></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                            <i class="material-icons"><a href="{{ route('Lab.edit', $lab->idLab) }}">edit</a></i>
                                        </button>



                                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Hide">
                                            <i class="material-icons">close</i>
                                        </button>

                                    </div>
                                    <h4 class="card-title">
                                        <a href="{{ route('Lab.show', $lab->idLab) }}">

                                        {{ $lab->name }}

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{ $listLab->links('pagination::bootstrap-4') }}
                </div>
@endsection
