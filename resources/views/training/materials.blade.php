@extends('layouts.app')

@section('title', 'Materi Pelatihan - Pelatihan Pengolahan Wilkerstat SE2026')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/materials-index.css') }}">
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header mb-8">
    <div class="page-header-content">
        <div class="page-title-section">
            <h1 class="page-title">
                <i class="fas fa-book-open"></i>
                Materi Pelatihan
            </h1>
            <p class="page-subtitle">
                Koleksi lengkap materi pelatihan Pengolahan Wilkerstat SE2026 yang terorganisir berdasarkan modul pembelajaran.
            </p>
        </div>
        {{-- <div class="page-actions">
            <a href="https://drive.google.com/drive/folders/1Nga_mlG528UmPwfED77otTh4Z70z8Z6P?usp=drive_link" class="btn btn-primary" target="_blank">
                <i class="fab fa-google-drive"></i>
                Koleksi Lengkap di Google Drive
            </a>
            <button class="btn btn-secondary" onclick="downloadAll()">
                <i class="fas fa-download"></i>
                Unduh Semua
            </button>
        </div> --}}
    </div>
</div>

<!-- Materials Overview -->
<div class="overview-section mb-8">
    <div class="grid grid-cols-1 grid-cols-md-4">
        <div class="overview-card">
            <div class="overview-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="overview-content">
                <div class="overview-number">{{ $totalCategories }}</div>
                <div class="overview-label">Kategori Materi</div>
            </div>
        </div>
        
        <div class="overview-card">
            <div class="overview-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <div class="overview-content">
                <div class="overview-number">{{ $availableFilesCount }}</div>
                <div class="overview-label">Dokumen PDF</div>
            </div>
        </div>
        
        <div class="overview-card">
            <div class="overview-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="overview-content">
                <div class="overview-number">{{ $totalMaterials }}</div>
                <div class="overview-label">Total Materi</div>
            </div>
        </div>
        
        <div class="overview-card">
            <div class="overview-icon">
                <i class="fab fa-google-drive"></i>
            </div>
            <div class="overview-content">
                <div class="overview-number">Online</div>
                <div class="overview-label">Akses Google Drive</div>
            </div>
        </div>
    </div>
</div>

<!-- Google Drive Access Section -->
<div class="drive-access-section mb-6">
    <div class="drive-access-card">
        <div class="drive-access-content">
            <div class="drive-access-info">
                <div class="drive-icon">
                    <i class="fab fa-google-drive"></i>
                </div>
                <div class="drive-text">
                    <h3>Akses Koleksi Lengkap</h3>
                    <p>Dapatkan akses ke seluruh koleksi materi pelatihan, termasuk file tambahan dan update terbaru melalui Google Drive.</p>
                </div>
            </div>
            <div class="drive-actions">
                <a href="https://drive.google.com/drive/folders/1Nga_mlG528UmPwfED77otTh4Z70z8Z6P?usp=drive_link" class="btn btn-primary" target="_blank">
                    <i class="fab fa-google-drive"></i>
                    Buka Google Drive
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Buku Pedoman Lengkap Section -->
<div class="featured-section mb-8">
    <div class="featured-card fade-in">
        <div class="card-icon">
            <i class="fas fa-book"></i>
        </div>
        <h2 class="card-title">Buku Pedoman Lengkap</h2>
        <p class="card-description">
            Akses dokumen komprehensif yang berisi seluruh materi pelatihan Pengolahan Wilkerstat SE2026 dalam satu file lengkap. 
            Dokumen ini mencakup semua modul pembelajaran dari pendahuluan hingga pengolahan peta digital.
        </p>
        <div class="card-actions">
            <a href="{{ asset('bahanajar/[FINAL] Buku 3 Pedoman Pengolahan Pemutakhiran Wilkerstat SE2026.pdf') }}" 
               class="btn btn-success" 
               target="_blank" 
               onclick="trackDownload('Buku Pedoman Lengkap')">
                <i class="fas fa-download"></i>
                Unduh PDF (25.1 MB)
            </a>
            <a href="https://drive.google.com/drive/folders/1Nga_mlG528UmPwfED77otTh4Z70z8Z6P?usp=drive_link" 
               class="btn btn-primary" 
               target="_blank">
                <i class="fab fa-google-drive"></i>
                Buka di Google Drive
            </a>
        </div>
    </div>
