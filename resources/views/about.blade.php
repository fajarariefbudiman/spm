<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Me - Sistem Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "spm-blue": "#0099ff",
                        "spm-gray": "#F3F4F6",
                    },
                    fontFamily: {
                        sans: ["Inter", "ui-sans-serif", "system-ui"],
                    },
                },
            },
        };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body class="bg-white text-gray-900">
    <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="your-logo.png" alt="Logo SPM" class="w-12 h-12 rounded-full object-cover" />
                <span class="text-xl font-bold text-spm-blue">SPM</span>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-black text-lg font-medium hover:text-spm-blue transition">Home</a>
                <a href="/about" class="text-spm-blue text-lg font-medium hover:text-opacity-80 transition">Tentang</a>
                <a href="{{ route('login') }}">
                    <div
                        class="bg-spm-blue rounded-full px-5 py-2 flex items-center space-x-2 cursor-pointer hover:bg-opacity-90 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="text-white text-lg">Login</span>
                    </div>
                </a>
            </nav>
        </div>
    </header>
    <div class="container mx-auto px-4 pt-36 pb-24 max-w-4xl">
        <div class="grid md:grid-cols-3 gap-8 items-center">
            <!-- Profile Image -->
            <div class="flex justify-center md:justify-start col-span-1">
                <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg border-4 border-spm-blue">
                    <img src="your-logo.png" alt="Profile" class="w-full h-full object-cover" />
                </div>
            </div>

            <!-- Profile Info -->
            <div class="col-span-2 text-center md:text-left">
                <h1 class="text-4xl font-bold mb-4 text-spm-blue">
                    Sistem Pengaduan Masyarakat
                </h1>

                <p class="text-gray-700 mb-6 leading-relaxed">
                    Aplikasi Sistem Pengaduan Masyarakat (SPM) merupakan platform digital yang memudahkan warga untuk
                    melaporkan berbagai permasalahan yang terjadi di lingkungan sekitar, seperti layanan publik,
                    infrastruktur, keamanan, atau isu sosial lainnya. Dengan SPM, pengaduan dapat disampaikan secara
                    langsung dan efisien kepada pihak terkait, yang akan menindaklanjuti laporan tersebut dengan cepat
                    dan transparan. Tujuan dari aplikasi ini adalah untuk meningkatkan partisipasi aktif masyarakat
                    dalam pembangunan dan memperkuat hubungan antara pemerintah dan warga, demi terciptanya lingkungan
                    yang lebih baik, aman, dan sejahtera. Melalui SPM, kami berkomitmen untuk mewujudkan pelayanan
                    publik yang responsif dan akuntabel bagi seluruh lapisan masyarakat.
                </p>
            </div>
        </div>

        <!-- Skills and Expertise -->
        <div class="mt-16 bg-spm-gray p-8 rounded-lg">
            <h3 class="text-2xl font-semibold mb-6 text-center text-spm-blue">
                Keahlian dan Fokus
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-4xl text-spm-blue mb-4">🖥️</div>
                    <h4 class="font-semibold mb-2">Teknologi Digital</h4>
                    <p class="text-gray-600">Pengembangan platform berbasis web responsif dan user-friendly</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-spm-blue mb-4">🤝</div>
                    <h4 class="font-semibold mb-2">Partisipasi Masyarakat</h4>
                    <p class="text-gray-600">Mendorong keterlibatan aktif warga dalam proses pembangunan</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-spm-blue mb-4">🛡️</div>
                    <h4 class="font-semibold mb-2">Transparansi</h4>
                    <p class="text-gray-600">Membangun sistem pelaporan yang terbuka dan akuntabel</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-16 text-center">
            <h3 class="text-2xl font-semibold mb-6 text-spm-blue">
                Hubungi Kami
            </h3>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-spm-blue hover:text-opacity-80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="text-spm-blue hover:text-opacity-80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="#" class="text-spm-blue hover:text-opacity-80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect x="2" y="9" width="4" height="12"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-spm-gray w-100 py-6 text-center">
        <p class="text-sm">
            <span class="text-black">@2024 SPM | By </span>
            <span class="text-spm-blue font-semibold">Sistem Pengaduan Masyarakat</span>
        </p>
    </footer>
</body>

</html>
