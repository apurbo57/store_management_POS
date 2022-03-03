<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Anowar</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('staff.dashboard')}}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-2"><i class="bx bx-clipboard"></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{route('staff.brand.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                </li>
                <li> <a href="{{route('staff.brand.index')}}"><i class="bx bx-right-arrow-alt"></i>Manage Brand</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-3"><i class="bx bx-file"></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> <a href="{{route('staff.category.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
                <li> <a href="{{route('staff.category.index')}}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-4"><i class="bx bx-list-ol"></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li> <a href="{{route('staff.product.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                </li>
                <li> <a href="{{route('staff.product.index')}}"><i class="bx bx-right-arrow-alt"></i>Manage Products</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-13"><i class="bx bx-barcode"></i>
                </div>
                <div class="menu-title">Sell</div>
            </a>
            <ul>
                <li> <a href="{{route('staff.sell.sell_product')}}"><i class="bx bx-right-arrow-alt"></i>Sell Product</a>
                </li>
                <li> <a href="{{route('staff.sell.recently_sell')}}"><i class="bx bx-right-arrow-alt"></i>Recently Sell</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Web Apps</li>
        <li>
            <a href="emailbox.html">
                <div class="parent-icon icon-color-2"><i class="bx bx-envelope"></i>
                </div>
                <div class="menu-title">Email</div>
            </a>
        </li>
        <li>
            <a href="chat-box.html">
                <div class="parent-icon icon-color-3"> <i class="bx bx-conversation"></i>
                </div>
                <div class="menu-title">Chat Box</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>