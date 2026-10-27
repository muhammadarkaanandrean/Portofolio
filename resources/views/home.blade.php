@extends('layouts.app')

@section('content')
@php
    $nav = [['home','Home'],['about','Tentang'],['skills','Skill'],['projects','Proyek'],['experience','Pengalaman'],['certificates','Sertifikat'],['contact','Kontak']];

    // GANTI tautan '#' dengan tautan aslimu
    $socials = [
        ['fa-brands fa-github',   'GitHub',    '#'],
        ['fa-brands fa-linkedin', 'LinkedIn',  '#'],
        ['fa-brands fa-instagram','Instagram', '#'],
        ['fa-solid fa-envelope',  'Email',     'mailto:muhammad_arkaan_andrean@teknokrat.ac.id'],
    ];

    // [nama, ikon devicon, level %]
    $skills = [
        'Frontend'           => [['HTML5','html5',80],['CSS3','css3',75],['Tailwind CSS','tailwindcss',70],['JavaScript','javascript',65]],
        'Backend & Database' => [['PHP','php',60],['Laravel','laravel',55],['MySQL','mysql',60]],
        'Tools'              => [['Git','git',65],['GitHub','github',65],['VS Code','vscode',85],['Figma','figma',85],['Postman','postman',50]],
    ];

    // kategori: web | mobile | design
    $projects = [
        ['Nusantara Journey','mobile','2563eb','Pengguna sulit menemukan info wisata Bandar Lampung. Solusinya: aplikasi wisata yang memudahkan menemukan dan mengenal destinasi lokal.',['Flutter','Dart','UI/UX']],
        ['Desain Layanan Kesehatan','design','0ea5e9','Antarmuka layanan kesehatan yang rumit. Solusinya: desain modern dengan fokus kemudahan penggunaan dan pengalaman pengguna.',['Figma','Prototype','UI/UX']],
        ['Terra Guard','design','059669','Edukasi lingkungan terasa membosankan. Solusinya: konsep game sederhana yang mengenalkan nilai-nilai SDGs.',['Game','SDGs','Design']],
        ['Website Portofolio','web','7c3aed','Butuh etalase karya yang responsif. Solusinya: landing page dengan Laravel dan Tailwind CSS, lengkap dengan dark mode.',['Laravel','Tailwind','MySQL']],
    ];

    // GANTI dengan data aslimu
    $education = [
        ['S1 Informatika','Universitas Teknokrat Indonesia','2024 – Sekarang',['Fokus pada UI/UX, desain digital, dan pengembangan aplikasi.','Aktif mengerjakan proyek praktikum dan tugas kuliah.']],
        ['SMA','SMA Negeri 8 Bandar Lampung','2021 – 2024',['Mengikuti kegiatan ekstrakurikuler bola voli.']],
    ];
    $experience = [
        ['Anggota Ekstrakurikuler','Voli SMANPAN','2022 – 2024',['Menjabat sebagai Wakil Ketua Ekstrakurikuler Voli SMANPAN.','Ikutserta dalam membangun tim voli yang solid.']],
        ['Panitia Kegiatan','Nama Kegiatan / Kepanitiaan','2025',['Tulis bagian yang kamu tangani.']],
    ];
    $certificates = [
        ['Nama Sertifikat Pertama','Dicoding','2025'],
        ['Nama Sertifikat Kedua','Coursera','2025'],
        ['Nama Penghargaan / Lomba','Penyelenggara','2026'],
    ];

    $field = 'w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-600/15 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:focus:border-sky-400 dark:focus:ring-sky-400/15';
    $h2 = 'reveal text-3xl font-bold tracking-tight text-slate-900 dark:text-white md:text-4xl';
    $wrap = 'mx-auto max-w-6xl px-4 sm:px-6';
@endphp

