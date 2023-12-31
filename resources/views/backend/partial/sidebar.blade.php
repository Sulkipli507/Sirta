<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Pengaturan Tampilan
            <span class="btn-block font-weight-400 font-12">Tampilan pengguna</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Warna header</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">Putih</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Hitam</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Warna sidebar</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">Putih</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Hitam</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                    <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                    <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                    <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ asset('backend/vendors/images/sirta_light.png')}}" alt="" class="dark-logo">
            <img src="{{ asset('backend/vendors/images/sirta_dark.png')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-worldwide-1"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role == "Admin")
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-group"></span><span class="mtext">User</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user-create') }}">Tambah User</a></li>
                        <li><a href="{{ route('user-all') }}">All</a></li>
                        <li><a href="{{ route('user-active') }}">Active</a></li>
                        <li><a href="{{ route('user-inactive') }}">Inactive</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-name"></span><span class="mtext">Mahasiswa & Dosen</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user-student') }}">Mahasiswa</a></li>
                        <li><a href="{{ route('user-lecturer') }}">Dosen</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-target-2"></span><span class="mtext">Konsentrasi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('concentration-create') }}">Tambah Konsentrasi</a></li>
                        <li><a href="{{ route('concentration-index') }}">Daftar Konsentrasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-book1"></span><span class="mtext">Tugas Akhir</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('thesis-create') }}">Tambah Tugas Akhir</a></li>
                        <li><a href="{{ route('thesis-index') }}">Daftar Tugas Akhir</a></li>
                    </ul>
                </li>
                @elseif (Auth::user()->role == "Dosen")
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext">Mahasiswa</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('thesis-mentor')}}">Dibimbing</a></li>
                        <li><a href="{{ route('thesis-examiner')}}">Diuji</a></li>
                    </ul>
                </li>
                @else
                <li>
                    <a href="{{ route('thesis-create') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-book1"></span><span class="mtext">Upload Tugas Akhir</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('thesis-indexUser') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-file2"></span><span class="mtext">Tugas Akhir Ku</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('page-index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane1"></span>
                        <span class="mtext">Landing Page</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>