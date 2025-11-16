<?php
$title = 'Profile | AuthBoard';
ob_start();

$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;

// Clear the messages after displaying
unset($_SESSION['success']);
unset($_SESSION['error']);

// Mock user data if not passed in the scope (needed for presentation)
if (!isset($user)) {
    $user = [
        'id' => 1001,
        'name' => 'Jane Doe',
        'email' => 'jane.doe@example.com',
        'created_at' => '2023-11-16 08:00:00',
        'profile_picture' => '/assets/img/default-avatar.jpg' // Example path
    ];
}

// Light Theme & Glassmorphism Variables
$primary_color = 'text-gray-900';
$secondary_color = 'text-gray-500';
$accent_blue_gradient = 'from-blue-500 to-sky-500';
$glass_bg = 'bg-white/70 backdrop-blur-lg shadow-xl border border-white/80';
$glass_sidebar_bg = 'bg-white/80 backdrop-blur-lg shadow-lg border border-white/90';
$input_style = 'w-full px-6 py-4 text-lg border border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 bg-white/70 shadow-sm placeholder-gray-400 text-gray-800';
?>

<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-7xl mx-auto">
        <div class="mb-12 text-center">
            <h1 class="text-5xl font-bold bg-gradient-to-r <?= $accent_blue_gradient ?> bg-clip-text text-transparent mb-4">Account Settings</h1>
            <p class="<?= $secondary_color ?> text-xl font-light">Manage your profile, security, and account preferences.</p>
        </div>

        <?php if ($success || $error): ?>
            <?php 
                $is_success = $success !== null;
                $message = $is_success ? $success : $error;
                
                // Light Theme Alert Styling
                $bg_color = $is_success ? 'bg-green-50/70' : 'bg-red-50/70';
                $border = $is_success ? 'border-green-300' : 'border-red-300';
                $text_color = $is_success ? 'text-green-700' : 'text-red-700';
                $status_text_color = $is_success ? 'text-green-600' : 'text-red-600';
                $status = $is_success ? 'Success!' : 'Error!';
                $icon = $is_success ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>' : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                $icon_bg = $is_success ? 'bg-green-500' : 'bg-red-500';
            ?>
            <div class="mb-8 p-4 sm:p-6 <?= $bg_color ?> border <?= $border ?> rounded-2xl backdrop-blur-sm shadow-md max-w-4xl mx-auto">
                <div class="flex items-center">
                    <div class="w-10 h-10 <?= $icon_bg ?> rounded-xl flex items-center justify-center mr-4 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?= $icon ?></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-base sm:text-lg <?= $status_text_color ?>"><?= $status ?></p>
                        <p class="text-sm sm:text-base <?= $text_color ?>"><?= htmlspecialchars($message) ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-5 gap-8">
            
            <div class="lg:col-span-1 xl:col-span-1 space-y-8">
                <div class="<?= $glass_sidebar_bg ?> rounded-3xl shadow-xl border border-gray-100 p-6 lg:sticky lg:top-8">
                    <h3 class="text-xl font-bold <?= $primary_color ?> mb-6 flex items-center border-b pb-3 border-gray-100">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Account Info
                    </h3>

                    <div class="space-y-4">
                        <div class="p-4 bg-white rounded-xl border border-gray-100">
                            <p class="text-xs <?= $secondary_color ?> font-medium">Member Since</p>
                            <p class="font-bold <?= $primary_color ?> text-base"><?= date('M j, Y', strtotime($user['created_at'] ?? 'now')) ?></p>
                        </div>
                        <div class="p-4 bg-white rounded-xl border border-gray-100">
                            <p class="text-xs <?= $secondary_color ?> font-medium">Account ID</p>
                            <p class="font-bold <?= $primary_color ?> text-base">#<?= $user['id'] ?></p>
                        </div>
                        <div class="p-4 bg-white rounded-xl border border-gray-100">
                            <p class="text-xs <?= $secondary_color ?> font-medium">Status</p>
                            <p class="font-bold text-blue-500 text-base flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Active
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 xl:col-span-4 space-y-10">

                <div class="group relative flex flex-col" id="profile-info-section">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100/50 to-sky-100/50 rounded-3xl blur-sm opacity-0 group-hover:opacity-100 transition duration-500 -m-1"></div>
                    
                    <div class="relative <?= $glass_bg ?> rounded-3xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-500 flex-1">
                        <div class="flex items-center mb-8 border-b pb-4 border-gray-100">
                            <div class="w-12 h-12 bg-gradient-to-br <?= $accent_blue_gradient ?> rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold <?= $primary_color ?>">Profile Information</h2>
                                <p class="<?= $secondary_color ?> font-light">Update your personal details</p>
                            </div>
                        </div>
                        
                        <form method="POST" action="/profile/update" class="space-y-8">
                            <div class="group/field">
                                <label for="name" class="block text-base font-semibold <?= $secondary_color ?> mb-4">Full Name</label>
                                <div class="relative">
                                    <input type="text" 
                                            id="name" 
                                            name="name" 
                                            value="<?= htmlspecialchars($user['name']) ?>" 
                                            required
                                            class="<?= $input_style ?> group-hover/field:border-blue-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group/field">
                                <label for="email" class="block text-base font-semibold <?= $secondary_color ?> mb-4">Email Address</label>
                                <div class="relative">
                                    <input type="email" 
                                            id="email" 
                                            name="email" 
                                            value="<?= htmlspecialchars($user['email']) ?>" 
                                            required
                                            class="<?= $input_style ?> group-hover/field:border-sky-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r <?= $accent_blue_gradient ?> hover:from-blue-600 hover:to-sky-600 text-white py-4 px-6 rounded-2xl font-bold 
                                    text-lg transition-all duration-300 transform hover:-translate-y-1 shadow-xl shadow-blue-300/50 hover:shadow-2xl group/button ">
                                <svg class="w-6 h-6 inline mr-3 group-hover/button:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Profile
                            </button>
                        </form>
                    </div>
                </div>

                <div class="group relative flex flex-col" id="profile-picture-section">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100/50 to-sky-100/50 rounded-3xl blur-sm opacity-0 group-hover:opacity-100 transition duration-500 -m-1"></div>
                    
                    <div class="relative <?= $glass_bg ?> rounded-3xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-500 flex-1">
                        <div class="flex items-center mb-8 border-b pb-4 border-gray-100">
                            <div class="w-12 h-12 bg-gradient-to-br <?= $accent_blue_gradient ?> rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold <?= $primary_color ?>">Profile Picture</h2>
                                <p class="<?= $secondary_color ?> font-light">Update your profile image</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-center space-y-8">
                            <form method="POST" action="/profile/picture" enctype="multipart/form-data" class="w-full" id="profilePictureForm">
                                <div class="space-y-6">
                                    <div>
                                        <label for="profile_picture" class="block text-base font-semibold <?= $secondary_color ?> mb-4">
                                            Upload new profile picture
                                        </label>
                                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 hover:border-blue-400 transition-all duration-300 bg-white/80 cursor-pointer group/upload">
                                            <input type="file" 
                                                    id="profile_picture" 
                                                    name="profile_picture" 
                                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                                    class="hidden"
                                                    required>
                                            <div class="text-center group-hover/upload:scale-105 transition-transform duration-300">
                                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-3 group-hover/upload:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="<?= $primary_color ?> font-semibold text-lg">Click to upload image</p>
                                                <p class="text-sm <?= $secondary_color ?> font-light mt-2">JPEG, PNG, GIF, WebP (Max 5MB)</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" 
                                            class="w-full bg-gradient-to-r <?= $accent_blue_gradient ?> hover:from-blue-600 hover:to-sky-600 text-white py-4 px-6 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:-translate-y-1 shadow-xl shadow-blue-300/50 hover:shadow-2xl group/button">
                                        <svg class="w-6 h-6 inline mr-3 group-hover/button:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Update Profile Picture
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
// File validation and preview logic is kept the same
document.getElementById('profilePictureForm').addEventListener('submit', function(e) {
    const fileInput = document.getElementById('profile_picture');
    const file = fileInput.files[0];
    
    if (!file) {
        e.preventDefault();
        alert('Please select a profile picture.');
        return;
    }
    
    // Check file size (5MB max)
    if (file.size > 5 * 1024 * 1024) {
        e.preventDefault();
        alert('File size must be less than 5MB.');
        return;
    }
    
    // Check file type
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        e.preventDefault();
        alert('Please select a valid image file (JPEG, PNG, GIF, or WebP).');
        return;
    }
});

// Click to upload for profile picture
document.querySelector('.group\\/upload').addEventListener('click', function() {
    // Only trigger if no file is selected yet, or if they click the main area (not a specific button later on)
    document.getElementById('profile_picture').click();
});

// File input change handler (Updated text/color for light theme)
document.getElementById('profile_picture').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        const fileName = this.files[0].name;
        const uploadContentDiv = this.closest('.group\\/upload').querySelector('div');
        if (uploadContentDiv) {
            uploadContentDiv.innerHTML = `
                <svg class="w-12 h-12 text-green-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-gray-900 font-semibold text-lg">File selected</p>
                <p class="text-sm text-gray-500 font-light mt-2">${fileName}</p>
            `;
        }
    }
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>