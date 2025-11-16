<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'AuthBoard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // All colors set to shades of Gray/Black/White for Monochrome
                        primary: {
                            50: '#f9fafb', // white/light gray
                            100: '#f3f4f6', // light gray
                            500: '#6b7280', // medium gray
                            600: '#4b5563', // dark gray
                            700: '#374151', // very dark gray (text/elements)
                            800: '#1f2937', // near black (primary background)
                            900: '#111827', // deep black (deepest background)
                        },
                        // Secondary kept for contrast/accent - set to grayscale
                        secondary: {
                            50: '#f9fafb',
                            100: '#e5e7eb',
                            500: '#9ca3af',
                            600: '#6b7280',
                            700: '#4b5563',
                        }
                    },
                    backgroundImage: {
                        // Main BG: Deep Black to Very Dark Gray
                        'gradient-primary': 'linear-gradient(135deg, #111827 0%, #1f2937 100%)', 
                        // Accent BG: Light Gray to White for contrast elements
                        'gradient-secondary': 'linear-gradient(135deg, #d1d5db 0%, #f3f4f6 100%)', 
                        // Glass BG: Translucent Dark Gray
                        'gradient-light': 'linear-gradient(135deg, rgba(75, 85, 99, 0.5) 0%, rgba(55, 65, 81, 0.5) 100%)', 
                    }
                }
            }
        }
    </script>
    <style>
        /* The body must have a simple, pure grayscale background for true monochrome */
        body {
            font-family: 'Inter', sans-serif;
            background-image: none; /* Remove previous colorful gradient */
            background-color: #f3f4f6; /* A very light gray background for the overall page */
        }

        /* Glass effect is now translucent white over the background, making it subtle */
        .glass-nav {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            /* Translucent white over light gray background for a subtle, lifted look */
            background-color: rgba(255, 255, 255, 0.75); 
        }
        
        /* Glass button is translucent white with black text */
        .glass-button {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            color: #111827; /* Deep black text */
        }
        
        .glass-button:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }

        /* Styling the main content area to be deep black/dark gray */
        .main-content-bg {
             /* Deep black background for the content container */
            background-image: linear-gradient(135deg, #111827 0%, #1f2937 100%); 
        }
    </style>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen">
    <?php if (!empty($_SESSION['user'])): ?>
        <nav class="glass-nav shadow-lg border-b border-gray-300 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center space-x-12">
                        <div class="flex items-center space-x-3 group">
                            <span class="text-2xl font-bold text-gray-800 shadow-sm">AuthBoard</span>
                        </div>

                        <div class="hidden lg:flex space-x-8">
                            <a href="/dashboard"
                                class="relative text-gray-700 hover:text-black transition-all duration-300 font-semibold py-2 group/nav">
                                <span class="relative z-10">Dashboard</span>
                                <div
                                    class="absolute bottom-0 left-0 w-0 h-1 bg-black group-hover/nav:w-full transition-all duration-300 rounded-full">
                                </div>
                            </a>
                            <a href="/posts"
                                class="relative text-gray-700 hover:text-black transition-all duration-300 font-semibold py-2 group/nav">
                                <span class="relative z-10">Timeline</span>
                                <div
                                    class="absolute bottom-0 left-0 w-0 h-1 bg-black group-hover/nav:w-full transition-all duration-300 rounded-full">
                                </div>
                            </a>
                            <a href="/posts/create"
                                class="relative text-gray-700 hover:text-black transition-all duration-300 font-semibold py-2 group/nav">
                                <span class="relative z-10">Post</span>
                                <div
                                    class="absolute bottom-0 left-0 w-0 h-1 bg-black group-hover/nav:w-full transition-all duration-300 rounded-full">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-4 group">
                            <div class="hidden md:block text-right">
                                <p class="text-xl font-bold text-gray-800 shadow-sm">
                                    <a href="/profile">
                                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?></p>
                                    </a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <a href="/logout"
                                class="glass-button px-5 py-2.5 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 shadow-md hover:shadow-lg active:scale-98 font-semibold text-sm border border-gray-300">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <div class="mx-auto px-6 py-8 bg-gray-100 min-h-screen">
    <main class="min-h-[calc(100vh-200px)]">
        <?= $content ?? '' ?>
    </main>

    <footer class="mt-16 pt-12 pb-8 bg-white shadow-lg border-t border-gray-200 rounded-2xl">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="flex flex-col md:flex-row md:justify-between md:items-start border-b border-gray-200 pb-10 mb-8">
                
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center justify-center md:justify-start mb-4">
                        <div class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center mr-3 shadow-md border border-gray-300">
                            <span class="text-white font-black text-xl">AB</span>
                        </div>
                        <span class="text-xl font-bold tracking-wider text-gray-800">AuthBoard</span>
                    </div>
                    <p class="text-gray-600 max-w-sm text-center md:text-left font-light">
                        A modern authentication and social platform. Secure, Reliable, Professional.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-8 sm:gap-12 text-center md:text-left">
                    
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Platform</h4>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="hover:text-black transition-colors"><a href="#">Dashboard</a></li>
                            <li class="hover:text-black transition-colors"><a href="#">Community</a></li>
                            <li class="hover:text-black transition-colors"><a href="#">Features</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Support</h4>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="hover:text-black transition-colors"><a href="#">Contact Us</a></li>
                            <li class="hover:text-black transition-colors"><a href="#">Privacy Policy</a></li>
                            <li class="hover:text-black transition-colors"><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>

            <div class="text-center pt-4">
                <p class="text-gray-500 text-sm">
                    &copy; <?= date('Y') ?> AuthBoard. All rights reserved.
                </p>
            </div>
            
        </div>
    </footer>
</div>
</body>

</html>