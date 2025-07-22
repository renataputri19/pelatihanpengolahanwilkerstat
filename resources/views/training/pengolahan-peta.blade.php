@extends('layouts.app')

@section('title', $pengolahanPetaData['title'])

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
                    <h1 class="modern-page-title">{{ $pengolahanPetaData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $pengolahanPetaData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $pengolahanPetaData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        {{-- Duration and difficulty badges commented out as not relevant for training materials
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>{{ $pengolahanPetaData['duration'] }}</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-signal"></i>
                                <span>{{ $pengolahanPetaData['difficulty'] }}</span>
                            </div>
                        </div>
                        --}}
                        <a href="{{ $pengolahanPetaData['pdf_link'] }}" class="modern-download-btn" target="_blank">
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
                        <span class="modern-breadcrumb-current">{{ $pengolahanPetaData['title'] }}</span>
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
                        @php
                            // Define the desired order of section keys
                            $sectionOrder = [
                                'alat_bahan',
                                'penyiapan_pengolahan',
                                'penyiapan_bahan',
                                'georeferensi_peta',
                                'editing_peta_digital',
                                'cleaning_validasi',
                                'dissolving_peta',
                                'catatan_tambahan',
                            ];
                        @endphp
                        @foreach($sectionOrder as $orderedKey)
                            @if(isset($pengolahanPetaData['sections'][$orderedKey]))
                                @php $section = $pengolahanPetaData['sections'][$orderedKey]; @endphp
                                @php $sectionKey = $orderedKey; @endphp
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
                                    @if($sectionKey === 'alat_bahan')
                                        <!-- Alat dan Bahan Content with collapsible design -->
                                        <div class="row g-4">
                                            @if(isset($section['content']['alat_digunakan']))
                                            <div class="col-lg-6">
                                                <div class="modern-feature-card h-100">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-tools"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $section['content']['alat_digunakan']['title'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        <p class="mb-3">Perangkat dan aplikasi yang diperlukan untuk pengolahan peta digital.</p>
                                                        
                                                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-alat-digunakan" aria-expanded="false">
                                                            <i class="fas fa-chevron-down"></i> Lihat Detail
                                                        </button>
                                                        
                                                        <div class="collapse mt-3" id="collapse-alat-digunakan">
                                                            <div class="collapse-content">
                                                                <ul class="modern-list">
                                                                    @foreach($section['content']['alat_digunakan']['items'] as $item)
                                                                    <li class="modern-list-item">
                                                                        <div class="modern-list-icon">
                                                                            <i class="fas fa-microchip"></i>
                                                                        </div>
                                                                        <div class="modern-list-content">{{ $item }}</div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if(isset($section['content']['bahan_instrumen']))
                                            <div class="col-lg-6">
                                                <div class="modern-feature-card h-100">
                                                    <div class="modern-feature-icon">
                                                        <i class="fas fa-folder-open"></i>
                                                    </div>
                                                    <h5 class="modern-feature-title">{{ $section['content']['bahan_instrumen']['title'] }}</h5>
                                                    <div class="modern-feature-description">
                                                        <p class="mb-3">Data dan dokumen yang dibutuhkan sebagai input pengolahan.</p>
                                                        
                                                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-bahan-instrumen" aria-expanded="false">
                                                            <i class="fas fa-chevron-down"></i> Lihat Detail
                                                        </button>
                                                        
                                                        <div class="collapse mt-3" id="collapse-bahan-instrumen">
                                                            <div class="collapse-content">
                                                                <ul class="modern-list">
                                                                    @foreach($section['content']['bahan_instrumen']['items'] as $item)
                                                                    <li class="modern-list-item">
                                                                        <div class="modern-list-icon">
                                                                            <i class="fas fa-map"></i>
                                                                        </div>
                                                                        <div class="modern-list-content">{{ $item }}</div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                    @elseif($sectionKey === 'penyiapan_pengolahan')
                                        <!-- Penyiapan Pengolahan Content with description -->
                                        <div class="modern-content-description">
                                            <p class="lead text-gray-700 mb-4">{{ $section['content']['description'] }}</p>
                                        </div>

                                    @elseif($sectionKey === 'penyiapan_bahan')
                        <!-- Penyiapan Bahan Wilkerstat SE2026 Content with simplified description -->
                        <div class="modern-content-description">
                            <p class="lead text-gray-700 mb-4">Penyiapan bahan melibatkan pengumpulan dan pengolahan master SLS melalui FRS-MFDOnline, scanning peta hasil lapangan (WA, WS, LK-Peta) dengan resolusi 200 dpi dalam format JPEG, serta rename file menggunakan Bulk Rename Utility berdasarkan pasangan nama lama dan baru dari file teks atau CSV. Proses ini memastikan data dan peta siap digunakan untuk tahap pengolahan lebih lanjut.</p>
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('penyiapan-bahan-detail') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-book-open me-2"></i>
                                    Lihat Panduan Lengkap
                                </a>
                            </div>
                        </div>

                                    @elseif($sectionKey === 'georeferensi_peta')
                                        <!-- Georeferensi Peta Content with simplified description -->
                                        <div class="modern-content-description">
                                            <p class="lead text-gray-700 mb-4">{{ $section['content']['description'] }}</p>
                                            
                                            <div class="text-center mt-4">
                                                <a href="{{ route('georeferensi-peta-detail') }}" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-book-open me-2"></i>
                                                    Lihat Panduan Lengkap
                                                </a>
                                            </div>
                                        </div>

                                    @elseif($sectionKey === 'editing_peta_digital')
                                        <!-- Editing Peta Digital Content with simplified description -->
                                        <div class="modern-content-description">
                                            <p class="lead text-gray-700 mb-4">{{ $section['content']['description'] }}</p>
                                            
                                            <div class="text-center mt-4">
                                                <a href="{{ route('editing-peta-digital-detail') }}" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-book-open me-2"></i>
                                                    Lihat Panduan Lengkap
                                                </a>
                                            </div>
                                        </div>

                                    @elseif($sectionKey === 'cleaning_validasi')
                        <!-- Cleaning dan Validasi Peta Content with simplified description -->
                        <div class="modern-content-description">
                            <p class="lead text-gray-700 mb-4">{{ $section['content']['description'] }}</p>
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('cleaning-validasi-detail') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-book-open me-2"></i>
                                    Lihat Panduan Lengkap
                                </a>
                            </div>
                        </div>

                    @elseif($sectionKey === 'dissolving_peta')
                        <!-- Dissolving Peta Content with simplified description -->
                        <div class="modern-content-description">
                            <p class="lead text-gray-700 mb-4">{{ $section['content']['description'] }}</p>
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('dissolving-peta-detail') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-book-open me-2"></i>
                                    Lihat Panduan Lengkap
                                </a>
                            </div>
                        </div>

                                    @elseif($sectionKey === 'cleaning')
                                        <!-- Cleaning Content with process cards -->
                                        <div class="mb-6">
                                            @foreach($section['content'] as $content)
                                                <p class="mb-4">{{ $content }}</p>
                                            @endforeach
                                        </div>

                                        @if(isset($section['proses']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">Proses Cleaning:</h4>
                                            <div class="workflow-container">
                                                @foreach($section['proses'] as $index => $process)
                                                <div class="workflow-step">
                                                    <div class="workflow-step-header">
                                                        <div class="workflow-step-number">{{ $loop->iteration }}</div>
                                                        <div class="workflow-step-icon">
                                                            <i class="{{ $process['icon'] }}"></i>
                                                        </div>
                                                        <h5 class="workflow-step-title">{{ $process['title'] }}</h5>
                                                    </div>
                                                    <div class="workflow-step-content">
                                                        <p class="mb-3">{{ $process['description'] }}</p>
                                                        @if(isset($process['steps']))
                                                        <ul class="modern-list">
                                                            @foreach($process['steps'] as $step)
                                                            <li class="modern-list-item">
                                                                <div class="modern-list-icon">
                                                                    <i class="fas fa-arrow-right"></i>
                                                                </div>
                                                                <div class="modern-list-content">{{ $step }}</div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
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

                                    @elseif($sectionKey === 'validasi')
                                        <!-- Validasi Content with criteria checklist -->
                                        <div class="mb-6">
                                            @foreach($section['content'] as $content)
                                                <p class="mb-4">{{ $content }}</p>
                                            @endforeach
                                        </div>

                                        @if(isset($section['kriteria']))
                                        <div class="mb-6">
                                            <h4 class="mb-4 text-xl font-semibold text-gray-800">Kriteria Validasi:</h4>
                                            <ul class="modern-list">
                                                @foreach($section['kriteria'] as $criteria)
                                                <li class="modern-list-item">
                                                    <div class="modern-list-icon">
                                                        <i class="fas fa-check-double"></i>
                                                    </div>
                                                    <div class="modern-list-content">{{ $criteria }}</div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                    @elseif($sectionKey === 'catatan_tambahan')
                                        <!-- Catatan Tambahan Content with alert style -->
                                        <div class="mb-6">
                                            @foreach($section['content'] as $note)
                                            <div class="modern-alert modern-alert-warning mb-4">
                                                <div class="modern-alert-icon">
                                                    <i class="fas fa-sticky-note"></i>
                                                </div>
                                                <div class="modern-alert-content">{{ $note }}</div>
                                            </div>
                                            @endforeach
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
                                        @if($sectionKey === 'penyiapan_pengolahan')
                                        <div class="modern-alert modern-alert-success mt-4">
                                            <div class="modern-alert-icon">
                                                <i class="fas fa-lightbulb"></i>
                                            </div>
                                            <div class="modern-alert-content">
                                                <p class="mb-0">{{ $section['kesimpulan'] }}</p>
                                            </div>
                                        </div>
                                        @else
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
                                    @endif
                                    
                                    @if($sectionKey === 'penyiapan_pengolahan')
                                    <div class="text-center mt-4">
                                        <a href="{{ route('penyiapan-pengolahan-detail') }}" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%); border: none; border-radius: 50px; padding: 12px 30px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(66, 153, 225, 0.3);">
                                            <i class="fas fa-book-open"></i>
                                            Lihat Panduan Langkah demi Langkah
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Modern Sidebar -->
                <div class="modern-sidebar">
                    <!-- Table of Contents -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Daftar Isi</h4>
                        <ul class="modern-toc">
                            @php
                                // Use the same order for the TOC
                            @endphp
                            @foreach($sectionOrder as $orderedKey)
                                @if(isset($pengolahanPetaData['sections'][$orderedKey]))
                                    @php $section = $pengolahanPetaData['sections'][$orderedKey]; @endphp
                                    <li class="modern-toc-item">
                                        <a href="#{{ $orderedKey }}" class="modern-toc-link">
                                            <i class="modern-toc-icon {{ $section['icon'] }}"></i>
                                            {{ $section['title'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Quick Actions -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Aksi Cepat</h4>
                        <div class="modern-action-buttons">
                            <a href="{{ $pengolahanPetaData['pdf_link'] }}" class="modern-btn modern-btn-primary" target="_blank">
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
                                <div class="modern-progress-number">5</div>
                                <h5 class="modern-progress-title">Pengolahan Peta</h5>
                            </div>
                            <div class="modern-progress-content">
                                Memahami proses pengolahan peta digital dan teknik-teknik GIS yang diperlukan.
                            </div>
                        </div>
                    </div>

                    <!-- Map Tools -->
                    <div class="modern-sidebar-card">
                        <h4 class="modern-sidebar-title">Tools Peta</h4>
                        <div class="map-tools">
                            <div class="tool-item">
                                <div class="tool-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <span>Georeferencing</span>
                            </div>
                            <div class="tool-item">
                                <div class="tool-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <span>Editing</span>
                            </div>
                            <div class="tool-item">
                                <div class="tool-icon">
                                    <i class="fas fa-broom"></i>
                                </div>
                                <span>Cleaning</span>
                            </div>
                            <div class="tool-item">
                                <div class="tool-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Validasi</span>
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
// Additional map-specific styles and functionality
document.addEventListener('DOMContentLoaded', function() {
    const mapStyles = `
        .map-tools {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }
        .tool-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3);
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            transition: all var(--transition-fast);
        }
        .tool-item:hover {
            background: var(--primary-50);
            color: var(--primary-700);
        }
        .tool-icon {
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
        .tool-item:hover .tool-icon {
            background: var(--primary-200);
            color: var(--primary-700);
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = mapStyles;
    document.head.appendChild(styleSheet);
});  
</script>
@endsection

@push('styles')
<style>
.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.page-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 15px;
}

.page-description {
    font-size: 1rem;
    opacity: 0.8;
    line-height: 1.6;
}

.material-info {
    text-align: right;
}

.info-item {
    display: inline-block;
    margin: 0 15px 15px 0;
    font-size: 0.9rem;
}

.info-item i {
    margin-right: 5px;
}

.breadcrumb-section {
    background-color: #f8f9fa;
    padding: 15px 0;
    border-bottom: 1px solid #dee2e6;
}

.breadcrumb {
    background: none;
    margin: 0;
    padding: 0;
}

.content-sections {
    padding: 40px 0;
}

.content-section {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    overflow: hidden;
}

.section-header {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    padding: 20px 30px;
}

.section-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.section-title i {
    margin-right: 10px;
}

.section-content {
    padding: 30px;
}

.content-text p {
    line-height: 1.8;
    margin-bottom: 15px;
    color: #555;
}

.tools-materials-section {
    margin: 20px 0;
}

.tool-category {
    margin-bottom: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
}

.tool-category h4 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.tool-category h4 i {
    margin-right: 10px;
    color: #007bff;
}

.tool-list {
    margin: 0;
    padding-left: 20px;
}

.tool-list li {
    margin-bottom: 10px;
    line-height: 1.6;
    color: #555;
}

.preparation-steps {
    margin: 20px 0;
}

.step-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #28a745;
}

.step-item i {
    color: #28a745;
    margin-right: 15px;
    margin-top: 2px;
    font-size: 1.1rem;
}

.steps-section {
    margin-top: 25px;
}

.step-card {
    background: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
}

.step-card .card-header {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
    padding: 15px 20px;
    border: none;
}

.step-card .card-header h5 {
    margin: 0;
    display: inline-block;
    margin-left: 10px;
}

.step-card .card-body {
    padding: 20px;
}

.step-card ul {
    margin: 0;
    padding-left: 20px;
}

.step-card li {
    margin-bottom: 8px;
    line-height: 1.6;
}

.techniques-section {
    margin-top: 25px;
}

.techniques-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.technique-item {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    border-left: 4px solid #007bff;
}

.technique-item i {
    font-size: 2rem;
    color: #007bff;
    margin-bottom: 10px;
}

.technique-item h5 {
    color: #333;
    margin-bottom: 10px;
}

.technique-item p {
    color: #555;
    margin: 0;
    line-height: 1.6;
}

.cleaning-processes {
    margin-top: 25px;
}

.process-item {
    background: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
}

.process-header {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    color: #333;
    padding: 15px 20px;
    border: none;
}

.process-header h5 {
    margin: 0;
    display: inline-block;
    margin-left: 10px;
}

.process-content {
    padding: 20px;
}

.process-content ul {
    margin: 10px 0 0 0;
    padding-left: 20px;
}

.process-content li {
    margin-bottom: 8px;
    line-height: 1.6;
}

.validation-criteria {
    margin-top: 25px;
}

.criteria-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #17a2b8;
}

.criteria-item i {
    color: #17a2b8;
    margin-right: 15px;
    margin-top: 2px;
    font-size: 1.1rem;
}

.additional-notes {
    margin: 20px 0;
}

.note-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 15px;
    background: #fff3cd;
    border-radius: 8px;
    border-left: 4px solid #ffc107;
}

.note-item i {
    color: #ffc107;
    margin-right: 15px;
    margin-top: 2px;
    font-size: 1.1rem;
}

.section-conclusion {
    margin-top: 25px;
}

.conclusion-box {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #ff6b6b;
}

.conclusion-box h5 {
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.conclusion-box h5 i {
    color: #ff6b6b;
    margin-right: 8px;
}

.conclusion-box p {
    margin: 0;
    color: #555;
    line-height: 1.6;
}

.sidebar {
    position: sticky;
    top: 20px;
}

.toc-card, .quick-actions {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 25px;
    margin-bottom: 20px;
}

.toc-card h4, .quick-actions h4 {
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
    border-bottom: 2px solid #f1f1f1;
    padding-bottom: 10px;
}

.toc-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.toc-list li {
    margin-bottom: 10px;
}

.toc-list a {
    color: #555;
    text-decoration: none;
    display: block;
    padding: 8px 12px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.toc-list a:hover {
    background: #f8f9fa;
    color: #007bff;
    transform: translateX(5px);
}

.toc-list a i {
    margin-right: 8px;
    width: 16px;
}

.action-buttons .btn {
    margin-bottom: 10px;
    border-radius: 25px;
    font-weight: 500;
    padding: 10px 20px;
}

.btn-block {
    width: 100%;
    display: block;
}

@media (max-width: 768px) {
    .page-header {
        padding: 40px 0;
        text-align: center;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .material-info {
        text-align: center;
        margin-top: 20px;
    }
    
    .section-content {
        padding: 20px;
    }
    
    .sidebar {
        margin-top: 30px;
        position: static;
    }
    
    .techniques-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Smooth scrolling for table of contents
document.addEventListener('DOMContentLoaded', function() {
    const tocLinks = document.querySelectorAll('.toc-list a');
    
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Update active state
                tocLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
    
    // Highlight current section in TOC on scroll
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('.content-section');
        const scrollPos = window.scrollY + 100;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                tocLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });
});
</script>
@endpush