{{-- ================= NAVBAR ================= --}}
<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur dark:border-slate-800 dark:bg-slate-950/80">
    <nav class="{{ $wrap }} flex h-16 items-center justify-between">
        <a href="#home" class="text-xl font-bold text-slate-900 dark:text-white">Arkaan<span class="text-blue-600 dark:text-sky-400">.</span></a>

        <ul class="hidden items-center gap-7 text-sm font-medium md:flex">
            @foreach ($nav as [$id, $label])
                <li><a href="#{{ $id }}" class="transition hover:text-blue-600 dark:hover:text-sky-400">{{ $label }}</a></li>
            @endforeach
        </ul>

        <div class="flex items-center gap-2">
            <button id="themeToggle" type="button" aria-label="Ganti tema"
                class="grid size-10 place-items-center rounded-full text-slate-600 transition hover:bg-slate-200 active:scale-90 dark:text-slate-300 dark:hover:bg-slate-800">
                <span class="hidden dark:inline"><i class="fa-solid fa-sun"></i></span>
                <span class="dark:hidden"><i class="fa-solid fa-moon"></i></span>
            </button>
            <button id="burger" type="button" aria-label="Buka menu" aria-expanded="false"
                class="grid size-10 place-items-center rounded-full text-slate-600 transition hover:bg-slate-200 md:hidden dark:text-slate-300 dark:hover:bg-slate-800">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden border-t border-slate-200 bg-white md:hidden dark:border-slate-800 dark:bg-slate-950">
        <ul class="{{ $wrap }} flex flex-col py-2 text-sm font-medium">
            @foreach ($nav as [$id, $label])
                <li><a href="#{{ $id }}" class="block rounded-lg px-3 py-2.5 hover:bg-slate-100 dark:hover:bg-slate-900">{{ $label }}</a></li>
            @endforeach
        </ul>
    </div>
</header>

<main>
{{-- ================= HERO ================= --}}
<section id="home" class="relative overflow-hidden pt-28 pb-16 md:pt-40 md:pb-24">
    <div class="pointer-events-none absolute -top-24 right-0 -z-10 size-96 animate-pulse rounded-full bg-blue-600/20 blur-3xl"></div>
    <div class="{{ $wrap }} grid items-center gap-12 md:grid-cols-2">
        <div class="order-2 animate-fade-up text-center md:order-1 md:text-left">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-blue-600 dark:text-sky-400">Halo, saya</p>
            <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 dark:text-white sm:text-5xl">Muhammad Arkaan Andrean</h1>
            <h2 class="mt-3 text-lg font-medium text-slate-600 dark:text-slate-400 sm:text-xl">Informatics Student | Aspiring UI/UX Designer &amp; Developer</h2>
            <p class="mx-auto mt-5 max-w-lg leading-relaxed md:mx-0">
                Mahasiswa Informatika Universitas Teknokrat Indonesia yang tertarik pada UI/UX, desain digital, dan pengembangan aplikasi.
                Saya senang belajar hal baru dan bercita-cita menjadi pengembang yang merancang produk digital yang rapi dan mudah digunakan.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-3 md:justify-start">
                <a href="{{ asset('cv/CV-Arkaan.pdf') }}" download
                   class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/30 transition hover:-translate-y-0.5 hover:bg-blue-700 active:scale-95">
                    <i class="fa-solid fa-download"></i> Download CV
                </a>
                <a href="#contact"
                   class="inline-flex items-center gap-2 rounded-full border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-800 transition hover:-translate-y-0.5 hover:border-blue-600 hover:text-blue-600 active:scale-95 dark:border-slate-700 dark:text-slate-200 dark:hover:border-sky-400 dark:hover:text-sky-400">
                    <i class="fa-solid fa-paper-plane"></i> Kontak Saya
                </a>
            </div>

            <div class="mt-8 flex justify-center gap-3 md:justify-start">
                @foreach ($socials as [$icon, $label, $url])
                    <a href="{{ $url }}" aria-label="{{ $label }}"
                       class="grid size-11 place-items-center rounded-full border border-slate-300 text-slate-600 transition hover:-translate-y-1 hover:border-blue-600 hover:bg-blue-600 hover:text-white dark:border-slate-700 dark:text-slate-300 dark:hover:border-sky-400 dark:hover:bg-sky-400 dark:hover:text-slate-950">
                        <i class="{{ $icon }}"></i>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="order-1 flex animate-fade-up justify-center [animation-delay:250ms] md:order-2">
            <img src="{{ asset('images/profile.JPG') }}" alt="Foto Muhammad Arkaan Andrean"
                 class="animate-float size-56 rounded-full object-cover shadow-2xl ring-4 ring-blue-600/40 sm:size-64 md:size-80 dark:ring-sky-400/40">
        </div>
    </div>
</section>