</div>

<!-- Search and Filter -->
{{-- <div class="search-section mb-6">
    <div class="search-card">
        <div class="search-controls">
            <div class="search-input-group">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="searchInput" class="search-input" placeholder="Cari materi berdasarkan judul atau deskripsi...">
            </div>
            <div class="filter-group">
                <select id="typeFilter" class="filter-select">
                    <option value="">Semua Tipe</option>
                    <option value="PDF">PDF</option>
                    <option value="Video">Video</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="btn btn-primary" onclick="resetSearch()">
                    <i class="fas fa-refresh"></i>
                    Reset
                </button>
            </div>
        </div>
    </div>
</div> --}}

<!-- Materials by Module -->
<div class="materials-section">
    @foreach($materials as $moduleName => $moduleItems)
    <div class="module-section mb-8" data-module="{{ strtolower($moduleName) }}">
        <div class="module-header">
            <div class="module-title-section">
                <h2 class="module-title">
                    <i class="fas fa-folder-open"></i>
                    {{ $moduleName }}
                </h2>
                <div class="module-stats">
                    <span class="module-count">{{ count($moduleItems) }} item</span>
                    <span class="module-types">
                        @php
                            $types = collect($moduleItems)->pluck('type')->unique();
                        @endphp
                        @foreach($types as $type)
                            <span class="type-badge type-{{ strtolower($type) }}">{{ $type }}</span>
                        @endforeach
                    </span>
                </div>
            </div>
            <div class="module-actions">
                {{-- <button class="btn btn-secondary btn-sm" onclick="downloadModule('{{ $moduleName }}')">
                    <i class="fas fa-download"></i>
                    Unduh Modul
                </button> --}}
                <button class="btn btn-outline btn-sm" onclick="toggleModule('{{ $loop->index }}')">
                    <i class="fas fa-chevron-down toggle-icon" id="toggle-{{ $loop->index }}"></i>
                </button>
            </div>
        </div>
        
        <div class="module-content collapsed" id="module-{{ $loop->index }}">
            <div class="materials-grid">
                @foreach($moduleItems as $item)
                <div class="material-card" data-title="{{ strtolower($item['title']) }}" data-description="{{ strtolower($item['description']) }}" data-type="{{ $item['type'] }}">
                    <div class="material-header">
                        <div class="material-type-badge type-{{ strtolower($item['type']) }}">
                            @if($item['type'] === 'PDF')
                                <i class="fas fa-file-pdf"></i>
                            @elseif($item['type'] === 'Video')
                                <i class="fas fa-video"></i>
                            @else
                                <i class="fas fa-file"></i>
                            @endif
                            {{ $item['type'] }}
                        </div>
                        <div class="material-actions">
                            <button class="btn-action btn-favorite" onclick="toggleFavorite(this)" title="Tandai Favorit">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="material-content">
                        <h3 class="material-title">{{ $item['title'] }}</h3>
                        <p class="material-description">{{ $item['description'] }}</p>
                        
                        <div class="material-meta">
                            @if(isset($item['size']))
                                <div class="meta-item">
                                    <i class="fas fa-file-alt"></i>
                                    <span>{{ $item['size'] }}</span>
                                </div>
                            @endif
                            {{-- @if(isset($item['duration']))
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $item['duration'] }}</span>
                                </div>
                            @endif --}}
                            {{-- @if(isset($item['difficulty']))
                                <div class="meta-item difficulty-{{ strtolower($item['difficulty']) }}">
                                    <i class="fas fa-signal"></i>
                                    <span>{{ $item['difficulty'] }}</span>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                    
                    <div class="material-footer">
                        <div class="material-actions-grid">
                            <a href="{{ $item['link'] }}" class="btn btn-primary" target="_blank" onclick="trackDownload('{{ $item['title'] }}')">
                                @if($item['type'] === 'Video')
                                    <i class="fas fa-play"></i>
                                    Tonton Video
                                @else
                                    <i class="fas fa-book-open"></i>
                                    Baca Materi
                                @endif
                            </a>
                            @if($item['type'] === 'Video' && isset($item['google_drive_link']))
                                <a href="{{ $item['google_drive_link'] }}" 
                                   class="btn btn-secondary" 
                                   target="_blank"
                                   title="Akses video melalui Google Drive">
                                    <i class="fab fa-google-drive"></i>
                                    Google Drive
                                </a>
                            @else
                                <a href="https://drive.google.com/drive/folders/1Nga_mlG528UmPwfED77otTh4Z70z8Z6P?usp=drive_link" 
                                   class="btn btn-secondary" 
                                   target="_blank"
                                   title="Akses melalui Google Drive">
                                    <i class="fab fa-google-drive"></i>
                                    Google Drive
                                </a>
                            @endif
                        </div>
                        @if(strtolower($item['type']) !== 'video')
                            @if(isset($item['preview_link']))
                                <a href="{{ $item['preview_link'] }}" class="btn btn-outline-primary btn-block mt-2">
                                    <i class="fas fa-eye me-2"></i>Preview
                                </a>
                            @else
                                <button class="btn btn-outline btn-sm btn-block mt-2" onclick="previewMaterial('{{ $item['title'] }}', '{{ $item['description'] }}', '{{ $item['type'] }}')">
                                    <i class="fas fa-eye"></i>
                                    Preview
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- No Results -->
<div class="no-results" id="noResults" style="display: none;">
    <div class="no-results-content">
        <i class="fas fa-search"></i>
        <h3>Tidak ada materi ditemukan</h3>
        <p>Coba ubah kata kunci pencarian atau filter Anda</p>
        <button class="btn btn-primary" onclick="resetSearch()">
            <i class="fas fa-refresh"></i>
            Reset Pencarian
        </button>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal" id="previewModal">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3 class="modal-title" id="previewTitle">Preview Materi</h3>
            <button class="modal-close" onclick="closePreview()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="previewBody">
            <!-- Content will be populated by JavaScript -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closePreview()">Tutup</button>
            <button class="btn btn-primary" id="previewDownload">
                <i class="fas fa-external-link-alt"></i>
                Buka Materi
            </button>
        </div>
    </div>
</div>

<!-- Quick Access Sidebar -->
<div class="quick-access" id="quickAccess">
    <div class="quick-access-header">
        <h4>Akses Cepat</h4>
        <button class="quick-access-toggle" onclick="toggleQuickAccess()">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div class="quick-access-content">
        <div class="quick-section">
            <h5>Favorit</h5>
            <div id="favoritesList">
                <p class="empty-state">Belum ada materi favorit</p>
            </div>
        </div>
        <div class="quick-section">
            <h5>Terakhir Diakses</h5>
            <div id="recentList">
                <p class="empty-state">Belum ada aktivitas</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--bg-white) 0%, #f8fafc 100%);
        border-radius: 0.75rem;
        padding: 2rem;
        border: 1px solid var(--border-color);
    }

    .page-header-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 2rem;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .page-title i {
        color: var(--primary-color);
    }

    .page-subtitle {
        color: var(--text-secondary);
        font-size: 1.125rem;
        line-height: 1.6;
    }

    /* Overview Cards */
    .overview-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .overview-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .overview-icon {
        width: 50px;
        height: 50px;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .overview-number {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1;
    }

    .overview-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    /* Google Drive Access Section */
    .drive-access-card {
        background: linear-gradient(135deg, #4285f4 0%, #34a853 100%);
        border-radius: 0.75rem;
        padding: 2rem;
        color: white;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
    }

    .drive-access-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-2px);
    }

    .drive-access-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
    }

    .drive-access-info {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex: 1;
    }

    .drive-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .drive-text h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: white;
    }

    .drive-text p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        line-height: 1.5;
        margin: 0;
    }

    .drive-actions .btn {
        background: white;
        color: #4285f4;
        border: none;
        font-weight: 600;
    }

    .drive-actions .btn:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-1px);
    }

    /* Search Section */
    .search-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .search-controls {
        display: grid;
        grid-template-columns: 1fr auto auto;
        gap: 1rem;
        align-items: center;
    }

    .search-input-group {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Module Sections */
    .module-section {
        background: var(--bg-white);
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .module-header {
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .module-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .module-title i {
        color: var(--primary-color);
    }

    .module-stats {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .module-count {
        font-size: 0.875rem;
        color: var(--text-secondary);
        background: var(--bg-white);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
    }

    .module-types {
        display: flex;
        gap: 0.5rem;
    }

    .type-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: 500;
        color: white;
    }

    .type-pdf { background: #ef4444; }
    .type-video { background: #8b5cf6; }

    .module-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    .btn-outline {
        background: transparent;
        border: 1px solid var(--border-color);
        color: var(--text-primary);
    }

    .btn-outline:hover {
        background: var(--bg-light);
        border-color: var(--primary-color);
    }

    .toggle-icon {
        transition: transform 0.3s ease;
    }

    .toggle-icon.rotated {
        transform: rotate(180deg);
    }

    /* Module Content */
    .module-content {
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .module-content.collapsed {
        display: none;
    }

    .materials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    /* Material Cards */
    .material-card {
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .material-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
        border-color: var(--primary-color);
    }

    .material-header {
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }

    .material-type-badge {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
    }

    .material-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: 0.375rem;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--bg-white);
        color: var(--text-secondary);
    }

    .btn-favorite:hover {
        color: #ef4444;
        background: #fef2f2;
    }

    .btn-favorite.active {
        color: #ef4444;
        background: #fef2f2;
    }

    .btn-favorite.active i {
        font-weight: 900;
    }

    .material-content {
        padding: 1rem;
    }

    .material-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .material-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .material-meta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    /* Difficulty Levels */
    .difficulty-pemula {
        color: #10b981 !important;
        background: #ecfdf5;
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
    }

    .difficulty-menengah {
        color: #f59e0b !important;
        background: #fffbeb;
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
    }

    .difficulty-lanjutan {
        color: #ef4444 !important;
        background: #fef2f2;
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
    }

    .material-footer {
        padding: 1rem;
        border-top: 1px solid var(--border-color);
    }

    .material-actions-grid {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .btn-block {
        width: 100%;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    @media (max-width: 480px) {
        .material-actions-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Quick Access Sidebar */
    .quick-access {
        position: fixed;
        top: 50%;
        right: -300px;
        transform: translateY(-50%);
        width: 300px;
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: 0.75rem 0 0 0.75rem;
        box-shadow: var(--shadow-lg);
        transition: right 0.3s ease;
        z-index: 100;
    }

    .quick-access.open {
        right: 0;
    }

    .quick-access-header {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border-radius: 0.75rem 0 0 0;
    }

    .quick-access-toggle {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 0.375rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quick-access-toggle:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .quick-access-content {
        padding: 1rem;
        max-height: 400px;
        overflow-y: auto;
    }

    .quick-section {
        margin-bottom: 1.5rem;
    }

    .quick-section h5 {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .empty-state {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-style: italic;
        text-align: center;
        padding: 1rem 0;
    }

    /* Modal */
    .modal-large .modal-content {
        max-width: 800px;
    }

    /* No Results */
    .no-results {
        padding: 3rem;
        text-align: center;
        background: var(--bg-white);
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
    }

    .no-results-content i {
        font-size: 3rem;
        color: var(--text-secondary);
        margin-bottom: 1rem;
    }

    .no-results-content h3 {
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .no-results-content p {
        color: var(--text-secondary);
        margin-bottom: 1.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header-content {
            flex-direction: column;
            align-items: stretch;
        }

        .search-controls {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .module-header {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }

        .module-actions {
            justify-content: flex-end;
        }

        .materials-grid {
            grid-template-columns: 1fr;
        }

        .grid-cols-md-4 {
            grid-template-columns: repeat(2, 1fr);
        }

        .quick-access {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .grid-cols-md-4 {
            grid-template-columns: 1fr;
        }

        .material-footer {
            flex-direction: column;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    let favorites = JSON.parse(localStorage.getItem('materialFavorites') || '[]');
    let recentAccess = JSON.parse(localStorage.getItem('materialRecent') || '[]');

    // Search and filter functionality
    function filterMaterials() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const typeFilter = document.getElementById('typeFilter').value;
        
        const materialCards = document.querySelectorAll('.material-card');
        const moduleSection = document.querySelectorAll('.module-section');
        
        let hasVisibleResults = false;
        
        moduleSection.forEach(module => {
            let hasVisibleCards = false;
            const cards = module.querySelectorAll('.material-card');
            
            cards.forEach(card => {
                const title = card.dataset.title;
                const description = card.dataset.description;
                const type = card.dataset.type;
                
                const matchesSearch = !searchTerm || title.includes(searchTerm) || description.includes(searchTerm);
                const matchesType = !typeFilter || type === typeFilter;
                
                if (matchesSearch && matchesType) {
                    card.style.display = 'block';
                    hasVisibleCards = true;
                    hasVisibleResults = true;
                } else {
                    card.style.display = 'none';
                }
            });
            
            module.style.display = hasVisibleCards ? 'block' : 'none';
        });
        
        document.getElementById('noResults').style.display = hasVisibleResults ? 'none' : 'block';
        document.querySelector('.materials-section').style.display = hasVisibleResults ? 'block' : 'none';
    }

    // Reset search
    function resetSearch() {
        document.getElementById('searchInput').value = '';
        document.getElementById('typeFilter').value = '';
        filterMaterials();
    }

    // Toggle module visibility
    function toggleModule(index) {
        const content = document.getElementById(`module-${index}`);
        const icon = document.getElementById(`toggle-${index}`);
        
        content.classList.toggle('collapsed');
        icon.classList.toggle('rotated');
    }

    // Toggle favorite
    function toggleFavorite(button) {
        const card = button.closest('.material-card');
        const title = card.querySelector('.material-title').textContent;
        const icon = button.querySelector('i');
        
        if (favorites.includes(title)) {
            favorites = favorites.filter(fav => fav !== title);
            icon.className = 'far fa-heart';
            button.classList.remove('active');
        } else {
            favorites.push(title);
            icon.className = 'fas fa-heart';
            button.classList.add('active');
        }
        
        localStorage.setItem('materialFavorites', JSON.stringify(favorites));
        updateQuickAccess();
    }

    // Track download
    function trackDownload(title) {
        // Add to recent access
        recentAccess = recentAccess.filter(item => item !== title);
        recentAccess.unshift(title);
        recentAccess = recentAccess.slice(0, 5); // Keep only last 5
        
        localStorage.setItem('materialRecent', JSON.stringify(recentAccess));
        updateQuickAccess();
    }

    // Preview material
    function previewMaterial(title, description, type) {
        document.getElementById('previewTitle').textContent = `Preview: ${title}`;
        
        const previewBody = document.getElementById('previewBody');
        previewBody.innerHTML = `
            <div class="preview-content">
                <div class="preview-header">
                    <div class="preview-type type-${type.toLowerCase()}">
                        ${type === 'PDF' ? '<i class="fas fa-file-pdf"></i>' : '<i class="fas fa-video"></i>'}
                        ${type}
                    </div>
                </div>
                <h3 class="preview-title">${title}</h3>
                <p class="preview-description">${description}</p>
                <div class="preview-info">
                    <div class="info-item">
                        <i class="fas fa-info-circle"></i>
                        <span>Materi ini disediakan melalui tautan eksternal</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Pastikan koneksi internet stabil untuk akses optimal</span>
                    </div>
                    ${type === 'Video' ? '<div class="info-item"><i class="fas fa-clock"></i><span>Durasi estimasi: 30-45 menit</span></div>' : ''}
                </div>
            </div>
            <style>
                .preview-content {
                    padding: 1rem 0;
                }
                .preview-header {
                    margin-bottom: 1rem;
                }
                .preview-type {
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                    padding: 0.5rem 1rem;
                    border-radius: 0.5rem;
                    font-weight: 600;
                    color: white;
                }
                .preview-title {
                    font-size: 1.25rem;
                    font-weight: 600;
                    margin-bottom: 1rem;
                    color: var(--text-primary);
                }
                .preview-description {
                    color: var(--text-secondary);
                    line-height: 1.6;
                    margin-bottom: 1.5rem;
                }
                .preview-info {
                    background: var(--bg-light);
                    padding: 1rem;
                    border-radius: 0.5rem;
                }
                .info-item {
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    margin-bottom: 0.5rem;
                    font-size: 0.875rem;
                    color: var(--text-secondary);
                }
                .info-item:last-child {
                    margin-bottom: 0;
                }
                .info-item i {
                    color: var(--primary-color);
                }
            </style>
        `;
        
        document.getElementById('previewModal').style.display = 'block';
    }

    // Close preview
    function closePreview() {
        document.getElementById('previewModal').style.display = 'none';
    }

    // Download module
    function downloadModule(moduleName) {
        alert(`Mengunduh semua materi dari ${moduleName}...\nFitur ini akan mengarahkan ke halaman unduhan batch.`);
    }

    // Download all materials
    function downloadAll() {
        alert('Mengunduh semua materi pelatihan...\nFitur ini akan mengarahkan ke halaman unduhan lengkap.');
    }

    // Toggle quick access
    function toggleQuickAccess() {
        const quickAccess = document.getElementById('quickAccess');
        quickAccess.classList.toggle('open');
        
        const icon = document.querySelector('.quick-access-toggle i');
        if (quickAccess.classList.contains('open')) {
            icon.className = 'fas fa-chevron-left';
        } else {
            icon.className = 'fas fa-chevron-right';
        }
    }

    // Update quick access content
    function updateQuickAccess() {
        // Update favorites
        const favoritesList = document.getElementById('favoritesList');
        if (favorites.length === 0) {
            favoritesList.innerHTML = '<p class="empty-state">Belum ada materi favorit</p>';
        } else {
            favoritesList.innerHTML = favorites.map(fav => 
                `<div class="quick-item">${fav}</div>`
            ).join('');
        }
        
        // Update recent access
        const recentList = document.getElementById('recentList');
        if (recentAccess.length === 0) {
            recentList.innerHTML = '<p class="empty-state">Belum ada aktivitas</p>';
        } else {
            recentList.innerHTML = recentAccess.map(item => 
                `<div class="quick-item">${item}</div>`
            ).join('');
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Search event listeners
        document.getElementById('searchInput').addEventListener('input', filterMaterials);
        document.getElementById('typeFilter').addEventListener('change', filterMaterials);
        
        // Initialize favorites
        favorites.forEach(title => {
            const cards = document.querySelectorAll('.material-card');
            cards.forEach(card => {
                const cardTitle = card.querySelector('.material-title').textContent;
                if (cardTitle === title) {
                    const button = card.querySelector('.btn-favorite');
                    const icon = button.querySelector('i');
                    icon.className = 'fas fa-heart';
                    button.classList.add('active');
                }
            });
        });
        
        // Update quick access
        updateQuickAccess();
        
        // Modal close on outside click
        document.getElementById('previewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePreview();
            }
        });
    });
</script>
@endpush