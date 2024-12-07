<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "spm-blue": "#0099ff",
                        "spm-gray": "#D9D9D9",
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

<body class="bg-white flex justify-center">
    <div class="relative w-full min-h-screen overflow-hidden">
        <!-- Header -->
        <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="your-logo.png" alt="Logo SPM" class="w-12 h-12 rounded-full object-cover" />
                    <span class="text-xl font-bold text-spm-blue">SPM</span>
                </div>

                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#"
                        class="text-spm-blue text-lg font-medium hover:text-opacity-80 transition">Home</a>
                    <a href="/about" class="text-black text-lg font-medium hover:text-spm-blue transition">Tentang</a>

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

        <!-- Main Content -->
        <main class="container mx-auto px-7 pt-24 pb-20 flex flex-col-reverse md:flex-row items-center min-h-screen">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-black mb-6 leading-tight">Sistem Pengaduan
                    Masyarakat</h1>
                <p class="text-lg md:text-xl text-gray-700 mb-8">Platform berbasis web yang dirancang untuk menerima,
                    mengelola, dan menyelesaikan laporan atau keluhan dari masyarakat dengan efisien dan transparan.</p>
            </div>
            <div class="md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('hero-image.png') }}" alt="Hero Ilustrasi"
                    class="w-full max-w-md mx-auto transform -scale-x-100" />
            </div>

        </main>

        <!-- Background Wave -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="170 0 1040 400" class="absolute bottom-5 left-0 w-full h-[448px] z-[-1]">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,224L60,234.7C120,245,240,267,360,256C480,245,600,203,720,154.7C840,107,960,53,1080,69.3C1200,85,1320,171,1380,213.3L1440,256L1440,500L1380,500C1320,500,1200,500,1080,500C960,500,840,500,720,500C600,500,480,500,360,500C240,500,120,500,60,500L0,500Z">
            </path>
        </svg>

        <!-- Footer -->
        <footer class="bg-spm-gray w-100 py-6 text-center">
            <p class="text-sm">
                <span class="text-black">@2024 SPM | By </span>
                <span class="text-spm-blue font-semibold">Sistem Pengaduan Masyarakat</span>
            </p>
        </footer>
    </div>
</body>

</html>
