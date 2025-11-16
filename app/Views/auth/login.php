<?php
$title = 'Login | SocialSite';
ob_start();

// Light Theme & Glassmorphism Variables
$primary_color = 'text-gray-900';
$secondary_color = 'text-gray-500';
$accent_blue_gradient = 'from-blue-500 to-sky-500';
$glass_bg = 'bg-white/70 backdrop-blur-lg shadow-xl border border-white/80';
$input_style = 'w-full pl-12 pr-4 py-3 text-base border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white/70 text-gray-800 transition-all duration-200 placeholder-gray-400';
?>
<div
    class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-md w-full"> 
        
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold <?= $primary_color ?>">Sign In to <span
                    class="bg-gradient-to-r <?= $accent_blue_gradient ?> bg-clip-text text-transparent">AuthBoard</span>
            </h1>
            <p class="<?= $secondary_color ?> text-md mt-2">Securely access your account</p>
        </div>

        <div
            class="<?= $glass_bg ?> rounded-2xl shadow-2xl border border-gray-100 p-8 transition-all duration-300 hover:shadow-blue-300/50">
            
            <form method="POST" action="/login" class="space-y-6">
                
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold <?= $secondary_color ?>">Email Address</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" required
                            class="<?= $input_style ?>"
                            placeholder="Enter your email">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold <?= $secondary_color ?>">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="<?= $input_style ?>"
                            placeholder="Enter your password">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <button type="submit"
                    class="w-full bg-gradient-to-r <?= $accent_blue_gradient ?> hover:from-blue-600 hover:to-sky-600 text-white py-3 px-4 rounded-xl font-bold transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-blue-300/50 hover:shadow-xl active:scale-98 focus:ring-2 focus:ring-blue-300/50">
                    Sign In
                    <svg class="w-4 h-4 inline-block ml-2 -mr-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <p class="<?= $secondary_color ?> text-sm">
                    Don't have an account?
                    <a href="/register"
                        class="text-blue-500 hover:text-blue-600 font-semibold transition-colors duration-200">Sign
                        up</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';