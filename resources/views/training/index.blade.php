@extends('layouts.app')

@section('title', 'Beranda - Pelatihan Pengolahan Wilkerstat SE2026')

@section('content')
<!-- Hero Section -->
<section class="hero-section mb-8">
    <div class="hero-card">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    Pelatihan Pengolahan Wilkerstat SE2026
                </h1>
                <p class="hero-subtitle">
                    Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat untuk mendukung Sensus Ekonomi 2026 dengan menggunakan Satuan Lingkungan Setempat (SLS) dan Non-SLS sebagai area pencacahan.
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">6</div>
                        <div class="stat-label">Modul Pelatihan</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Hari Pelatihan</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2025</div>
                        <div class="stat-label">Tahun Pelaksanaan</div>
                    </div>
                </div>
                <div class="hero-actions">
                    <a href="{{ route('schedule') }}" class="btn btn-jadwal">
                        <i class="fas fa-calendar-alt"></i>
                        Lihat Jadwal
                    </a>
                    <a href="{{ route('materials') }}" class="btn btn-secondary">
                        <i class="fas fa-download"></i>
                        Lihat Materi
                    </a>
                    <a href="{{ route('links') }}" class="btn btn-links">
                        <i class="fas fa-link"></i>
                        Semua Link
                    </a>
                    <a href="https://drive.google.com/drive/folders/1EwGnhINXAAzDgPJYMfA_9ZwkG-s9WGnD?usp=drive_link" target="_blank" class="btn btn-accent">
                        <i class="fas fa-external-link-alt"></i>
                        Akses Google Drive
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-illustration">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Background and Objectives Section -->
<section class="background-section mb-8">
    <div class="grid grid-cols-1 grid-cols-lg-2 gap-8">
        <!-- Latar Belakang -->
        <div class="background-card">
            <div class="card-header">
                <div class="card-icon background">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h3 class="card-title">Latar Belakang</h3>
            </div>
            <div class="card-content">
                <p class="card-text">
                    Badan Pusat Statistik (BPS) mengadakan <strong>Sensus Ekonomi 2026</strong> menggunakan kerangka induk keluarga/usaha ekonomi, dengan wilayah kerja statistik (Wilkerstat) level terkecil, yaitu <strong>Satuan Lingkungan Setempat (SLS)</strong> dan <strong>Non-SLS</strong>, sebagai area pencacahan.
                </p>
                <p class="card-text">
                    SLS, yang mencakup RT/RW/dusun dan sejenisnya, serta Non-SLS untuk daerah seperti perkebunan atau pemekaran baru, bersifat dinamis dengan perubahan seperti pemekaran atau penggabungan.
                </p>
                <p class="card-text">
                    Untuk mempersiapkan Sensus Ekonomi 2026, BPS melakukan <strong>Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat</strong> pada 2025, meliputi kegiatan lapangan (pemutakhiran peta, muatan, dan geotagging) dan pengolahan (master dan peta). Pedoman ini menjadi panduan untuk pengolahan tersebut.
                </p>
            </div>
        </div>

        <!-- Tujuan -->
        <div class="objectives-card">
            <div class="card-header">
                <div class="card-icon objectives">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="card-title">Tujuan</h3>
            </div>
            <div class="card-content">
                <div class="objectives-list">
                    <div class="objective-item">
                        <div class="objective-number">1</div>
                        <div class="objective-text">
                            Mendapatkan muatan wilkerstat yang seragam dan mutakhir.
                        </div>
                    </div>
                    <div class="objective-item">
                        <div class="objective-number">2</div>
                        <div class="objective-text">
                            Mendapatkan kerangka geospasial yang mutakhir.
                        </div>
                    </div>
                    <div class="objective-item">
                        <div class="objective-number">3</div>
                        <div class="objective-text">
                            Mendapatkan informasi mengenai wilayah konsentrasi ekonomi.
                        </div>
                    </div>
                </div>
                <!-- materials-access moved below as its own section -->
            </div>
        </div>

    </div>
</section>

<!-- Akses Materi Lengkap Section -->
<section class="materials-access-section mb-8">
    <div class="materials-access mt-4">
        <div class="access-header">
            <i class="fas fa-cloud-download-alt"></i>
            <span>Akses Materi Lengkap</span>
        </div>
        <p class="access-text">
            Semua materi pelatihan dapat diakses melalui Google Drive:
        </p>
        <a href="https://drive.google.com/drive/folders/1EwGnhINXAAzDgPJYMfA_9ZwkG-s9WGnD?usp=drive_link" target="_blank" class="access-link">
            <i class="fas fa-external-link-alt"></i>
            Buka Google Drive
        </a>
    </div>
