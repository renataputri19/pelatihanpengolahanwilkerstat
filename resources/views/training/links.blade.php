@extends('layouts.app')

@section('title', $linksData['title'])

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
                    <h1 class="modern-page-title">{{ $linksData['title'] }}</h1>
                    <p class="modern-page-subtitle">{{ $linksData['subtitle'] }}</p>
                    <p class="modern-page-description">{{ $linksData['description'] }}</p>
                </div>
                <div class="col-lg-4">
                    <div class="modern-material-info mt-4">
                        <div class="modern-info-badges">
                            <div class="modern-info-badge">
                                <i class="fas fa-link"></i>
                                <span>{{ count($linksData['links']) }} Links</span>
                            </div>
                            <div class="modern-info-badge">
                                <i class="fas fa-clock"></i>
                                <span>Akses Cepat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Links Grid Section -->
    <div class="container mt-8">
        <div class="row">
            <div class="col-12">
                <div class="links-grid">
                    @foreach($linksData['links'] as $link)
                    <div class="link-card" data-category="{{ $link['category'] }}">
                        <div class="link-card-header">
                            <div class="link-icon {{ $link['color'] }}">
                                <i class="{{ $link['icon'] }}"></i>
                            </div>
                            <div class="link-category">{{ ucfirst($link['category']) }}</div>
                        </div>
                        <div class="link-card-body">
                            <h3 class="link-title">{{ $link['title'] }}</h3>
                            <p class="link-description">{{ $link['description'] }}</p>
                        </div>
                        <div class="link-card-footer">
                            @if($link['url'] === '#')
                                <button class="modern-btn modern-btn-{{ $link['color'] }} disabled" disabled>
                                    <i class="{{ $link['icon'] }}"></i>
                                    <span>Coming Soon</span>
                                </button>
                            @else
                                <a href="{{ $link['url'] }}" class="modern-btn modern-btn-{{ $link['color'] }}" target="_blank">
                                    <i class="{{ $link['icon'] }}"></i>
                                    <span>Akses Link</span>
                                    <i class="fas fa-external-link-alt ml-2"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="container mt-8">
        <div class="row">
            <div class="col-12">
                <div class="quick-actions-section">
                    <h2 class="section-title text-center mb-6">
                        <i class="fas fa-bolt"></i>
                        Aksi Cepat
                    </h2>
                    <div class="quick-actions-grid">
                        <a href="{{ route('schedule') }}" class="quick-action-card">
                            <div class="quick-action-icon schedule">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h3 class="quick-action-title">Jadwal Pelatihan</h3>
                            <p class="quick-action-description">Lihat jadwal lengkap pelatihan</p>
                        </a>
                        
                        <a href="{{ route('materials') }}" class="quick-action-card">
                            <div class="quick-action-icon materials">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h3 class="quick-action-title">Materi Pelatihan</h3>
                            <p class="quick-action-description">Akses semua materi pembelajaran</p>
                        </a>
                        
                        <a href="{{ route('about') }}" class="quick-action-card">
                            <div class="quick-action-icon about">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h3 class="quick-action-title">Tentang Pelatihan</h3>
                            <p class="quick-action-description">Informasi lengkap pelatihan</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Training Button -->
    <div class="container mt-6 mb-8">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}" class="modern-btn modern-btn-outline modern-btn-lg">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/training-modern.js') }}"></script>
<script>
// Additional links page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects and animations
    const linkCards = document.querySelectorAll('.link-card');
    
    linkCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
        });
    });
    
    // Add category filtering if needed in the future
    const categories = [...new Set(Array.from(linkCards).map(card => card.dataset.category))];
    console.log('Available categories:', categories);
});
</script>

<style>
/* CSS Variables for consistent theming */
:root {
    --primary-500: #3b82f6;
    --primary-600: #2563eb;
    --info-500: #06b6d4;
    --success-500: #10b981;
    --warning-500: #f59e0b;
    --danger-500: #ef4444;
    --gray-500: #6b7280;
    --gray-600: #4b5563;
    --gray-800: #1f2937;
    --gray-900: #111827;
}

/* Links Page Specific Styles */
.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.link-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.link-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-500), var(--primary-600));
}

.link-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.link-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
}

.link-icon.primary { background: var(--primary-500); }
.link-icon.info { background: var(--info-500); }
.link-icon.success { background: var(--success-500); }
.link-icon.warning { background: var(--warning-500); }
.link-icon.purple { background: #8b5cf6; }
.link-icon.secondary { background: var(--gray-500); }
.link-icon.dark { background: var(--gray-800); }
.link-icon.danger { background: var(--danger-500); }

.link-category {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    color: var(--gray-500);
    letter-spacing: 0.05em;
}

.link-card-body {
    margin-bottom: 1.5rem;
}

.link-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 0.5rem;
}

.link-description {
    color: var(--gray-600);
    font-size: 0.875rem;
    line-height: 1.5;
    margin: 0;
}

.link-card-footer {
    margin-top: auto;
}

.modern-btn.disabled {
    opacity: 0.6;
    cursor: not-allowed;
    pointer-events: none;
}

/* Quick Actions Section */
.quick-actions-section {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 1rem;
    padding: 3rem 2rem;
    margin-bottom: 2rem;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.quick-action-card {
    background: white;
    border-radius: 0.75rem;
    padding: 1.5rem;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.quick-action-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    text-decoration: none;
    color: inherit;
}

.quick-action-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    margin-bottom: 1rem;
}

.quick-action-icon.schedule { background: var(--primary-500); }
.quick-action-icon.materials { background: var(--success-500); }
.quick-action-icon.about { background: var(--info-500); }

.quick-action-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--gray-900);
    margin-bottom: 0.5rem;
}

.quick-action-description {
    color: var(--gray-600);
    font-size: 0.875rem;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .links-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .quick-actions-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .quick-actions-section {
        padding: 2rem 1rem;
    }
}
</style>
@endsection