{{-- ================= ABOUT & SKILLS ================= --}}
<section id="about" class="bg-white py-20 dark:bg-slate-900/50">
    <div class="{{ $wrap }}">
        <h2 class="{{ $h2 }} text-center">Tentang <span class="text-blue-600 dark:text-sky-400">Saya</span></h2>
        <p class="reveal mx-auto mt-6 max-w-3xl text-center leading-relaxed">
            Saya Muhammad Arkaan Andrean, mahasiswa Program Studi Informatika di Universitas Teknokrat Indonesia.
            Saya tertarik pada desain, teknologi, dan pengembangan aplikasi. Di waktu luang, saya bermain gitar,
            membaca komik, dan bermain game.
        </p>
    </div>
</section>

<section id="skills" class="py-20">
    <div class="{{ $wrap }}">
        <h2 class="{{ $h2 }} text-center">Skill <span class="text-blue-600 dark:text-sky-400">Saya</span></h2>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach ($skills as $category => $items)
                <div class="reveal rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
                    <h3 class="mb-5 text-lg font-semibold text-slate-900 dark:text-white">{{ $category }}</h3>
                    <ul class="space-y-4">
                        @foreach ($items as [$name, $icon, $level])
                            <li>
                                <div class="mb-1.5 flex items-center justify-between text-sm">
                                    <span class="flex items-center gap-2.5 font-medium">
                                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.16.0/icons/{{ $icon }}/{{ $icon }}-original.svg"
                                             alt="" class="size-5 {{ $icon === 'github' ? 'dark:invert' : '' }}">
                                        {{ $name }}
                                    </span>
                                    <span class="text-xs text-slate-500">{{ $level }}%</span>
                                </div>
                                <div class="h-1.5 rounded-full bg-slate-200 dark:bg-slate-800">
                                    <div class="h-full w-0 rounded-full bg-linear-to-r from-blue-600 to-cyan-400 transition-[width] duration-1000 ease-out" data-width="{{ $level }}%"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= PROJECTS ================= --}}
<section id="projects" class="bg-white py-20 dark:bg-slate-900/50">
    <div class="{{ $wrap }}">
        <h2 class="{{ $h2 }} text-center">Proyek <span class="text-blue-600 dark:text-sky-400">Saya</span></h2>

        <div class="mt-8 flex flex-wrap justify-center gap-2">
            @foreach ([['all','Semua'],['web','Web'],['mobile','Mobile'],['design','Design']] as [$f, $label])
                <button type="button" data-filter="{{ $f }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                    class="rounded-full bg-slate-200 px-5 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-300 aria-pressed:bg-blue-600 aria-pressed:text-white dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700 dark:aria-pressed:bg-sky-400 dark:aria-pressed:text-slate-950">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as [$title, $category, $color, $desc, $tags])
                <article data-category="{{ $category }}"
                    class="reveal overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1.5 hover:shadow-xl dark:border-slate-800 dark:bg-slate-900">
                    {{-- GANTI dengan screenshot proyek (rasio 16:9), mis. asset('images/projects/nama.png') --}}
                    <img src="https://placehold.co/640x360/{{ $color }}/ffffff?text={{ urlencode($title) }}" alt="{{ $title }}" class="aspect-video w-full object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $title }}</h3>
                        <p class="mt-2 line-clamp-3 text-sm leading-relaxed">{{ $desc }}</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                                <span class="rounded-full bg-blue-600/10 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-sky-400/10 dark:text-sky-300">#{{ $tag }}</span>
                            @endforeach
                        </div>
                        <div class="mt-5 flex gap-3 border-t border-slate-200 pt-4 text-sm font-medium dark:border-slate-800">
                            <a href="#" class="inline-flex items-center gap-1.5 text-blue-600 transition hover:text-blue-800 dark:text-sky-400 dark:hover:text-sky-200"><i class="fa-solid fa-arrow-up-right-from-square"></i> Demo</a>
                            <a href="#" class="inline-flex items-center gap-1.5 transition hover:text-slate-900 dark:hover:text-white"><i class="fa-brands fa-github"></i> Repository</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= EXPERIENCE & EDUCATION ================= --}}
