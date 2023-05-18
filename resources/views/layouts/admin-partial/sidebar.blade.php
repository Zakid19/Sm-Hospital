<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if (Auth::user()->role_id == '2')
                        @if (empty(Auth::user()->doctors))
                        @else
                            <img src="{{ Storage::url(Auth::user()->doctors->image) }}" alt="..." class="avatar-img rounded-circle">
                        @endif
                    @else
                       <img src="/admin/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span class="user-level">{{ Auth::user()->role->name }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role_id == '1')
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.doctor.list') }}">
                        <i class="fas fa-user-md"></i>
                        <p>Doctor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.appointment.list') }}">
                        <i class="fas fa-stethoscope"></i>
                        <p>Appointment</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.list') }}">
                        <i class="fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
            </ul>
            @endif

            @if (Auth::user()->role_id == '2')
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @if (empty(Auth::user()->doctors))
                <li class="nav-item">
                    <a href="{{ route('doctor.appointment') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Create</p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('doctor.identitas') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>My Identity</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctor.appointment') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Appointment</p>
                    </a>
                </li>
                @endif
            </ul>
            @endif

            @if (Auth::user()->role_id == '3')
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ route('welcome') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('my-appointment') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>My Appointment</p>
                    </a>
                </li>
            </ul>
            @endif

        </div>
    </div>
</div>
