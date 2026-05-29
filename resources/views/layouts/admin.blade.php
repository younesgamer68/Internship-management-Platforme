@php
    $companySlug = auth()->user()->company?->slug ?? 'internlink-demo';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    
    <title>{{ $title ?? 'Admin Dashboard' }} - InternLink</title>
    
    <link rel="icon" href="{{ asset('images/Logos/Small%20Logo.png') }}" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800|instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    
    <!-- App Vite (Tailwind CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Style Sheet for Admin UI -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/global.css') }}?v={{ time() }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/sidebar.css') }}?v={{ time() }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/dashboard.css') }}?v={{ time() }}"/>
    
    <style>
        .sidebar-logo .logo-small {
            display: none !important;
        }
        .sidebar-logo .logo-full {
            display: block !important;
        }
        .sidebar.collapsed .sidebar-logo {
            justify-content: center !important;
            padding: 0 !important;
        }
        .sidebar.collapsed .sidebar-logo .logo-full {
            display: none !important;
        }
        .sidebar.collapsed .sidebar-logo .logo-small {
            display: block !important;
        }
    </style>
    
    @livewireStyles
    @fluxAppearance

    {{-- ── ADMIN SETTINGS: Apply saved preferences before first paint ── --}}
    <script>
    (function() {
        // ── Theme ──
        var THEMES = {
            teal:   ['#00b1aa','#4cd1cc','#008a84','rgba(0,177,170,0.15)'],
            blue:   ['#2563EB','#60A5FA','#1D4ED8','rgba(37,99,235,0.15)'],
            green:  ['#10B981','#34D399','#059669','rgba(16,185,129,0.15)'],
            indigo: ['#6366F1','#A5B4FC','#4F46E5','rgba(99,102,241,0.15)'],
            amber:  ['#F59E0B','#FCD34D','#D97706','rgba(245,158,11,0.15)'],
            red:    ['#EF4444','#FCA5A5','#DC2626','rgba(239,68,68,0.15)'],
        };
        var savedTheme = localStorage.getItem('adminTheme') || 'teal';
        var t = THEMES[savedTheme];
        if (t) {
            var s = document.createElement('style');
            s.id = 'admin-theme-override';
            s.textContent = ':root{--primary:'+t[0]+' !important;--primary-light:'+t[1]+' !important;--primary-dark:'+t[2]+' !important;--primary-bg:'+t[3]+' !important;}';
            document.head.appendChild(s);
        }
        // ── Density ──
        var density = localStorage.getItem('adminDensity') || 'comfortable';
        if (density === 'compact') {
            var ds = document.createElement('style');
            ds.id = 'admin-density-override';
            ds.textContent = ':root{--sidebar-width:210px !important;}';
            document.head.appendChild(ds);
        }
        // ── Dark mode ──
        if (localStorage.getItem('adminDarkMode') === 'true' || localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('admin-dark');
            document.documentElement.classList.add('dark');
        }
    })();
    </script>
</head>
<body>
<div class="app-layout">

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <a href="{{ route('app.home') }}" class="sidebar-logo">
      <!-- Light Theme Full Logo (includes symbol + text) -->
      <img src="{{ asset('images/Logos/TLM.png') }}" alt="InternLink" class="logo-full" style="height: 44px; max-width: 100%; object-fit: contain;">
      <!-- Small Logo Symbol (shown only when collapsed) -->
      <img src="{{ asset('images/Logos/Small Logo.png') }}" alt="InternLink" class="logo-small" style="height: 44px; width: 44px; object-fit: contain;">
    </a>

    <div class="sidebar-role">
      <div class="role-badge">
        <i class="fas fa-shield-halved"></i>
        <span>Administrator</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <a href="{{ route('app.home') }}" class="nav-item {{ request()->routeIs('app.home', 'dashboard', 'admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-home"></i><span>Dashboard</span>
      </a>
      <a href="{{ route('admin.users', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
        <i class="fas fa-users"></i><span>Users</span>
      </a>
      <a href="{{ route('admin.universities', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.universities') ? 'active' : '' }}">
        <i class="fas fa-university"></i><span>Universities</span>
      </a>
      <a href="{{ route('admin.departments', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.departments') ? 'active' : '' }}">
        <i class="fas fa-sitemap"></i><span>Departments</span>
      </a>
      
      <div class="sidebar-divider"></div>
      
      <a href="{{ route('admin.internships', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.internships') ? 'active' : '' }}">
        <i class="fas fa-briefcase"></i><span>Internships</span>
      </a>
      <a href="{{ route('admin.reports', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
        <i class="fas fa-chart-bar"></i><span>Reports</span>
      </a>
      
      <div class="sidebar-divider"></div>
      
      <a href="{{ route('admin.settings', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <i class="fas fa-gear"></i><span>Settings</span>
      </a>
      <a href="{{ route('admin.support', ['company' => $companySlug]) }}" class="nav-item {{ request()->routeIs('admin.support') ? 'active' : '' }}">
        <i class="fas fa-circle-question"></i><span>Support</span>
      </a>
    </nav>

    <div class="sidebar-bottom">
      <div class="sidebar-user">
        <div class="sidebar-user-avatar">
          @if (auth()->user()->avatar)
              <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="w-full h-full rounded-full object-cover">
          @else
              {{ auth()->user()->initials() }}
          @endif
        </div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
          <div class="sidebar-user-role">Super Admin</div>
        </div>
        <form id="logout-form-sidebar" method="POST" action="{{ route('logout') }}" style="display:none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();" title="Log Out" style="color: var(--gray-500); margin-left: 8px; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">
          <i class="fas fa-arrow-right-from-bracket"></i>
        </a>
      </div>
    </div>


  </aside>

  <!-- Mobile overlay -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>
  <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>

  <!-- Main -->
  <div class="main-content">
    <header class="topbar">
      <div class="topbar-left">
        <h1>{{ $title ?? 'Admin Dashboard' }}</h1>
      </div>
      <div class="topbar-right">
        <button type="button" id="dark-mode-toggle" title="Toggle dark mode" onclick="toggleGlobalDarkMode()" style="width: 36px; height: 36px; border-radius: 50%; background: var(--gray-50); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--gray-600); cursor: pointer; transition: all 0.2s; margin-right: 4px;" onmouseover="this.style.background='var(--gray-100)';" onmouseout="this.style.background='var(--gray-50)';">
          <i class="fas fa-moon" id="dark-mode-icon" style="font-size: 14px;"></i>
        </button>
        <div class="user-avatar-btn">
          <div class="avatar">
            @if (auth()->user()->avatar)
                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="w-full h-full rounded-full object-cover">
            @else
                {{ auth()->user()->initials() }}
            @endif
          </div>
          <span class="user-name">{{ auth()->user()->name }}</span>
          <form id="logout-form-topbar" method="POST" action="{{ route('logout') }}" style="display:none;">
              @csrf
          </form>
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();" style="color: var(--gray-600); margin-left: 4px; transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'" title="Log Out">
            <i class="fas fa-arrow-right-from-bracket"></i>
          </a>
        </div>
      </div>
    </header>

    <main class="page-content animate-enter">
       {{ $slot }}
    </main>
  </div>
</div>

@livewireScripts
@fluxScripts

<!-- Admin Sidebar & Main JS Scripts -->
<script src="{{ asset('admin-assets/js/sidebar.js') }}"></script>
<script src="{{ asset('admin-assets/js/main.js') }}"></script>

<script>
function toggleGlobalDarkMode() {
    var isDark = document.documentElement.classList.contains('dark') || document.documentElement.classList.contains('admin-dark');
    var enabled = !isDark;
    
    document.documentElement.classList.toggle('dark', enabled);
    document.documentElement.classList.toggle('admin-dark', enabled);
    localStorage.setItem('adminDarkMode', enabled ? 'true' : 'false');
    localStorage.setItem('theme', enabled ? 'dark' : 'light');
    
    if (document.body) {
        if (enabled) {
            document.body.style.background = '#0f172a';
            document.body.style.color = '#f1f5f9';
        } else {
            document.body.style.background = '';
            document.body.style.color = '';
        }
    }
    
    var icons = document.querySelectorAll('#dark-mode-icon');
    icons.forEach(function(icon) {
        if (enabled) {
            icon.className = 'fas fa-sun';
        } else {
            icon.className = 'fas fa-moon';
        }
    });

    var chk = document.getElementById('a-darkmode');
    if (chk) {
        chk.checked = enabled;
        var lbl = document.getElementById('darkModeLabel');
        if (lbl) lbl.textContent = enabled ? 'On' : 'Off';
    }
    
    if (window.Alpine && Alpine.store('ui')) {
        Alpine.store('ui').darkMode = enabled;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var isDark = localStorage.getItem('adminDarkMode') === 'true' || localStorage.getItem('theme') === 'dark';
    var icon = document.getElementById('dark-mode-icon');
    if (icon) {
        icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
    }
});
</script>

</body>
</html>
