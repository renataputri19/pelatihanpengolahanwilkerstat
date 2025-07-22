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
            <p class="tutorial-description">{{ $tutorialData['description'] }}</p>
            
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
                @if(isset($section['subsections']))
                    <!-- Section with subsections (3-level hierarchy) -->
                    @foreach($section['subsections'] as $subsection)
                        <div class="subsection-item">
                            <h4 class="subsection-header">{{ $subsection['title'] }}</h4>
                            <div class="subsection-content">
                                @foreach($subsection['steps'] as $step)
                                    <div class="step-item">
                                        <div class="step-number">{{ $step['step'] }}</div>
                                        <div class="step-content">
                                            <h5 class="step-title">{{ $step['title'] }}</h5>
                                            <div class="step-description">{!! $step['description'] !!}</div>
                                            @if(isset($step['image']))
                                            <div class="step-image mt-3">
                                                <img src="{{ asset($step['image']) }}" alt="{{ $step['title'] }}" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                                            </div>
                                            @endif
                                            @if(isset($step['images']))
                                            <div class="step-images mt-3">
                                                @foreach($step['images'] as $image)
                                                <div class="step-image mb-2">
                                                    <img src="{{ asset($image) }}" alt="{{ $step['title'] }}" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                            @if(isset($step['note']) && $step['note'])
                                            <div class="step-note">{!! $step['note'] !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Section with regular steps (2-level hierarchy) -->
                    @foreach($section['steps'] as $step)
                        @if(isset($step['subsections']))
                            <!-- Subsection with nested steps -->
                            <div class="subsection-item">
                                <h4 class="subsection-header">{{ $step['step'] }}. {{ $step['title'] }}</h4>
                                <div class="subsection-content">
                                    @foreach($step['subsections'] as $subsection)
                                        <div class="subsection-item">
                                            <h5 class="subsection-header">{{ $subsection['step'] }}</h5>
                                            <div class="subsection-content">
                                                @foreach($subsection['steps'] as $nestedStep)
                                                    <div class="nested-step-item">
                                                        <div class="nested-step-number">{{ $nestedStep['step'] }}</div>
                                                        <div class="nested-step-content">
                                                            <h6 class="nested-step-title">{{ $nestedStep['title'] }}</h6>
                                                            <div class="nested-step-description">{!! $nestedStep['description'] !!}</div>
                                                            @if(isset($nestedStep['image']))
                                                            <div class="nested-step-image mt-2">
                                                                <img src="{{ asset($nestedStep['image']) }}" alt="{{ $nestedStep['title'] }}" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                                                            </div>
                                                            @endif
                                                            @if(isset($nestedStep['note']) && $nestedStep['note'])
                                                            <div class="nested-step-note">{!! $nestedStep['note'] !!}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Regular step -->
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
                                    @if(isset($step['note']) && $step['note'])
                                    <div class="step-note">{!! $step['note'] !!}</div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
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

@push('scripts')
<script src="{{ asset('js/tutorial-detail.js') }}"></script>
@endpush
@endsection