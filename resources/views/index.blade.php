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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
            class="absolute bottom-3 left-0 w-full h-[448px] z-[-1]">
            <path fill="#0099ff" fill-opacity="1.1"
                d="M0,128L40,117.3C80,107,160,85,240,90.7C320,96,400,128,480,154.7C560,181,640,203,720,176C800,149,880,75,960,53.3C1040,32,1120,64,1200,96C1280,128,1360,160,1400,176L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
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
