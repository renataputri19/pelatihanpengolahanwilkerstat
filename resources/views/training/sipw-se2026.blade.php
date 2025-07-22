@extends('layouts.app')

@section('title', $sipwData['title'])

@section('head')
<link rel="stylesheet" href="{{ asset('css/training-modern.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <!-- Modern Page Header -->
    <div class="modern-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="modern-page-title">{{ $sipwData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $sipwData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $sipwData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        {{-- Duration and difficulty badges commented out as not relevant for training materials
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>{{ $sipwData['duration'] }}</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-signal"></i>
                                <span>{{ $sipwData['difficulty'] }}</span>
                            </div>
                        </div>
                        --}}
                        <a href="{{ $sipwData['pdf_link'] }}" class="modern-download-btn" target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Breadcrumb -->
    <div class="modern-breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="modern-breadcrumb">
                    <li class="modern-breadcrumb-item">
                        <a href="{{ route('home') }}" class="modern-breadcrumb-link">Beranda</a>
                    </li>
                    <li class="modern-breadcrumb-item">
                        <a href="{{ route('materials') }}" class="modern-breadcrumb-link">Materi</a>
                    </li>
                    <li class="modern-breadcrumb-item">
                        <span class="modern-breadcrumb-current">{{ $sipwData['title'] }}</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Modern Content Layout -->
    <div class="modern-content-layout">
        <div class="container">
            <div class="modern-content-grid">
                <!-- Main Content -->
                <div class="main-content">
                    <div class="modern-accordion">
                        @foreach($sipwData['sections'] as $sectionKey => $section)
                        <div class="modern-accordion-item" id="{{ $sectionKey }}">
                            <button class="modern-accordion-header">
                                <div class="modern-accordion-title">
                                    <i class="modern-accordion-icon {{ $section['icon'] }}"></i>
                                    {{ $section['title'] }}
                                </div>
                                <i class="modern-accordion-chevron fas fa-chevron-down"></i>
                            </button>

                            <div class="modern-accordion-content">
                                <div class="modern-accordion-body">
                                    @if($sectionKey === 'penjelasan_umum')
                                        <div class="modern-feature-grid">
                                            @foreach($section['content'] as $contentKey => $contentItem)
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $contentItem['title'] }}</h5>
                                                <ul class="modern-list">
                                                    @foreach($contentItem['items'] as $item)
                                                    <li class="modern-list-item">
                                                        <div class="modern-list-icon">
                                                            <i class="fas fa-check"></i>
                                                        </div>
                                                        <div class="modern-list-content">{{ $item }}</div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    @elseif($sectionKey === 'tata_cara_pengoperasian')
                                        <div class="row g-4">
                                            @foreach($section['content'] as $contentKey => $contentItem)
                                            <div class="col-lg-6">
                                                <div class="modern-feature-card h-100">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-cogs"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $contentItem['title'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        @if(isset($contentItem['description']))
                                                            <p class="mb-3">{{ $contentItem['description'] }}</p>
                                                        @endif
                                                        
                                                        @if(isset($contentItem['steps']) || isset($contentItem['features']) || isset($contentItem['roles']) || isset($contentItem['process']))
                                                            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $sectionKey }}-{{ $contentKey }}" aria-expanded="false">
                                                                <i class="fas fa-chevron-down"></i> Lihat Detail
                                                            </button>
                                                            
                                                            <div class="collapse mt-3" id="collapse-{{ $sectionKey }}-{{ $contentKey }}">
                                                                <div class="collapse-content">
                                                                    @if(isset($contentItem['steps']))
                                                                        <div class="mb-3">
                                                                            <h6 class="fw-semibold mb-2">Langkah-langkah:</h6>
                                                                            <ol class="list-group list-group-numbered">
                                                                                @foreach($contentItem['steps'] as $step)
                                                                                <li class="list-group-item border-0 px-0 py-1">{{ $step }}</li>
                                                                                @endforeach
                                                                            </ol>
                                                                        </div>
                                                                    @endif

                                                                    @if(isset($contentItem['features']))
                                                                        <div class="mb-3">
                                                                            <h6 class="fw-semibold mb-2">Fitur:</h6>
                                                                            <ul class="modern-list">
                                                                                @foreach($contentItem['features'] as $feature)
                                                                                <li class="modern-list-item">
                                                                                    <div class="modern-list-icon">
                                                                                        <i class="fas fa-star"></i>
                                                                                    </div>
                                                                                    <div class="modern-list-content">{{ $feature }}</div>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif

                                                                    @if(isset($contentItem['roles']))
                                                                        <div class="mb-3">
                                                                            <h6 class="fw-semibold mb-2">Role Pengguna:</h6>
                                                                            <ul class="modern-list">
                                                                                @foreach($contentItem['roles'] as $role)
                                                                                <li class="modern-list-item">
                                                                                    <div class="modern-list-icon">
                                                                                        <i class="fas fa-user-tag"></i>
                                                                                    </div>
                                                                                    <div class="modern-list-content">{{ $role }}</div>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif

                                                                    @if(isset($contentItem['process']))
                                                                        <div class="mb-3">
                                                                            <h6 class="fw-semibold mb-2">Proses:</h6>
                                                                            <ul class="modern-list">
                                                                                @foreach($contentItem['process'] as $process)
                                                                                <li class="modern-list-item">
                                                                                    <div class="modern-list-icon">
                                                                                        <i class="fas fa-arrow-right"></i>
                                                                                    </div>
                                                                                    <div class="modern-list-content">{{ $process }}</div>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @elseif($sectionKey === 'tata_cara_entri')
                                        <div class="row g-4">
                                            @foreach($section['content'] as $contentKey => $contentItem)
                                            <div class="col-lg-6">
                                                <div class="modern-feature-card h-100">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-keyboard"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $contentItem['title'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        <p class="mb-3">{{ $contentItem['description'] }}</p>

                                                        @if(isset($contentItem['steps']))
                                                            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $sectionKey }}-{{ $contentKey }}" aria-expanded="false">
                                                                <i class="fas fa-chevron-down"></i> Lihat Detail
                                                            </button>
                                                            
                                                            <div class="collapse mt-3" id="collapse-{{ $sectionKey }}-{{ $contentKey }}">
                                                                <div class="collapse-content">
                                                                    <div class="mb-3">
                                                                        <h6 class="fw-semibold mb-2">Langkah-langkah:</h6>
                                                                        <ol class="list-group list-group-numbered">
                                                                            @foreach($contentItem['steps'] as $step)
                                                                            <li class="list-group-item border-0 px-0 py-1">{{ $step }}</li>
                                                                            @endforeach
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @elseif($sectionKey === 'catatan_tambahan')
                                        <div class="mb-6">
                                            @foreach($section['content'] as $contentKey => $contentItem)
                                            <div class="modern-alert modern-alert-warning mb-4">
                                                <div class="modern-alert-icon">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="modern-alert-content">
                                                    <h6 class="font-semibold mb-2">{{ $contentItem['title'] }}</h6>
                                                    <p class="mb-0">{{ $contentItem['description'] }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(isset($section['kesimpulan']))
                                    <div class="modern-alert modern-alert-success mt-4">
                                        <div class="modern-alert-icon">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                        <div class="modern-alert-content">
                                            <h6 class="font-semibold mb-2">Kesimpulan</h6>
                                            <p class="mb-0">{{ $section['kesimpulan'] }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Modern Sidebar -->
                <div class="modern-sidebar">
                    <!-- Table of Contents -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Daftar Isi</h4>
                        <ul class="modern-toc">
                            @foreach($sipwData['sections'] as $sectionKey => $section)
                            <li class="modern-toc-item">
                                <a href="#{{ $sectionKey }}" class="modern-toc-link">
                                    <i class="modern-toc-icon {{ $section['icon'] }}"></i>
                                    {{ $section['title'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Quick Actions -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Aksi Cepat</h4>
                        <div class="modern-action-buttons">
                            <a href="{{ $sipwData['pdf_link'] }}" class="modern-btn modern-btn-primary" target="_blank">
                                <i class="fas fa-download"></i>
                                Download PDF
                            </a>
                            <a href="{{ route('materials') }}" class="modern-btn modern-btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Materi
                            </a>
                            <a href="{{ route('schedule') }}" class="modern-btn modern-btn-outline">
                                <i class="fas fa-calendar"></i>
                                Lihat Jadwal
                            </a>
                        </div>
                    </div>

                    <!-- Progress Card -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Progress Pembelajaran</h4>
                        <div class="modern-progress-card">
                            <div class="modern-progress-header">
                                <div class="modern-progress-number">4</div>
                                <h5 class="modern-progress-title">SIPW SE2026</h5>
                            </div>
                            <div class="modern-progress-content">
                                Memahami sistem pemutakhiran wilkerstat dan cara pengoperasiannya.
                            </div>
                        </div>
                    </div>

                    <!-- System Features -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Fitur Sistem</h4>
                        <div class="system-features">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-database"></i>
                                </div>
                                <span>Data Management</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <span>Auto Sync</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <span>Security</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <span>Analytics</span>
                            </div>
                        </div>
                    </div>
                </div>
                                    <span>Kembali ke Materi</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/training-modern.js') }}"></script>
<script>
// Additional system-specific styles and functionality
document.addEventListener('DOMContentLoaded', function() {
    const systemStyles = `
        .system-features {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3);
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            transition: all var(--transition-fast);
        }
        .feature-item:hover {
            background: var(--primary-50);
            color: var(--primary-700);
        }
        .feature-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: var(--primary-100);
            color: var(--primary-600);
            border-radius: var(--radius-lg);
            font-size: var(--text-sm);
        }
        .feature-item:hover .feature-icon {
            background: var(--primary-200);
            color: var(--primary-700);
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = systemStyles;
    document.head.appendChild(styleSheet);
});
</script>
@endsection

@push('styles')
<style>
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .page-subtitle {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }

    .page-description {
        font-size: 1rem;
        opacity: 0.8;
        line-height: 1.6;
    }

    .material-info {
        background: rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        border-radius: 12px;
        backdrop-filter: blur(10px);
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }

    .info-item i {
        margin-right: 0.5rem;
        width: 20px;
    }

    .breadcrumb-section {
        background: #f8f9fa;
        padding: 1rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .content-sections {
        padding: 3rem 0;
    }

    .content-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
    }

    .section-header {
        border-bottom: 2px solid #667eea;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }

    .section-title {
        color: #2d3748;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
    }

    .section-title i {
        color: #667eea;
        margin-right: 0.75rem;
    }

    .subsection {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #667eea;
    }

    .subsection-title {
        color: #2d3748;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .subsection-description {
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .content-list, .steps-list, .features-list, .roles-list, .process-list {
        margin: 1rem 0;
        padding-left: 1.5rem;
    }

    .content-list li, .features-list li, .roles-list li, .process-list li {
        margin-bottom: 0.5rem;
        color: #4a5568;
        line-height: 1.6;
    }

    .steps-list {
        counter-reset: step-counter;
    }

    .steps-list li {
        counter-increment: step-counter;
        margin-bottom: 1rem;
        padding: 0.75rem;
        background: white;
        border-radius: 6px;
        border-left: 3px solid #667eea;
        position: relative;
    }

    .steps-list li::before {
        content: counter(step-counter);
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        background: #667eea;
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .section-conclusion {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 8px;
        margin-top: 2rem;
    }

    .conclusion-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .conclusion-header i {
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    .conclusion-header h4 {
        margin: 0;
        font-weight: 600;
    }

    .conclusion-text {
        line-height: 1.6;
        margin: 0;
        opacity: 0.95;
    }

    .sidebar {
        position: sticky;
        top: 2rem;
    }

    .toc-card, .quick-actions-card, .related-materials-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
    }

    .toc-title, .card-title {
        color: #2d3748;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .toc-title i, .card-title i {
        margin-right: 0.5rem;
        color: #667eea;
    }

    .toc-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .toc-link {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        color: #4a5568;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
        margin-bottom: 0.25rem;
    }

    .toc-link:hover {
        background: #667eea;
        color: white;
        transform: translateX(5px);
    }

    .toc-link i {
        margin-right: 0.75rem;
        width: 16px;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        color: #4a5568;
        text-decoration: none;
        transition: all 0.2s;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .action-btn:hover {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }

    .action-btn i {
        margin-right: 0.5rem;
    }

    .related-list {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .related-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        color: #4a5568;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
        border: 1px solid #e9ecef;
    }

    .related-item:hover {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }

    .related-item i {
        margin-right: 0.75rem;
        width: 16px;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .content-section {
            padding: 1.5rem;
        }
        
        .sidebar {
            position: static;
            margin-top: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function scrollToSection(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function printPage() {
        window.print();
    }

    function shareContent() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $sipwData["title"] }}',
                text: '{{ $sipwData["description"] }}',
                url: window.location.href
            });
        } else {
            // Fallback: copy URL to clipboard
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link telah disalin ke clipboard!');
            });
        }
    }

    // Highlight active section in TOC
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('.content-section');
        const tocLinks = document.querySelectorAll('.toc-link');
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });
        
        tocLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });
</script>
@endpush