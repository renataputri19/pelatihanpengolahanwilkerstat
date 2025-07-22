@extends('layouts.app')

@section('title', $mekanismeData['title'])

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
                    <h1 class="modern-page-title">{{ $mekanismeData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $mekanismeData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $mekanismeData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        {{-- Duration and difficulty badges commented out as not relevant for training materials
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>{{ $mekanismeData['duration'] }}</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-signal"></i>
                                <span>{{ $mekanismeData['difficulty'] }}</span>
                            </div>
                        </div>
                        --}}
                        <a href="{{ $mekanismeData['pdf_link'] }}" class="modern-download-btn" target="_blank">
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
                        <span class="modern-breadcrumb-current">{{ $mekanismeData['title'] }}</span>
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
                        @foreach($mekanismeData['sections'] as $sectionKey => $section)
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
                                    @if(isset($section['content']))
                                        <div class="mb-6">
                                            @foreach($section['content'] as $content)
                                                <p class="mb-4">{{ $content }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(isset($section['tahapan']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">Tahapan Proses:</h4>
                                            <div class="row">
                                                @foreach($section['tahapan'] as $index => $tahapan)
                                                    <div class="col-lg-6 col-md-12 mb-4">
                                                        <div class="modern-feature-card h-100">
                                                            <div class="modern-feature-icon">
                                                                <i class="{{ $tahapan['icon'] }}"></i>
                                                            </div>
                                                            <h5 class="modern-feature-title">{{ $loop->iteration }}. {{ $tahapan['title'] }}</h5>
                                                            <div class="modern-feature-description">
                                                                <div class="collapse-content">
                                                                    <button class="btn btn-link p-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $sectionKey }}-{{ $index }}" aria-expanded="false">
                                                                        <small>Lihat Detail <i class="fas fa-chevron-down"></i></small>
                                                                    </button>
                                                                    <div class="collapse mt-2" id="collapse-{{ $sectionKey }}-{{ $index }}">
                                                                        <ul class="list-unstyled">
                                                                            @foreach($tahapan['items'] as $item)
                                                                            <li class="mb-2">
                                                                                <i class="fas fa-check text-success me-2"></i>
                                                                                <small>{{ $item }}</small>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($loop->iteration % 2 == 0)
                                                        </div><div class="row">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($section['pengolahan_master']))
                                        <div class="mb-6">
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="{{ $section['pengolahan_master']['icon'] }}"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $section['pengolahan_master']['title'] }}</h5>
                                                <div class="modern-feature-description">
                                                    @foreach($section['pengolahan_master']['content'] as $content)
                                                        <p class="mb-3">{{ $content }}</p>
                                                    @endforeach
                                                    <div class="mt-4">
                                                        <h6 class="font-semibold mb-3">Komponen Master Wilkerstat:</h6>
                                                        <ul class="modern-list">
                                                            @foreach($section['pengolahan_master']['komponen'] as $komponen)
                                                            <li class="modern-list-item">
                                                                <div class="modern-list-icon">
                                                                    <i class="fas fa-database"></i>
                                                                </div>
                                                                <div class="modern-list-content">{{ $komponen }}</div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($section['muatan_sls']))
                                        <div class="mb-6">
                                            <div class="modern-feature-card">
                                                <div class="modern-feature-icon">
                                                    <i class="{{ $section['muatan_sls']['icon'] }}"></i>
                                                </div>
                                                <h5 class="modern-feature-title">{{ $section['muatan_sls']['title'] }}</h5>
                                                <div class="modern-feature-description">
                                                    @foreach($section['muatan_sls']['content'] as $content)
                                                        <p class="mb-3">{{ $content }}</p>
                                                    @endforeach
                                                    <div class="mt-4">
                                                        <h6 class="font-semibold mb-3">Komponen Muatan SLS:</h6>
                                                        <ul class="modern-list">
                                                            @foreach($section['muatan_sls']['komponen'] as $komponen)
                                                            <li class="modern-list-item">
                                                                <div class="modern-list-icon">
                                                                    <i class="fas fa-layer-group"></i>
                                                                </div>
                                                                <div class="modern-list-content">{{ $komponen }}</div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($section['aplikasi_pendukung']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">
                                                <i class="{{ $section['aplikasi_pendukung']['icon'] }}"></i>
                                                {{ $section['aplikasi_pendukung']['title'] }}
                                            </h4>
                                            <div class="modern-feature-grid">
                                                <div class="modern-feature-card">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-server"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $section['aplikasi_pendukung']['frs_mfd']['name'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        <p><strong>Fungsi:</strong> {{ $section['aplikasi_pendukung']['frs_mfd']['fungsi'] }}</p>
                                                        <p><strong>Akses:</strong> {{ $section['aplikasi_pendukung']['frs_mfd']['url'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="modern-feature-card">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-globe"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $section['aplikasi_pendukung']['sipw']['name'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        <p><strong>Fungsi:</strong> {{ $section['aplikasi_pendukung']['sipw']['fungsi'] }}</p>
                                                        <p><strong>URL:</strong> <a href="{{ $section['aplikasi_pendukung']['sipw']['url'] }}" target="_blank" class="text-primary-600 hover:text-primary-700">{{ $section['aplikasi_pendukung']['sipw']['url'] }}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($section['tahapan_detail']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">Alur Pengolahan Detail:</h4>
                                            <div class="workflow-container">
                                                @foreach($section['tahapan_detail'] as $tahap)
                                                    <div class="workflow-step">
                                                        <div class="workflow-step-header">
                                                            <div class="workflow-step-number">{{ $tahap['step'] }}</div>
                                                            <h5 class="workflow-step-title">{{ $tahap['title'] }}</h5>
                                                        </div>
                                                        <div class="workflow-step-content">
                                                            <p class="mb-3">{{ $tahap['description'] }}</p>
                                                            <div class="modern-alert modern-alert-info">
                                                                <div class="modern-alert-icon">
                                                                    <i class="fas fa-file-export"></i>
                                                                </div>
                                                                <div class="modern-alert-content">
                                                                    <strong>Output:</strong> {{ $tahap['output'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(!$loop->last)
                                                        <div class="workflow-connector">
                                                            <i class="fas fa-arrow-down"></i>
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($section['prinsip']))
                                        <div class="mb-6">
                                            <div class="modern-feature-grid">
                                                <div class="modern-feature-card">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-shield-alt"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">Prinsip Kontrol Kualitas</h5>
                                                    <ul class="modern-list">
                                                        @foreach($section['prinsip'] as $prinsip)
                                                        <li class="modern-list-item">
                                                            <div class="modern-list-icon">
                                                                <i class="fas fa-check-circle"></i>
                                                            </div>
                                                            <div class="modern-list-content">{{ $prinsip }}</div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="modern-feature-card">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-tools"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">Tools dan Sistem</h5>
                                                    <ul class="modern-list">
                                                        @foreach($section['tools'] as $tool)
                                                        <li class="modern-list-item">
                                                            <div class="modern-list-icon">
                                                                <i class="fas fa-cog"></i>
                                                            </div>
                                                            <div class="modern-list-content">{{ $tool }}</div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
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
                            @foreach($mekanismeData['sections'] as $sectionKey => $section)
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
                            <a href="{{ $mekanismeData['pdf_link'] }}" class="modern-btn modern-btn-primary" target="_blank">
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
                                <div class="modern-progress-number">3</div>
                                <h5 class="modern-progress-title">Mekanisme Pengolahan</h5>
                            </div>
                            <div class="modern-progress-content">
                                Memahami alur dan mekanisme pengolahan data wilkerstat secara detail.
                            </div>
                        </div>
                    </div>

                    <!-- Process Overview -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Ringkasan Proses</h4>
                        <div class="process-overview">
                            <div class="process-step">
                                <div class="process-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <span>Input Data</span>
                            </div>
                            <div class="process-step">
                                <div class="process-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <span>Pengolahan</span>
                            </div>
                            <div class="process-step">
                                <div class="process-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Validasi</span>
                            </div>
                            <div class="process-step">
                                <div class="process-icon">
                                    <i class="fas fa-download"></i>
                                </div>
                                <span>Output</span>
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
// Additional workflow and process visualization styles
document.addEventListener('DOMContentLoaded', function() {
    const workflowStyles = `
        .workflow-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-6);
        }
        .workflow-step {
            position: relative;
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: all var(--transition-fast);
        }
        .workflow-step:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }
        .workflow-step-header {
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
            color: white;
            padding: var(--space-4) var(--space-6);
            display: flex;
            align-items: center;
            gap: var(--space-4);
        }
        .workflow-step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            font-weight: 700;
            font-size: var(--text-lg);
        }
        .workflow-step-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            font-size: var(--text-base);
        }
        .workflow-step-title {
            font-size: var(--text-lg);
            font-weight: 600;
            margin: 0;
            flex: 1;
        }
        .workflow-step-content {
            padding: var(--space-6);
        }
        .workflow-connector {
            display: flex;
            justify-content: center;
            padding: var(--space-3) 0;
            color: var(--gray-400);
            font-size: var(--text-xl);
        }
        .process-overview {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }
        .process-step {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3);
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            transition: all var(--transition-fast);
        }
        .process-step:hover {
            background: var(--primary-50);
            color: var(--primary-700);
        }
        .process-icon {
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
        .process-step:hover .process-icon {
            background: var(--primary-200);
            color: var(--primary-700);
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = workflowStyles;
    document.head.appendChild(styleSheet);
});
</script>
@endsection

@push('styles')
<style>
    /* Aplikasi Grid */
    .aplikasi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .aplikasi-card {
        background: white;
        padding: 1rem;
        border-radius: 0.5rem;
        border: 1px solid #e9ecef;
    }

    .aplikasi-card h4 {
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .aplikasi-card p {
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .aplikasi-card a {
        color: #667eea;
        text-decoration: none;
    }

    .aplikasi-card a:hover {
        text-decoration: underline;
    }

    /* Alur Pengolahan */
    .alur-pengolahan {
        margin: 2rem 0;
    }

    .alur-step {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 2rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 0.5rem;
        position: relative;
    }

    .alur-step:not(:last-child):after {
        content: '';
        position: absolute;
        left: 1.75rem;
        top: 100%;
        width: 2px;
        height: 1rem;
        background: #667eea;
    }

    .step-number {
        width: 3rem;
        height: 3rem;
        background: #667eea;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .step-content {
        flex: 1;
    }

    .step-title {
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .step-description {
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .step-output {
        background: white;
        padding: 0.5rem;
        border-radius: 0.25rem;
        border-left: 3px solid #28a745;
        font-size: 0.9rem;
    }

    /* Quality Control */
    .quality-control h4 {
        color: #495057;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .prinsip-list, .tools-list {
        list-style-type: none;
        padding: 0;
    }

    .prinsip-list li, .tools-list li {
        padding: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
        color: #6c757d;
        border-bottom: 1px solid #e9ecef;
    }

    .prinsip-list li:before {
        content: '🛡️';
        position: absolute;
        left: 0;
    }

    .tools-list li:before {
        content: '🔧';
        position: absolute;
        left: 0;
    }

    /* Section Conclusion */
    .section-conclusion {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        margin-top: 2rem;
    }

    .conclusion-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .conclusion-header h4 {
        margin: 0;
        color: white;
    }

    .conclusion-text {
        margin: 0;
        line-height: 1.6;
        opacity: 0.95;
    }

    /* Sidebar */
    .sidebar {
        position: sticky;
        top: 2rem;
    }

    .toc-card, .actions-card, .material-info-card {
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .toc-title, .actions-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #495057;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .toc-title i, .actions-title i {
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
        gap: 0.5rem;
        padding: 0.75rem 0;
        color: #6c757d;
        text-decoration: none;
        border-bottom: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .toc-link:hover {
        color: #667eea;
        padding-left: 0.5rem;
    }

    .toc-link:last-child {
        border-bottom: none;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        background: #f8f9fa;
        color: #495057;
        text-decoration: none;
        border-radius: 0.5rem;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        background: #667eea;
        color: white;
        transform: translateX(0.25rem);
    }

    .material-info-card h4 {
        color: #495057;
        margin-bottom: 1rem;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 500;
        color: #6c757d;
    }

    .info-value {
        color: #495057;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 2rem;
        }

        .material-info {
            text-align: left;
            margin-top: 1rem;
        }

        .info-item {
            display: block;
            margin: 0.5rem 0;
        }

        .tahapan-grid {
            grid-template-columns: 1fr;
        }

        .aplikasi-grid {
            grid-template-columns: 1fr;
        }

        .alur-step {
            flex-direction: column;
            text-align: center;
        }

        .alur-step:not(:last-child):after {
            display: none;
        }

        .step-number {
            align-self: center;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for TOC links
        document.querySelectorAll('.toc-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Highlight active section in TOC
        const sections = document.querySelectorAll('.content-section');
        const tocLinks = document.querySelectorAll('.toc-link');

        function highlightActiveSection() {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            tocLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', highlightActiveSection);
        highlightActiveSection(); // Initial call
    });
</script>
@endpush