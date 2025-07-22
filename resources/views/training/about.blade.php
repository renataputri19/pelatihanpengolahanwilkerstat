@extends('layouts.app')

@section('title', 'Tentang Kami - Pelatihan Pengolahan Wilkerstat SE2026')

@section('content')
<!-- Hero Section -->
<section class="about-hero-section mb-8">
    <div class="about-hero-card">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-icon">
                <i class="fas fa-users"></i>
            </div>
            <h1 class="hero-title">Tentang Kami</h1>
            <p class="hero-subtitle">
                Instruktur Pelatihan Petugas Pengolahan Wilkerstat SE2026
            </p>
        </div>
    </div>
</section>

<!-- Main About Content -->
<section class="about-main-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Mission Statement -->
                {{-- <div class="mission-card mb-6">
                    <div class="mission-content">
                        <div class="mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2 class="mission-title">Misi Kami</h2>
                        <p class="mission-text">
                            Memberikan pelatihan berkualitas tinggi dalam pengolahan data statistik dan kerangka geospasial untuk mendukung keberhasilan Sensus Ekonomi 2026. Kami berkomitmen untuk meningkatkan kapasitas dan kompetensi petugas statistik di seluruh Indonesia.
                        </p>
                    </div>
                </div> --}}

                <!-- Instructor Profile -->
                <div class="instructor-section">
                    {{-- <div class="section-header text-center mb-5">
                        <h2 class="section-title">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Instruktur Pelatihan
                        </h2>
                        <p class="section-subtitle">Tenaga ahli berpengalaman dalam bidang statistik dan geospasial</p>
                    </div> --}}

                    <div class="instructor-card">
                        <div class="instructor-background"></div>
                        <div class="instructor-content">
                            <div class="instructor-image-container">
                                <div class="image-frame">
                                    <img src="{{ asset('img/renata1.jpg') }}" alt="Renata - Instruktur Pelatihan" class="instructor-image">
                                </div>
                                <div class="image-decoration"></div>
                            </div>
                            
                            <div class="instructor-details">
                                <div class="name-section">
                                    <h3 class="instructor-name">Renata Putri Henessa, S.Tr.Stat</h3>
                                    <div class="name-underline"></div>
                                </div>
                                
                                <div class="position-section">
                                    <div class="position-badge">
                                        <i class="fas fa-graduation-cap"></i>
                                        <span>Instruktur Daerah</span>
                                    </div>
                                    {{-- <p class="position-title">Pelatihan Pengolahan Wilkerstat SE2026</p> --}}
                                </div>

                                <div class="organization-section">
                                    <div class="org-info">
                                        <div class="org-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="org-details">
                                            <span class="org-name">BPS Kota Batam</span>
                                            <span class="org-type">Badan Pusat Statistik</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="description-section">
                                    <h4 class="description-title">
                                        <i class="fas fa-user-check"></i>
                                        Profil Profesional
                                    </h4>
                                    <p class="description-text">
                                        Berpengalaman lebih dari 10 tahun dalam pengolahan data statistik dan sistem informasi geospasial. Memiliki keahlian khusus dalam pelatihan teknis untuk mendukung kegiatan Sensus Ekonomi 2026. Bertanggung jawab dalam memberikan pelatihan pengolahan kerangka geospasial dan muatan wilkerstat kepada petugas statistik di wilayah Kota Batam dan sekitarnya.
                                    </p>
                                    
                                    <div class="expertise-tags">
                                        <span class="tag"><i class="fas fa-chart-bar"></i> Analisis Statistik</span>
                                        <span class="tag"><i class="fas fa-map"></i> Sistem Geospasial</span>
                                        <span class="tag"><i class="fas fa-database"></i> Pengolahan Data</span>
                                        <span class="tag"><i class="fas fa-users"></i> Pelatihan Teknis</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="contact-section mt-6">
                    <div class="contact-card">
                        <div class="contact-header">
                            <h3 class="contact-title">
                                <i class="fas fa-envelope"></i>
                                Hubungi Kami
                            </h3>
                            <p class="contact-subtitle">Untuk informasi lebih lanjut tentang pelatihan</p>
                        </div>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Email</span>
                                    <span class="contact-value">renataputri19@gmail.com</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">WA</span>
                                    <span class="contact-value">0895-1901-5762</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Alamat</span>
                                    <span class="contact-value">Jl. Abulyatama Batam Center - Kota Batam</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Hero Section */
    .about-hero-section {
        margin-bottom: 3rem;
    }

    .about-hero-card {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: 1.5rem;
        padding: 4rem 2rem;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.3);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        opacity: 0.1;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        backdrop-filter: blur(10px);
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Mission Card */
    .mission-card {
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        border-radius: 1.5rem;
        padding: 3rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .mission-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--accent-color), #059669);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 1.75rem;
        color: white;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }

    .mission-title {
        font-size: 2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
    }

    .mission-text {
        font-size: 1.125rem;
        color: var(--text-secondary);
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Section Header */
    .section-header {
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 2.25rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .section-title i {
        color: var(--primary-color);
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Instructor Card */
    .instructor-card {
        background: white;
        border-radius: 2rem;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        position: relative;
        border: 1px solid var(--border-color);
    }

    .instructor-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        opacity: 0.05;
    }

    .instructor-content {
        padding: 3rem;
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 3rem;
        align-items: start;
        position: relative;
        z-index: 1;
    }

    .instructor-image-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-frame {
        position: relative;
        padding: 8px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(30, 64, 175, 0.3);
    }

    .instructor-image {
        width: 180px;
        height: 180px;
        border-radius: 1.25rem;
        object-fit: cover;
        border: 4px solid white;
        transition: all 0.3s ease;
    }

    .instructor-image:hover {
        transform: scale(1.05);
    }

    .image-decoration {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 40px;
        height: 40px;
        background: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    .image-decoration::before {
        content: '✓';
        font-weight: bold;
    }

    /* Instructor Details */
    .instructor-details {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .name-section {
        text-align: left;
    }

    .instructor-name {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .name-underline {
        width: 60px;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: 2px;
    }

    .position-section {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .position-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.875rem;
        width: fit-content;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
    }

    .position-title {
        font-size: 1.25rem;
        font-weight: 500;
        color: var(--text-primary);
        margin: 0;
    }

    .organization-section {
        background: var(--bg-light);
        padding: 1.5rem;
        border-radius: 1rem;
        border-left: 4px solid var(--accent-color);
    }

    .org-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .org-icon {
        width: 50px;
        height: 50px;
        background: var(--accent-color);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .org-details {
        display: flex;
        flex-direction: column;
    }

    .org-name {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .org-type {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .description-section {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid var(--border-color);
    }

    .description-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .description-title i {
        color: var(--primary-color);
    }

    .description-text {
        color: var(--text-secondary);
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .expertise-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--bg-light);
        color: var(--text-primary);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .tag:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
    }

    .tag i {
        font-size: 0.75rem;
    }

    /* Contact Section */
    .contact-card {
        background: linear-gradient(135deg, var(--bg-light) 0%, white 100%);
        border-radius: 1.5rem;
        padding: 2.5rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .contact-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .contact-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .contact-title i {
        color: var(--primary-color);
    }

    .contact-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
    }

    .contact-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-color);
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .contact-details {
        display: flex;
        flex-direction: column;
    }

    .contact-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .contact-value {
        font-size: 1rem;
        color: var(--text-primary);
        font-weight: 600;
        word-break: break-all;
        overflow-wrap: break-word;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .instructor-content {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 2rem;
        }

        .name-section {
            text-align: center;
        }

        .name-underline {
            margin: 0 auto;
        }

        .instructor-image {
            width: 150px;
            height: 150px;
        }

        .mission-card,
        .instructor-card,
        .contact-card {
            padding: 2rem;
        }

        .contact-info {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .contact-item {
            padding: 1rem;
        }

        .contact-value {
            font-size: 0.9rem;
        }

        .expertise-tags {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2rem;
        }

        .about-hero-card {
            padding: 3rem 1.5rem;
        }

        .instructor-name {
            font-size: 2rem;
        }

        .mission-card,
        .instructor-card,
        .contact-card {
            padding: 1.5rem;
        }

        .contact-item {
            padding: 0.75rem;
            gap: 0.75rem;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .contact-value {
            font-size: 0.85rem;
        }
    }
</style>
@endpush