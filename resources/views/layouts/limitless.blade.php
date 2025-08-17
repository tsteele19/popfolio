<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Popfolio')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/bootstrap_limitless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/layout.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/colors.min.css') }}">

    {{-- Phosphor Icons --}}
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    {{-- Custom Dark Mode CSS --}}
    <style>
        :root {
            /* Light theme variables (default) */
            --bg-body: #f5f5f5;
            --bg-card: #ffffff;
            --bg-navbar: #263238;
            --bg-sidebar: #37474f;
            --text-primary: #333333;
            --text-secondary: #6c757d;
            --text-navbar: #ffffff;
            --text-sidebar: #ffffff;
            --border-color: #e0e0e0;
            --shadow: rgba(0, 0, 0, 0.1);
            --nav-hover: rgba(255, 255, 255, 0.1);
        }

        [data-theme="dark"] {
            /* Dark theme variables */
            --bg-body: #121212;
            --bg-card: #1e1e1e;
            --bg-navbar: #1a1a1a;
            --bg-sidebar: #242424;
            --text-primary: #ffffff;
            --text-secondary: #b3b3b3;
            --text-navbar: #ffffff;
            --text-sidebar: #e0e0e0;
            --border-color: #404040;
            --shadow: rgba(0, 0, 0, 0.3);
            --nav-hover: rgba(255, 255, 255, 0.15);
        }

        /* Apply dark mode styles */
        body {
            background-color: var(--bg-body) !important;
            color: var(--text-primary) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Navbar dark mode */
        .navbar-dark {
            background-color: var(--bg-navbar) !important;
        }

        .navbar-brand a {
            color: var(--text-navbar) !important;
        }

        .navbar-nav-link {
            color: var(--text-navbar) !important;
        }

        /* Sidebar dark mode */
        .sidebar-dark {
            background-color: var(--bg-sidebar) !important;
        }

        .sidebar-dark .nav-link {
            color: var(--text-sidebar) !important;
        }

        .sidebar-dark .nav-link:hover {
            background-color: var(--nav-hover) !important;
            color: var(--text-sidebar) !important;
        }

        .sidebar-dark .nav-item-submenu > .nav-link.active {
            background-color: var(--nav-hover) !important;
        }

        .sidebar-section-body h5 {
            color: var(--text-sidebar) !important;
        }

        /* Page content dark mode */
        .page-content {
            background-color: var(--bg-body) !important;
        }

        .content-wrapper {
            background-color: var(--bg-body) !important;
        }

        /* Card components dark mode */
        .card {
            background-color: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }

        .card-header {
            background-color: var(--bg-card) !important;
            border-bottom-color: var(--border-color) !important;
        }

        /* Form controls dark mode */
        [data-theme="dark"] .form-control,
        [data-theme="dark"] .form-select {
            background-color: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .form-control:focus,
        [data-theme="dark"] .form-select:focus {
            background-color: var(--bg-card) !important;
            border-color: #007bff !important;
            color: var(--text-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
        }

        /* Table dark mode */
        [data-theme="dark"] .table {
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .table th,
        [data-theme="dark"] .table td {
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Buttons dark mode adjustments */
        [data-theme="dark"] .btn-light {
            background-color: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .btn-outline-light {
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        /* Theme toggle button */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            background: var(--bg-card);
            color: var(--text-primary);
            box-shadow: 0 2px 10px var(--shadow);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px var(--shadow);
        }

        /* Dropdown menus dark mode */
        [data-theme="dark"] .dropdown-menu {
            background-color: var(--bg-card) !important;
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .dropdown-item {
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .dropdown-item:hover,
        [data-theme="dark"] .dropdown-item:focus {
            background-color: var(--nav-hover) !important;
            color: var(--text-primary) !important;
        }

        /* Modal dark mode */
        [data-theme="dark"] .modal-content {
            background-color: var(--bg-card) !important;
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .modal-header {
            border-bottom-color: var(--border-color) !important;
        }

        [data-theme="dark"] .modal-footer {
            border-top-color: var(--border-color) !important;
        }

        /* Breadcrumb dark mode */
        [data-theme="dark"] .breadcrumb {
            background-color: var(--bg-card) !important;
        }

        [data-theme="dark"] .breadcrumb-item a {
            color: var(--text-secondary) !important;
        }

        .table {
            color: var(--text-primary) !important;
        }

        .table th,
        .table td {
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Ensure card text is visible */
        .card {
            color: var(--text-primary) !important;
        }

        /* Hide broken accordion arrows because i'm tired of messing with them */
        .nav-item-submenu > .nav-link:after,
        .nav-item-submenu > .nav-link:before {
            display: none !important;
        }
    </style>
</head>

<body>
    {{-- Theme Toggle Button --}}
    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
        <span id="themeIcon">🌙</span>
    </button>

    {{-- Main navbar --}}
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="d-inline-block">Popfolio</a>
        </div>
    </div>
    {{-- /main navbar --}}

    {{-- Page content --}}
    <div class="page-content">

        {{-- Main sidebar --}}
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            {{-- Expand button --}}
            <button type="button" class="btn btn-sidebar-expand sidebar-control sidebar-main-toggle h-100">
                <i class="ph ph-caret-right"></i>
            </button>
            {{-- /expand button --}}

            {{-- Sidebar content --}}
            <div class="sidebar-content">

                {{-- Sidebar header --}}
                <div class="sidebar-section">
                    <div class="sidebar-section-body d-flex justify-content-center">
                        <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                        <div>
                            <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-toggle d-none d-lg-inline-flex">
                                <i class="ph ph-arrows-left-right"></i>
                            </button>

                            <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                                <i class="ph ph-x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- /sidebar header --}}

                {{-- Main navigation --}}
                <div class="sidebar-section">
                    <div class="sidebar-section-body">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">
                            {{-- Pops! section --}}
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph ph-treasure-chest"></i>
                                    <span>Popfolio!</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Popfolio">
                                    {{-- View All --}}
                                    <li class="nav-item">
                                        <a href="{{ route('pops.index') }}" class="nav-link text-white">
                                            <i class="ph ph-list mr-2"></i>
                                            View Collection
                                        </a>
                                    </li>

                                    {{-- Add new --}}
                                    <li class="nav-item">
                                        <a href="{{ route('pops.create') }}" class="nav-link text-white">
                                            <i class="ph ph-plus mr-2"></i>
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Categories section --}}
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph ph-folder-open"></i>
                                    <span>Categories</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Categories">
                                    {{-- View All --}}
                                    <li class="nav-item">
                                        <a href="{{ route('categories.index') }}" class="nav-link text-white">
                                            <i class="ph ph-list mr-2"></i>
                                            View All
                                        </a>
                                    </li>

                                    {{-- Add new --}}
                                    <li class="nav-item">
                                        <a href="{{ route('categories.create') }}" class="nav-link text-white">
                                            <i class="ph ph-plus mr-2"></i>
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Exclusives Section --}}
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph ph-star"></i>
                                    <span>Exclusives</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Exclusives">
                                    {{-- View All --}}
                                    <li class="nav-item">
                                        <a href="{{ route('exclusives.index') }}" class="nav-link text-white">
                                            <i class="ph ph-list mr-2"></i>
                                            View All
                                        </a>
                                    </li>

                                    {{-- Add new --}}
                                    <li class="nav-item">
                                        <a href="{{ route('exclusives.create') }}" class="nav-link text-white">
                                            <i class="ph ph-plus mr-2"></i>
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Variants --}}
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph ph-palette"></i>
                                    <span>Variants</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Variants">
                                    {{-- View All --}}
                                    <li class="nav-item">
                                        <a href="{{ route('variants.index') }}" class="nav-link text-white">
                                            <i class="ph ph-list mr-2"></i>
                                            View All
                                        </a>
                                    </li>

                                    {{-- Add new --}}
                                    <li class="nav-item">
                                        <a href="{{ route('variants.create') }}" class="nav-link text-white">
                                            <i class="ph ph-plus mr-2"></i>
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Sales --}}
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="ph ph-palette"></i>
                                    <span>Sales</span>
                                </a>
                                <ul class="nav nav-group-sub" data-submenu-title="Variants">
                                    {{-- View All --}}
                                    <li class="nav-item">
                                        <a href="{{ route('sales.index') }}" class="nav-link text-white">
                                            <i class="ph ph-list mr-2"></i>
                                            View All
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- /main navigation --}}

            </div>
            {{-- /sidebar content --}}

        </div>
        {{-- /main sidebar --}}

        {{-- Main content --}}
        <div class="content-wrapper">
            <div class="page-content">
                @yield('page_content')
            </div>
        </div>
        {{-- /main content --}}

    </div>
    {{-- /page content --}}

    {{-- JS --}}
    <script src="{{ asset('limitless/assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless/assets/js/app.js') }}"></script>

    {{-- Dark Mode Toggle Script --}}
    <script>
        class PopfolioDarkMode {
            constructor() {
                this.theme = localStorage.getItem('popfolio-theme') || 'light';
                this.toggleBtn = document.getElementById('themeToggle');
                this.themeIcon = document.getElementById('themeIcon');

                this.init();
            }

            init() {
                // Apply saved theme on page load
                this.applyTheme(this.theme);

                // Add click listener to toggle button
                if (this.toggleBtn) {
                    this.toggleBtn.addEventListener('click', () => this.toggleTheme());
                }

                // Listen for system theme changes
                const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
                mediaQuery.addEventListener('change', (e) => {
                    if (!localStorage.getItem('popfolio-theme')) {
                        this.applyTheme(e.matches ? 'dark' : 'light');
                    }
                });

                // Apply system preference if no saved theme
                if (!localStorage.getItem('popfolio-theme')) {
                    this.applyTheme(mediaQuery.matches ? 'dark' : 'light');
                }
            }

            toggleTheme() {
                this.theme = this.theme === 'light' ? 'dark' : 'light';
                this.applyTheme(this.theme);
                localStorage.setItem('popfolio-theme', this.theme);
            }

            applyTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);

                if (this.themeIcon) {
                    this.themeIcon.textContent = theme === 'light' ? '🌙' : '☀️';
                }

                this.theme = theme;

                // Dispatch event for other components that might need to know about theme changes
                window.dispatchEvent(new CustomEvent('themeChanged', {
                    detail: { theme: theme }
                }));
            }

            getCurrentTheme() {
                return this.theme;
            }
        }

        // Initialize dark mode when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            window.popfolioDarkMode = new PopfolioDarkMode();
        });
    </script>

    @yield('scripts')

</body>
</html>
