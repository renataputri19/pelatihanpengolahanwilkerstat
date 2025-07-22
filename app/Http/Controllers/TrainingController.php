<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        return view('training.index');
    }

    /**
     * Display training schedule
     */
    public function schedule()
    {
        // Jadwal Pelatihan Petugas Pengolahan Wilkerstat SE2026
        // Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat
        $schedules = [
            // Jumat, 25 Juli 2025 - Pembelajaran Mandiri
            [
                'date' => '2025-07-25',
                'day' => 'Jumat',
                'type' => 'Pembelajaran Mandiri',
                'time' => '08:00–16:00',
                'session' => 'MOOC',
                'material' => 'Calon Petugas mempelajari secara mandiri seluruh bahan pelatihan (buku pedoman, bahan ajar, video pembelajaran). Calon Petugas mengumpulkan tugas MOOC.',
                'class_type' => 'Mandiri',
                'jp' => '3',
                'instructor' => '-'
            ],
            
            // Senin, 28 Juli 2025 - Pembelajaran Daring (8 JP)
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '08:00–08:15',
                'session' => '-',
                'material' => 'Pre-test',
                'class_type' => 'Kelas',
                'jp' => '-',
                'instructor' => 'Admin'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '08:15–09:00',
                'session' => 'Sesi 1',
                'material' => 'Organisasi Pengolahan: Pendahuluan, latar belakang, maksud dan tujuan, landasan hukum. Jenis instrumen dan perangkat, jadwal kegiatan. Admin BPS Kabupaten/Kota, Petugas Pengolahan',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '09:00–09:45',
                'session' => 'Sesi 2',
                'material' => 'Mekanisme Pengolahan Muatan SLS: Mekanisme pengolahan secara umum. Master Wilkerstat dan Muatan SLS',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '09:45–10:00',
                'session' => '-',
                'material' => 'Istirahat',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => '-'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '10:00–10:45',
                'session' => 'Sesi 3',
                'material' => 'Mekanisme Pengolahan Peta',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '10:45–12:15',
                'session' => 'Sesi 4',
                'material' => 'Aplikasi SiPW: Pengenalan Aplikasi, Persiapan dan Sinkronisasi dengan FRS, Assign Petugas, Cetak Dokumen. Tata Cara Entri Dokumen SE2026-WILKERSTAT.RS',
                'class_type' => 'Kelas',
                'jp' => '2',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '12:15–13:00',
                'session' => '-',
                'material' => 'ISHOMA',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => '-'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '13:00–13:45',
                'session' => 'Sesi 5',
                'material' => 'Pengolahan Peta: Alat dan bahan, Penyiapan pengolahan peta, Penyiapan bahan',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '13:45–14:30',
                'session' => 'Sesi 6',
                'material' => 'Pengolahan Peta (Lanjutan): Georeferensi peta',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '14:30–15:15',
                'session' => 'Sesi 7',
                'material' => 'Pengolahan Peta (Lanjutan): Editing peta digital (Menggabungkan Poligon dan Memotong Poligon), Cleaning dan validasi',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-28',
                'day' => 'Senin',
                'type' => 'Pembelajaran Daring (8 JP)',
                'time' => '15:15–16:00',
                'session' => '-',
                'material' => 'Asynchronous 1: Tugas terkait pengolahan muatan',
                'class_type' => 'Kelas',
                'jp' => '-',
                'instructor' => 'Admin'
            ],
            
            // Selasa, 29 Juli 2025 - Pembelajaran Tatap Muka (Luring, 8 JP)
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '07:30–07:45',
                'session' => '-',
                'material' => 'Registrasi',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => 'Panitia'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '07:45–08:00',
                'session' => '-',
                'material' => 'Pembukaan',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => 'Kepala BPS Kabupaten/Kota'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '08:00–08:45',
                'session' => 'Sesi 8',
                'material' => 'Pengolahan Peta (Lanjutan): Dissolving',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '08:45–10:15',
                'session' => 'Sesi 9',
                'material' => 'Praktik Penggunaan Aplikasi SiPW',
                'class_type' => 'Kelas',
                'jp' => '2',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '10:15–10:30',
                'session' => '-',
                'material' => 'Istirahat',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => '-'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '10:30–11:15',
                'session' => 'Sesi 10',
                'material' => 'Praktik Penggunaan Aplikasi SiPW (Lanjutan)',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '11:15–12:00',
                'session' => 'Sesi 11',
                'material' => 'Praktik Pengolahan Peta: Praktik editing peta digital',
                'class_type' => 'Kelas',
                'jp' => '1',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '12:00–13:00',
                'session' => '-',
                'material' => 'ISHOMA',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => '-'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '13:00–15:15',
                'session' => 'Sesi 12',
                'material' => 'Praktik Pengolahan Peta (Lanjutan): Praktik editing peta digital',
                'class_type' => 'Kelas',
                'jp' => '3',
                'instructor' => 'Inda'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '15:15–15:30',
                'session' => '-',
                'material' => 'Istirahat',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => '-'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '15:30–16:15',
                'session' => '-',
                'material' => 'Asynchronous: Tugas terkait pengolahan peta',
                'class_type' => 'Kelas',
                'jp' => '-',
                'instructor' => 'Admin'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '16:15–16:30',
                'session' => '-',
                'material' => 'Post Test',
                'class_type' => '-',
                'jp' => '-',
                'instructor' => 'Admin'
            ],
            [
                'date' => '2025-07-29',
                'day' => 'Selasa',
                'type' => 'Pembelajaran Tatap Muka (Luring, 8 JP)',
                'time' => '16:30–17:00',
                'session' => '-',
                'material' => 'Penegasan dan Penutupan Pelatihan',
                'class_type' => 'Pleno',
                'jp' => '-',
                'instructor' => 'Kepala BPS Kabupaten/Kota'
            ]
        ];

        return view('training.schedule', compact('schedules'));
    }

    /**
     * Display training materials
     */
    public function materials()
    {
        // Get actual materials from bahanajar folder
        $bahanAjarPath = public_path('bahanajar');
        $availableFiles = [];
        
        if (is_dir($bahanAjarPath)) {
            $files = scandir($bahanAjarPath);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    $availableFiles[] = [
                        'filename' => $file,
                        'title' => $this->formatFileName($file),
                        'path' => asset('bahanajar/' . $file),
                        'size' => $this->formatFileSize(filesize($bahanAjarPath . '/' . $file))
                    ];
                }
            }
        }
        
        // Organize materials by category based on content
        $materials = [
            'Materi Dasar Pengolahan' => [
                [
                    'title' => '01 Pendahuluan Wilkerstat SE2026',
                    'type' => 'PDF',
                    'link' => asset('bahanajar/01 Pendahuluan.pdf'),
                    'description' => 'Latar belakang pemutakhiran SLS, maksud dan tujuan kegiatan, landasan hukum, jenis instrumen dan perangkat, serta jadwal kegiatan SE2026.',
                    'category' => 'fundamental',
                    'duration' => '45 menit',
                    'difficulty' => 'Pemula',
                    'preview_link' => route('pendahuluan'),
                    'detailed_content' => [
                        'latar_belakang' => [
                            'title' => 'Latar Belakang',
                            'content' => [
                                'Satuan Lingkungan Setempat (SLS) adalah wilayah di bawah desa/kelurahan yang memiliki ketua dan pengurus yang telah operasional dan diakui oleh pemerintah desa/kelurahan.',
                                'Tantangan utama SLS adalah sifatnya yang sangat dinamis, sehingga memerlukan pemutakhiran sebelum pelaksanaan Sensus Ekonomi 2026 (SE2026).',
                                'Kegiatan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026 dilakukan pada tahun 2025 dengan dua tahapan:'
                            ],
                            'tahapan' => [
                                'lapangan' => [
                                    'title' => 'Kegiatan Lapangan',
                                    'items' => [
                                        'Pemutakhiran peta dan SLS',
                                        'Geotagging batas SLS dan kawasan ekonomi',
                                        'Pembentukan sub-SLS'
                                    ]
                                ],
                                'pengolahan' => [
                                    'title' => 'Kegiatan Pengolahan',
                                    'items' => [
                                        'Pengolahan master dan muatan SLS',
                                        'Pengolahan peta wilkerstat hasil kegiatan lapangan'
                                    ]
                                ]
                            ],
                            'kesimpulan' => 'Latar belakang menjelaskan pentingnya pemutakhiran SLS karena sifatnya yang dinamis, dengan kegiatan SE2026 yang terdiri dari tahapan lapangan (pemutakhiran peta, geotagging, pembentukan sub-SLS) dan pengolahan (master, muatan, dan peta wilkerstat) untuk mendukung Sensus Ekonomi 2026.'
                        ],
                        'maksud_tujuan' => [
                            'title' => 'Maksud dan Tujuan',
                            'content' => [
                                'Mendapatkan muatan wilkerstat yang seragam dan mutakhir',
                                'Mendapatkan kerangka geospasial yang mutakhir',
                                'Mendapatkan informasi mengenai wilayah konsentrasi ekonomi'
                            ],
                            'kesimpulan' => 'Tujuan kegiatan adalah menghasilkan data wilkerstat dan kerangka geospasial yang terbaru dan konsisten, serta informasi tentang wilayah konsentrasi ekonomi untuk mendukung pelaksanaan SE2026.'
                        ],
                        'landasan_hukum' => [
                            'title' => 'Landasan Hukum',
                            'content' => 'Dokumen tidak memberikan rincian spesifik tentang landasan hukum, tetapi menyebutkan bahwa kegiatan ini memiliki dasar hukum yang mendukung pelaksanaan pemutakhiran wilkerstat.',
                            'kesimpulan' => 'Landasan hukum menjadi dasar formal untuk pelaksanaan kegiatan pemutakhiran, meskipun detail spesifik tidak diuraikan dalam dokumen.'
                        ],
                        'instrumen_perangkat' => [
                            'title' => 'Jenis Instrumen dan Perangkat',
                            'pengolahan_master' => [
                                'title' => 'Instrumen Pengolahan Master dan Muatan SLS',
                                'items' => [
                                    'Daftar Perubahan SLS (Daftar PSLS): Berisi informasi SLS yang mengalami perubahan dari hasil pemutakhiran di lapangan',
                                    'SE2026-WILKERSTAT.RS: Daftar Rekap SLS hasil pemutakhiran, memuat informasi muatan tiap SLS/Non-SLS per desa/kelurahan',
                                    'Aplikasi Frame Register: Digunakan untuk pengelolaan data SLS'
                                ]
                            ],
                            'pengolahan_peta' => [
                                'title' => 'Instrumen Pengolahan Peta',
                                'items' => [
                                    'Peta digital SLS kondisi terbaru: Dapat diunduh dari Geospatial System (GS) di https://dataspasial.bps.go.id/gs (periode 2024.1) atau versi terbaru dari BPS Kabupaten/Kota',
                                    'Geotagging batas SLS: Melalui https://wilkerstat.bps.go.id untuk informasi lokasi dan perubahan batas SLS',
                                    'Peta WS hasil pemutakhiran di lapangan: Memberikan informasi perbaikan batas SLS',
                                    'Lembar Kerja Peta (LK-Peta): Hasil penggambaran sketsa peta untuk di-scan',
                                    'Master SLS Snapshot Tahun 2025 Semester 1: Data dasar untuk pemutakhiran'
                                ]
                            ],
                            'software_aplikasi' => [
                                'title' => 'Software dan Aplikasi',
                                'items' => [
                                    'QGIS: Digunakan untuk editing peta digital',
                                    'Geospatial System (GS): Untuk pengiriman, validasi, dan penyimpanan peta digital hasil kegiatan',
                                    'Aplikasi pendukung lainnya: Alat bantu untuk pemrosesan dan pengolahan peta, tersedia untuk diunduh gratis'
                                ]
                            ],
                            'kesimpulan' => 'Instrumen dan perangkat mencakup dokumen (Daftar PSLS, SE2026-WILKERSTAT.RS, LK-Peta), aplikasi (Frame Register, GS), dan software (QGIS) untuk mendukung pengolahan master, muatan SLS, dan peta wilkerstat, dengan akses ke data terbaru melalui platform online.'
                        ],
                        'jadwal_kegiatan' => [
                            'title' => 'Jadwal Kegiatan',
                            'content' => 'Dokumen menyebutkan adanya jadwal kegiatan untuk tahun 2025, tetapi tidak memberikan rincian spesifik dalam teks yang tersedia.',
                            'kesimpulan' => 'Jadwal kegiatan disusun untuk mengatur pelaksanaan pemutakhiran wilkerstat pada tahun 2025, meskipun detailnya tidak diuraikan dalam dokumen ini.'
                        ]
                    ]
                ],
                [
                    'title' => 'Organisasi Pengolahan',
                    'type' => 'PDF',
                    'link' => asset('bahanajar/02 Organisasi Pengolahan.pdf'),
                    'description' => 'Struktur organisasi dan pembagian tugas dalam pengolahan data Wilkerstat.',
                    'category' => 'fundamental',
                    'duration' => '45 menit',
                    'difficulty' => 'Menengah',
                    'preview_link' => route('organisasi-pengolahan')
                ]
            ],
            'Mekanisme dan Prosedur' => [
                [
                    'title' => 'Mekanisme Pengolahan',
                    'type' => 'PDF',
                    'link' => asset('bahanajar/03 Mekanisme Pengolahan.pdf'),
                    'description' => 'Prosedur dan mekanisme pengolahan data secara sistematis dan terstruktur.',
                    'category' => 'procedure',
                    'duration' => '60 menit',
                    'difficulty' => 'Menengah',
                    'preview_link' => route('materi-mekanisme-pen')
                ]
            ],
            'Sistem dan Aplikasi' => [
                [
                    'title' => 'Sistem Pemutakhiran Wilkerstat (SiPW) SE2026',
                    'type' => 'PDF',
                    'link' => asset('bahanajar/04.2a Sistem Pemutakhiran Wilkerstat (SiPW) SE2026 v.2.pdf'),
                    'description' => 'Panduan lengkap penggunaan aplikasi SiPW untuk pemutakhiran data Wilkerstat.',
                    'category' => 'application',
                    'duration' => '90 menit',
                    'difficulty' => 'Lanjutan',
                    'preview_link' => route('sipw-se2026')
                ]
            ],
            'Pengolahan Peta dan Geospasial' => [
                [
                    'title' => 'Pengolahan Peta',
                    'type' => 'PDF',
                    'link' => asset('bahanajar/05 Pengolahan Peta.pdf'),
                    'description' => 'Teknik dan metode pengolahan peta digital untuk keperluan Wilkerstat.',
                    'category' => 'geospatial',
                    'duration' => '75 menit',
                    'difficulty' => 'Lanjutan',
                    'preview_link' => route('pengolahan-peta')
                ],
                [                    'title' => 'Tutorial Install QGIS, Install Plugin, dan Import Tools',                    'type' => 'Video',                    'link' => asset('videopembelajaran/Tutorial Install QGIS, Install Plugin, dan Import Tools.mp4'),                    'description' => 'Panduan lengkap instalasi QGIS, plugin yang diperlukan, dan cara mengimpor tools untuk pengolahan peta digital.',                    'category' => 'geospatial',                    'duration' => '30-45 menit',                    'difficulty' => 'Pemula',                    'google_drive_link' => 'https://drive.google.com/drive/folders/1ov4zZg69TY4eIQ2TTXzUizSQ2AWxnXN3?usp=sharing'                ],                [                    'title' => 'Scan Rename Peta',                    'type' => 'Video',                    'link' => asset('videopembelajaran/Scan Rename Peta.mp4'),                    'description' => 'Tutorial cara melakukan scanning peta dan teknik penamaan file yang benar untuk pengolahan wilkerstat.',                    'category' => 'geospatial',                    'duration' => '20-30 menit',                    'difficulty' => 'Pemula',                    'google_drive_link' => 'https://drive.google.com/drive/folders/1ov4zZg69TY4eIQ2TTXzUizSQ2AWxnXN3?usp=sharing'                ],                [                    'title' => 'Editing Peta Digital',                    'type' => 'Video',                    'link' => asset('videopembelajaran/Editing Peta Digital.mp4'),                    'description' => 'Teknik editing peta digital menggunakan QGIS, termasuk menggabungkan poligon, memotong poligon, dan validasi data.',                    'category' => 'geospatial',                    'duration' => '45-60 menit',                    'difficulty' => 'Menengah',                    'google_drive_link' => 'https://drive.google.com/drive/folders/1ov4zZg69TY4eIQ2TTXzUizSQ2AWxnXN3?usp=sharing'                ],                [                    'title' => 'Dissolve Peta Digital',                    'type' => 'Video',                    'link' => asset('videopembelajaran/Dissolve Peta Digital.mp4'),                    'description' => 'Tutorial proses dissolving pada peta digital untuk menggabungkan area yang berdekatan dan optimasi struktur data geospasial.',                    'category' => 'geospatial',                    'duration' => '30-40 menit',                    'difficulty' => 'Menengah',                    'google_drive_link' => 'https://drive.google.com/drive/folders/1ov4zZg69TY4eIQ2TTXzUizSQ2AWxnXN3?usp=sharing'                ]
            ]
        ];
        
        // Add Google Drive link for complete collection
        $googleDriveLink = 'https://drive.google.com/drive/folders/1Nga_528UmmatTh4Z70z8Z6P?usp=sharing';
        
        // Calculate summary statistics
        $totalMaterials = collect($materials)->flatten(1)->count();
        $totalCategories = count($materials);
        $availableFilesCount = count($availableFiles);
        
        return view('training.materials', compact('materials', 'googleDriveLink', 'totalMaterials', 'totalCategories', 'availableFiles', 'availableFilesCount'));
    }
    
    /**
     * Format filename for display
     */
    private function formatFileName($filename)
    {
        // Remove extension and format the name
        $name = pathinfo($filename, PATHINFO_FILENAME);
        // Remove numbers and clean up
        $name = preg_replace('/^\d+\.?\d*\s*/', '', $name);
        return ucwords(str_replace(['_', '-'], ' ', $name));
    }
    
    /**
     * Format file size for display
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    /**
     * Display about us page
     */
    public function about()
    {
        return view('training.about');
    }



    /**
     * Display detailed pendahuluan material
     */
    public function pendahuluan()
    {
        // Get the detailed pendahuluan content from materials data
        $pendahuluanData = [
            'title' => '01 Pendahuluan Wilkerstat SE2026',
            'subtitle' => 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026',
            'description' => 'Materi pengenalan komprehensif tentang latar belakang, tujuan, dan komponen-komponen penting dalam kegiatan pemutakhiran Wilkerstat SE2026.',
            'pdf_link' => asset('bahanajar/01 Pendahuluan.pdf'),
            'duration' => '45 menit',
            'difficulty' => 'Pemula',
            'sections' => [
                'latar_belakang' => [
                    'title' => 'Latar Belakang',
                    'icon' => 'fas fa-info-circle',
                    'content' => [
                        'Satuan Lingkungan Setempat (SLS) adalah wilayah di bawah desa/kelurahan yang memiliki ketua dan pengurus yang telah operasional dan diakui oleh pemerintah desa/kelurahan.',
                        'Tantangan utama SLS adalah sifatnya yang sangat dinamis, sehingga memerlukan pemutakhiran sebelum pelaksanaan Sensus Ekonomi 2026 (SE2026).',
                        'Kegiatan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026 dilakukan pada tahun 2025 dengan dua tahapan:'
                    ],
                    'tahapan' => [
                        'lapangan' => [
                            'title' => 'Kegiatan Lapangan',
                            'icon' => 'fas fa-map-marked-alt',
                            'items' => [
                                'Pemutakhiran peta dan SLS',
                                'Geotagging batas SLS dan kawasan ekonomi',
                                'Pembentukan sub-SLS'
                            ]
                        ],
                        'pengolahan' => [
                            'title' => 'Kegiatan Pengolahan',
                            'icon' => 'fas fa-cogs',
                            'items' => [
                                'Pengolahan master dan muatan SLS',
                                'Pengolahan peta wilkerstat hasil kegiatan lapangan'
                            ]
                        ]
                    ],
                    'kesimpulan' => 'Latar belakang menjelaskan pentingnya pemutakhiran SLS karena sifatnya yang dinamis, dengan kegiatan SE2026 yang terdiri dari tahapan lapangan (pemutakhiran peta, geotagging, pembentukan sub-SLS) dan pengolahan (master, muatan, dan peta wilkerstat) untuk mendukung Sensus Ekonomi 2026.'
                ],
                'maksud_tujuan' => [
                    'title' => 'Maksud dan Tujuan',
                    'icon' => 'fas fa-bullseye',
                    'content' => [
                        'Mendapatkan muatan wilkerstat yang seragam dan mutakhir',
                        'Mendapatkan kerangka geospasial yang mutakhir',
                        'Mendapatkan informasi mengenai wilayah konsentrasi ekonomi'
                    ],
                    'kesimpulan' => 'Tujuan kegiatan adalah menghasilkan data wilkerstat dan kerangka geospasial yang terbaru dan konsisten, serta informasi tentang wilayah konsentrasi ekonomi untuk mendukung pelaksanaan SE2026.'
                ],
                'landasan_hukum' => [
                    'title' => 'Landasan Hukum',
                    'icon' => 'fas fa-gavel',
                    'content' => [
                        'Undang-Undang Nomor 16 Tahun 1997 tentang Statistik (Lembaran Negara Republik Indonesia Tahun 1997 Nomor 39, Tambahan Lembaran Negara Republik Indonesia Nomor 3683)',
                        'Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara',
                        'Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik (Lembaran Negara Republik Indonesia Tahun 1999 Nomor 96, Tambahan Lembaran Negara Republik Indonesia Nomor 3854)',
                        'Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik (Lembaran Negara Republik Indonesia Tahun 2007 Nomor 139)',
                        'Peraturan Kepala Badan Pusat Statistik Nomor 7 Tahun 2020 tentang Organisasi dan Tata Kerja Badan Pusat Statistik',
                        'Undang-Undang Nomor 6 Tahun 2023 tentang Penetapan Peraturan Pemerintah pengganti Undang-Undang Nomor 2 Tahun 2022 tentang Cipta Kerja menjadi Undang-Undang (Lembaran Negara Republik Indonesia Tahun 2023 Nomor 41, Tambahan Lembaran Negara Nomor 6856)',
                        'Peraturan Presiden Nomor 39 Tahun 2019 tentang Satu Data Indonesia (Lembaran Negara Republik Indonesia Tahun 2019 Nomor 112)'
                    ],
                    'kesimpulan' => 'Landasan hukum yang komprehensif memberikan dasar formal dan legal yang kuat untuk pelaksanaan kegiatan pemutakhiran Wilkerstat SE2026, mencakup aspek statistik, keuangan negara, organisasi BPS, dan satu data Indonesia.'
                ],
                'instrumen_perangkat' => [
                    'title' => 'Jenis Instrumen dan Perangkat',
                    'icon' => 'fas fa-tools',
                    'pengolahan_master' => [
                        'title' => 'Instrumen Pengolahan Master dan Muatan SLS',
                        'icon' => 'fas fa-database',
                        'items' => [
                            'Daftar Perubahan SLS (Daftar PSLS): Berisi informasi SLS yang mengalami perubahan dari hasil pemutakhiran di lapangan',
                            'SE2026-WILKERSTAT.RS: Daftar Rekap SLS hasil pemutakhiran, memuat informasi muatan tiap SLS/Non-SLS per desa/kelurahan',
                            'Aplikasi Frame Register System FRS-MFDOnline, digunakan untuk merekam perubahan master wilkerstat <a href="https://frs.bps.go.id/area" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://frs.bps.go.id/area <i class="fas fa-external-link-alt text-xs ml-1"></i></a>',
                            'Aplikasi Sistem Informasi Pemutakhiran Wilkerstat (SiPW), sebagai aplikasi berbasis web yang digunakan untuk entri data Rekap SLS.  <a href="https://sipw.bps.go.id" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://sipw.bps.go.id <i class="fas fa-external-link-alt text-xs ml-1"></i></a>'
                        ]
                    ],
                    'pengolahan_peta' => [
                        'title' => 'Instrumen Pengolahan Peta',
                        'icon' => 'fas fa-map',
                        'items' => [
                            'Peta digital SLS kondisi terbaru: Dapat diunduh dari Geospatial System (GS) di <a href="https://dataspasial.bps.go.id/gs" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://dataspasial.bps.go.id/gs <i class="fas fa-external-link-alt text-xs ml-1"></i></a> (periode 2024.1) atau versi terbaru dari BPS Kabupaten/Kota',
                            'Geotagging batas SLS: Melalui <a href="https://wilkerstat.bps.go.id" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://wilkerstat.bps.go.id <i class="fas fa-external-link-alt text-xs ml-1"></i></a> untuk informasi lokasi dan perubahan batas SLS',
                            'Peta WS hasil pemutakhiran di lapangan: Memberikan informasi perbaikan batas SLS',
                            'Lembar Kerja Peta (LK-Peta): Hasil penggambaran sketsa peta untuk di-scan',
                            'Master SLS Snapshot Tahun 2025 Semester 1: Data dasar untuk pemutakhiran'
                        ]
                    ],
                    'software_aplikasi' => [
                        'title' => 'Software dan Aplikasi',
                        'icon' => 'fas fa-laptop-code',
                        'items' => [
                            'QGIS: Digunakan untuk editing peta digital',
                            'Geospatial System (GS): Untuk pengiriman, validasi, dan penyimpanan peta digital hasil kegiatan',
                            'Aplikasi pendukung lainnya: Alat bantu untuk pemrosesan dan pengolahan peta, tersedia untuk diunduh gratis'
                        ]
                    ],
                    'kesimpulan' => 'Instrumen dan perangkat mencakup dokumen (Daftar PSLS, SE2026-WILKERSTAT.RS, LK-Peta), aplikasi (Frame Register, GS), dan software (QGIS) untuk mendukung pengolahan master, muatan SLS, dan peta wilkerstat, dengan akses ke data terbaru melalui platform online.'
                ],
                'jadwal_kegiatan' => [
                    'title' => 'Jadwal Kegiatan',
                    'icon' => 'fas fa-calendar-alt',
                    'content' => 'Berikut adalah jadwal lengkap kegiatan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026 yang telah disusun secara sistematis untuk memastikan pelaksanaan yang optimal.',
                    'activities' => [
                        [
                            'id' => 'workshop-intama',
                            'title' => 'Workshop Intama Pengolahan (Pusat)',
                            'date' => '3 – 5 Februari 2025',
                            'type' => 'Workshop',
                            'location' => 'Pusat',
                            'description' => 'Workshop intensif untuk pelatihan instruktur nasional tingkat pusat dalam pengolahan data wilkerstat.',
                            'icon' => 'fas fa-chalkboard-teacher',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'pelatihan-innas',
                            'title' => 'Pelatihan Innas Pengolahan (e-learning, Pusat)',
                            'date' => '15 – 21 Mei 2025',
                            'type' => 'E-Learning',
                            'location' => 'Pusat',
                            'description' => 'Pelatihan instruktur nasional secara daring untuk mempersiapkan tenaga pelatih di tingkat provinsi.',
                            'icon' => 'fas fa-laptop',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'pelatihan-inda',
                            'title' => 'Pelatihan Inda Pengolahan (e-learning, Provinsi)',
                            'date' => '5 – 13 Juni 2025',
                            'type' => 'E-Learning',
                            'location' => 'Provinsi',
                            'description' => 'Pelatihan instruktur daerah secara daring untuk mempersiapkan tenaga pelatih di tingkat kabupaten/kota.',
                            'icon' => 'fas fa-users-cog',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'pelatihan-petugas',
                            'title' => 'Pelatihan Petugas Pengolahan (tatap muka (hybrid), Kabupaten/Kota)',
                            'date' => '28 – 29 Juli 2025',
                            'type' => 'Hybrid',
                            'location' => 'Kabupaten/Kota',
                            'description' => 'Pelatihan petugas pengolahan dengan metode tatap muka dan daring untuk implementasi langsung di lapangan.',
                            'icon' => 'fas fa-user-graduate',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'pengolahan-muatan',
                            'title' => 'Pengolahan Muatan dan Peta (Kabupaten/Kota)',
                            'date' => 'September – Oktober 2025',
                            'type' => 'Implementasi',
                            'location' => 'Kabupaten/Kota',
                            'description' => 'Pelaksanaan pengolahan data muatan dan peta wilkerstat di tingkat kabupaten/kota.',
                            'icon' => 'fas fa-map-marked-alt',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'finalisasi-hasil',
                            'title' => 'Proses Finalisasi Hasil Pengolahan Peta (Kabupaten/Kota)',
                            'date' => 'Oktober – November 2025',
                            'type' => 'Finalisasi',
                            'location' => 'Kabupaten/Kota',
                            'description' => 'Tahap akhir pemeriksaan, validasi, dan finalisasi hasil pengolahan peta wilkerstat.',
                            'icon' => 'fas fa-check-double',
                            'status' => 'scheduled'
                        ],
                        [
                            'id' => 'layout-peta',
                            'title' => 'Penyiapan Layout Peta untuk Sensus Ekonomi (Kabupaten/Kota)',
                            'date' => 'Desember 2025 – Januari 2026',
                            'type' => 'Penyiapan',
                            'location' => 'Kabupaten/Kota',
                            'description' => 'Penyusunan layout peta final yang akan digunakan untuk pelaksanaan Sensus Ekonomi 2026.',
                            'icon' => 'fas fa-drafting-compass',
                            'status' => 'scheduled'
                        ]
                    ],
                    // 'kesimpulan' => 'Jadwal kegiatan disusun secara bertahap dan sistematis mulai dari pelatihan instruktur di tingkat pusat hingga implementasi di kabupaten/kota, memastikan transfer pengetahuan yang efektif dan pelaksanaan yang optimal.',
                    // 'reference_link' => route('schedule'),
                    // 'reference_text' => 'Lihat jadwal pelatihan lengkap'
                ]
            ]
        ];

        return view('training.pendahuluan', compact('pendahuluanData'));
    }

    /**
     * Display detailed organisasi pengolahan material
     */
    public function organisasiPengolahan()
    {
        $organisasiData = [
            'title' => 'Organisasi Wilkerstat SE2026',
            'subtitle' => 'Struktur Organisasi dan Tanggung Jawab dalam Pengolahan',
            'description' => 'Materi komprehensif tentang struktur organisasi, peran, dan tanggung jawab dalam kegiatan pengolahan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026.',
            'pdf_link' => asset('bahanajar/02 Organisasi Pengolahan.pdf'),
            'duration' => '45 menit',
            'difficulty' => 'Menengah',
            'sections' => [
                'penanggung_jawab' => [
                    'title' => 'Penanggung Jawab Kabupaten/Kota',
                    'icon' => 'fas fa-user-tie',
                    'content' => [
                        'Penanggung Jawab bertugas mengomunikasikan kegiatan lapangan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026 kepada pemerintah daerah dan mendukung koordinasi kegiatan di tingkat lokal.'
                    ]
                ],
                'tim_wilkerstat' => [
                    'title' => 'Tanggung Jawab Tim Wilkerstat BPS Kabupaten/Kota',
                    'icon' => 'fas fa-users',
                    'content' => [
                        'Tim Wilkerstat BPS Kabupaten/Kota memiliki tanggung jawab yang komprehensif dalam pelaksanaan kegiatan pemutakhiran wilkerstat.',
                        'Untuk detail lengkap mengenai semua tanggung jawab Tim Wilkerstat, silakan merujuk pada <a href="/bahanajar/02 Organisasi Pengolahan.pdf" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Bahan Ajar 02 - Organisasi Pengolahan</a>.'
                    ]
                ],
                'petugas_pengolahan' => [
                    'title' => 'Petugas Pengolah/Operator',
                    'icon' => 'fas fa-user-cog',
                    'content' => [
                        'Petugas Pengolah/Operator memiliki tugas-tugas spesifik dalam proses pengolahan data wilkerstat.',
                        'Untuk detail lengkap mengenai semua tugas dan tanggung jawab Petugas Pengolah/Operator, silakan merujuk pada <a href="/bahanajar/02 Organisasi Pengolahan.pdf" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Bahan Ajar 02 - Organisasi Pengolahan</a>.'
                    ]
                ],
                'catatan_tambahan' => [
                    'title' => 'Catatan Tambahan',
                    'icon' => 'fas fa-sticky-note',
                    'content' => [
                        'Pastikan akses ke aplikasi SiPW (<a href="https://sipw.bps.go.id" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://sipw.bps.go.id</a>) dan Geospatial System (<a href="https://dataspasial.bps.go.id/gs" target="_blank" class="text-blue-600 hover:text-blue-800 underline">https://dataspasial.bps.go.id/gs</a>) tersedia untuk petugas pengolahan.',
                        'FRS-MFDOnline digunakan untuk entri dan approval perubahan master wilkerstat dan Daftar PSLS.',
                        'Dokumen dan peta hasil pengolahan harus disimpan dengan baik oleh Tim Wilkerstat BPS Kabupaten/Kota.',
                        'Untuk detail jadwal pelatihan, lihat dokumen "Jadwal Pelatihan Petugas Pengolahan Wilkerstat.xlsx" di <a href="https://drive.google.com/drive/folders/1EwGnhINXAAzDgPJYMfA_9ZwkG-s9WGnD?usp=sharing" target="_blank" class="text-blue-600 hover:text-blue-800 underline">Google Drive</a>.'
                    ],
                    'reference_link' => route('schedule'),
                    'reference_text' => 'Lihat jadwal pelatihan lengkap'
                ]
            ]
        ];

        return view('training.organisasi-pengolahan', compact('organisasiData'));
    }

    /**
     * Display detailed mekanisme pengolahan material
     */
    public function mekanismePengolahan()
    {
        $mekanismeData = [
            'title' => 'Mekanisme Pengolahan Pemutakhiran Wilkerstat SE2026',
            'subtitle' => 'Prosedur dan Mekanisme Pengolahan Data Secara Sistematis',
            'description' => 'Materi komprehensif tentang mekanisme dan prosedur pengolahan data dalam kegiatan Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat SE2026.',
            'pdf_link' => asset('bahanajar/03 Mekanisme Pengolahan.pdf'),
            'duration' => '60 menit',
            'difficulty' => 'Menengah',
            'sections' => [
                'mekanisme_umum' => [
                    'title' => '01 Mekanisme Pengolahan Secara Umum',
                    'icon' => 'fas fa-cogs',
                    'content' => [
                        'Pengolahan meliputi dua tahap utama: pengolahan muatan dan pengolahan peta.',
                        'Pengolahan muatan mencakup entri dokumen PSLS via FRS-MFDOnline dan entri SE2026-WILKERSTAT.RS via SiPW.',
                        'Pengolahan peta meliputi digitasi perubahan batas wilayah kerja statistik dan pembentukan sub-SLS.'
                    ]
                ],
                'pengolahan_muatan' => [
                    'title' => '02 Mekanisme Pengolahan Muatan SLS',
                    'icon' => 'fas fa-database',
                    'tahapan' => [
                        'penerimaan' => [
                            'title' => 'Penerimaan dokumen hasil lapangan',
                            'icon' => 'fas fa-inbox',
                            'items' => [
                                'Penerimaan (receiving) oleh admin BPS Kabupaten/Kota dengan pengecekan kelengkapan dokumen per desa/kelurahan.',
                                'Koordinasi dengan tim sub bagian umum jika diperlukan.',
                                'Dokumen meliputi Daftar PSLS dan SE2026-WILKERSTAT.RS.'
                            ]
                        ],
                        'batching' => [
                            'title' => 'Batching',
                            'icon' => 'fas fa-layer-group',
                            'items' => [
                                'Menyusun dokumen hasil lapangan per desa/kelurahan menjadi satu batch.'
                            ]
                        ],
                        'update_master' => [
                            'title' => 'Update Master Wilayah jika ada perubahan',
                            'icon' => 'fas fa-edit',
                            'items' => [
                                'Dilakukan jika ada perubahan wilayah administrasi (pecah, gabung, ganti kode/nama) atau wilkerstat SLS.',
                                'Entri perubahan via FRS-MFDOnline oleh operator.',
                                'Approval oleh supervisor FRS-MFDOnline Kabupaten/Kota dan Provinsi.',
                                'Sinkronisasi data ke SiPW untuk master wilayah terupdate.'
                            ]
                        ],
                        'entri_dokumen' => [
                            'title' => 'Entri dokumen SE2026-WILKERSTAT.RS',
                            'icon' => 'fas fa-keyboard',
                            'items' => [
                                'Dilakukan oleh petugas via SiPW (https://sipw.bps.go.id), detail di Bab 4.2.'
                            ]
                        ],
                        'perbaikan_data' => [
                            'title' => 'Perbaikan data SE2026-WILKERSTAT.RS',
                            'icon' => 'fas fa-tools',
                            'items' => [
                                'Perbaikan jika ada ketidaksesuaian (kode SLS, nama SLS, jumlah muatan) dengan konfirmasi ke pengawas/petugas lapangan.'
                            ]
                        ],
                        'monitoring' => [
                            'title' => 'Monitoring Hasil Pengolahan Muatan Wilkerstat',
                            'icon' => 'fas fa-chart-line',
                            'items' => [
                                'Pemantauan oleh BPS Kabupaten/Kota dan Provinsi via SiPW untuk memastikan proses lancar.'
                            ]
                        ],
                        'ekspor' => [
                            'title' => 'Ekspor Hasil Pengolahan Muatan Wilkerstat',
                            'icon' => 'fas fa-download',
                            'items' => [
                                'Ekspor dilakukan setelah data entri difinalisasi melalui SiPW.'
                            ]
                        ]
                    ]
                ],
                'pengolahan_peta' => [
                    'title' => '03 Mekanisme Pengolahan Peta',
                    'icon' => 'fas fa-map',
                    'tahapan' => [
                        'pengumpulan' => [
                            'title' => 'Pengumpulan hasil lapangan',
                            'icon' => 'fas fa-folder-open',
                            'items' => [
                                'Mengumpulkan dokumen peta WS dan LK-Peta yang telah dikoreksi.'
                            ]
                        ],
                        'penyiapan_bahan' => [
                            'title' => 'Penyiapan bahan/instrumen',
                            'icon' => 'fas fa-tools',
                            'items' => [
                                'Menyiapkan alat seperti QGIS dan Geospatial System.'
                            ]
                        ],
                        'scan_dokumen' => [
                            'title' => 'Scan dokumen',
                            'icon' => 'fas fa-scanner',
                            'items' => [
                                'Memindai peta WS dan LK-Peta.'
                            ]
                        ],
                        'rename_file' => [
                            'title' => 'Rename file scan',
                            'icon' => 'fas fa-file-signature',
                            'items' => [
                                'Memberi nama file scan peta WS dan LK-Peta sesuai format.'
                            ]
                        ],
                        'identifikasi' => [
                            'title' => 'Identifikasi perubahan',
                            'icon' => 'fas fa-search',
                            'items' => [
                                'Mengecek peta WS yang mengalami perubahan master atau batas.'
                            ]
                        ],
                        'georeferencing' => [
                            'title' => 'Georeferencing',
                            'icon' => 'fas fa-map-marked-alt',
                            'items' => [
                                'Menyelaraskan scan peta WS dengan peta digital SLS menggunakan plugin QGIS.'
                            ]
                        ],
                        'editing_peta' => [
                            'title' => 'Editing peta',
                            'icon' => 'fas fa-edit',
                            'items' => [
                                'Mengedit atribut dan batas SLS/non-SLS/sub-SLS di aplikasi pengolahan peta digital.'
                            ]
                        ],
                        'pengecekan_atribut' => [
                            'title' => 'Pengecekan atribut dan error topologi',
                            'icon' => 'fas fa-check-circle',
                            'items' => [
                                'Memverifikasi atribut dengan master dan memperbaiki error topologi.'
                            ]
                        ],
                        'pengecekan_kualitas' => [
                            'title' => 'Pengecekan kualitas',
                            'icon' => 'fas fa-quality',
                            'items' => [
                                'Memastikan kualitas peta digital SLS/non-SLS/sub-SLS.'
                            ]
                        ],
                        'pembuatan_peta' => [
                            'title' => 'Pembuatan peta wilkerstat',
                            'icon' => 'fas fa-map-signs',
                            'items' => [
                                'Membuat peta desa dan kecamatan.'
                            ]
                        ],
                        'upload_peta' => [
                            'title' => 'Upload peta',
                            'icon' => 'fas fa-cloud-upload-alt',
                            'items' => [
                                'Mengunggah peta hasil edit ke Geospatial System.'
                            ]
                        ],
                        'pengecekan_approval' => [
                            'title' => 'Pengecekan dan approval',
                            'icon' => 'fas fa-check-double',
                            'items' => [
                                'Memeriksa hasil upload dan mendapatkan approval di Geospatial System.'
                            ]
                        ],
                        'pembuatan_layout' => [
                            'title' => 'Pembuatan layout peta',
                            'icon' => 'fas fa-print',
                            'items' => [
                                'Menyusun tata letak peta untuk cetak analog.'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return view('training.mekanisme-pengolahan', compact('mekanismeData'));
    }

    /**
     * Display detailed SiPW SE2026 material
     */
    public function sipwSe2026()
    {
        $sipwData = [
            'title' => '04.2a Sistem Pemutakhiran Wilkerstat (SiPW) SE2026',
            'subtitle' => 'Panduan Lengkap Penggunaan Aplikasi SiPW',
            'description' => 'Materi komprehensif tentang tata cara pengoperasian Sistem Pemutakhiran Wilkerstat (SiPW) untuk mendukung kegiatan SE2026, termasuk login, dashboard, administrasi pengguna, dan entri dokumen.',
            'pdf_link' => asset('bahanajar/04.2a Sistem Pemutakhiran Wilkerstat (SiPW) SE2026 v.2.pdf'),
            'duration' => '90 menit',
            'difficulty' => 'Lanjutan',
            'sections' => [
                'penjelasan_umum' => [
                    'title' => 'Penjelasan Umum',
                    'icon' => 'fas fa-info-circle',
                    'content' => [
                        'tujuan_ruang_lingkup' => [
                            'title' => 'Tujuan dan Ruang Lingkup',
                            'items' => [
                                'Mengolah data Rekap SLS (SE2026-WILKERSTAT.RS) di kabupaten/kota seluruh Indonesia',
                                'Tujuan: Mendapatkan informasi muatan sub-SLS yang termutakhirkan sebagai indikator perhitungan beban petugas untuk Sensus Ekonomi 2026',
                                'Membentuk sub-SLS sesuai hasil Rekap SLS'
                            ]
                        ],
                        'petugas_pengolah' => [
                            'title' => 'Petugas Pengolah',
                            'items' => [
                                'Petugas Receiving Batching: Tim Wilkerstat BPS Kabupaten/Kota',
                                'Operator Entri Dokumen: Petugas pengolahan muatan Wilkerstat SE2026 BPS Kabupaten/Kota',
                                'Pengawas Pengolahan: Tim Wilkerstat atau petugas organik yang ditugaskan BPS Kabupaten/Kota'
                            ]
                        ]
                    ],
                    'kesimpulan' => 'Penjelasan umum menyoroti tujuan pengolahan data Rekap SLS untuk mendukung SE2026, dengan fokus pada pembentukan sub-SLS dan peran petugas seperti receiving batching, entri dokumen, dan pengawasan oleh tim BPS Kabupaten/Kota.'
                ],
                'tata_cara_pengoperasian' => [
                    'title' => 'Tata Cara Pengoperasian SiPW',
                    'icon' => 'fas fa-desktop',
                    'content' => [
                        'login' => [
                            'title' => 'Login',
                            'description' => 'Proses login ke aplikasi SiPW (https://sipw.bps.go.id)',
                            'steps' => [
                                'Akses aplikasi SiPW melalui browser',
                                'Masukkan kredensial yang telah diberikan',
                                'Verifikasi akses sesuai dengan role pengguna'
                            ]
                        ],
                        'dashboard' => [
                            'title' => 'Dashboard',
                            'description' => 'Interface utama untuk monitoring dan navigasi',
                            'features' => [
                                'Menampilkan tabel per wilayah dengan persentase tiap kategori monitoring',
                                'Rekap monitoring berjalan secara otomatis setiap jam',
                                'Wilayah dapat dipilih dari level provinsi hingga SLS'
                            ]
                        ],
                        'administrasi_pengguna' => [
                            'title' => 'Administrasi Pengguna',
                            'roles' => [
                                'Admin: Mengelola pengguna web',
                                'Petugas Pengolahan: Memiliki akses ke menu entri dan sinkronisasi dengan SOBAT BPS'
                            ]
                        ],
                        'assign_wilayah' => [
                            'title' => 'Assign Wilayah Kerja',
                            'process' => [
                                'Admin dapat mengunduh template "Assign.xlsx" untuk mengisi informasi petugas dan pengawas',
                                'Setelah diisi, file diunggah ke SiPW, dan status berubah menjadi "Sudah Assign"'
                            ]
                        ],
                        'generate_dokumen' => [
                            'title' => 'Generate Dokumen',
                            'features' => [
                                'Klik "Generate" untuk memproses pembentukan file PDF di server dan mengunggahnya ke Server S3',
                                'Fitur "Dokumen Kosong" memungkinkan unduh file PDF tanpa informasi petugas/SLS',
                                'Fitur "Download All" mengunduh file terpilih dengan jeda 5 detik antar file'
                            ]
                        ],
                        'alur_cetak' => [
                            'title' => 'Alur Cetak Dokumen',
                            'description' => 'Melibatkan sinkronisasi data petugas, penugasan SLS, dan pembuatan dokumen melalui fitur "Generate"'
                        ]
                    ],
                    'kesimpulan' => 'Tata cara pengoperasian SiPW mencakup login, penggunaan dashboard untuk monitoring, administrasi pengguna, penugasan wilayah kerja melalui template Assign.xlsx, dan pembuatan dokumen PDF dengan fitur generate, download, dan sinkronisasi data.'
                ],
                'tata_cara_entri' => [
                    'title' => 'Tata Cara Entri Dokumen',
                    'icon' => 'fas fa-edit',
                    'content' => [
                        'proses_entri' => [
                            'title' => 'Proses Entri',
                            'description' => 'Entri dokumen dilakukan untuk dokumen SiPW.RS (berbasis SE2026-WILKERSTAT.RS) melalui aplikasi SiPW',
                            'steps' => [
                                'Akses menu entri dokumen dalam aplikasi SiPW',
                                'Pilih dokumen yang akan dientry',
                                'Lakukan input data sesuai dengan format yang telah ditentukan',
                                'Verifikasi data yang telah diinput',
                                'Simpan data dan tunggu konfirmasi sistem'
                            ]
                        ],
                        'konfirmasi' => [
                            'title' => 'Konfirmasi Penyimpanan',
                            'description' => 'Setelah proses entri selesai, sistem akan menampilkan pesan "berhasil menyimpan data"'
                        ]
                    ],
                    'kesimpulan' => 'Tata cara entri dokumen berfokus pada proses entri data SiPW.RS melalui aplikasi SiPW, dengan konfirmasi keberhasilan penyimpanan data setelah proses selesai.'
                ],
                'catatan_tambahan' => [
                    'title' => 'Catatan Tambahan',
                    'icon' => 'fas fa-sticky-note',
                    'content' => [
                        'aplikasi_sipw' => [
                            'title' => 'Aplikasi SiPW',
                            'description' => 'Aplikasi SiPW (https://sipw.bps.go.id) digunakan untuk entri, monitoring, dan pembuatan dokumen'
                        ],
                        'sinkronisasi' => [
                            'title' => 'Sinkronisasi SOBAT BPS',
                            'description' => 'Sinkronisasi dengan SOBAT BPS diperlukan untuk administrasi petugas pengolahan'
                        ],
                        'template' => [
                            'title' => 'Template Assign',
                            'description' => 'Template Assign.xlsx digunakan untuk penugasan wilayah kerja'
                        ],
                        'server_s3' => [
                            'title' => 'Server S3',
                            'description' => 'Pastikan file PDF yang dihasilkan melalui fitur "Generate" tersimpan di Server S3'
                        ]
                    ],
                    'kesimpulan' => 'Catatan tambahan mencakup informasi penting tentang akses aplikasi, sinkronisasi data, penggunaan template, dan penyimpanan file untuk memastikan kelancaran operasional SiPW.'
                ]
            ]
        ];

        return view('training.sipw-se2026', compact('sipwData'));
    }

    /**
     * Display detailed pengolahan peta material
     */
    public function pengolahanPeta()
    {
        $pengolahanPetaData = [
            'title' => '05 Pengolahan Peta Wilkerstat SE2026',
            'subtitle' => 'Teknik dan Metode Pengolahan Peta Digital untuk Keperluan Wilkerstat',
            'description' => 'Materi komprehensif tentang pengolahan peta digital menggunakan QGIS, mulai dari persiapan alat dan bahan, georeferensi, editing, hingga validasi peta untuk mendukung kegiatan SE2026.',
            'pdf_link' => asset('bahanajar/05 Pengolahan Peta.pdf'),
            'duration' => '75 menit',
            'difficulty' => 'Lanjutan',
            'sections' => [
                'alat_bahan' => [
                    'title' => 'Alat dan Bahan',
                    'icon' => 'fas fa-tools',
                    'content' => [
                        'alat_digunakan' => [
                            'title' => 'Alat yang Digunakan',
                            'items' => [
                                'Aplikasi QGIS: Perangkat lunak berbasis desktop untuk mengolah peta digital',
                                'Plugin QGIS: Freehand Raster Georeferencer, QuickMapServices, QR Barcode Layout Item, Clipper, Topology Checker, Dissect/Dissolve Overlaps (SAGA NextGen)',
                                'Web Wilkerstat: Mengunduh data geotagging hasil kegiatan lapangan',
                                'Geospatial System: Sistem berbasis web untuk mengunduh peta',
                                'Aplikasi Rename Peta WS: Bulk Rename Utility untuk penggantian nama file secara massal',
                                'Processing Tools: Plugin dalam QGIS untuk memproses dan menganalisis data geospasial',
                                'Template Layout Peta: Diunduh dari Geospatial System'
                            ]
                        ],
                        'bahan_instrumen' => [
                            'title' => 'Bahan/Instrumen yang Digunakan',
                            'items' => [
                                
                                'Peta Digital SLS: Diunduh dari Geospatial System (periode 2024.1) atau versi terbaru dari BPS Kabupaten/Kota',
                                'Peta WS Hasil Lapangan: Dari kegiatan lapangan Wilkerstat',
                                'LK-Peta: Dari kegiatan lapangan Wilkerstat',
                                'Geotagging Batas SLS: Diunduh melalui website Wilkerstat',
                                'Master SLS: Diunduh dari aplikasi SiPW'
                            ]
                        ]
                    ],
                    'kesimpulan' => 'Alat dan bahan untuk pengolahan peta mencakup QGIS dengan berbagai plugin (Freehand Raster Georeferencer, QuickMapServices, Clipper, dll.), aplikasi rename, dan sistem web seperti Geospatial System dan Web Wilkerstat, serta bahan seperti peta digital SLS, Peta WS, LK-Peta, geotagging, dan Master SLS.'
                ],
                'penyiapan_pengolahan' => [
                    'title' => 'Penyiapan Pengolahan Peta',
                    'icon' => 'fas fa-cog',
                    'content' => [
                        'description' => 'Penyiapan pengolahan peta melibatkan pengunduhan bahan, template, dan peta SLS dari Geospatial System, instalasi QGIS sebagai perangkat lunak utama, instalasi plugin pendukung (Freehand Raster Georeferencer, QuickMapServices, QR Barcode Layout Item, Clipper, Dissect/Dissolve Overlaps, Topology Checker), penambahan processing tools, pengunduhan Bulk Rename Utility, dan persiapan geotagging dari Web Wilkerstat. Proses ini memastikan kesiapan alat dan data untuk digitasi peta secara efisien.'
                    ]
                ],
                'penyiapan_bahan' => [
                    'title' => 'Penyiapan Bahan Wilkerstat SE2026',
                    'icon' => 'fas fa-folder-open',
                    'content' => [
                        'description' => 'Penyiapan bahan melibatkan pengumpulan dan pengolahan master SLS melalui FRS-MFDOnline, scanning peta hasil lapangan (WA, WS, LK-Peta) dengan resolusi 200 dpi dalam format JPEG, serta rename file menggunakan Bulk Rename Utility berdasarkan pasangan nama lama dan baru dari file teks atau CSV. Proses ini memastikan data dan peta siap digunakan untuk tahap pengolahan lebih lanjut.'
                    ]
                ],
                'georeferensi_peta' => [
                    'title' => 'Georeferensi Peta yang Mengalami Perubahan',
                    'icon' => 'fas fa-map-marked-alt',
                    'content' => [
                        'description' => 'Proses georeferensi bertujuan menyelaraskan scan Peta WS dengan sistem koordinat peta digital SLS menggunakan plugin Freehand Raster Georeferencer, menghasilkan layer Peta WS yang siap untuk digitasi batas SLS yang berubah. Tahapan mencakup menampilkan peta SLS dan scan Peta WS, lalu melakukan georeferensi dengan menyesuaikan titik acuan untuk akurasi data.'
                    ]
                ],
                'editing_peta_digital' => [
                    'title' => 'Editing Peta Digital Wilkerstat SE2026',
                    'icon' => 'fas fa-edit',
                    'content' => [
                        'description' => 'Editing peta digital bertujuan menyesuaikan batas wilayah SLS/sub-SLS dengan kondisi lapangan menggunakan scan Peta WS bergeoreferensi. Proses ini mencakup koreksi non-topologis (memotong, menggabungkan poligon, dan mengedit atribut) dan koreksi topologis (menghilangkan gap, overlap, dan duplikat geometri), memastikan akurasi data untuk tahap selanjutnya.'
                    ]
                ],
                'cleaning_validasi' => [
                    'title' => 'Cleaning dan Validasi Peta',
                    'icon' => 'fas fa-broom',
                    'content' => [
                        'description' => 'Cleaning dan validasi peta memastikan data geospasial akurat dengan memperbaiki null/invalid geometry, error topologi (gap, overlap, duplikat), dan validasi atribut menggunakan QGIS/ArcMap. Proses ini diakhiri dengan ekspor ke format GeoJSON yang sesuai standar (EPSG:4326, poligon, UTF-8), meningkatkan integritas dan keandalan data untuk analisis lebih lanjut.'
                    ]
                ],
                'catatan_tambahan' => [
                    'title' => 'Catatan Tambahan',
                    'icon' => 'fas fa-sticky-note',
                    'content' => [
                        'Aplikasi QGIS digunakan sebagai alat utama untuk pengolahan peta digital',
                        'Geospatial System (https://dataspasial.bps.go.id/gs) digunakan untuk mengunduh peta dan template, serta mengunggah hasil peta',
                        'Web Wilkerstat (https://wilkerstat.bps.go.id) digunakan untuk mengunduh geotagging',
                        'FRS MFDOnline digunakan untuk pengajuan perubahan SLS dan wilayah administrasi',
                        'Pastikan format file GeoJSON dengan CRS 4326 dan atribut UTF-8 untuk kompatibilitas dengan Geospatial System'
                    ],
                    'reference_link' => route('schedule'),
                    'reference_text' => 'Lihat jadwal pelatihan lengkap'
                ],
                'dissolving_peta' => [
                    'title' => 'Dissolving Peta Wilkerstat',
                    'icon' => 'fas fa-layer-group',
                    'content' => [
                        'description' => 'Proses dissolving membentuk peta desa dan kecamatan dari peta SLS/sub-SLS yang telah final menggunakan tools "Dissolve_Desa_Kec" di QGIS. Hasilnya diekspor sebagai file permanen dalam format .gpkg dan diunggah ke Geospatial System, memastikan data siap untuk penggunaan lebih lanjut.'
                    ]
                ]
            ]
        ];

        return view('training.pengolahan-peta', compact('pengolahanPetaData'));
    }

    /**
     * Display detailed step-by-step tutorial for Penyiapan Pengolahan Peta
     */
    public function penyiapanPengolahanDetail()
    {
        $tutorialData = [
            'title' => 'Penyiapan Pengolahan Peta Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Tutorial komprehensif untuk mempersiapkan pengolahan peta digital dengan semua tools dan bahan yang diperlukan.',
            'sections' => [
                [
                    'id' => 'mengunduh-bahan',
                    'title' => '5.2.1 Mengunduh Bahan, Template dan Peta dari Geospatial System',
                    'icon' => 'fas fa-download',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Buka Geospatial System',
                            'description' => 'Buka Geospatial System dan navigasikan ke menu Bahan/Template.',
                            'note' => 'Pastikan Anda memiliki akses ke sistem'
                        ],
                        [
                            'step' => 2,
                            'title' => 'Pilih Bahan dan Template',
                            'description' => 'Pilih opsi "Bahan dan Template Pemutakhiran Wilkerstat SE2026".',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Download File',
                            'description' => 'Klik ikon download untuk mengunduh file bahan dan template yang diperlukan.',
                            'note' => 'Simpan file dalam folder yang telah disiapkan sesuai struktur manajemen file.'
                        ]
                    ]
                ],
                [
                    'id' => 'mengunduh-peta-sls',
                    'title' => '5.2.2 Mengunduh Peta SLS',
                    'icon' => 'fas fa-map',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Akses Geospatial System',
                            'description' => 'Akses Geospatial System dan pilih menu "Peta Digital".',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Tentukan Periode',
                            'description' => 'Tentukan periode dengan memilih "2024-1".',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih Provinsi',
                            'description' => 'Pilih provinsi sesuai wilayah masing-masing.',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Pilih Level Peta',
                            'description' => 'Pilih level peta "SLS/Non SLS".',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Pilih Sumber',
                            'description' => 'Pilih sumber "Final".',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Pilih Format File',
                            'description' => 'Pilih format file "Geojson".',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Cari Peta',
                            'description' => 'Klik tombol "Cari" untuk menampilkan daftar peta.',
                            'note' => null
                        ],
                        [
                            'step' => 8,
                            'title' => 'Unduh Peta',
                            'description' => 'Unduh peta per kabupaten dengan mengklik ikon download.',
                            'note' => null
                        ],
                        [
                            'step' => 9,
                            'title' => 'Konfirmasi Unduhan',
                            'description' => 'Konfirmasi unduhan peta SLS.',
                            'note' => 'Simpan file sesuai folder yang telah disiapkan (lihat Tabel 5.3).'
                        ]
                    ]
                ],
                [
                    'id' => 'instalasi-qgis',
                    'title' => '5.2.3 Instalasi QGIS',
                    'icon' => 'fas fa-desktop',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Kunjungi Situs QGIS',
                            'description' => 'Kunjungi situs <a href="https://qgis.org/download/" target="_blank" class="text-primary text-decoration-underline"><strong>https://qgis.org/download/</strong></a> untuk mengunduh installer <strong>QGIS 3.34 (LTR)</strong> atau versi LTR terbaru.',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Jalankan Installer',
                            'description' => 'Jalankan file installer <strong>"QGIS-OSGeo4W-3.34.13-1.msi"</strong> yang telah diunduh.',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Ikuti Proses Instalasi',
                            'description' => 'Klik <strong>"Next"</strong> dan ikuti proses instalasi hingga selesai.',
                            'note' => '<strong>Catatan:</strong> Pastikan instalasi berhasil sebelum melanjutkan ke tahap berikutnya.'
                        ]
                    ]
                ],
                [
                    'id' => 'instalasi-plugin',
                    'title' => '5.2.4 Instalasi Plugin QGIS',
                    'icon' => 'fas fa-puzzle-piece',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Freehand Raster Georeferencer',
                            'description' => '<ul class="mb-0"><li>Buka <strong>QGIS</strong></li><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"Freehand raster georeferencer"</strong></li><li>Klik <strong>"Install Plugin"</strong></li></ul>',
                            'note' => null,
                            'image' => 'img/freehand.png'
                        ],
                        [
                            'step' => 2,
                            'title' => 'QuickMapServices',
                            'description' => '<ul class="mb-2"><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"QuickMapServices"</strong></li><li>Klik <strong>"Install Plugin"</strong></li></ul><p class="mb-0"><strong>Untuk menampilkan semua peta:</strong><br>Pilih <strong>"Web"</strong> → <strong>"QuickMapServices"</strong> → <strong>"Settings"</strong> → <strong>"More services"</strong> → klik <strong>"Get contributed pack"</strong></p>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'QR Barcode Layout Item',
                            'description' => '<ul class="mb-0"><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"QR Barcode Layout Item"</strong></li><li>Klik <strong>"Install Plugin"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Clipper',
                            'description' => '<ul class="mb-0"><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"Clipper"</strong></li><li>Klik <strong>"Install Plugin"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Dissect/Dissolve Overlaps',
                            'description' => '<ul class="mb-0"><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"Dissect and dissolve overlap (SAGA NextGen)"</strong></li><li>Klik <strong>"Install Plugin"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Topology Checker',
                            'description' => '<ul class="mb-0"><li>Pilih menu <strong>"Plugins"</strong> → <strong>"Manage and Install Plugins…"</strong></li><li>Gunakan mesin pencari, ketik <strong>"Topology Checker"</strong></li><li>Aktifkan dengan <strong>checklist kotak sebelah kiri</strong></li></ul>',
                            'note' => '<strong>Catatan:</strong> Pastikan semua plugin terinstal dan aktif sebelum digunakan.'
                        ]
                    ]
                ],
                [
                    'id' => 'processing-tools',
                    'title' => '5.2.5 Menambahkan Processing Tools',
                    'icon' => 'fas fa-tools',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Aktifkan Processing Toolbox',
                            'description' => 'Klik kanan pada area kosong di <strong>Toolbar</strong>, lalu aktifkan <strong>"Processing Toolbox Panel"</strong>.',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Tambah Model ke Toolbox',
                            'description' => 'Klik tombol <strong>"Models"</strong> → <strong>"Add Model to Toolbox"</strong>.',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih Tools',
                            'description' => 'Pilih tools dari folder <strong>"01-Input → 09_Processing Tools"</strong> dalam Manajemen File, lalu klik <strong>"Open"</strong>.',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Verifikasi Tools',
                            'description' => '<p>Tools yang ditambahkan akan muncul di bagian <strong>"Models → Wilkerstat2025"</strong>.</p><p><strong>Tools yang digunakan:</strong></p><ul><li><strong>"Cek_Validitas"</strong>: Pengecekan validitas peta digital</li><li><strong>"Fill_Gaps"</strong>: Perbaikan error gap secara massal</li><li><strong>"Cek_Master_PetaSLS"</strong>: Pencocokan atribut dengan master</li><li><strong>"Dissolve_Desa_Kec"</strong>: Pembentukan peta desa dan kecamatan</li></ul>',
                            'note' => '<strong>Catatan:</strong> Pastikan tools final sebelum digunakan dalam pengolahan.'
                        ]
                    ]
                ],
                [
                    'id' => 'bulk-rename',
                    'title' => '5.2.6 Download dan Instalasi Aplikasi Bulk Rename Utility',
                    'icon' => 'fas fa-file-signature',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Kunjungi Situs Download',
                            'description' => 'Kunjungi <a href="https://www.bulkrenameutility.co.uk/Download.php" target="_blank" class="text-primary text-decoration-underline"><strong>https://www.bulkrenameutility.co.uk/Download.php</strong></a> untuk mengunduh aplikasi.',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Instalasi Aplikasi',
                            'description' => 'Jalankan <strong>file installer</strong> dan ikuti proses instalasi hingga selesai.',
                            'note' => '<strong>Catatan:</strong> Pastikan aplikasi berfungsi untuk rename file massal.'
                        ]
                    ]
                ],
                [
                    'id' => 'geotagging',
                    'title' => '5.2.7 Mempersiapkan Geotagging Hasil Lapangan dari Web Wilkerstat',
                    'icon' => 'fas fa-map-pin',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Akses Web Wilkerstat',
                            'description' => 'Buka situs <a href="https://wilkerstat.bps.go.id/" target="_blank" class="text-primary text-decoration-underline"><strong>https://wilkerstat.bps.go.id/</strong></a>, pilih <strong>"Data"</strong> → <strong>"Download"</strong>.',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Isi Parameter Download',
                            'description' => '<p><strong>Isi parameter berikut:</strong></p><ul><li><strong>Project:</strong> "Updating SE2026"</li><li><strong>Jenis Data:</strong> "Landmark"</li><li><strong>Level Cakupan:</strong> "Kabupaten/Kota"</li><li><strong>Kategori:</strong> "Semua Kategori"</li><li><strong>Status Project:</strong> "Aktif"</li><li><strong>Status Landmark:</strong> "Aktif"</li><li><strong>Jenis File:</strong> "CSV"</li><li><strong>Filter Wilayah:</strong> Sesuai wilayah masing-masing</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Download File',
                            'description' => 'Klik tombol <strong>"Download"</strong>.',
                            'note' => '<strong>Catatan:</strong> Simpan file sesuai struktur folder yang telah disiapkan.'
                        ]
                    ]
                ]
            ]
        ];

        return view('training.penyiapan-pengolahan-detail', compact('tutorialData'));
    }

    /**
     * Display detailed step-by-step tutorial for Penyiapan Bahan
     */
    public function penyiapanBahanDetail()
    {
        $tutorialData = [
            'title' => 'Penyiapan Bahan Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Penyiapan bahan melibatkan pengumpulan dan pengolahan master SLS melalui FRS-MFDOnline, scanning peta hasil lapangan (WA, WS, LK-Peta) dengan resolusi 200 dpi dalam format JPEG, serta rename file menggunakan Bulk Rename Utility berdasarkan pasangan nama lama dan baru dari file teks atau CSV. Proses ini memastikan data dan peta siap digunakan untuk tahap pengolahan lebih lanjut.',
            'sections' => [
                [
                    'id' => 'penyiapan-master-sls',
                    'title' => '5.3.1 Penyiapan Master SLS',
                    'icon' => 'fas fa-database',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Kumpulkan Hasil Lapangan',
                            'description' => 'Kumpulkan hasil lapangan pemutakhiran SLS, termasuk dokumen PSLS, Peta WS, dan data geotagging.',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Ajukan Perubahan SLS',
                            'description' => 'Ajukan perubahan SLS melalui aplikasi FRS-MFDOnline.',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Ajukan PWA (Jika Diperlukan)',
                            'description' => 'Ajukan Perubahan Wilayah Administrasi (PWA) melalui FRS-MFDOnline jika ada perubahan wilayah.',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Dapatkan Approval',
                            'description' => 'Dapatkan approval hasil entri pemutakhiran master wilkerstat dari pihak berwenang.',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Monitor Progres',
                            'description' => 'Monitor progres pengolahan pemutakhiran master wilkerstat untuk memastikan keakuratan data.',
                            'note' => 'Pastikan semua perubahan disinkronkan sebelum melanjutkan ke tahap berikutnya.'
                        ]
                    ]
                ],
                [
                    'id' => 'scan-peta-lapangan',
                    'title' => '5.3.2 Scan Peta Hasil Lapangan Wilkerstat',
                    'icon' => 'fas fa-file-image',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Scan Semua Peta',
                            'description' => 'Scan semua peta hasil lapangan wilkerstat (WA, WS, dan LK-Peta).',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Persiapan Peta',
                            'description' => 'Pastikan kertas peta tidak terlipat, lalu susun berdasarkan urutan ID untuk memudahkan rename file.',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pengaturan Scan',
                            'description' => 'Simpan hasil scan dalam format JPEG, gunakan pengaturan full color dengan resolusi 200 dpi.',
                            'note' => 'Periksa kualitas scan sebelum menyimpan ke folder yang telah disiapkan.'
                        ]
                    ]
                ],
                [
                    'id' => 'rename-bulk-utility',
                    'title' => '5.3.3 Rename Menggunakan Aplikasi Bulk Rename Utility',
                    'icon' => 'fas fa-file-signature',
                    'subsections' => [
                        [
                            'id' => 'mempersiapkan-file-teks',
                            'title' => 'a. Mempersiapkan File Teks',
                            'steps' => [
                                [
                                    'step' => 1,
                                    'title' => 'Salin Nama File Hasil Scan',
                                    'description' => '<p><strong>Langkah 1:</strong> Salin nama file hasil scan.</p><ul><li>Buka Bulk Rename Utility, pilih semua file scan → klik kanan → pilih "Clipboard Copy" → pilih "Filename + Ext".</li></ul>',
                                    'note' => null,
                                    'image' => 'img/a1.png'
                                ],
                                [
                                    'step' => 2,
                                    'title' => 'Persiapkan Nama File Baru di Excel',
                                    'description' => '<p><strong>Langkah 2:</strong> Persiapkan nama file baru di Excel.</p><ul><li>Tempel nama file scan di kolom A → isi kolom B dengan nama baru berdasarkan idsls → pada sel C1, masukkan rumus <code>=CONCATENATE(A1,"|"B1,"_WS.JPG")</code> untuk peta wilkerstat → salin rumus ke baris yang diperlukan.</li><li>Simpan dalam format teks (.txt): salin field ketiga → tempel di Notepad/Notepad++ → simpan sebagai "idkab.txt" → klik "Save".</li></ul>',
                                    'note' => null,
                                    'images' => ['img/a21.png', 'img/a22.png']
                                ],
                                [
                                    'step' => 3,
                                    'title' => 'Opsional: Simpan sebagai CSV',
                                    'description' => '<p><strong>Langkah 3 (Opsional CSV):</strong> Salin field keempat → tempel (Paste Values) di Excel baru → simpan sebagai "idkab.csv" → klik "Save".</p>',
                                    'note' => null,
                                    'image' => 'img/a3.png'
                                ]
                            ]
                        ],
                        [
                            'id' => 'proses-rename-file',
                            'title' => 'b. Proses Rename File',
                            'steps' => [
                                [
                                    'step' => 1,
                                    'title' => 'Buka Bulk Rename Utility',
                                    'description' => '<p><strong>Langkah 1:</strong> Buka Bulk Rename Utility dan pilih file yang akan di-rename.</p>',
                                    'note' => null,
                                    'image' => 'img/b1.png'
                                ],
                                [
                                    'step' => 2,
                                    'title' => 'Impor File Teks/CSV',
                                    'description' => '<p><strong>Langkah 2:</strong> Impor file teks/CSV yang telah dibuat.</p><ul><li>Klik menu "Actions" → pilih "Import Rename-Pairs" → pilih file teks/CSV → klik "Open".</li></ul>',
                                    'note' => null,
                                    'image' => 'img/b2.png'
                                ],
                                [
                                    'step' => 3,
                                    'title' => 'Pilih Opsi Copy/Move',
                                    'description' => '<p><strong>Langkah 3:</strong> Pilih opsi "Copy/Move to Location (13)" untuk menyimpan peta hasil scan yang sudah di-rename ke folder yang telah disiapkan.</p>',
                                    'note' => null
                                ],
                                [
                                    'step' => 4,
                                    'title' => 'Mulai Proses Rename',
                                    'description' => '<p><strong>Langkah 4:</strong> Klik tombol "Rename" untuk memulai proses penggantian nama.</p>',
                                    'note' => 'Pastikan file teks/CSV akurat dan folder tujuan sudah tersedia sebelum rename.'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return view('training.penyiapan-bahan-detail', compact('tutorialData'));
    }

    /**
     * Display detailed step-by-step tutorial for Georeferensi Peta yang Mengalami Perubahan
     */
    public function georeferensiPetaDetail()
    {
        $tutorialData = [
            'title' => 'Georeferensi Peta yang Mengalami Perubahan Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Proses georeferensi bertujuan menyelaraskan scan Peta WS dengan sistem koordinat peta digital SLS menggunakan plugin Freehand Raster Georeferencer, menghasilkan layer Peta WS yang siap untuk digitasi batas SLS yang berubah. Tahapan mencakup menampilkan peta SLS dan scan Peta WS, lalu melakukan georeferensi dengan menyesuaikan titik acuan untuk akurasi data.',
            'sections' => [
                [
                    'id' => 'menampilkan-peta-sls',
                    'title' => '5.4.1 Menampilkan Peta SLS untuk Proses Georeferensi',
                    'icon' => 'fas fa-map',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Buka Layer Peta Digital SLS',
                            'description' => '<p><strong>Langkah 1:</strong> Buka layer peta digital SLS di QGIS.</p><ul><li>Klik menu <strong>"Layer"</strong> → <strong>"Add Layer"</strong> → <strong>"Add Vector Layer"</strong></li><li>Atau <em>drag and drop</em> file <code>Geojson</code> ke panel layer</li></ul>',
                            'note' => '<strong>Catatan:</strong> Pastikan file Geojson valid sebelum memulai.'
                        ],
                        [
                            'step' => 2,
                            'title' => 'Akses Properties Layer',
                            'description' => '<p><strong>Langkah 2:</strong> Setelah layer SLS tampil, akses properties layer.</p><ul><li>Klik kanan pada layer → pilih <strong>"Properties"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Atur Symbology',
                            'description' => '<p><strong>Langkah 3:</strong> Atur tampilan symbology.</p><ul><li>Atur <strong>"Symbology"</strong> menjadi <strong>"Simple Line"</strong> untuk tampilan garis</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Atur Label',
                            'description' => '<p><strong>Langkah 4:</strong> Atur label untuk identifikasi SLS.</p><ul><li>Atur <strong>"Label"</strong> → pilih <strong>"Value: idsls"</strong> untuk menampilkan identifikasi SLS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Buka Attribute Table',
                            'description' => '<p><strong>Langkah 5:</strong> Buka tabel atribut layer.</p><ul><li>Klik kanan pada layer → pilih <strong>"Open Attribute Table"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Zoom ke Feature',
                            'description' => '<p><strong>Langkah 6:</strong> Fokus pada area SLS yang akan digeoreferensi.</p><ul><li>Klik kanan pada baris SLS yang akan digeoreferensi → pilih <strong>"Zoom to Feature"</strong> untuk fokus pada area tersebut</li></ul>',
                            'note' => null
                        ]
                    ]
                ],
                [
                    'id' => 'menampilkan-scan-peta-ws',
                    'title' => '5.4.2 Menampilkan Scan Peta WS yang akan Digeoreferensi',
                    'icon' => 'fas fa-file-image',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Tambahkan Raster Layer',
                            'description' => '<p><strong>Langkah 1:</strong> Tambahkan gambar scan Peta WS.</p><ul><li>Klik ikon <strong>"Add Raster Layer"</strong> <code>[AD]</code> untuk menambahkan gambar scan Peta WS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Browse File',
                            'description' => '<p><strong>Langkah 2:</strong> Akses file browser.</p><ul><li>Klik <strong>"Browse"</strong> pada Dialog Box yang muncul</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih File Scan',
                            'description' => '<p><strong>Langkah 3:</strong> Pilih file scan yang sesuai.</p><ul><li>Pilih file scan Peta WS sesuai dengan SLS yang akan diproses → klik <strong>"Open"</strong></li></ul>',
                            'note' => '<strong>Catatan:</strong> Pastikan file scan dalam format yang didukung (misalnya <em>JPEG</em>) dan telah di-rename dengan benar.'
                        ],
                        [
                            'step' => 4,
                            'title' => 'Tambahkan ke Proyek',
                            'description' => '<p><strong>Langkah 4:</strong> Finalisasi penambahan layer.</p><ul><li>Klik <strong>"Add New"</strong> untuk menambahkan layer scan ke proyek QGIS</li></ul>',
                            'note' => null
                        ]
                    ]
                ],
                [
                    'id' => 'menggunakan-plugin-freehand',
                    'title' => '5.4.3 Menggunakan Plugin Freehand Raster Georeferencer',
                    'icon' => 'fas fa-crosshairs',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Aktifkan Plugin',
                            'description' => '<p><strong>Langkah 1:</strong> Aktifkan plugin georeferensi.</p><ul><li>Aktifkan plugin dengan mengklik ikon <strong>"Freehand Raster Georeferencer"</strong> <code>[2P]</code> di toolbar QGIS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Pilih Titik Acuan',
                            'description' => '<p><strong>Langkah 2:</strong> Tentukan titik acuan pertama.</p><ul><li>Klik pada salah satu titik acuan di <em>image Peta WS</em> → <strong>tahan dan geser</strong> ke titik yang bersesuaian pada peta digital SLS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Ulangi untuk Titik Lain',
                            'description' => '<p><strong>Langkah 3:</strong> Tambahkan titik acuan tambahan.</p><ul><li>Ulangi proses pada <strong>2–3 titik acuan lainnya</strong> hingga batas Peta WS sesuai dengan peta digital SLS</li></ul>',
                            'note' => '<strong>Penting:</strong> Pastikan titik acuan dipilih dengan <em>akurat</em> untuk hasil georeferensi yang optimal.'
                        ],
                        [
                            'step' => 4,
                            'title' => 'Simpan Hasil Georeferensi',
                            'description' => '<p><strong>Langkah 4:</strong> Simpan hasil georeferensi.</p><ul><li>Klik ikon <strong>"Save Georeferenced Image"</strong> <code>[!!]</code> untuk menyimpan hasil georeferensi</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Browse Lokasi Penyimpanan',
                            'description' => '<p><strong>Langkah 5:</strong> Pilih lokasi penyimpanan.</p><ul><li>Klik <strong>"Browse"</strong> untuk memilih lokasi penyimpanan</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Tentukan Folder',
                            'description' => '<p><strong>Langkah 6:</strong> Finalisasi lokasi penyimpanan.</p><ul><li>Tentukan folder penyimpanan → klik <strong>"Save"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Selesaikan Proses',
                            'description' => '<p><strong>Langkah 7:</strong> Konfirmasi penyelesaian.</p><ul><li>Klik <strong>"OK"</strong> untuk menyelesaikan proses</li></ul>',
                            'note' => null
                        ]
                    ]
                ]
            ]
        ];

        return view('training.georeferensi-peta-detail', compact('tutorialData'));
    }

    /**
     * Display detailed step-by-step tutorial for Editing Peta Digital
     */
    public function editingPetaDigitalDetail()
    {
        $tutorialData = [
            'title' => 'Editing Peta Digital Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Editing peta digital bertujuan menyesuaikan batas wilayah SLS/sub-SLS dengan kondisi lapangan menggunakan scan Peta WS bergeoreferensi. Proses ini mencakup koreksi non-topologis (memotong, menggabungkan poligon, dan mengedit atribut) dan koreksi topologis (menghilangkan gap, overlap, dan duplikat geometri), memastikan akurasi data untuk tahap selanjutnya.',
            'sections' => [
                [
                    'id' => 'menggabungkan-poligon',
                    'title' => '5.5.1 Menggabungkan Poligon',
                    'icon' => 'fas fa-object-group',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Aktifkan Mode Edit',
                            'description' => '<p><strong>Langkah 1:</strong> Aktifkan mode editing.</p><ul><li>Aktifkan mode edit dengan mengklik <strong>"Toggle Editing"</strong> di toolbar QGIS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Pilih Poligon',
                            'description' => '<p><strong>Langkah 2:</strong> Pilih poligon yang akan digabung.</p><ul><li>Klik ikon <strong>"Select"</strong> untuk memilih poligon-poligon yang akan digabung</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Gabungkan Poligon',
                            'description' => '<p><strong>Langkah 3:</strong> Lakukan proses merge.</p><ul><li>Klik ikon <strong>"Merge"</strong> untuk menggabungkan poligon yang dipilih</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Pilih Atribut',
                            'description' => '<p><strong>Langkah 4:</strong> Tentukan atribut hasil merge.</p><ul><li>Pada jendela <strong>"Merge Feature"</strong>, pilih atribut yang akan diambil sebagai atribut poligon hasil merge</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Finalisasi Merge',
                            'description' => '<p><strong>Langkah 5:</strong> Selesaikan proses merge.</p><ul><li>Klik ikon <strong>"Take attribute from selected feature"</strong> → klik <strong>"OK"</strong> untuk menyelesaikan proses</li></ul>',
                            'note' => '<strong>Catatan:</strong> Pastikan poligon yang dipilih sesuai dengan data lapangan sebelum merge.'
                        ]
                    ]
                ],
                [
                    'id' => 'memotong-poligon',
                    'title' => '5.5.2 Memotong Poligon',
                    'icon' => 'fas fa-cut',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Aktifkan Split Features',
                            'description' => '<p><strong>Langkah 1:</strong> Aktifkan tool untuk memotong.</p><ul><li>Aktifkan mode edit dengan mengklik <strong>"Toggle Editing"</strong> → pilih <strong>"Split Features"</strong></li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Tentukan Garis Potong',
                            'description' => '<p><strong>Langkah 2:</strong> Gunakan acuan dari Peta WS.</p><ul><li>Gunakan acuan dari <em>Peta WS hasil lapangan</em> untuk menentukan garis potong</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih dan Zoom Wilayah',
                            'description' => '<p><strong>Langkah 3:</strong> Fokus pada area yang akan diedit.</p><ul><li>Klik <strong>"Select Feature"</strong> untuk memilih wilayah yang akan dipotong</li><li>Lakukan <strong>"Zoom in"</strong> pada poligon yang akan diedit untuk fokus yang lebih baik</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Potong Poligon',
                            'description' => '<p><strong>Langkah 4:</strong> Lakukan pemotongan sesuai batas SLS.</p><ul><li>Potong poligon sesuai garis batas SLS pada Peta WS dengan alat split</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Isi Atribut',
                            'description' => '<p><strong>Langkah 5:</strong> Lengkapi identitas poligon.</p><ul><li>Isi identitas/atribut secara lengkap pada masing-masing poligon <strong>SLS/non-SLS</strong> atau <strong>sub-SLS</strong> yang telah dipotong</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Simpan Hasil',
                            'description' => '<p><strong>Langkah 6:</strong> Simpan ke folder yang ditentukan.</p><ul><li>Simpan hasil ke folder yang telah ditentukan (detail di sub-bab 5.6)</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Akhiri Mode Edit',
                            'description' => '<p><strong>Langkah 7:</strong> Selesaikan proses editing.</p><ul><li>Klik <strong>"Toggle Editing"</strong> kembali untuk mengakhiri proses edit</li></ul>',
                            'note' => '<strong>Catatan:</strong> Verifikasi batas dengan Peta WS sebelum menyimpan untuk memastikan akurasi.'
                        ]
                    ]
                ]
            ]
        ];

        return view('training.editing-peta-digital-detail', compact('tutorialData'));
    }

    /**
     * Display detailed step-by-step tutorial for Cleaning dan Validasi Peta
     */
    public function cleaningValidasiDetail()
    {
        $tutorialData = [
            'title' => 'Cleaning dan Validasi Peta Hasil Editing Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Cleaning dan validasi peta memastikan data geospasial akurat dengan memperbaiki null/invalid geometry, error topologi (gap, overlap, duplikat), dan validasi atribut menggunakan QGIS/ArcMap. Proses ini diakhiri dengan ekspor ke format GeoJSON yang sesuai standar (EPSG:4326, poligon, UTF-8), meningkatkan integritas dan keandalan data untuk analisis lebih lanjut.',
            'sections' => [
                [
                    'id' => 'cleaning-null-invalid-geometry',
                    'title' => '5.6.1 Cleaning Null Geometry dan Invalid Geometry',
                    'icon' => 'fas fa-broom',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Menghilangkan Null Geometry (QGIS)',
                            'description' => '<p><strong>Langkah 1:</strong> Tampilkan peta digital SLS, cari tools "Remove Null Geometries" di "Processing Toolbox".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Konfigurasi Tools Remove Null Geometries',
                            'description' => '<p><strong>Langkah 2:</strong> Double klik untuk mengaktifkan tools, lalu isi parameter di dialog box.</p><ul><li><strong>Input Layer:</strong> peta SLS/sub-SLS</li><li>Centang "<strong>Also remove empty geometries</strong>"</li><li><strong>Non null geometries:</strong> "Create temporary layer"</li><li><strong>Null geometries:</strong> "Create temporary layer"</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Jalankan Proses',
                            'description' => '<p><strong>Langkah 3:</strong> Klik "<strong>Run</strong>" untuk menghasilkan dua layer.</p>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Verifikasi dan Simpan',
                            'description' => '<p><strong>Langkah 4:</strong> Cek layer "Null geometries". Jika kosong, simpan layer "Non null geometries" sebagai file <code>*.gpkg</code>.</p>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Melakukan Cleaning Invalid Geometry (QGIS) - Cek Validitas',
                            'description' => '<p><strong>Langkah 1 (Cek Validitas):</strong> Gunakan tools "<strong>Cek_Validitas</strong>" untuk menghasilkan tiga layer temporary:</p><ul><li>"<strong>Point_Invalid_Geometry</strong>": lokasi invalid geometry</li><li>"<strong>Fix_Geometries</strong>": hasil perbaikan</li><li>"<strong>Poligon_Invalid_Geometry</strong>": poligon dengan invalid geometry</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Perbaikan Invalid Geometry',
                            'description' => '<p><strong>Langkah 2 (Perbaikan Invalid Geometry):</strong></p><ul><li>Aktifkan "<strong>Avoid Overlap to Active Layer</strong>" di Snapping Toolbar</li><li><strong>Perbaikan Poligon:</strong> Select poligon → gunakan "Split Feature" → hapus potongan invalid → buat poligon baru → gabungkan</li><li><strong>Perbaikan Vertex:</strong> Hapus atau geser vertex invalid</li><li>Ulangi cek validitas untuk memastikan tidak ada error</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Cleaning Invalid Geometry (ArcMap)',
                            'description' => '<p><strong>Langkah 1:</strong> Aktifkan "<strong>Repair Geometry</strong>" via "Search" → ketik "repair geometry" → klik untuk membuka tools.</p><p><strong>Langkah 2:</strong> Isi "<strong>Input Features</strong>" dengan peta yang akan diperbaiki.</p><p><strong>Langkah 3:</strong> Klik "<strong>OK</strong>" untuk menjalankan perbaikan.</p>',
                            'note' => '<strong>Catatan:</strong> Pilih software sesuai kebutuhan (QGIS atau ArcMap).'
                        ]
                    ]
                ],
                [
                    'id' => 'cleaning-error-topology',
                    'title' => '5.6.2 Cleaning Error Topology',
                    'icon' => 'fas fa-project-diagram',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Pengecekan Topologi (QGIS)',
                            'description' => '<p><strong>Langkah 1:</strong> Buka "<strong>Topology Checker</strong>" via "Tab Vector" → klik tombol konfigurasi "<strong>Topology Rule</strong>".</p><ul><li><strong>Rule #1:</strong> "Must not have gaps"</li><li><strong>Rule #2:</strong> "Must not overlap"</li><li><strong>Rule #3:</strong> "Must not have duplicates"</li><li><strong>Rule #4:</strong> "Must not have invalid geometries"</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Cleaning Overlaps (QGIS) - Plugin Clippers',
                            'description' => '<p><strong>Plugin Clippers</strong> (manual):</p><ul><li>Zoom ke lokasi overlap (klik 2x di "<strong>Topology Checker Panel</strong>")</li><li>Select poligon → akses "<strong>Vector</strong>" → "<strong>Clipper</strong>" → "<strong>Clipper</strong>" untuk memotong</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Cleaning Overlaps - Plugin Dissect/Dissolve Overlaps',
                            'description' => '<p><strong>Plugin Dissect/Dissolve Overlaps</strong> (massal):</p><ul><li>Jalankan dari "<strong>Processing Toolbox</strong>"</li><li><strong>Input Layer:</strong> peta dengan overlap</li><li><strong>Options:</strong> "Dissect and Dissolve Overlaps"</li><li><strong>Dissolve Poligon into:</strong> 2 (largest common boundary)</li><li><strong>Self Intersected:</strong> uncheck</li><li><strong>Dissected and Dissolve:</strong> check</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Cleaning Gaps (QGIS) - Digitasi Manual',
                            'description' => '<p><strong>Digitasi Manual:</strong></p><ul><li>Zoom ke gap (klik 2x di "<strong>Topology Checker Panel</strong>")</li><li>Aktifkan "<strong>Avoid Overlap on Active Layer</strong>" di Snapping Toolbar</li><li>Aktifkan "<strong>Toggle Editing</strong>" → klik "<strong>Ctrl+.</strong>" untuk tambah poligon → digitasi gap → gabungkan dengan poligon SLS</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Cleaning Gaps - Processing Tool Fill_Gaps',
                            'description' => '<p><strong>Processing Tool Fill_Gaps</strong> (massal):</p><ul><li>Jalankan "<strong>Fill_Gaps</strong>" dari "<strong>Processing Toolbox</strong>"</li><li><strong>Input:</strong> peta SLS dengan gap → hasilkan layer "<strong>Result</strong>" tanpa gap</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Cleaning Error Topology (ArcMap) - Membangun Topology',
                            'description' => '<p><strong>Langkah 1 (Membangun Topology):</strong></p><ul><li>Klik kanan "<strong>Feature Dataset</strong>" → "<strong>New</strong>" → "<strong>Topology</strong>" → "<strong>Next</strong>" (default)</li><li>"<strong>Select All</strong>" feature → "<strong>Next</strong>" (default) → "<strong>Add Rule</strong>" → pilih "<strong>Must Not Overlap</strong>" dan "<strong>Must Not Have Gaps</strong>" → "<strong>Next</strong>" → "<strong>Finish</strong>"</li><li>Pilih "<strong>Yes</strong>" untuk validasi topologi → buat "<strong>Blank Map</strong>" → drag and drop file geodatabase → aktifkan "<strong>Topology Toolbar</strong>" dengan cara memilih "<strong>Customize</strong>" → "<strong>Toolbars</strong>" → "<strong>Topology</strong>"</li><li>Mulai "<strong>Start Editing</strong>" → klik "<strong>Error Inspector</strong>" → "<strong>Search Now</strong>" untuk daftar error</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Memperbaiki Gap (ArcMap)',
                            'description' => '<p><strong>Langkah 2 (Memperbaiki Gap):</strong></p><ul><li>Pada jendela "<strong>Error Inspector</strong>" → Klik kanan "<strong>Must Not Have Gaps</strong>" → "<strong>Zoom To</strong>" → "<strong>Create Feature</strong>" → gabungkan dengan poligon induk via pilih "<strong>Editor</strong>" → "<strong>Merge</strong>"</li><li><strong>Alternatif:</strong> gunakan "<strong>Auto Complete Polygon</strong>" dari "<strong>Create Features</strong>" → klik pada nama fitur → pada "<strong>Construction Tools</strong>" klik "<strong>Auto Complete Polygon</strong>" (kursor akan berubah menjadi seperti "+") → klik 2 (dua) kali pada gap sampai poligon menjadi tertutup</li><li>Abaikan gap luar pulau dengan "<strong>Must Not Have Gaps</strong>" → klik kanan pilih "<strong>Mark as Exception</strong>"</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 8,
                            'title' => 'Memperbaiki Overlap (ArcMap)',
                            'description' => '<p><strong>Langkah 3 (Memperbaiki Overlap):</strong></p><ul><li>Pada jendela "<strong>Error Inspector</strong>" → klik kanan pada "<strong>Must Not Overlap</strong>" → pilih "<strong>Zoom To</strong>" → Pilih "<strong>Must Not Overlap</strong>" → klik kanan → merge untuk menggabungkan poligon overlap ke poligon induknya</li></ul>',
                            'note' => '<strong>Catatan:</strong> Verifikasi hasil setelah setiap perbaikan.'
                        ]
                    ]
                ],
                [
                    'id' => 'validasi-atribut',
                    'title' => '5.6.3 Validasi Atribut',
                    'icon' => 'fas fa-check-double',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Tampilkan Layer Master dan Peta SLS',
                            'description' => '<p><strong>Langkah 1:</strong> Tampilkan layer "<strong>Master</strong>" dan "<strong>Peta SLS Hasil Editing</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Akses Tools Cek Master',
                            'description' => '<p><strong>Langkah 2:</strong> Klik "<strong>Cek_Master_PetaSLS</strong>" di "<strong>Processing Tools</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Konfigurasi Parameter',
                            'description' => '<p><strong>Langkah 3:</strong> Isi parameter:</p><ul><li><strong>Master:</strong> "Master 2025 Semester 1"</li><li><strong>Peta SLS edit:</strong> "Peta SLS hasil edit"</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Jalankan Proses',
                            'description' => '<p><strong>Langkah 4:</strong> Klik "<strong>Run</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Periksa Layer Unmatch',
                            'description' => '<p><strong>Langkah 5:</strong> Periksa layer temporary "<strong>PetaSLS_Unmatch</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Perbaiki Batas SLS',
                            'description' => '<p><strong>Langkah 6:</strong> Perbaiki batas SLS jika "<strong>idsls_count</strong>" tidak sama dengan 1.</p>',
                            'note' => '<strong>Catatan:</strong> Pastikan atribut sesuai standar master sebelum validasi.'
                        ]
                    ]
                ],
                [
                    'id' => 'export-geojson',
                    'title' => '5.6.4 Export File to GeoJSON',
                    'icon' => 'fas fa-file-export',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Pastikan Format File',
                            'description' => '<p><strong>Langkah 1:</strong> Pastikan format file adalah "<strong>GeoJSON</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Beri Nama File',
                            'description' => '<p><strong>Langkah 2:</strong> Beri nama file dengan format "<code>final_sls_&lt;idkab&gt;_2025-1.geojson</code>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih CRS',
                            'description' => '<p><strong>Langkah 3:</strong> Pilih CRS "<strong>EPSG:4326 – WGS 84</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Cek Encoding',
                            'description' => '<p><strong>Langkah 4:</strong> Cek "<strong>Encoding UTF-8</strong>" (konversi jika bukan UTF-8).</p>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Pilih Geometry Type',
                            'description' => '<p><strong>Langkah 5:</strong> Pilih "<strong>Geometry Type</strong>" sebagai "<strong>Poligon</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Verifikasi Extent',
                            'description' => '<p><strong>Langkah 6:</strong> Verifikasi "<strong>extent</strong>" bukan metric (reproject jika metric).</p>',
                            'note' => '<strong>Catatan:</strong> Hindari kesalahan seperti tipe geometri salah atau CRS tidak sesuai.'
                        ]
                    ]
                ]
            ]
        ];

        return view('training.cleaning-validasi-detail', compact('tutorialData'));
    }

    /**
     * Display detailed step-by-step tutorial for Dissolving Peta Wilkerstat
     */
    public function dissolvingPetaDetail()
    {
        $tutorialData = [
            'title' => 'Dissolving Peta Wilkerstat Desa, Kecamatan Wilkerstat SE2026',
            'subtitle' => 'Panduan Langkah demi Langkah',
            'description' => 'Proses dissolving membentuk peta desa dan kecamatan dari peta SLS/sub-SLS yang telah final menggunakan tools "Dissolve_Desa_Kec" di QGIS. Hasilnya diekspor sebagai file permanen dalam format .gpkg dan diunggah ke Geospatial System, memastikan data siap untuk penggunaan lebih lanjut.',
            'sections' => [

                [
                    'id' => 'langkah-terperinci',
                    'title' => 'Langkah-langkah Terperinci',
                    'icon' => 'fas fa-list-ol',
                    'steps' => [
                        [
                            'step' => 1,
                            'title' => 'Tampilkan Layer Hasil Finalisasi',
                            'description' => '<p><strong>Langkah 1:</strong> Tampilkan layer hasil finalisasi <strong>Peta SLS/sub-SLS</strong> di QGIS.</p>',
                            'note' => null
                        ],
                        [
                            'step' => 2,
                            'title' => 'Akses Processing Tools',
                            'description' => '<p><strong>Langkah 2:</strong> Klik "<strong>Processing Tools</strong>" dan pilih "<strong>Dissolve_Desa_Kec</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 3,
                            'title' => 'Pilih Input Layer',
                            'description' => '<p><strong>Langkah 3:</strong> Pilih peta SLS/sub-SLS dari layer "<strong>Peta_SLS_Final</strong>" sebagai input.</p>',
                            'note' => null
                        ],
                        [
                            'step' => 4,
                            'title' => 'Jalankan Proses Dissolving',
                            'description' => '<p><strong>Langkah 4:</strong> Klik "<strong>Run</strong>" untuk memproses dissolving.</p>',
                            'note' => null
                        ],
                        [
                            'step' => 5,
                            'title' => 'Periksa Layer Temporary',
                            'description' => '<p><strong>Langkah 5:</strong> Periksa pembentukan dua layer temporary: "<strong>Dissolve_Desa</strong>" dan "<strong>Dissolve_Kec</strong>".</p>',
                            'note' => null
                        ],
                        [
                            'step' => 6,
                            'title' => 'Ekspor Layer Menjadi File Permanen',
                            'description' => '<p><strong>Langkah 6:</strong> Ekspor layer temporary menjadi file permanen:</p><ul><li>Untuk peta desa: simpan sebagai "<code>&lt;idkab&gt;_desa_2025-1.gpkg</code>"</li><li>Untuk peta kecamatan: simpan sebagai "<code>&lt;idkab&gt;_kec_2025-1.gpkg</code>"</li></ul>',
                            'note' => null
                        ],
                        [
                            'step' => 7,
                            'title' => 'Unggah ke Geospatial System',
                            'description' => '<p><strong>Langkah 7:</strong> Unggah file peta desa dan kecamatan yang telah diekspor ke <strong>Geospatial System</strong>.</p>',
                            'note' => '<strong>Catatan:</strong> Pastikan layer input sudah divalidasi sebelum memulai proses, dan verifikasi hasil unggahan di Geospatial System.'
                        ]
                    ]
                ]
            ]
        ];

        return view('training.dissolving-peta-detail', compact('tutorialData'));
    }
}