</section>


<!-- Quick Navigation Cards -->
{{-- <section class="navigation-section mb-8">
    <h2 class="section-title text-center mb-6">
        <i class="fas fa-compass"></i>
        Navigasi Cepat
    </h2>
    <div class="grid grid-cols-1 grid-cols-md-2 grid-cols-lg-3">
        <a href="{{ route('schedule') }}" class="nav-card">
            <div class="nav-card-icon schedule">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="nav-card-title">Jadwal Pelatihan</h3>
            <p class="nav-card-description">
                Lihat jadwal lengkap pelatihan dengan filter berdasarkan tanggal, sesi, dan materi.
            </p>
            <div class="nav-card-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>

        <a href="{{ route('materials') }}" class="nav-card">
            <div class="nav-card-icon materials">
                <i class="fas fa-book-open"></i>
            </div>
            <h3 class="nav-card-title">Materi Pelatihan</h3>
            <p class="nav-card-description">
                Akses semua materi pelatihan yang terorganisir berdasarkan modul pembelajaran.
            </p>
            <div class="nav-card-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>
        </a>



        <div class="nav-card info-card">
            <div class="nav-card-icon info">
                <i class="fas fa-info-circle"></i>
            </div>
            <h3 class="nav-card-title">Informasi Penting</h3>
            <p class="nav-card-description">
                Semua materi disediakan melalui tautan eksternal. Pastikan koneksi internet stabil.
            </p>
        </div>
    </div>
</section> --}}

<!-- Announcements Section -->
{{-- <section class="announcements-section">
    <h2 class="section-title mb-6">
        <i class="fas fa-bullhorn"></i>
        Pengumuman & Berita
    </h2>
    <div class="grid grid-cols-1 grid-cols-md-2">
        <div class="announcement-card important">
            <div class="announcement-header">
                <div class="announcement-badge important">
                    <i class="fas fa-exclamation-triangle"></i>
                    Penting
                </div>
                <div class="announcement-date">15 Januari 2024</div>
            </div>
            <h3 class="announcement-title">
                Perubahan Jadwal Pelatihan Modul 3
            </h3>
            <p class="announcement-content">
                Jadwal pelatihan Modul 3: Analisis Statistik dipindahkan dari tanggal 17 Januari menjadi 18 Januari 2024 pukul 09:00-12:00 WIB. Mohon perhatikan perubahan ini.
            </p>
        </div>

        <div class="announcement-card info">
            <div class="announcement-header">
                <div class="announcement-badge info">
                    <i class="fas fa-info-circle"></i>
                    Info
                </div>
                <div class="announcement-date">12 Januari 2024</div>
            </div>
            <h3 class="announcement-title">
                Materi Tambahan Tersedia
            </h3>
            <p class="announcement-content">
                Materi tambahan untuk Modul 2: Teknik Sampling telah tersedia di halaman Materi Pelatihan. Silakan unduh untuk melengkapi pemahaman Anda.
            </p>
        </div>

        <div class="announcement-card success">
            <div class="announcement-header">
                <div class="announcement-badge success">
                    <i class="fas fa-check-circle"></i>
                    Update
                </div>
                <div class="announcement-date">10 Januari 2024</div>
            </div>
            <h3 class="announcement-title">
                Sistem Pelatihan Online Aktif
            </h3>
            <p class="announcement-content">
                Sistem pelatihan online telah aktif dan siap digunakan. Semua peserta dapat mengakses materi dan jadwal melalui platform ini.
            </p>
        </div>

        <div class="announcement-card warning">
            <div class="announcement-header">
                <div class="announcement-badge warning">
                    <i class="fas fa-clock"></i>
                    Reminder
                </div>
                <div class="announcement-date">8 Januari 2024</div>
            </div>
            <h3 class="announcement-title">
                Persiapan Pelatihan
            </h3>
            <p class="announcement-content">
                Pastikan Anda telah mempersiapkan laptop/komputer dengan software yang diperlukan sebelum mengikuti sesi pelatihan praktik.
            </p>
        </div>
    </div>
</section> --}}
@endsection

