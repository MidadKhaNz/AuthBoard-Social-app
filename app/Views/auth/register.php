<?php
$title = 'Register | AuthBoard';
ob_start();

// Light Theme & Glassmorphism Variables
$primary_color = 'text-gray-900';
$secondary_color = 'text-gray-500';
$accent_blue_gradient = 'from-blue-500 to-sky-500';
$glass_bg = 'bg-white/70 backdrop-blur-lg shadow-2xl border border-white/80';
$input_style = 'w-full px-4 py-3 text-base border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 bg-white/70 transition-all duration-200 placeholder-gray-400 text-gray-800';
?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-4xl w-full flex flex-col lg:flex-row items-center justify-center gap-16">
        
        <div class="flex-1 max-w-sm w-full lg:order-1">
            <div class="<?= $glass_bg ?> rounded-3xl p-8 sm:p-10 transition-all duration-300 hover:shadow-blue-300/50">
                
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold <?= $primary_color ?> mb-2">Create Account</h2>
                    <p class="<?= $secondary_color ?>">Join us today—it only takes a minute!</p>
                </div>

                <form method="POST" action="/register" class="space-y-6">
                    
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold <?= $secondary_color ?>">Full Name</label>
                        <div class="relative">
                            <input id="name" name="name" type="text" required
                                class="<?= $input_style ?>"
                                placeholder="Enter your full name">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold <?= $secondary_color ?>">Email Address</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" required
                                class="<?= $input_style ?>"
                                placeholder="Enter your email">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold <?= $secondary_color ?>">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="<?= $input_style ?>"
                                placeholder="Create a secure password">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r <?= $accent_blue_gradient ?> hover:from-blue-600 hover:to-sky-600 text-white py-3 px-4 rounded-xl font-bold transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-blue-300/50 hover:shadow-xl active:scale-98 focus:ring-2 focus:ring-blue-300/50">
                        Create Account
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="<?= $secondary_color ?> text-sm">
                        Already have an account?
                        <a href="/login" class="text-blue-500 hover:text-blue-600 font-semibold transition-colors duration-200">Sign in</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="flex-1 max-w-md text-center lg:text-left lg:order-2">
            
            <h1 class="text-5xl font-extrabold <?= $primary_color ?> mb-4 leading-snug">
                Join 
                <span class="bg-gradient-to-r from-sky-500 to-blue-600 bg-clip-text text-transparent">
                   AuthBoard
                </span> 
                Today
            </h1>
            
            <p class="<?= $secondary_color ?> text-lg">
                Get started with our secure authentication platform and connect with the community.
            </p>
        </div>

    </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>