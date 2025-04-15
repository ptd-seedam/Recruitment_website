<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">User</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('user.index') }}" class="sidebar-link"><i
                                    class="fas fa-box-open"></i><span class="hide-menu">Danh sách user</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('user.create') }}" class="sidebar-link"><i class="fas fa-box"></i><span
                                    class="hide-menu">Thêm user</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">Sản phẩm</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ url('B2103421/Product/list') }}" class="sidebar-link"><i
                                    class="fas fa-box-open"></i><span class="hide-menu">Danh sách Sản phẩm</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('B2103421/Product/add') }}" class="sidebar-link"><i
                                    class="fas fa-box"></i><span class="hide-menu">Thêm sản phẩm</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-boxes"></i>
                        <span class="hide-menu">Đơn hàng</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('order.index') }}" class="sidebar-link">
                                <i class="fas fa-box-open"></i>
                                <span class="hide-menu">Danh sách Đơn hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('order.create') }}" class="sidebar-link">
                                <i class="fas fa-box"></i>
                                <span class="hide-menu">Thêm Đơn hàng</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-boxes"></i>
                        <span class="hide-menu">Nhập hàng</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('nhap.index') }}" class="sidebar-link">
                                <i class="fas fa-box-open"></i>
                                <span class="hide-menu">Danh sách Đơn nhập hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('nhap.create') }}" class="sidebar-link">
                                <i class="fas fa-box"></i>
                                <span class="hide-menu">Thêm Đơn nhập hàng</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-boxes"></i>
                        <span class="hide-menu">Khách Hàng</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('customer.list') }}" class="sidebar-link">
                                <i class="fas fa-box-open"></i>
                                <span class="hide-menu">Danh sách khách hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customer.create') }}" class="sidebar-link">
                                <i class="fas fa-box"></i>
                                <span class="hide-menu">Thêm khách hàng</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>

</aside>