<section id="experience" class="py-20">
    <div class="{{ $wrap }}">
        <h2 class="{{ $h2 }} text-center">Pengalaman &amp; <span class="text-blue-600 dark:text-sky-400">Pendidikan</span></h2>

        <div class="mt-12 grid gap-12 md:grid-cols-2">
            @foreach ([['Pendidikan','fa-graduation-cap',$education],['Pengalaman','fa-briefcase',$experience]] as [$heading, $icon, $rows])
                <div>
                    <h3 class="mb-8 text-xl font-semibold text-slate-900 dark:text-white">{{ $heading }}</h3>
                    <ol class="ms-4 border-s-2 border-slate-200 dark:border-slate-800">
                        @foreach ($rows as [$role, $org, $period, $points])
                            <li class="reveal relative ps-8 pb-10 last:pb-0">
                                <span class="absolute -start-[17px] top-0 grid size-8 place-items-center rounded-full bg-blue-600 text-white ring-4 ring-slate-50 dark:bg-sky-400 dark:text-slate-950 dark:ring-slate-950">
                                    <i class="fa-solid {{ $icon }} text-xs"></i>
                                </span>
                                <p class="text-xs font-semibold text-blue-600 dark:text-sky-400">{{ $period }}</p>
                                <h4 class="mt-1 font-semibold text-slate-900 dark:text-white">{{ $role }}</h4>
                                <p class="text-sm text-slate-500">{{ $org }}</p>
                                <ul class="mt-2 list-disc space-y-1 ps-5 text-sm">
                                    @foreach ($points as $point)
                                        <li>{{ $point }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= CERTIFICATES ================= --}}
<section id="certificates" class="bg-white py-20 dark:bg-slate-900/50">
    <div class="{{ $wrap }}">
        <h2 class="{{ $h2 }} text-center">Sertifikat &amp; <span class="text-blue-600 dark:text-sky-400">Penghargaan</span></h2>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($certificates as [$name, $issuer, $year])
                <div class="reveal flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
                    <span class="grid size-12 shrink-0 place-items-center rounded-xl bg-blue-600/10 text-blue-600 dark:bg-sky-400/10 dark:text-sky-400"><i class="fa-solid fa-award text-xl"></i></span>
                    <div>
                        <h3 class="font-semibold text-slate-900 dark:text-white">{{ $name }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $issuer }} · {{ $year }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= CONTACT ================= --}}
<section id="contact" class="py-20">
    <div class="mx-auto max-w-2xl px-4 sm:px-6">
        <h2 class="{{ $h2 }} text-center">Hubungi <span class="text-blue-600 dark:text-sky-400">Saya</span></h2>
        <p class="mt-4 text-center">Tertarik bekerja sama atau ingin berdiskusi? Kirim pesan kapan saja.</p>

        <form action="{{ route('contact.send') }}" method="POST" class="reveal mt-10 space-y-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 dark:border-slate-800 dark:bg-slate-900/60">
            @csrf

            @if (session('success'))
                <div class="rounded-xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-700 dark:text-emerald-300">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-700 dark:text-red-300">
                    @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                </div>
            @endif

            <input type="text"  name="name"    value="{{ old('name') }}"    placeholder="Nama Lengkap" class="{{ $field }}" required>
            <input type="email" name="email"   value="{{ old('email') }}"   placeholder="Alamat Email" class="{{ $field }}" required>
            <input type="text"  name="subject" value="{{ old('subject') }}" placeholder="Subjek"       class="{{ $field }}" required>
            <textarea name="message" rows="5" placeholder="Isi Pesan" class="{{ $field }}" required>{{ old('message') }}</textarea>

            <button type="submit"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/30 transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-xl active:translate-y-0 active:scale-95 sm:w-auto">
                <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
            </button>
        </form>
    </div>
</section>
</main>

{{-- ================= FOOTER ================= --}}
<footer class="border-t border-slate-200 bg-white py-10 dark:border-slate-800 dark:bg-slate-900/50">
    <div class="{{ $wrap }} flex flex-col items-center justify-between gap-6 md:flex-row">
        <p class="text-sm">&copy; {{ date('Y') }} Muhammad Arkaan Andrean. Hak cipta dilindungi.</p>
        <ul class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm font-medium">
            @foreach ($nav as [$id, $label])
                <li><a href="#{{ $id }}" class="transition hover:text-blue-600 dark:hover:text-sky-400">{{ $label }}</a></li>
            @endforeach
        </ul>
        <div class="flex gap-4 text-lg">
            @foreach ($socials as [$icon, $label, $url])
                <a href="{{ $url }}" aria-label="{{ $label }}" class="transition hover:text-blue-600 dark:hover:text-sky-400"><i class="{{ $icon }}"></i></a>
            @endforeach
        </div>
    </div>
</footer>
@endsection