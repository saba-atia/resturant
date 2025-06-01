<!-- partial:partials/_sidebar.html -->
<nav class="admin-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="/admin">
      <img src="admin/assets/images/Tawle-removebg-preview.png" alt="Tawle Logo" class="sidebar-logo">
      <span class="brand-name">Admin Panel</span>
    </a>
    <button class="sidebar-close-btn" id="sidebarCloseBtn">
      <i class="mdi mdi-close"></i>
    </button>
  </div>
  

  
  <div class="sidebar-menu">
    <ul class="nav-links">
      <li class="nav-section">
        <span class="section-title">MAIN NAVIGATION</span>
      </li>
      <li class="nav-item">
        <a href="{{ url('/users') }}" class="nav-link">
          <i class="mdi mdi-account-multiple"></i>
          <span class="link-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/foodmenu') }}" class="nav-link">
          <i class="mdi mdi-food"></i>
          <span class="link-title">Food Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/viewchef') }}" class="nav-link">
          <i class="mdi mdi-chef-hat"></i>
          <span class="link-title">Chefs</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/viewreservation') }}" class="nav-link">
          <i class="mdi mdi-calendar-clock"></i>
          <span class="link-title">Reservations</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/orders') }}" class="nav-link">
          <i class="mdi mdi-cart-outline"></i>
          <span class="link-title">Orders</span>
        </a>
      </li>
    </ul>
  </div>
  

</nav>

<button class="mobile-menu-toggle" id="mobileMenuToggle">
  <i class="mdi mdi-menu"></i>
</button>

<style>
  :root {
    --sidebar-width: 280px;
    --sidebar-collapsed-width: 80px;
    --sidebar-bg: #2a3042;
    --sidebar-text: #a0a8c3;
    --sidebar-active-bg: #3a4055;
    --sidebar-active-text: #ffffff;
    --sidebar-hover-bg: #343a4d;
    --sidebar-header-height: 70px;
    --sidebar-footer-height: 60px;
    --transition-speed: 0.3s;
    --primary-color: #7367f0;
    --badge-color: #ff9f43;
  }

  /* Main Sidebar Styles */
  .admin-sidebar {
    width: var(--sidebar-width);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: var(--sidebar-bg);
    color: var(--sidebar-text);
    transition: all var(--transition-speed) ease;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    overflow: hidden;
  }

  .sidebar-header {
    height: var(--sidebar-header-height);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .sidebar-brand {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: white;
  }

  .sidebar-logo {
    height: 40px;
    margin-right: 12px;
    transition: all var(--transition-speed) ease;
  }

  .brand-name {
    font-weight: 600;
    font-size: 1.1rem;
    transition: all var(--transition-speed) ease;
  }

  .sidebar-close-btn {
    background: transparent;
    border: none;
    color: var(--sidebar-text);
    font-size: 1.5rem;
    cursor: pointer;
    display: none;
  }

  .sidebar-profile {
    padding: 20px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .profile-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 12px;
  }

  .profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .profile-info {
    display: flex;
    flex-direction: column;
  }

  .profile-name {
    color: white;
    font-weight: 500;
    font-size: 0.9rem;
  }

  .profile-role {
    font-size: 0.75rem;
    opacity: 0.8;
  }

  .sidebar-menu {
    flex: 1;
    overflow-y: auto;
    padding: 15px 0;
  }

  .nav-section {
    padding: 10px 20px;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(160, 168, 195, 0.6);
    font-weight: 600;
  }

  .nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .nav-item {
    position: relative;
    margin: 5px 0;
  }

  .nav-link {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: var(--sidebar-text);
    text-decoration: none;
    transition: all var(--transition-speed) ease;
    position: relative;
  }

  .nav-link:hover {
    background-color: var(--sidebar-hover-bg);
    color: var(--sidebar-active-text);
  }

  .nav-link i {
    font-size: 1.25rem;
    width: 24px;
    text-align: center;
    margin-right: 12px;
    transition: all var(--transition-speed) ease;
  }

  .link-title {
    transition: all var(--transition-speed) ease;
    font-size: 0.9rem;
  }

  .badge {
    margin-left: auto;
    background-color: var(--badge-color);
    color: white;
    font-size: 0.65rem;
    padding: 3px 6px;
    border-radius: 10px;
    font-weight: 600;
  }

  .sidebar-footer {
    height: var(--sidebar-footer-height);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  .footer-link {
    display: flex;
    align-items: center;
    color: var(--sidebar-text);
    text-decoration: none;
    font-size: 0.85rem;
    transition: all var(--transition-speed) ease;
  }

  .footer-link:hover {
    color: var(--sidebar-active-text);
  }

  .footer-link i {
    margin-right: 8px;
    font-size: 1.1rem;
  }

  /* Mobile Toggle Button */
  .mobile-menu-toggle {
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 999;
    background: var(--primary-color);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
  }

  /* Active State */
  .nav-link.active {
    background-color: var(--sidebar-active-bg);
    color: var(--sidebar-active-text);
  }

  .nav-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background-color: var(--primary-color);
  }

  /* Responsive Styles */
  @media (max-width: 1199px) {
    .admin-sidebar {
      transform: translateX(-100%);
    }
    
    .admin-sidebar.sidebar-open {
      transform: translateX(0);
    }
    
    .mobile-menu-toggle {
      display: flex;
    }
    
    .sidebar-close-btn {
      display: block;
    }
  }

  @media (max-width: 767px) {
    .admin-sidebar {
      width: 100%;
      max-width: 320px;
    }
    
    .sidebar-profile {
      padding: 15px;
    }
    
    .nav-link {
      padding: 10px 15px;
    }
  }

  /* Collapsed Sidebar Variant (optional) */
  .sidebar-collapsed .admin-sidebar {
    width: var(--sidebar-collapsed-width);
  }
  
  .sidebar-collapsed .brand-name,
  .sidebar-collapsed .link-title,
  .sidebar-collapsed .profile-info,
  .sidebar-collapsed .badge,
  .sidebar-collapsed .footer-link span,
  .sidebar-collapsed .section-title {
    display: none;
  }
  
  .sidebar-collapsed .sidebar-logo {
    margin-right: 0;
  }
  
  .sidebar-collapsed .nav-link {
    justify-content: center;
  }
  
  .sidebar-collapsed .nav-link i {
    margin-right: 0;
    font-size: 1.4rem;
  }
  
  .sidebar-collapsed .sidebar-brand {
    justify-content: center;
  }
</style>

<script>
  // Toggle sidebar on mobile
  document.getElementById('mobileMenuToggle').addEventListener('click', function() {
    document.getElementById('sidebar').classList.add('sidebar-open');
  });
  
  document.getElementById('sidebarCloseBtn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.remove('sidebar-open');
  });
  
  // Close sidebar when clicking outside
  document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('mobileMenuToggle');
    
    if (!sidebar.contains(event.target) && event.target !== toggleBtn) {
      sidebar.classList.remove('sidebar-open');
    }
  });
  
  // Add active class to current page link
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');
  
  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('active');
    }
  });
  
  // Optional: Toggle collapsed state
  // document.getElementById('collapseToggle').addEventListener('click', function() {
  //   document.body.classList.toggle('sidebar-collapsed');
  // });
</script>