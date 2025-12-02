<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SwanSpace - Digital Solutions for Modern Education</title>
    <meta name="description" content="SwanSpace transforms educational institutions with innovative web solutions.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen relative">
        <!-- Enhanced Space Background -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <!-- Base gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-space-black via-space-navy to-deep-purple"></div>

            <!-- Large twinkling stars -->
            <div class="stars-container absolute inset-0 overflow-hidden">
                @for($i = 0; $i < 50; $i++)
                    <div class="absolute w-1 h-1 bg-white rounded-full"
                         style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation: twinkle {{ rand(2, 5) }}s ease-in-out infinite {{ rand(0, 3) }}s; opacity: {{ rand(30, 70) / 100 }};"></div>
                @endfor

                <!-- Medium cyan stars -->
                @for($i = 0; $i < 30; $i++)
                    <div class="absolute w-0.5 h-0.5 bg-cyan-300 rounded-full"
                         style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation: twinkle {{ rand(3, 5) }}s ease-in-out infinite {{ rand(0, 3) }}s;"></div>
                @endfor
            </div>

            <!-- Floating nebula effects -->
            <div class="absolute w-[600px] h-[600px] rounded-full opacity-20 blur-3xl animate-float"
                 style="top: 10%; right: 10%; background: radial-gradient(circle, rgba(139, 92, 246, 0.4) 0%, transparent 70%);"></div>
            <div class="absolute w-[500px] h-[500px] rounded-full opacity-20 blur-3xl animate-float"
                 style="bottom: 20%; left: 5%; background: radial-gradient(circle, rgba(236, 72, 153, 0.3) 0%, transparent 70%); animation-duration: 25s; animation-direction: reverse;"></div>
            <div class="absolute w-[400px] h-[400px] rounded-full opacity-15 blur-3xl animate-float"
                 style="top: 50%; left: 50%; background: radial-gradient(circle, rgba(6, 182, 212, 0.3) 0%, transparent 70%); animation-duration: 30s; animation-delay: 5s;"></div>

            <!-- Gradient overlay -->
            <div class="absolute inset-0" style="background: radial-gradient(ellipse at top, transparent 0%, rgba(10, 14, 39, 0.8) 100%);"></div>
        </div>

        <div class="relative z-10">
            <!-- Enhanced Navbar with Glass Morphism -->
            <nav class="fixed top-0 left-0 right-0 z-50 glass-navbar">
                <div class="container-custom">
                    <div class="flex items-center justify-between h-20">
                        <a href="{{ route('home') }}" class="flex items-center gap-3 relative z-50 group">
                            <div class="relative">
                                <!-- Animated glow effect -->
                                <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 via-pink-500 to-fuchsia-500 rounded-xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
                                <!-- Logo container -->
                                <div class="relative flex items-center justify-center">
                                    <img src="{{ asset('images/swan-space-logo.png') }}"
                                         alt="SwanSpace Logo"
                                         class="h-10 w-auto object-contain transition-all duration-300 group-hover:scale-105"
                                         style="filter: hue-rotate(280deg) saturate(1.3) brightness(1.1) drop-shadow(0 0 8px rgba(217, 70, 239, 0.4));">
                                </div>
                            </div>
                        </a>

                        <!-- Desktop Menu -->
                        <div class="hidden lg:flex items-center gap-8">
                            <a href="#home" class="text-gray-300 hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-purple-400 hover:to-pink-400 transition-all duration-300 relative group">Home<span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 group-hover:w-full transition-all duration-300"></span></a>
                            <a href="#services" class="text-gray-300 hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-purple-400 hover:to-pink-400 transition-all duration-300 relative group">Services<span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 group-hover:w-full transition-all duration-300"></span></a>
                            <a href="#about" class="text-gray-300 hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-purple-400 hover:to-pink-400 transition-all duration-300 relative group">About<span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 group-hover:w-full transition-all duration-300"></span></a>
                            <a href="#contact" class="text-gray-300 hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-purple-400 hover:to-pink-400 transition-all duration-300 relative group">Contact<span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500 group-hover:w-full transition-all duration-300"></span></a>
                        </div>

                        <div class="hidden lg:flex items-center gap-4">
                            <!-- Language Switcher -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" type="button" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#1a1f3a]/60 backdrop-blur-md border border-purple-500/30 hover:border-purple-500 transition-all text-gray-300 hover:text-white relative z-10">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                                    <span class="font-semibold uppercase">EN</span>
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     @click.away="open = false"
                                     class="absolute right-0 mt-2 w-40 rounded-lg bg-[#1a1f3a]/95 backdrop-blur-md border border-purple-500/30 shadow-xl overflow-hidden z-50"
                                     style="display: none;">
                                    <a href="{{ route('home.en') }}" class="block px-4 py-3 text-sm text-white bg-purple-600/30 hover:bg-purple-600/50 transition-colors border-b border-purple-500/20">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M12 6L7 11h4v6h2v-6h4z"/></svg>
                                            <span class="font-medium">English</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('home.de') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-purple-600/30 hover:text-white transition-colors">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                            <span class="font-medium">Deutsch</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a href="#contact" class="relative overflow-hidden group bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-full px-6 py-3 shadow-lg hover:shadow-purple-500/50 transition-all duration-300 transform hover:scale-105 z-10">
                                <span class="relative z-10 font-semibold">Get Started</span>
                            </a>
                        </div>

                        <!-- Mobile Menu Button -->
                        <button id="mobile-menu-button" class="lg:hidden p-2 text-gray-300 hover:text-white transition-colors relative z-50">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu -->
                    <div id="mobile-menu" class="hidden lg:hidden pb-4">
                        <div class="flex flex-col space-y-4 mt-4">
                            <a href="#home" class="text-gray-300 hover:text-purple-400 transition-colors px-4 py-2 rounded-lg hover:bg-purple-600/20">Home</a>
                            <a href="#services" class="text-gray-300 hover:text-purple-400 transition-colors px-4 py-2 rounded-lg hover:bg-purple-600/20">Services</a>
                            <a href="#about" class="text-gray-300 hover:text-purple-400 transition-colors px-4 py-2 rounded-lg hover:bg-purple-600/20">About</a>
                            <a href="#contact" class="text-gray-300 hover:text-purple-400 transition-colors px-4 py-2 rounded-lg hover:bg-purple-600/20">Contact</a>
                            <div class="border-t border-purple-500/20 pt-4">
                                <div class="text-gray-400 text-sm px-4 mb-2">Language</div>
                                <a href="{{ route('home.en') }}" class="block text-white bg-purple-600/30 hover:bg-purple-600/50 transition-colors px-4 py-2 rounded-lg">English</a>
                                <a href="{{ route('home.de') }}" class="block text-gray-300 hover:text-purple-400 hover:bg-purple-600/20 transition-colors px-4 py-2 rounded-lg mt-2">Deutsch</a>
                            </div>
                            <a href="#contact" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center rounded-full px-6 py-3 shadow-lg hover:shadow-purple-500/50 transition-all duration-300 font-semibold">Get Started</a>
                        </div>
                    </div>
                </div>
            </nav>

            <main>
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden pt-20">
    <!-- 3D Floating Elements -->
    <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-pink-600/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="container-custom relative z-10 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 glow-effect">
                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <span class="text-sm text-gray-300">
                        {{ $heroContent['badge'] ?? 'Digital Innovation for Education' }}
                    </span>
                </div>

                <div class="space-y-4">
                    <h1 class="text-5xl lg:text-7xl">
                        {{ $heroContent['title'] ?? 'Transform Your School into a' }}
                        <span class="text-gradient-nebula animate-pulse">
                            {{ $heroContent['title_highlight'] ?? 'Digital Universe' }}
                        </span>
                    </h1>
                </div>

                <p class="text-xl text-gray-300 leading-relaxed">
                    {{ $heroContent['description'] ?? 'Experience cutting-edge digital solutions designed specifically for modern educational institutions. We bring innovation to every classroom.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="group relative overflow-hidden px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-2xl hover:shadow-purple-500/50 hover:scale-105">
                        <span class="relative z-10">Get Started</span>
                        <svg class="relative z-10 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>

                <!-- Stats -->
                <div class="flex flex-wrap gap-8 pt-8">
                    @foreach($stats ?? [] as $stat)
                        <div class="group">
                            <div class="text-4xl font-bold text-gradient-cosmic mb-1">{{ $stat['count'] }}</div>
                            <div class="text-gray-400 group-hover:text-gray-300 transition-colors">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Content - 3D Card Stack -->
            <div class="relative hidden lg:block">
                <div class="relative perspective-1000">
                    <div class="relative w-full h-[600px]">
                        <!-- Back Card -->
                        <div class="absolute inset-0 glass-card rounded-3xl card-stack-back"></div>

                        <!-- Middle Card -->
                        <div class="absolute inset-0 glass-card rounded-3xl card-stack-middle"></div>

                        <!-- Front Card with Content -->
                        <div class="absolute inset-0 glass-card-dark rounded-3xl p-8 shadow-3d-lg card-stack-front overflow-hidden">
                            <!-- Gradient background for the card -->
                            <div class="absolute inset-0 bg-gradient-to-br from-[#E94D9C]/20 via-[#8B5CF6]/20 to-[#6366F1]/20 rounded-3xl"></div>

                            <div class="relative h-full flex flex-col items-center justify-center space-y-8 z-10">
                                <!-- Space Swan - Floating through space -->
                                <div class="relative w-full h-64">
                                    <div class="relative w-full h-full flex items-center justify-center">
                                        <!-- Floating stars and cosmic elements -->
                                        <div class="absolute inset-0 overflow-hidden">
                                            <!-- Stars -->
                                            @for ($i = 0; $i < 20; $i++)
                                                <div class="absolute w-1 h-1 bg-white rounded-full animate-pulse"
                                                     style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ ($i % 10) * 0.3 }}s; animation-duration: {{ 2 + ($i % 3) }}s; opacity: {{ 0.2 + ($i % 8) * 0.1 }};"></div>
                                            @endfor

                                            <!-- Sparkles -->
                                            <svg class="absolute top-[15%] right-[20%] text-cyan-400 opacity-70 animate-pulse w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation-delay: 0.5s;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            </svg>
                                            <svg class="absolute bottom-[25%] left-[15%] text-pink-400 opacity-60 animate-pulse w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation-delay: 1s;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            </svg>
                                            <svg class="absolute top-[40%] left-[25%] text-purple-400 opacity-70 animate-pulse w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation-delay: 1.5s;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            </svg>

                                            <!-- Small planets/orbs -->
                                            <div class="absolute top-[20%] left-[10%] w-8 h-8 rounded-full bg-gradient-to-br from-purple-500/30 to-pink-500/30 blur-sm animate-float"></div>
                                            <div class="absolute bottom-[30%] right-[15%] w-6 h-6 rounded-full bg-gradient-to-br from-cyan-500/30 to-blue-500/30 blur-sm animate-float" style="animation-duration: 10s; animation-direction: reverse;"></div>
                                            <div class="absolute top-[60%] right-[25%] w-10 h-10 rounded-full bg-gradient-to-br from-fuchsia-500/20 to-purple-500/20 blur-md animate-float" style="animation-duration: 12s; animation-delay: 2s;"></div>

                                            <!-- Cosmic dust/nebula effect -->
                                            <div class="absolute top-[10%] right-[10%] w-32 h-32 rounded-full bg-purple-500/10 blur-2xl animate-float" style="animation-duration: 15s;"></div>
                                            <div class="absolute bottom-[10%] left-[10%] w-40 h-40 rounded-full bg-pink-500/10 blur-3xl animate-float" style="animation-duration: 18s; animation-direction: reverse;"></div>
                                        </div>

                                        <!-- Main Swan - Floating through space -->
                                        <div class="relative z-10 transform scale-110 animate-float" style="animation-duration: 6s;">
                                            <!-- Glow aura around swan -->
                                            <div class="absolute -inset-8 blur-3xl opacity-40">
                                                <div class="w-full h-full bg-gradient-to-br from-fuchsia-500 via-purple-500 to-cyan-500 rounded-full"></div>
                                            </div>

                                            <!-- Swan logo -->
                                            <div class="relative w-40 h-40 flex items-center justify-center">
                                                <!-- Main logo with enhanced effects -->
                                                <img src="{{ asset('images/swan-space-logo.png') }}"
                                                     alt="Space Swan"
                                                     class="w-32 h-32 object-contain"
                                                     style="filter: hue-rotate(280deg) saturate(1.4) brightness(1.3) drop-shadow(0 0 20px rgba(217, 70, 239, 0.8)) drop-shadow(0 0 40px rgba(139, 92, 246, 0.6));">

                                                <!-- Animated ring effect -->
                                                <div class="absolute inset-0 rounded-full border-2 border-fuchsia-500/30 animate-ping" style="animation-duration: 3s;"></div>
                                                <div class="absolute inset-0 scale-110 rounded-full border border-purple-500/20 animate-pulse"></div>
                                            </div>

                                            <!-- Trailing comet effect -->
                                            <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 w-1 h-16 bg-gradient-to-b from-fuchsia-500 via-purple-500 to-transparent opacity-50 blur-sm"></div>

                                            <!-- Sparkle trail -->
                                            <div class="absolute top-1/2 -left-8 w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.3s;"></div>
                                            <div class="absolute top-1/3 -right-6 w-1.5 h-1.5 bg-pink-400 rounded-full animate-pulse" style="animation-delay: 0.6s;"></div>
                                            <div class="absolute bottom-1/3 -left-4 w-1 h-1 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.9s;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center space-y-4">
                                    <h3 class="text-2xl font-heading font-bold text-gradient-nebula">Modern School Platform</h3>
                                    <p class="text-gray-400">Powered by cutting-edge technology</p>
                                </div>

                                <!-- Floating Tech Icons -->
                                <div class="flex gap-4">
                                    @foreach([
                                        ['icon' => '⚡', 'delay' => '0s'],
                                        ['icon' => '🎨', 'delay' => '1s'],
                                        ['icon' => '🔒', 'delay' => '2s'],
                                        ['icon' => '📱', 'delay' => '3s']
                                    ] as $item)
                                        <div class="w-12 h-12 rounded-xl glass-card border border-purple-500/30 flex items-center justify-center text-2xl hover:scale-110 transition-transform cursor-pointer animate-float" style="animation-duration: {{ 3 + $loop->index }}s;">
                                            {{ $item['icon'] }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 relative">
    <div class="container-custom">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="order-2 lg:order-1">
                <div class="glass-card-dark rounded-3xl p-8 lg:p-12 space-y-6">
                    <div class="space-y-4">
                        @foreach($highlights ?? [] as $highlight)
                            <div class="flex items-start gap-3">
                                <div class="mt-1 w-6 h-6 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-300">{{ $highlight }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="space-y-6 order-1 lg:order-2">
                <div class="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30">
                    <span class="text-sm text-gray-300">{{ $aboutContent['badge'] ?? 'About SwanSpace' }}</span>
                </div>

                <h2>
                    {{ $aboutContent['title'] ?? 'Innovation Meets' }}
                    <span class="text-gradient-cosmic">
                        {{ $aboutContent['title_highlight'] ?? 'Education' }}
                    </span>
                </h2>

                <p class="text-xl text-gray-300 leading-relaxed">
                    {{ $aboutContent['description'] ?? 'We are pioneers in digital transformation for educational institutions, combining cutting-edge technology with deep understanding of modern learning environments.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 relative">
    <div class="container-custom">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
                <span class="text-sm text-gray-300">{{ $servicesContent['badge'] ?? 'Our Services' }}</span>
            </div>
            <h2 class="mb-6">
                {{ $servicesContent['title'] ?? 'Comprehensive Digital' }}
                <span class="text-gradient-nebula">
                    {{ $servicesContent['title_highlight'] ?? 'Solutions' }}
                </span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                {{ $servicesContent['description'] ?? 'From custom development to complete digital ecosystems, we provide everything your institution needs to thrive in the digital age.' }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services ?? [] as $service)
                <div class="group relative">
                    <!-- Glow on hover outside card -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>

                    <div class="relative glass-card-dark rounded-2xl p-8 h-full transition-all duration-300 hover:scale-105 shadow-3d-sm hover:shadow-3d-md">
                        <!-- Icon with gradient background -->
                        <div class="mb-6 relative inline-block">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl blur-lg opacity-50"></div>
                            <div class="relative w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center text-3xl shadow-glow">
                                {{ is_array($service) ? ($service['icon'] ?? '🚀') : ($service->icon ?? '🚀') }}
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-2xl font-heading font-bold mb-4">
                            <span class="text-gradient-nebula">
                                {{ is_array($service) ? ($service['title'] ?? '') : ($service->title ?? '') }}
                            </span>
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-300 leading-relaxed mb-6">
                            {{ is_array($service) ? ($service['description'] ?? '') : ($service->description ?? '') }}
                        </p>

                        <!-- Learn More Link -->
                        <a href="#contact" class="inline-flex items-center gap-2 text-purple-400 hover:text-pink-400 transition-colors group/link">
                            <span class="font-semibold">Learn More</span>
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>

                        <!-- Subtle gradient overlay on hover -->
                        <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-br from-purple-600/10 via-pink-600/10 to-transparent"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 relative">
    <div class="container-custom">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
                <span class="text-sm text-gray-300">Testimonials</span>
            </div>
            <h2 class="mb-6">
                Trusted by
                <span class="text-gradient-cosmic">Education Leaders</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials ?? [] as $testimonial)
                <div class="group relative">
                    <!-- Subtle glow on hover -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-500"></div>

                    <div class="relative glass-card-dark rounded-2xl p-8 hover:scale-105 transition-all duration-300 shadow-3d-sm hover:shadow-3d-md h-full flex flex-col">
                        <!-- Quote Icon -->
                        <div class="mb-4">
                            <svg class="w-8 h-8 text-purple-400 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <!-- Rating Stars -->
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 text-yellow-400 fill-current drop-shadow-glow" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            @endfor
                        </div>

                        <!-- Quote -->
                        <p class="text-gray-300 mb-6 leading-relaxed italic flex-grow">
                            "{{ is_array($testimonial) ? ($testimonial['quote'] ?? '') : ($testimonial->quote ?? '') }}"
                        </p>

                        <!-- Author Info -->
                        <div class="border-t border-purple-500/20 pt-4 mt-auto">
                            <div class="font-heading font-semibold text-white mb-1">
                                {{ is_array($testimonial) ? ($testimonial['author'] ?? '') : ($testimonial->author ?? '') }}
                            </div>
                            <div class="text-sm text-gray-400">
                                {{ is_array($testimonial) ? ($testimonial['role'] ?? '') : ($testimonial->role ?? '') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 relative">
    <div class="container-custom">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
                <span class="text-sm text-gray-300">Get In Touch</span>
            </div>
            <h2 class="mb-6">
                Let's Start Your
                <span class="text-gradient-cosmic">Digital Journey</span>
            </h2>
        </div>

        <div class="max-w-2xl mx-auto relative">
            <!-- Glow effect behind form -->
            <div class="absolute -inset-4 bg-gradient-to-r from-purple-600/20 to-pink-600/20 rounded-3xl blur-2xl"></div>

            <div class="relative glass-card-dark rounded-3xl p-8 lg:p-12 shadow-3d-lg">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-300 mb-2 font-medium">Your Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg glass-card border border-purple-500/30 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 text-white placeholder-gray-500 outline-none transition-all" placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2 font-medium">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg glass-card border border-purple-500/30 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 text-white placeholder-gray-500 outline-none transition-all" placeholder="john@school.edu">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2 font-medium">School Name (Optional)</label>
                        <input type="text" name="school" class="w-full px-4 py-3 rounded-lg glass-card border border-purple-500/30 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 text-white placeholder-gray-500 outline-none transition-all" placeholder="Your School Name">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2 font-medium">Your Message</label>
                        <textarea name="message" required rows="5" class="w-full px-4 py-3 rounded-lg glass-card border border-purple-500/30 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 text-white placeholder-gray-500 outline-none transition-all resize-none" placeholder="Tell us about your project and how we can help..."></textarea>
                    </div>

                    <button type="submit" class="group w-full px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-heading font-semibold rounded-full transition-all duration-300 shadow-glow hover:shadow-glow-pink transform hover:scale-105 relative z-10 cursor-pointer overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Send Message
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
            </main>

            <!-- Enhanced Footer -->
            <footer class="relative border-t border-purple-500/20 glass-navbar">
                <div class="container-custom py-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                        <div>
                            <div class="mb-4 group">
                                <div class="flex items-center gap-2">
                                    <div class="relative">
                                        <!-- Animated glow effect -->
                                        <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 via-pink-500 to-fuchsia-500 rounded-xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
                                        <!-- Logo -->
                                        <div class="relative flex items-center justify-center">
                                            <img src="{{ asset('images/swan-space-logo.png') }}"
                                                 alt="SwanSpace Logo"
                                                 class="h-8 w-auto object-contain transition-all duration-300 group-hover:scale-105"
                                                 style="filter: hue-rotate(280deg) saturate(1.3) brightness(1.1) drop-shadow(0 0 8px rgba(217, 70, 239, 0.4));">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-400 mb-6 leading-relaxed">Transforming education through innovative digital solutions</p>
                            <div class="flex gap-4">
                                <a href="https://facebook.com/swanspace" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-lg glass-card border border-purple-500/30 hover:border-purple-500 flex items-center justify-center text-gray-400 hover:text-purple-400 transition-all group">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-lg glass-card border border-purple-500/30 hover:border-purple-500 flex items-center justify-center text-gray-400 hover:text-purple-400 transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h6 class="mb-4 text-white font-semibold">Quick Links</h6>
                            <ul class="space-y-3">
                                <li><a href="#home" class="text-gray-400 hover:text-purple-400 transition-colors">Home</a></li>
                                <li><a href="#services" class="text-gray-400 hover:text-purple-400 transition-colors">Services</a></li>
                                <li><a href="#about" class="text-gray-400 hover:text-purple-400 transition-colors">About</a></li>
                                <li><a href="#contact" class="text-gray-400 hover:text-purple-400 transition-colors">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <h6 class="mb-4 text-white font-semibold">Services</h6>
                            <ul class="space-y-3">
                                <li class="text-gray-400 text-sm">Web Development</li>
                                <li class="text-gray-400 text-sm">Mobile Design</li>
                                <li class="text-gray-400 text-sm">Management Systems</li>
                            </ul>
                        </div>
                        <div>
                            <h6 class="mb-4 text-white font-semibold">Contact</h6>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3 text-gray-400 text-sm">
                                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span>hello@swanspace.com</span>
                                </li>
                                <li class="flex items-start gap-3 text-gray-400 text-sm">
                                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    <span>+1 (555) 123-4567</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-purple-500/20 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-gray-400 text-sm text-center">&copy; {{ date('Y') }} SwanSpace. All rights reserved.</p>
                        <div class="flex gap-6 text-sm">
                            <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Privacy Policy</a>
                            <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
