@extends('layouts.app')

@section('title', 'Jadwal Pelatihan - Pelatihan Pengolahan Wilkerstat SE2026')

@section('content')
<!-- Page Header -->
<div class="page-header mb-8">
    <div class="page-header-content">
        <div class="page-title-section">
            <h1 class="page-title">
                <i class="fas fa-calendar-alt"></i>
                Jadwal Pelatihan
            </h1>
            <p class="page-subtitle">
                Jadwal Pelatihan Petugas Pengolahan Wilkerstat SE2026 - Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat.
            </p>
        </div>
        <div class="page-actions">
            <button class="btn btn-secondary" onclick="exportSchedule()">
                <i class="fas fa-download"></i>
                Ekspor Jadwal
            </button>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-section mb-6">
    <div class="filter-card">
        <h3 class="filter-title">
            <i class="fas fa-filter"></i>
            Filter Jadwal
        </h3>
        <div class="filter-controls">
            <div class="filter-group">
                <label for="dateFilter">Tanggal:</label>
                <select id="dateFilter" class="filter-select">
                    <option value="">Semua Tanggal</option>
                    <option value="2025-07-25">25 Juli 2025</option>
                    <option value="2025-07-28">28 Juli 2025</option>
                    <option value="2025-07-29">29 Juli 2025</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sessionFilter">Sesi:</label>
                <input type="text" id="sessionFilter" class="filter-input" placeholder="Cari sesi...">
            </div>
            <div class="filter-group">
                <label for="materialFilter">Tipe Pembelajaran:</label>
                <select id="materialFilter" class="filter-select">
                    <option value="">Semua Tipe</option>
                    <option value="Pembelajaran Mandiri">Pembelajaran Mandiri</option>
                    <option value="Pembelajaran Daring">Pembelajaran Daring</option>
                    <option value="Pembelajaran Tatap Muka">Pembelajaran Tatap Muka</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="btn btn-primary" onclick="resetFilters()">
                    <i class="fas fa-refresh"></i>
                    Reset
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Table -->
<div class="schedule-section">
    <div class="schedule-card">
        <div class="schedule-header">
            <h3 class="schedule-title">
                <i class="fas fa-table"></i>
                Jadwal Pelatihan Lengkap
            </h3>
            <div class="schedule-info">
                <span class="total-sessions">Total: <span id="sessionCount">{{ count($schedules) }}</span> Sesi</span>
            </div>
        </div>
        
        <div class="table-container">
            <table class="schedule-table" id="scheduleTable">
                <thead>
                    <tr>
                        <th class="sortable" data-sort="date">
                            <i class="fas fa-calendar"></i>
                            Hari/Tanggal
                            <span class="sort-icon"><i class="fas fa-sort"></i></span>
                        </th>
                        <th class="sortable" data-sort="time">
                            <i class="fas fa-clock"></i>
                            Waktu/Sesi
                            <span class="sort-icon"><i class="fas fa-sort"></i></span>
                        </th>
                        <th class="sortable" data-sort="material">
                            <i class="fas fa-book"></i>
                            Materi
                            <span class="sort-icon"><i class="fas fa-sort"></i></span>
                        </th>
                        <th>
                            <i class="fas fa-cog"></i>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $previousDay = null;
                    @endphp
                    @foreach($schedules as $index => $schedule)
                    <tr class="schedule-row" data-date="{{ $schedule['date'] }}" data-session="{{ strtolower($schedule['session']) }}" data-material="{{ $schedule['material'] }}" data-type="{{ $schedule['type'] }}">
                        <td class="date-cell">
                            <div class="date-display">
                                @if($previousDay !== $schedule['day'])
                                    <div class="date-day">{{ $schedule['day'] }}</div>
                                    <div class="date-month">{{ \Carbon\Carbon::parse($schedule['date'])->format('d M Y') }}</div>
                                    <span class="type-badge type-{{ strtolower(str_replace(' ', '-', $schedule['type'])) }}">
                                        {{ $schedule['type'] }}
                                    </span>
                                    @php $previousDay = $schedule['day']; @endphp
                                @endif
                            </div>
                        </td>
                        <td class="time-session-cell">
                            <div class="time-session-display">
                                <div class="time-info">
                                    <i class="fas fa-clock"></i>
                                    {{ $schedule['time'] }}
                                </div>
                                <div class="session-info">
                                    <span class="session-badge">{{ $schedule['session'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="material-cell">
                            <div class="material-content">
                                <i class="fas fa-book-open"></i>
                                <span class="material-text">{{ $schedule['material'] }}</span>
                            </div>
                        </td>
                        <td class="action-cell">
                            <div class="action-buttons">
                                <button class="btn-action btn-info" onclick="showDetails({{ $index }})" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <a href="{{ route('materials') }}" class="btn-action btn-primary" title="Materi">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="no-results" id="noResults" style="display: none;">
            <div class="no-results-content">
                <i class="fas fa-search"></i>
                <h3>Tidak ada hasil ditemukan</h3>
                <p>Coba ubah filter pencarian Anda</p>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Summary -->
{{-- <div class="summary-section mt-8">
    <div class="grid grid-cols-1 grid-cols-md-4">
        <div class="summary-card">
            <div class="summary-icon">
                <i class="fas fa-calendar-week"></i>
            </div>
            <div class="summary-content">
                <div class="summary-number">3</div>
                <div class="summary-label">Hari Pelatihan</div>
            </div>
        </div>
        
        <div class="summary-card">
            <div class="summary-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="summary-content">
                <div class="summary-number">{{ count($schedules) }}</div>
                <div class="summary-label">Total Sesi</div>
            </div>
        </div>
        
        <div class="summary-card">
            <div class="summary-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="summary-content">
                <div class="summary-number">{{ collect($schedules)->pluck('material')->unique()->count() }}</div>
                <div class="summary-label">Materi</div>
            </div>
        </div>
        
        <div class="summary-card">
            <div class="summary-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="summary-content">
                <div class="summary-number">{{ collect($schedules)->pluck('type')->unique()->count() }}</div>
                <div class="summary-label">Tipe Pembelajaran</div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Detail Modal -->
<div class="modal" id="detailModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Detail Sesi Pelatihan</h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Content will be populated by JavaScript -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal()">Tutup</button>
            <a href="{{ route('materials') }}" class="btn btn-primary">
                <i class="fas fa-download"></i>
                Lihat Materi
            </a>
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

    /* Filter Section */
    .filter-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .filter-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-controls {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        align-items: end;
    }

    .filter-group label {
        display: block;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .filter-select,
    .filter-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .filter-select:focus,
    .filter-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Schedule Table */
    .schedule-card {
        background: var(--bg-white);
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    .schedule-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .schedule-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .total-sessions {
        font-size: 0.875rem;
        color: var(--text-secondary);
        background: var(--bg-light);
        padding: 0.5rem 1rem;
        border-radius: 9999px;
    }

    .table-container {
        overflow-x: auto;
    }

    .schedule-table {
        width: 100%;
        border-collapse: collapse;
    }

    .schedule-table th {
        background: var(--bg-light);
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: var(--text-primary);
        border-bottom: 1px solid var(--border-color);
        white-space: nowrap;
        position: relative;
    }

    .schedule-table th.sortable {
        cursor: pointer;
        user-select: none;
    }

    .schedule-table th.sortable:hover {
        background: #e5e7eb;
    }

    .sort-icon {
        margin-left: 0.5rem;
        opacity: 0.5;
        transition: all 0.3s ease;
    }

    .schedule-table th.sortable:hover .sort-icon {
        opacity: 1;
    }

    .schedule-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        vertical-align: top;
    }

    .schedule-row:hover {
        background: var(--bg-light);
    }

    /* Table Cell Styles */
    .date-display {
        text-align: center;
    }

    .date-day {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        line-height: 1;
    }

    .date-month {
        font-size: 0.75rem;
        color: var(--text-secondary);
        text-transform: uppercase;
        font-weight: 500;
    }

    .date-weekday {
        font-size: 0.75rem;
        color: var(--text-secondary);
        text-transform: capitalize;
    }

    .time-display {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        color: var(--text-primary);
    }

    .session-info {
        min-width: 200px;
    }

    .session-title {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        line-height: 1.4;
    }

    .session-number {
        font-size: 0.75rem;
        color: var(--text-secondary);
        background: var(--bg-light);
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        display: inline-block;
    }

    .material-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .instructor-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        color: var(--text-primary);
    }

    .action-buttons {
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
        text-decoration: none;
        font-size: 0.875rem;
    }

    .btn-action.btn-info {
        background: #3b82f6;
        color: white;
    }

    .btn-action.btn-primary {
        background: var(--accent-color);
        color: white;
    }

    .btn-action:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-md);
    }

    /* Summary Cards */
    .summary-card {
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

    .summary-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .summary-icon {
        width: 60px;
        height: 60px;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .summary-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1;
    }

    .summary-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    /* No Results */
    .no-results {
        padding: 3rem;
        text-align: center;
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
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        backdrop-filter: blur(4px);
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: var(--bg-white);
        border-radius: 0.75rem;
        max-width: 500px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        box-shadow: var(--shadow-lg);
    }

    .modal-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.25rem;
        color: var(--text-secondary);
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        background: var(--bg-light);
        color: var(--text-primary);
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        padding: 1.5rem;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header-content {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-controls {
            grid-template-columns: 1fr;
        }

        .schedule-table {
            font-size: 0.875rem;
        }

        .schedule-table th,
        .schedule-table td {
            padding: 0.75rem 0.5rem;
        }

        .session-info {
            min-width: auto;
        }

        .grid-cols-md-3 {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    const schedules = @json($schedules);
    let currentSort = { column: null, direction: 'asc' };

    // Filter functionality
    function filterTable() {
        const dateFilter = document.getElementById('dateFilter').value;
        const sessionFilter = document.getElementById('sessionFilter').value.toLowerCase();
        const materialFilter = document.getElementById('materialFilter').value;
        
        const rows = document.querySelectorAll('.schedule-row');
        let visibleCount = 0;
        
        rows.forEach(row => {
            const date = row.dataset.date;
            const session = row.dataset.session;
            const material = row.dataset.material;
            const type = row.dataset.type;
            
            const dateMatch = !dateFilter || date === dateFilter;
            const sessionMatch = !sessionFilter || session.includes(sessionFilter);
            const materialMatch = !materialFilter || type.includes(materialFilter);
            
            if (dateMatch && sessionMatch && materialMatch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        document.getElementById('sessionCount').textContent = visibleCount;
        document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
        document.querySelector('.table-container').style.display = visibleCount === 0 ? 'none' : 'block';
    }

    // Reset filters
    function resetFilters() {
        document.getElementById('dateFilter').value = '';
        document.getElementById('sessionFilter').value = '';
        document.getElementById('materialFilter').value = '';
        filterTable();
    }

    // Sort functionality
    function sortTable(column) {
        const tbody = document.querySelector('.schedule-table tbody');
        const rows = Array.from(tbody.querySelectorAll('.schedule-row'));
        
        if (currentSort.column === column) {
            currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort.column = column;
            currentSort.direction = 'asc';
        }
        
        rows.sort((a, b) => {
            let aVal, bVal;
            
            switch (column) {
                case 'date':
                    aVal = a.dataset.date;
                    bVal = b.dataset.date;
                    break;
                case 'time':
                    aVal = a.querySelector('.time-display').textContent.trim();
                    bVal = b.querySelector('.time-display').textContent.trim();
                    break;
                case 'material':
                    aVal = a.querySelector('.material-text').textContent.trim();
                    bVal = b.querySelector('.material-text').textContent.trim();
                    break;
            }
            
            if (currentSort.direction === 'asc') {
                return aVal.localeCompare(bVal);
            } else {
                return bVal.localeCompare(aVal);
            }
        });
        
        // Update sort icons
        document.querySelectorAll('.sort-icon').forEach(icon => {
            icon.className = 'fas fa-sort sort-icon';
        });
        
        const currentHeader = document.querySelector(`[data-sort="${column}"] .sort-icon`);
        if (currentSort.direction === 'asc') {
            currentHeader.className = 'fas fa-sort-up sort-icon';
        } else {
            currentHeader.className = 'fas fa-sort-down sort-icon';
        }
        
        // Reorder rows
        rows.forEach(row => tbody.appendChild(row));
    }

    // Show details modal
    function showDetails(index) {
        const schedule = schedules[index];
        const modalBody = document.getElementById('modalBody');
        
        modalBody.innerHTML = `
            <div class="detail-grid">
                <div class="detail-item">
                    <label><i class="fas fa-calendar"></i> Hari/Tanggal:</label>
                    <span>${schedule.day}, ${new Date(schedule.date).toLocaleDateString('id-ID', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                    })}</span>
                </div>
                <div class="detail-item">
                    <label><i class="fas fa-graduation-cap"></i> Tipe Pembelajaran:</label>
                    <span>${schedule.type}</span>
                </div>
                <div class="detail-item">
                    <label><i class="fas fa-clock"></i> Waktu:</label>
                    <span>${schedule.time}</span>
                </div>
                <div class="detail-item">
                    <label><i class="fas fa-chalkboard-teacher"></i> Sesi:</label>
                    <span>${schedule.session}</span>
                </div>
                <div class="detail-item">
                    <label><i class="fas fa-book"></i> Materi:</label>
                    <span>${schedule.material}</span>
                </div>

            </div>
            <style>
                .detail-grid {
                    display: grid;
                    gap: 1rem;
                }
                .detail-item {
                    display: grid;
                    grid-template-columns: 140px 1fr;
                    gap: 1rem;
                    align-items: center;
                }
                .detail-item label {
                    font-weight: 600;
                    color: var(--text-primary);
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                .detail-item span {
                    color: var(--text-secondary);
                }
            </style>
        `;
        
        document.getElementById('detailModal').style.display = 'block';
    }

    // Close modal
    function closeModal() {
        document.getElementById('detailModal').style.display = 'none';
    }

    // Export schedule
    function exportSchedule() {
        // Simple CSV export
        let csv = 'Hari,Tanggal,Tipe Pembelajaran,Waktu,Sesi,Materi\n';
        
        schedules.forEach(schedule => {
            csv += `"${schedule.day}","${schedule.date}","${schedule.type}","${schedule.time}","${schedule.session}","${schedule.material}"\n`;
        });
        
        const blob = new Blob([csv], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'jadwal-pelatihan-wilkerstat.csv';
        a.click();
        window.URL.revokeObjectURL(url);
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Filter event listeners
        document.getElementById('dateFilter').addEventListener('change', filterTable);
        document.getElementById('sessionFilter').addEventListener('input', filterTable);
        document.getElementById('materialFilter').addEventListener('change', filterTable);
        
        // Sort event listeners
        document.querySelectorAll('.sortable').forEach(header => {
            header.addEventListener('click', () => {
                sortTable(header.dataset.sort);
            });
        });
        
        // Modal close on outside click
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    });
</script>
@endpush