@push('styles')
<style>
    /* Hero Section Styles */
    .hero-section {
        margin-bottom: 3rem;
    }

    .hero-card {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: 1rem;
        padding: 3rem 2rem;
        color: white;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        position: relative;
    }

    .hero-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        opacity: 0.1;
        pointer-events: none;
    }

    .hero-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.125rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .hero-stats {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--accent-color);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        opacity: 0.8;
        margin-top: 0.25rem;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-illustration {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        margin: 0 auto;
        backdrop-filter: blur(10px);
    }

    .hero-illustration i {
        font-size: 4rem;
        color: var(--accent-color);
    }

    /* Background and Objectives Section */
    .background-section {
        margin-bottom: 3rem;
    }

    .background-card,
    .objectives-card {
        background: var(--bg-white);
        border-radius: 1rem;
        padding: 2rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        height: 100%;
    }

    .background-card:hover,
    .objectives-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border-color);
    }

    .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
    }

    .card-icon.background {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .card-icon.objectives {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }

    .card-content {
        color: var(--text-secondary);
    }

    .card-text {
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .objectives-list {
        margin-bottom: 1.5rem;
    }

    .objective-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 0.5rem;
        border-left: 4px solid var(--primary-color);
    }

    .objective-item:last-child {
        margin-bottom: 0;
    }

    .objective-number {
        width: 30px;
        height: 30px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
        flex-shrink: 0;
    }

    .objective-text {
        line-height: 1.6;
        color: var(--text-primary);
        font-weight: 500;
    }

    .materials-access {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border: 1px solid #0ea5e9;
        border-radius: 0.75rem;
        padding: 1.5rem;
    }

    .access-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.75rem;
    }

    .access-text {
        color: var(--text-secondary);
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .access-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--primary-color);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .access-link:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
    }


    /* Custom Jadwal Button: Orange Gradient */
    .btn-jadwal {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        color: #fff;
        border: none;
        box-shadow: var(--shadow-md);
    }
    .btn-jadwal:hover {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #fff;
        transform: translateY(-1px);
        box-shadow: var(--shadow-lg);
    }

    .btn-secondary {
        background: var(--bg-white);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
    }

    .btn-secondary:hover {
        background: #fff;
        color: var(--text-primary);
        border-color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .btn-accent {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .btn-accent:hover {
        background: linear-gradient(135deg, #059669, #047857);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .btn-links {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: white;
        border: none;
        box-shadow: var(--shadow-md);
    }

    .btn-links:hover {
        background: linear-gradient(135deg, #7c3aed, #6d28d9);
        color: white;
        transform: translateY(-1px);
        box-shadow: var(--shadow-lg);
    }

    /* Section Title */
    .section-title {
        font-size: 1.875rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: var(--primary-color);
    }

    /* Navigation Cards */
    .nav-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        padding: 2rem;
        text-decoration: none;
        color: inherit;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: block;
    }

    .nav-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-color);
    }

    .nav-card.info-card {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-color: #0ea5e9;
    }

    .nav-card-icon {
        width: 60px;
        height: 60px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: white;
    }

    .nav-card-icon.schedule { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .nav-card-icon.materials { background: linear-gradient(135deg, #10b981, #059669); }
    .nav-card-icon.guidelines { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .nav-card-icon.resources { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .nav-card-icon.contact { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .nav-card-icon.info { background: linear-gradient(135deg, #0ea5e9, #0284c7); }

    .nav-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--text-primary);
    }

    .nav-card-description {
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .nav-card-arrow {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        color: var(--text-secondary);
        transition: all 0.3s ease;
    }

    .nav-card:hover .nav-card-arrow {
        color: var(--primary-color);
        transform: translateX(4px);
    }

    /* Announcements */
    .announcement-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        padding: 1.5rem;
        border-left: 4px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }

    .announcement-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .announcement-card.important { border-left-color: #ef4444; }
    .announcement-card.info { border-left-color: #3b82f6; }
    .announcement-card.success { border-left-color: #10b981; }
    .announcement-card.warning { border-left-color: #f59e0b; }

    .announcement-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .announcement-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        color: white;
    }

    .announcement-badge.important { background-color: #ef4444; }
    .announcement-badge.info { background-color: #3b82f6; }
    .announcement-badge.success { background-color: #10b981; }
    .announcement-badge.warning { background-color: #f59e0b; }

    .announcement-date {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .announcement-title {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--text-primary);
    }

    .announcement-content {
        color: var(--text-secondary);
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-stats {
            justify-content: center;
        }

        .grid-cols-md-2 {
            grid-template-columns: 1fr;
        }

        .grid-cols-lg-3 {
            grid-template-columns: 1fr;
        }

        .grid-cols-lg-2 {
            grid-template-columns: 1fr;
        }

        .hero-card {
            padding: 2rem 1.5rem;
        }

        .background-card,
        .objectives-card {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 480px) {
        .hero-stats {
            flex-direction: column;
            gap: 1rem;
        }

        .hero-actions {
            flex-direction: column;
        }

        .nav-card {
            padding: 1.5rem;
        }

    }
</style>
@endpush