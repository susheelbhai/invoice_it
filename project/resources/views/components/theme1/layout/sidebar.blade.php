

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <div class="dropdown header-profile2 ">
            <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                <div class="header-info2 d-flex align-items-center border">
                    <img src="{{ asset(Session::get('user')['login']->profile_pic) }}" alt="">
                    <div class="d-flex align-items-center sidebar-info">
                        <div>
                            <span class="font-w700 d-block mb-2">{{ Str::words(Session::get('user')['login']->name, 1, '')  }}</span>
                            <small class="text-end font-w400">{{ Session::get('user')['login']->designation }}</small>
                        </div>
                        <i class="fas fa-sort-down ms-4"></i>
                    </div>
                    
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                {{ $header_profile_li }}
            
                <a href="javascript:void()" onclick="logoutSubmit()" class="dropdown-item ai-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="ms-2">Logout </span>
                </a>
            </div>
        </div>
        <ul class="metismenu" id="menu">

            {{ $sidebar }}
            
        </ul>
        
    </div>
</div>