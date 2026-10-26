<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'skills' => [
                ['icon' => 'fab fa-html5',          'name' => 'HTML5',          'level' => 80],
                ['icon' => 'fab fa-css3-alt',       'name' => 'CSS3',           'level' => 75],
                ['icon' => 'fab fa-js',             'name' => 'JavaScript',     'level' => 65],
                ['icon' => 'fas fa-pen-nib',        'name' => 'UI/UX Design',   'level' => 85],
                ['icon' => 'fas fa-palette',        'name' => 'Desain Digital', 'level' => 80],
                ['icon' => 'fas fa-mobile-screen',  'name' => 'Flutter',        'level' => 70],
            ],
            'projects' => [
                [
                    'title' => 'Nusantara Journey',
                    'image' => 'https://via.placeholder.com/400x250/2563eb/ffffff?text=Nusantara+Journey',
                    'desc'  => 'Aplikasi wisata yang dirancang untuk membantu pengguna menemukan dan mengenal berbagai destinasi wisata, khususnya wisata di Kota Bandar Lampung.',
                    'tags'  => ['Flutter', 'Dart', 'UI/UX'],
                    'links' => [['fas fa-link', 'Demo', '#'], ['fab fa-github', 'Code', '#']],
                ],
                [
                    'title' => 'Desain Layanan Kesehatan',
                    'image' => 'https://via.placeholder.com/400x250/60a5fa/ffffff?text=Layanan+Kesehatan',
                    'desc'  => 'Perancangan antarmuka aplikasi layanan kesehatan dengan fokus pada kemudahan penggunaan, tampilan modern, dan pengalaman pengguna.',
                    'tags'  => ['UI/UX', 'Design', 'Prototype'],
                    'links' => [['fas fa-link', 'Prototype', '#'], ['fas fa-palette', 'Design', '#']],
                ],
                [
                    'title' => 'Terra Guard',
                    'image' => 'https://via.placeholder.com/400x250/111111/ffffff?text=Terra+Guard',
                    'desc'  => 'Konsep game edukasi sederhana bertema lingkungan yang mengajak pemain menjaga bumi sekaligus mengenalkan nilai-nilai Sustainable Development Goals.',
                    'tags'  => ['Game', 'SDGs', 'Design'],
                    'links' => [['fas fa-link', 'Detail', '#'], ['fas fa-gamepad', 'Game', '#']],
                ],
            ],
            'contacts' => [
                ['fas fa-envelope',       'Email',            'muhammad_arkaan_andrean@teknokrat.ac.id'],
                ['fas fa-user',           'Nama',             'Muhammad Arkaan Andrean'],
                ['fas fa-university',     'Perguruan Tinggi', 'Universitas Teknokrat Indonesia'],
                ['fas fa-map-marker-alt', 'Lokasi',           'Bandar Lampung, Indonesia'],
            ],
        ]);
    }
}
