
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
                    <h1>&nbsp;&nbsp;&nbsp;Phòng Lab</h1>
                    <form class="themlab" method="get" action="{{ route('Lab.create') }}">
                        <button class="btn btn-rose">Thêm phòng Lab</button>
                    </form>
                    <br>
                    <div class="row">
                        @foreach ($listLab as $lab)
                        <div class="col-md-4">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="true">
                                    <a href="{{ route('Lab.show', $lab->idLab) }}">
                                        <img class="img" src="../assets/img/card-3.jpeg">
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
                        {{ $listLab->appends(['search' => $search])->links('pagination::bootstrap-4') }}
                        <form class="lab-hiden" method="get">
                            <button class="btn btn-rose2">
                                <a class="khonghoatdong" href="{{ route('HiddenLab.index') }}">Phòng Lab không hoạt động</a>
                            </button>
                        </form>



                </div>
@endsection
