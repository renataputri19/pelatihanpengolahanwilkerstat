@extends('layouts.app')

@section('title', $organisasiData['title'])

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
                    <h1 class="modern-page-title">{{ $organisasiData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $organisasiData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $organisasiData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        {{-- Duration and difficulty badges commented out as not relevant for training materials
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>{{ $organisasiData['duration'] }}</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-signal"></i>
                                <span>{{ $organisasiData['difficulty'] }}</span>
                            </div>
                        </div>
                        --}}
                        <a href="{{ $organisasiData['pdf_link'] }}" class="modern-download-btn" target="_blank">
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
                        <span class="modern-breadcrumb-current">{{ $organisasiData['title'] }}</span>
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
                        @foreach($organisasiData['sections'] as $sectionKey => $section)
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
                                    @if($sectionKey === 'catatan_tambahan')
                                        <!-- Catatan Tambahan Content -->
                                        <div class="mb-6">
                                            @foreach($section['content'] as $note)
                                            <div class="modern-alert modern-alert-warning mb-4">
                                                <div class="modern-alert-icon">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="modern-alert-content">{!! $note !!}</div>
                                            </div>
                                            @endforeach

                                            @if(isset($section['reference_link']))
                                            <div class="modern-alert modern-alert-info">
                                                <div class="modern-alert-icon">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <div class="modern-alert-content">
                                                    <p class="mb-3">Untuk informasi lebih detail, silakan kunjungi:</p>
                                                    <a href="{{ $section['reference_link'] }}" class="modern-btn modern-btn-outline">
                                                        <i class="fas fa-external-link-alt"></i>
                                                        {{ $section['reference_text'] }}
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                    @else
                                        <!-- Default Content for other sections -->
                                        <div class="mb-6">
                                            <ul class="modern-list">
                                                @foreach($section['content'] as $content)
                                                <li class="modern-list-item">
                                                    <div class="modern-list-icon">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <div class="modern-list-content">{!! $content !!}</div>
                                                </li>
                                                @endforeach
                                            </ul>
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
                            @foreach($organisasiData['sections'] as $sectionKey => $section)
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
                            <a href="{{ $organisasiData['pdf_link'] }}" class="modern-btn modern-btn-primary" target="_blank">
                                <i class="fas fa-download"></i>
                                Download PDF
                            </a>
                            <a href="{{ route('materials') }}" class="modern-btn modern-btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Materi
                            </a>
                            <a href="{{ route('schedule') }}" class="modern-btn modern-btn-outline">
                                <i class="fas fa-calendar-alt"></i>
                                Lihat Jadwal
                            </a>
                        </div>
                    </div>

                    <!-- Progress Card -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Progress Pembelajaran</h4>
                        <div class="modern-progress-card">
                            <div class="modern-progress-header">
                                <div class="modern-progress-number">2</div>
                                <h5 class="modern-progress-title">Organisasi Pengolahan</h5>
                            </div>
                            <div class="modern-progress-content">
                                Memahami struktur organisasi dan pembagian tanggung jawab dalam pengolahan wilkerstat.
                            </div>
                        </div>
                    </div>

                    <!-- Team Structure Visualization -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Struktur Tim</h4>
                        <div class="team-structure">
                            <div class="team-level">
                                <div class="team-role coordinator">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Koordinator</span>
                                </div>
                            </div>
                            <div class="team-level">
                                <div class="team-role supervisor">
                                    <i class="fas fa-users"></i>
                                    <span>Supervisor</span>
                                </div>
                            </div>
                            <div class="team-level">
                                <div class="team-role operator">
                                    <i class="fas fa-user"></i>
                                    <span>Operator</span>
                                </div>
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
// Additional team structure visualization styles
document.addEventListener('DOMContentLoaded', function() {
    const teamStructureStyles = `
        .team-structure {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
            padding: var(--space-4);
            background: var(--gray-50);
            border-radius: var(--radius-lg);
        }
        .team-level {
            display: flex;
            justify-content: center;
        }
        .team-role {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-lg);
            font-size: var(--text-sm);
            font-weight: 500;
            color: white;
            position: relative;
        }
        .team-role.coordinator {
            background: var(--primary-600);
        }
        .team-role.supervisor {
            background: var(--primary-500);
        }
        .team-role.operator {
            background: var(--primary-400);
        }
        .team-level:not(:last-child) .team-role::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 12px;
            background: var(--gray-300);
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = teamStructureStyles;
    document.head.appendChild(styleSheet);
});
</script>
@endsection