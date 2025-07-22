@extends('layouts.app')

@section('title', $pendahuluanData['title'])

@section('head')
<link rel="stylesheet" href="{{ asset('css/training-modern.css') }}">
@endsection

@push('scripts')
<script>
// Enhanced Schedule Timeline JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Add intersection observer for timeline items
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    timelineItems.forEach(item => {
        observer.observe(item);
    });
    
    // Add hover effects for activity cards
    const activityCards = document.querySelectorAll('.activity-card');
    activityCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add smooth scrolling for timeline navigation
    const timelineContainer = document.querySelector('.schedule-timeline-container');
    if (timelineContainer) {
        timelineContainer.style.scrollBehavior = 'smooth';
    }
});
</script>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Modern Page Header -->
    <div class="modern-page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="modern-page-title">{{ $pendahuluanData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $pendahuluanData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $pendahuluanData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        {{-- Duration and difficulty badges commented out as not relevant for training materials
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>{{ $pendahuluanData['duration'] }}</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-signal"></i>
                                <span>{{ $pendahuluanData['difficulty'] }}</span>
                            </div>
                        </div>
                        --}}
                        <a href="{{ $pendahuluanData['pdf_link'] }}" class="modern-download-btn" target="_blank">
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
                        <span class="modern-breadcrumb-current">{{ $pendahuluanData['title'] }}</span>
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
                        @foreach($pendahuluanData['sections'] as $sectionKey => $section)
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
                                    @if($sectionKey === 'latar_belakang')
                                        <!-- Latar Belakang Content -->
                                        <div class="mb-6">
                                            @foreach($section['content'] as $content)
                                                <p class="mb-4">{{ $content }}</p>
                                            @endforeach
                                        </div>

                                        @if(isset($section['tahapan']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">Tahapan Kegiatan:</h4>
                                            <div class="modern-feature-grid">
                                                @foreach($section['tahapan'] as $tahapanKey => $tahapan)
                                                <div class="modern-feature-card">
                                                    <div class="modern-feature-icon">
                                                        <i class="{{ $tahapan['icon'] }}"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $tahapan['title'] }}</h5>
                                                    <ul class="modern-list">
                                                        @foreach($tahapan['items'] as $item)
                                                        <li class="modern-list-item">
                                                            <div class="modern-list-icon">
                                                                <i class="fas fa-check"></i>
                                                            </div>
                                                            <div class="modern-list-content">{!! $item !!}</div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                
                                    @elseif($sectionKey === 'maksud_tujuan')
                                        <!-- Maksud dan Tujuan Content -->
                                        <div class="mb-6">
                                            <ul class="modern-list">
                                                @foreach($section['content'] as $objective)
                                                <li class="modern-list-item">
                                                    <div class="modern-list-icon">
                                                        <i class="fas fa-bullseye"></i>
                                                    </div>
                                                    <div class="modern-list-content">{{ $objective }}</div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @elseif($sectionKey === 'instrumen_perangkat')
                                        <!-- Instrumen dan Perangkat Content -->
                                        <div class="modern-feature-grid">
                                            @if(isset($section['pengolahan_master']))
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="{{ $section['pengolahan_master']['icon'] }}"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $section['pengolahan_master']['title'] }}</h5>
                                                <ul class="modern-list">
                                                    @foreach($section['pengolahan_master']['items'] as $item)
                                                    <li class="modern-list-item">
                                                        <div class="modern-list-icon">
                                                            <i class="fas fa-cog"></i>
                                                        </div>
                                                        <div class="modern-list-content">{!! $item !!}</div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif

                                            @if(isset($section['pengolahan_peta']))
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="{{ $section['pengolahan_peta']['icon'] }}"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $section['pengolahan_peta']['title'] }}</h5>
                                                <ul class="modern-list">
                                                    @foreach($section['pengolahan_peta']['items'] as $item)
                                                    <li class="modern-list-item">
                                                        <div class="modern-list-icon">
                                                            <i class="fas fa-map"></i>
                                                        </div>
                                                        <div class="modern-list-content">{!! $item !!}</div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif

                                            @if(isset($section['software_aplikasi']))
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="{{ $section['software_aplikasi']['icon'] }}"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $section['software_aplikasi']['title'] }}</h5>
                                                <ul class="modern-list">
                                                    @foreach($section['software_aplikasi']['items'] as $item)
                                                    <li class="modern-list-item">
                                                        <div class="modern-list-icon">
                                                            <i class="fas fa-laptop-code"></i>
                                                        </div>
                                                        <div class="modern-list-content">{!! $item !!}</div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                
                                    @elseif($sectionKey === 'jadwal_kegiatan')
                                        <!-- Jadwal Kegiatan Content -->
                                        <div class="mb-6">
                                            <p class="mb-6 text-lg text-gray-700 leading-relaxed">{{ $section['content'] }}</p>
                                            
                                            @if(isset($section['activities']))
                                            <!-- Enhanced Schedule Timeline -->
                                            <div class="schedule-timeline-container">
                                                <div class="schedule-timeline">
                                                    @foreach($section['activities'] as $index => $activity)
                                                    <div class="timeline-item" data-activity-id="{{ $activity['id'] }}">
                                                        <div class="timeline-marker">
                                                            <div class="timeline-icon">
                                                                <i class="{{ $activity['icon'] }}"></i>
                                                            </div>
                                                            <div class="timeline-connector"></div>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <div class="activity-card">
                                                 <div class="activity-header">
                                                     <div class="activity-date">
                                                         <i class="fas fa-calendar-alt"></i>
                                                         {{ $activity['date'] }}
                                                     </div>
                                                 </div>
                                                 <h4 class="activity-title">{{ $activity['title'] }}</h4>
                                             </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            @if(isset($section['reference_link']))
                                            <div class="modern-alert modern-alert-info mt-8">
                                                <div class="modern-alert-icon">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <div class="modern-alert-content">
                                                    <p class="mb-3">Untuk informasi jadwal pelatihan yang lebih detail, silakan kunjungi:</p>
                                                    <a href="{{ $section['reference_link'] }}" class="modern-btn modern-btn-outline">
                                                        <i class="fas fa-external-link-alt"></i>
                                                        {{ $section['reference_text'] }}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                    @elseif($sectionKey === 'landasan_hukum')
                                        <!-- Landasan Hukum Content -->
                                        <div class="mb-6">
                                            <ul class="modern-list">
                                                @foreach($section['content'] as $hukum)
                                                <li class="modern-list-item">
                                                    <div class="modern-list-icon">
                                                        <i class="fas fa-balance-scale"></i>
                                                    </div>
                                                    <div class="modern-list-content">{{ $hukum }}</div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @else
                                        <!-- Default Content -->
                                        <div class="mb-6">
                                            @if(is_array($section['content']))
                                                @foreach($section['content'] as $content)
                                                    <p class="mb-4">{{ $content }}</p>
                                                @endforeach
                                            @else
                                                <p>{{ $section['content'] }}</p>
                                            @endif
                                        </div>
                                    @endif

                                    @if(isset($section['kesimpulan']))
                                    <div class="modern-alert modern-alert-success">
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
                            @foreach($pendahuluanData['sections'] as $sectionKey => $section)
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
                            <a href="{{ $pendahuluanData['pdf_link'] }}" class="modern-btn modern-btn-primary" target="_blank">
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
                                <div class="modern-progress-number">1</div>
                                <h5 class="modern-progress-title">Pendahuluan</h5>
                            </div>
                            <div class="modern-progress-content">
                                Memahami dasar-dasar pengolahan wilkerstat dan persiapan yang diperlukan.
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
@endsection