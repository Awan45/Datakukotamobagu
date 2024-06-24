<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    {{-- <img src="{{asset ('template/images/user.png') }}" width="48" height="48" alt="User" /> --}}
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session()->get('nama') }}</div>
                    <div class="email">Admin </div>
                    {{-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    {{-- <li class="{{ request()->segment(1) == 'dashboard-admin' ? 'active' : '' }}"> --}}
                    <li class="">
                        <a href="/">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('cleansing_data.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Cleansing Data</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('form_cleansing_data') }}">
                            <i class="material-icons">widgets</i>
                            <span>Generate Cleansing Data</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('umkm.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>UMKM</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('form_nb_calculation') }}">
                            <i class="material-icons">widgets</i>
                            <span>CEK KELAYAKAN UMKM</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('result_data.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>HASIL KELAYAKAN UMKM</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('koperasi.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Koperasi</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('naive_bayes_rules.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Aturan Naive Bayes</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('training_data.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Aturan Training Data</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('users.index') }}">
                            <i class="material-icons">widgets</i>
                            <span>Users</span>
                        </a>
                    </li>
                   
                    <li class="">
                        <a href="{{ route('logout') }}">
                             <i class="material-icons">input</i>
                            <span>Keluar</span>
                        </a>
                    </li> 
                  
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
           
            <!-- #Footer -->
        </aside>