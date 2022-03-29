        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">

                </a>
                <a href="#" class="simple-text logo-normal">
                    ManaDevide
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="{{ route('Lab.index') }}">
                            <i class="material-icons">dashboard</i>
                            <p> Trang chủ </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('WaitingLab.index') }}">
                            <i class="material-icons">widgets</i>
                            <p> Phòng chờ </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('StorageLab.index') }}">
                            <i class="material-icons">widgets</i>
                            <p> Phòng kho </p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">apps</i>
                            <p> Thiết bị
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('Device.index') }}">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Tất cả thiết bị </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/Export') }}">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Thiết bị đã xuất </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Device_on_lab.create') }}">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Thêm thiết bị </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">content_paste</i>
                            <p> Thống kê
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('/BrokenDevice') }}">
                                        <span class="sidebar-mini"> B </span>
                                        <span class="sidebar-normal"> Những thiết bị hỏng </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/ErrorDevice') }}">
                                        <span class="sidebar-mini"> E </span>
                                        <span class="sidebar-normal"> Những thiết bị lỗi </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/LostDevice') }}">
                                        <span class="sidebar-mini"> L </span>
                                        <span class="sidebar-normal"> Những thiết bị mất </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
