<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - DENSO</title>
    <link href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --denso-red: #e3000f;
            --denso-dark: #1a1a2e;
            --sidebar-width: 260px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand span {
            color: var(--denso-red);
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px 0;
            margin: 0;
        }

        .sidebar-menu-label {
            padding: 8px 20px 4px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.4);
            font-weight: 600;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu li a:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
            border-left-color: var(--denso-red);
        }

        .sidebar-menu li a.active {
            background: rgba(227, 0, 15, 0.15);
            color: #fff;
            border-left-color: var(--denso-red);
            font-weight: 600;
        }

        .sidebar-menu li a .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        /* ===== MAIN CONTENT ===== */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* ===== TOP HEADER ===== */
        .admin-header {
            background: #fff;
            padding: 12px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-header .page-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .admin-header .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-header .user-name {
            font-size: 0.9rem;
            color: #555;
            font-weight: 500;
        }

        .btn-logout {
            background: var(--denso-red);
            color: #fff;
            border: none;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-logout:hover {
            background: #c4000d;
            color: #fff;
        }

        /* ===== CONTENT AREA ===== */
        .admin-content {
            padding: 30px;
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #fff;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }

        .stat-card .stat-label {
            font-size: 0.85rem;
            color: #888;
            font-weight: 500;
        }

        /* ===== TABLE STYLES ===== */
        .table-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .table-card .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-card .card-header h5 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .table-card .table {
            margin-bottom: 0;
        }

        .table-card .table th {
            background: #f8f9fa;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #666;
            font-weight: 600;
            border-bottom: 1px solid #eee;
            padding: 12px 16px;
        }

        .table-card .table td {
            padding: 12px 16px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #444;
        }

        /* ===== BUTTONS ===== */
        .btn-denso {
            background: var(--denso-red);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background 0.2s;
        }

        .btn-denso:hover {
            background: #c4000d;
            color: #fff;
        }

        /* ===== FORM STYLES ===== */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 30px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    {{-- ===== SIDEBAR ===== --}}
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <span>DENSO</span> Admin
        </a>

        <ul class="sidebar-menu">
            <li class="sidebar-menu-label">Menu Utama</li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">📊</span> Dashboard
                </a>
            </li>

            <li class="sidebar-menu-label">Kelola Data</li>
            <li>
                <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <span class="menu-icon">📰</span> Artikel / Berita
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <span class="menu-icon">📦</span> Produk / Layanan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <span class="menu-icon">🖼️</span> Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('admin.company-profile.edit') }}" class="{{ request()->routeIs('admin.company-profile.*') ? 'active' : '' }}">
                    <span class="menu-icon">🏢</span> Profil Perusahaan
                </a>
            </li>
        </ul>
    </aside>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="admin-main">
        {{-- Header --}}
        <header class="admin-header">
            <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            <div class="user-info">
                <span class="user-name">👤 {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </header>

        {{-- Content --}}
        <div class="admin-content">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
