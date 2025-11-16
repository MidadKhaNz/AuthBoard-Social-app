<?php
$title = 'New Idea | AuthBoard';
ob_start();

// Light Theme & Glassmorphism Variables
$primary_color = 'text-gray-900';
$secondary_color = 'text-gray-500';
$accent_teal = 'bg-teal-500 hover:bg-teal-600';
$accent_blue_gradient = 'from-blue-500 to-sky-500'; // For headings and major buttons
$glass_bg = 'bg-white/60 backdrop-blur-lg shadow-xl border border-white/80';
$glass_hover_effect = 'hover:shadow-2xl hover:border-blue-200';
$input_style = 'w-full px-5 py-4 text-lg border border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 resize-none shadow-sm placeholder-gray-400 bg-white/70';
?>

<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-6xl mx-auto">
        <header class="mb-10 text-center">
            <h1 class="text-5xl font-extrabold bg-gradient-to-r <?= $accent_blue_gradient ?> bg-clip-text text-transparent mb-4">Share Your New Idea</h1>
            <p class="<?= $secondary_color ?> text-xl font-light">Bring your best ideas and insights to the forefront</p>
        </header>

        <div class="group relative p-1 lg:p-2 rounded-3xl">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-sky-100 rounded-3xl opacity-50 blur-sm"></div>
            
            <form action="/posts/store" method="POST" enctype="multipart/form-data" 
            class="relative <?= $glass_bg ?> rounded-3xl p-8 sm:p-10 transition-all duration-500 space-y-10 <?= $glass_hover_effect ?>"
            id="createPostForm">
                
                <div class="lg:grid lg:grid-cols-2 lg:gap-10 lg:items-stretch">

                    <div class="lg:col-span-1 h-full flex flex-col">
                        <fieldset class="space-y-6 flex flex-col h-full">
                            <legend class="text-2xl font-bold <?= $primary_color ?> flex items-center mb-6 border-b pb-3 border-gray-100">
                                <svg class="w-7 h-7 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                1. Craft Your Message
                            </legend>
                            
                            <div class="group/content-field flex-grow flex flex-col">
                                <label for="content" class="sr-only">Post Content</label>
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    
                                    class="<?= $input_style ?> min-h-64 flex-grow focus:shadow-lg"
                                    
                                    placeholder="Write your brilliant post here! Ask questions, share knowledge, or start a debate..."
                                    required
                                    oninput="autoExpand(this)"
                                ></textarea>
                                
                                <div class="flex justify-between items-center mt-4 text-sm">
                                    <span class="font-light <?= $secondary_color ?>">A minimum of 10 characters is recommended</span>
                                    
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="lg:col-span-1 mt-10 lg:mt-0">
                        <fieldset class="space-y-6">
                            <legend class="text-2xl font-bold <?= $primary_color ?> flex items-center mb-6 border-b pb-3 border-gray-100">
                                <svg class="w-7 h-7 mr-3 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                2. Add Visual Context (Optional)
                            </legend>

                            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-400 transition-all duration-300 bg-white/70 cursor-pointer group/upload h-full flex flex-col justify-center" id="uploadArea">
                                <input 
                                    type="file" 
                                    id="image" 
                                    name="image" 
                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                    class="hidden"
                                    onchange="previewImage(this)"
                                >
                                
                                <div id="uploadContent" class="group-hover/upload:scale-[1.02] transition-transform duration-300">
                                    <div class="w-16 h-16 bg-gradient-to-br <?= $accent_blue_gradient ?> rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover/upload:scale-105 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="<?= $primary_color ?> mb-2 font-semibold text-xl">Upload or Drop Your Image</p>
                                    <p class="text-sm <?= $secondary_color ?> font-light">Supported formats: PNG, JPG, GIF, WebP | Maximum file size: 10MB</p>
                                </div>

                                <div id="imagePreview" class="hidden mt-6">
                                    <img id="preview" class="max-w-full max-h-80 w-auto rounded-xl mx-auto shadow-xl border-4 border-white object-cover">
                                    <p id="fileName" class="text-base <?= $primary_color ?> font-medium mt-4"></p>
                                    <button type="button" onclick="removeImage()" class="mt-4 bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg transition-colors duration-300 font-semibold shadow-md flex items-center mx-auto">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Clear Image
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
                <div class="pt-6 border-t border-gray-200"></div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 flex items-center justify-center bg-gradient-to-r <?= $accent_blue_gradient ?> hover:from-blue-600 hover:to-sky-600 text-white px-8 py-4 rounded-2xl transition-all duration-300 font-bold text-lg shadow-xl shadow-blue-300/50 hover:shadow-blue-400/70 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                        Post to Timeline
                    </button>
                    <a href="/posts" 
                        class="flex-1 flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition-colors duration-300 font-bold text-lg text-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Go Back to Feed
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// --- JS Functions (No change in logic, only included for a complete view) ---
function autoExpand(field) {
    field.style.height = 'auto'; 
    field.style.height = (field.scrollHeight) + 'px';
}

function updateCharCount(charCount) {
    const charCountElement = document.getElementById('charCount');
    charCountElement.textContent = charCount + ' characters';
    
    // Update color for light theme readability and styling
    if (charCount < 10) {
        charCountElement.className = 'font-medium bg-red-100 text-red-600 px-3 py-1 rounded-full shadow-sm';
    } else if (charCount > 500) {
        charCountElement.className = 'font-medium bg-sky-100 text-sky-600 px-3 py-1 rounded-full shadow-sm';
    } else {
        charCountElement.className = 'font-medium bg-blue-100 text-blue-600 px-3 py-1 rounded-full shadow-sm';
    }
}

document.getElementById('content').addEventListener('input', function() {
    autoExpand(this); 
    updateCharCount(this.value.length);
});

window.addEventListener('load', function() {
    const contentField = document.getElementById('content');
    if (contentField) {
        autoExpand(contentField);
        updateCharCount(contentField.value.length);
    }
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];

        if (file.size > 10 * 1024 * 1024) {
            alert('File size exceeds the 10MB limit.');
            removeImage();
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('uploadContent').classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('preview').src = '';
    document.getElementById('fileName').textContent = '';
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('uploadContent').classList.remove('hidden');
}

document.getElementById('uploadArea').addEventListener('click', function(e) {
    if (e.target.tagName !== 'BUTTON' && !e.target.closest('button')) {
        document.getElementById('image').click();
    }
});
</script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>