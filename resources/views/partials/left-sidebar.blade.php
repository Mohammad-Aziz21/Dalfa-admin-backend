<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- SideMenu -->
        <div id="sidebar-menu" style=" background-color:black; padding: 10px 0 100% 0; ">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('homepage') }}" class="">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-flag"></i>
                        <span key="t-projects">COC</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('coc.index') }}" key="t-p-grid">View</a>
                        </li>
                        <li>
                            <a href="{{ route('coc.create') }}" key="t-p-list">Add</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-flag"></i>
                        <span key="t-projects">Cattle</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('cattle.index') }}" key="t-p-grid">View</a>
                        </li>
                        <li>
                            <a href="{{ route('cattle.create') }}" key="t-p-list">Add</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
