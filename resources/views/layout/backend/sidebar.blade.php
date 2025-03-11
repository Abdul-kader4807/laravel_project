<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
        <ul>
            <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
            </li>
            <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
            </li>
            <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Application</div>
        </a>
        <ul>
            <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
            </li>
            <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
            </li>
            <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
            </li>
            <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
            </li>
            <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
            </li>
            <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
            </li>
            <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Sales Management</li>
    <li>
        <a href="widgets.html">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Widgets</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Sales </div>
        </a>
        <ul>
            <li> <a href="{{url('order')}}"><i class='bx bx-radio-circle'></i>Sales</a>
            </li>
            <li> <a href="{{url('order_detail')}}"><i class='bx bx-radio-circle'></i>Sales List</a>
            </li>
            <li> <a href="{{url('order-report')}}"><i class='bx bx-radio-circle'></i>Sales Report</a>
            </li>
            {{-- <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a> --}}
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-group'></i>
            </div>
            <div class="menu-title">Customer </div>
        </a>
        <ul>
            <li> <a href="{{url('customer')}}"><i class='bx bx-radio-circle'></i>Customer List </a>
            </li>
            <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Prescriptions </a>
            </li>



             {{-- <li> <a href="component-badges.html"><i class='bx bx-radio-circle'></i>Badges</a>
            </li>
            <li> <a href="component-buttons.html"><i class='bx bx-radio-circle'></i>Buttons</a>
            </li>
            <li> <a href="component-cards.html"><i class='bx bx-radio-circle'></i>Cards</a>
            </li>
            <li> <a href="component-carousels.html"><i class='bx bx-radio-circle'></i>Carousels</a>
            </li>
            <li> <a href="component-list-groups.html"><i class='bx bx-radio-circle'></i>List Groups</a>
            </li>
            <li> <a href="component-media-object.html"><i class='bx bx-radio-circle'></i>Media Objects</a>
            </li>
            <li> <a href="component-modals.html"><i class='bx bx-radio-circle'></i>Modals</a>
            </li>
            <li> <a href="component-navs-tabs.html"><i class='bx bx-radio-circle'></i>Navs & Tabs</a>
            </li>
            <li> <a href="component-navbar.html"><i class='bx bx-radio-circle'></i>Navbar</a>
            </li>
            <li> <a href="component-paginations.html"><i class='bx bx-radio-circle'></i>Pagination</a> --
            </li>
            <li> <a href="component-popovers-tooltips.html"><i class='bx bx-radio-circle'></i>Popovers & Tooltips</a>
            </li>
            <li> <a href="component-progress-bars.html"><i class='bx bx-radio-circle'></i>Progress</a>
            </li>
            <li> <a href="component-spinners.html"><i class='bx bx-radio-circle'></i>Spinners</a>
            </li>
            <li> <a href="component-notifications.html"><i class='bx bx-radio-circle'></i>Notifications</a>
            </li>
            <li> <a href="component-avtars-chips.html"><i class='bx bx-radio-circle'></i>Avatrs & Chips</a>
            </li> --}}
        </ul>
    </li>

    <li class="menu-label">Purchase Management</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-basket"></i>
            </div>
            <div class="menu-title">Purchases </div>
        </a>
        <ul>
            <li> <a href="{{url('purchase/create')}}"><i class='bx bx-radio-circle'></i>Purchase Orders</a>
            </li>
            <li> <a href="{{'purchase_deatil'}}"><i class='bx bx-radio-circle'></i>Purchase Details</a>
            <li> <a href="{{'purchase-report'}}"><i class='bx bx-radio-circle'></i>Purchase Report</a>
            </li>
        </ul>
    </li>


    <li class="menu-label">Inventory Management</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-box"></i>
            </div>
            <div class="menu-title">Stock</div>
        </a>
        <ul>
            <li> <a href="{{url('stock')}}"><i class='bx bx-radio-circle'></i>Stock </a>
            </li>
            <li> <a href="{{url('stock-report')}}"><i class='bx bx-radio-circle'></i>Stock-Report </a>
            </li>
            <li> <a href="content-grid-system.html"><i class='bx bx-radio-circle'></i>Transactions </a>
            </li>
            <li> <a href="content-typography.html"><i class='bx bx-radio-circle'></i>Batches </a>
            </li>
            <li> <a href="content-text-utilities.html"><i class='bx bx-radio-circle'></i>Adjustments </a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class="bx bx-store"></i>
            </div>
            <div class="menu-title">Warehouse</div>
        </a>
        <ul>
            <li> <a href="{{url('warehouse')}}"><i class='bx bx-radio-circle'></i>Warehouse-List</a>
            </li>
             {{-- <li> <a href="icons-boxicons.html"><i class='bx bx-radio-circle'></i>Boxicons</a>
            </li> --}}

        </ul>
    </li>

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class="fa fa-truck"></i>
            </div>
            <div class="menu-title">Supplier</div>
        </a>
        <ul>
            <li> <a href="{{url('supplier')}}"><i class='bx bx-radio-circle'></i>Supplier-List </a>
            </li>
            <li> <a href="{{url('supplier-report')}}"><i class='bx bx-radio-circle'></i>Supplier-Report </a>
            </li>
            <li> <a href="icons-boxicons.html"><i class='bx bx-radio-circle'></i>Supplier Returns </a>
            </li>
            {{-- <li> <a href="icons-feather-icons.html"><i class='bx bx-radio-circle'></i>Feather Icons</a>
            </li> --}}
        </ul>
    </li>




    <li class="menu-label">Product Management</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-layer'></i>
            </div>
            <div class="menu-title">Products</div>
        </a>
        <ul>
            <li> <a href="{{url('product')}}"><i class='bx bx-radio-circle'></i>Product List </a>
            </li>
            <li> <a href="{{url('category')}}"><i class='bx bx-radio-circle'></i>Category List</a>
            </li>
            <li> <a href="{{url('brand')}}"><i class='bx bx-radio-circle'></i>Brand List</a>
            </li>
            <li> <a href="{{url('manufacturer')}}"><i class='bx bx-radio-circle'></i>Manufacturer List</a>
            </li>

            {{-- <li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
            </li>
            <li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
            </li> --}}


        </ul>
    </li>


    <li class="menu-label">Reports management</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-bar-chart-square'></i>
            </div>
            <div class="menu-title">Reports</div>
        </a>
        <ul>
            <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Audit Logs </a>
            </li>
            <li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Sales Reports</a>
            </li>
            <li> <a href="form-radios-and-checkboxes.html"><i class='bx bx-radio-circle'></i>Inventory Reports</a>
            </li>
           {{--
            <li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Manufacturers</a>
            </li> --}}

        </ul>
    </li>

    <li class="menu-label">Settings-system</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-cog'></i>
            </div>
            <div class="menu-title"> Settings</div>
        </a>
        <ul>
            <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>System Settings </a>
            </li>


        </ul>
    </li>


    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-book-bookmark'></i>
            </div>
            <div class="menu-title"> Reference Data</div>
        </a>
        <ul>
            <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Adjustment Types </a>
            </li>
            <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Transaction Types </a>
            </li>
            <li> <a href="{{url('uom')}}"><i class='bx bx-radio-circle'></i>UOMs </a>
            </li>
            <li> <a href="{{url('status')}}"><i class='bx bx-radio-circle'></i>Status List </a>
            </li>
            <li> <a href="{{url('payment_status')}}"><i class='bx bx-radio-circle'></i>PaymentStatus List </a>
            </li>

        </ul>
    </li>


    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-bell'></i>
            </div>
            <div class="menu-title"> Notifications</div>
        </a>
        <ul>
            <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Notifications </a>
            </li>
        </ul>
    </li>








    <li class="menu-label">Pages</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-lock"></i>
            </div>
            <div class="menu-title">User-Authentication</div>
        </a>
        <ul>
            <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Users</a>
                <ul>
                    <li><a href="auth-basic-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>User List</a></li>
                    <li><a href="auth-basic-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                    <li><a href="auth-basic-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                    <li><a href="auth-basic-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                    <li><a href="auth-basic-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Roles</a>
                <ul>
                    <li><a href="auth-cover-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                    <li><a href="auth-cover-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                    <li><a href="auth-cover-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                    <li><a href="auth-cover-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>With Header Footer</a>
                <ul>
                    <li><a href="auth-header-footer-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                    <li><a href="auth-header-footer-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                    <li><a href="auth-header-footer-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                    <li><a href="auth-header-footer-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="user-profile.html">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">User Profile</div>
        </a>
    </li>
    <li>
        <a href="timeline.html">
            <div class="parent-icon"> <i class="bx bx-video-recording"></i>
            </div>
            <div class="menu-title">Timeline</div>
        </a>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-error"></i>
            </div>
            <div class="menu-title">Errors</div>
        </a>
        <ul>
            <li> <a href="errors-404-error.html" target="_blank"><i class='bx bx-radio-circle'></i>404 Error</a>
            </li>
            <li> <a href="errors-500-error.html" target="_blank"><i class='bx bx-radio-circle'></i>500 Error</a>
            </li>
            <li> <a href="errors-coming-soon.html" target="_blank"><i class='bx bx-radio-circle'></i>Coming Soon</a>
            </li>
            <li> <a href="error-blank-page.html" target="_blank"><i class='bx bx-radio-circle'></i>Blank Page</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="faq.html">
            <div class="parent-icon"><i class="bx bx-help-circle"></i>
            </div>
            <div class="menu-title">FAQ</div>
        </a>
    </li>
    <li>
        <a href="pricing-table.html">
            <div class="parent-icon"><i class="bx bx-diamond"></i>
            </div>
            <div class="menu-title">Pricing</div>
        </a>
    </li>
    <li class="menu-label">Charts & Maps</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-line-chart"></i>
            </div>
            <div class="menu-title">Charts</div>
        </a>
        <ul>
            <li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
            </li>
            <li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
            </li>
            <li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-map-alt"></i>
            </div>
            <div class="menu-title">Maps</div>
        </a>
        <ul>
            <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
            </li>
            <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Others</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-menu"></i>
            </div>
            <div class="menu-title">Menu Levels</div>
        </a>
        <ul>
            <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level Two</a>
                        <ul>
                            <li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
            <div class="parent-icon"><i class="bx bx-folder"></i>
            </div>
            <div class="menu-title">Documentation</div>
        </a>
    </li>
    <li>
        <a href="https://themeforest.net/user/codervent" target="_blank">
            <div class="parent-icon"><i class="bx bx-support"></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
</ul>
