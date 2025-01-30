<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <!-- <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">
              @auth
              {{ Auth::user()->name }}
              @else
              Guest
              @endauth
            </p>
          </div>
        </div>
      </div>
    </li> -->

    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Services -->
    <li class="nav-item {{ active_class(['services/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#servicesMenu" aria-expanded="{{ is_active_route(['services/*']) }}" aria-controls="servicesMenu">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Services</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['services/*']) }}" id="servicesMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_class(['services/index']) }}" href="{{ url('/services/index') }}">All Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_class(['services/create']) }}" href="{{ url('/services/create') }}">Create Service</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Messages -->
    <li class="nav-item {{ active_class(['messages/index']) }}">
      <a class="nav-link" href="{{ url('/messages/index') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Messages</span>
      </a>
    </li>

    <!-- ToDos -->
    <li class="nav-item {{ active_class(['todos']) }}">
      <a class="nav-link" href="{{ url('/todos') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">ToDos & Schedule</span>
      </a>
    </li>

    <!-- Projects -->
    <li class="nav-item {{ active_class(['projects/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#projectsMenu" aria-expanded="{{ is_active_route(['projects/*']) }}" aria-controls="projectsMenu">
        <i class="menu-icon mdi mdi-folder"></i>
        <span class="menu-title">Projects</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['projects*']) }}" id="projectsMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['projects']) }}">
            <a class="nav-link" href="{{ url('/projects') }}">All Projects</a>
          </li>
          <li class="nav-item {{ active_class(['projects/create']) }}">
            <a class="nav-link" href="{{ url('/projects/create') }}">Create Project</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Reviews -->
    <li class="nav-item {{ active_class(['reviews/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#reviewsMenu" aria-expanded="{{ is_active_route(['reviews/*']) }}" aria-controls="reviewsMenu">
        <i class="menu-icon mdi mdi-star"></i>
        <span class="menu-title">Reviews</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['reviews*']) }}" id="reviewsMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['reviews']) }}">
            <a class="nav-link" href="{{ url('/reviews') }}">All Reviews</a>
          </li>
          <li class="nav-item {{ active_class(['reviews/create']) }}">
            <a class="nav-link" href="{{ url('/reviews/create') }}">Create Review</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Banners -->
    <li class="nav-item {{ active_class(['banner/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#bannerMenu" aria-expanded="{{ is_active_route(['banner/*']) }}" aria-controls="bannerMenu">
        <i class="menu-icon mdi mdi-image"></i>
        <span class="menu-title">Banners</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['banner*']) }}" id="bannerMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['banner']) }}">
            <a class="nav-link" href="{{ url('/banner') }}">All Banners</a>
          </li>
          <li class="nav-item {{ active_class(['banner/create']) }}">
            <a class="nav-link" href="{{ url('/banner/create') }}">Create Banner</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Team Members -->
    <li class="nav-item {{ active_class(['team/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#teamMenu" aria-expanded="{{ is_active_route(['team/*']) }}" aria-controls="teamMenu">
        <i class="menu-icon mdi mdi-account-group"></i>
        <span class="menu-title">Team</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['team*']) }}" id="teamMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['team']) }}">
            <a class="nav-link" href="{{ url('/team') }}">Team Members</a>
          </li>
          <li class="nav-item {{ active_class(['team/create']) }}">
            <a class="nav-link" href="{{ url('/team/create') }}">Create Member</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Site Info -->
    <li class="nav-item {{ active_class(['site_info']) }}">
      <a class="nav-link" href="{{ url('/site_info') }}">
        <i class="menu-icon mdi mdi-information"></i>
        <span class="menu-title">Site Info</span>
      </a>
    </li>
    <!-- Visitors Info -->
    <li class="nav-item {{ active_class(['visitors']) }}">
      <a class="nav-link" href="{{ url('/visitors') }}">
        <i class="menu-icon mdi mdi-information"></i>
        <span class="menu-title">Site Info</span>
      </a>
    </li>

  </ul>
</nav>
