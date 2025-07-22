@extends('layouts.app')

@section('title', $tutorialData['title'])

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tutorial-detail.css') }}">
@endpush

@section('content')
<div class="progress-indicator">
    <div class="progress-bar" id="progressBar"></div>
</div>

<div class="tutorial-container">
    <div class="container">
        <!-- Header -->
        <div class="tutorial-header">
            <h1 class="tutorial-title">{{ $tutorialData['title'] }}</h1>
            <p class="tutorial-subtitle">{{ $tutorialData['subtitle'] }}</p>
            <p class="tutorial-description">{!! $tutorialData['description'] !!}</p>
            
            <div class="text-center mt-4">
                <a href="{{ route('pengolahan-peta') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Pengolahan Peta
                </a>
            </div>
        </div>
        
        <!-- Tutorial Sections -->
        @foreach($tutorialData['sections'] as $index => $section)
        <div class="section-card" data-section="{{ $index }}">
            <div class="section-header" onclick="toggleSection('{{ $section['id'] }}')">
                <h3 class="section-title">
                    <i class="{{ $section['icon'] }} section-icon"></i>
                    {{ $section['title'] }}
                    <i class="fas fa-chevron-down collapse-icon" id="icon-{{ $section['id'] }}"></i>
                </h3>
            </div>
            
            <div class="section-content" id="content-{{ $section['id'] }}">
                @foreach($section['steps'] as $step)
                <div class="step-item">
                    <div class="step-number">{{ $step['step'] }}</div>
                    <div class="step-content">
                        <h4 class="step-title">{{ $step['title'] }}</h4>
                        <div class="step-description">{!! $step['description'] !!}</div>
                        @if(isset($step['image']))
                        <div class="step-image mt-3">
                            <img src="{{ asset($step['image']) }}" alt="{{ $step['title'] }}" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                        </div>
                        @endif
                        @if($step['note'])
                        <div class="step-note">{!! $step['note'] !!}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        
        <!-- Footer -->
        {{-- <div class="text-center mt-4">
            <a href="{{ route('pengolahan-peta') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Pengolahan Peta
            </a>
        </div> --}}
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/tutorial-detail.js') }}"></script>
@endpush