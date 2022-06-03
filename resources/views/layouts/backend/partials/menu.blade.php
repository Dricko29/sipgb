                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('*dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="ri-dashboard-2-line"></i>Dashboards</span>
                            </a>
                        </li> <!-- end Dashboard Menu -->
                        @can('admin_akses')
                            
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('*akses*') ? 'collapsed active' : '' }}" 
                            href="#sidebarAkses" 
                            data-bs-toggle="collapse" 
                            role="button" 
                            aria-expanded="false" 
                            aria-controls="sidebarAkses">
                                <i class="ri-key-2-line"></i> 
                                <span data-key="t-akses">Akses</span>
                            </a>
                            <div class="collapse menu-dropdown {{ request()->is('*akses*') ? 'show' : '' }}" id="sidebarAkses">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('*roles*') ? 'active' : '' }}"> Roles </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('*permissions*') ? 'active' : '' }}"> Permissions </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('*users*') ? 'active' : '' }}"> Users </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endcan
                        {{-- LKD --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('*lembaga-kemasyarakatan*') ? 'collapsed active' : '' }}" 
                            href="#sidebarLKD" 
                            data-bs-toggle="collapse" 
                            role="button" 
                            aria-expanded="false" 
                            aria-controls="sidebarLKD">
                                <i class="ri-team-line"></i> 
                                <span data-key="t-akses">LKD</span>
                            </a>
                            <div class="collapse menu-dropdown {{ request()->is('*lembaga-kemasyarakatan*') ? 'show' : '' }}" id="sidebarLKD">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('dusun.index') }}" class="nav-link {{ request()->is('*dusun*') ? 'active' : '' }}"> Dusun </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('rw.index') }}" class="nav-link {{ request()->is('*rw*') ? 'active' : '' }}"> Rukun Warga </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('rt.index') }}" class="nav-link {{ request()->is('*rt*') ? 'active' : '' }}"> Rukun Tetangga </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- AKP --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('*atribut-kependudukan*') ? 'collapsed active' : '' }}" 
                            href="#sidebarAKP" 
                            data-bs-toggle="collapse" 
                            role="button" 
                            aria-expanded="false" 
                            aria-controls="sidebarAKP">
                                <i class="ri-book-line"></i> 
                                <span data-key="t-akses">AKP</span>
                            </a>
                            <div class="collapse menu-dropdown {{ request()->is('*atribut-kependudukan*') ? 'show' : '' }}" id="sidebarAKP">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('agama.index') }}" class="nav-link {{ request()->is('*agama*') ? 'active' : '' }}"> Agama </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('darah.index') }}" class="nav-link {{ request()->is('*darah*') ? 'active' : '' }}"> Golongan Darah </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pekerjaan.index') }}" class="nav-link {{ request()->is('*pekerjaan*') ? 'active' : '' }}"> Pekerjaan </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pendidikan.index') }}" class="nav-link {{ request()->is('*pendidikan*') ? 'active' : '' }}"> Pendidikan </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('hubungan.index') }}" class="nav-link {{ request()->is('*hubungan*') ? 'active' : '' }}"> Hubungan </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('kawin.index') }}" class="nav-link {{ request()->is('*kawin*') ? 'active' : '' }}"> Status Kawin </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('suku.index') }}" class="nav-link {{ request()->is('*suku*') ? 'active' : '' }}"> Suku </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('bahasa.index') }}" class="nav-link {{ request()->is('*bahasa*') ? 'active' : '' }}"> Bahasa </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" target="_blank" href="landing.html">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                                <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="widgets.html">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
                            </a>
                        </li>

                    </ul>