<?php
$title = 'Posts | AuthBoard';
ob_start();

// Light Theme Color Scheme Variables
$primary_color = 'text-gray-900'; // Dark text for headings
$secondary_color = 'text-gray-500'; // Lighter text for details
$accent_teal = 'text-teal-600'; // Primary accent color (Teal)
$accent_blue = 'text-blue-600'; // Secondary accent for post content
$card_bg = 'bg-white shadow-xl border border-gray-100'; // Clean card style
$card_hover_style = 'hover:shadow-2xl hover:border-teal-200 hover:-translate-y-0.5';
$like_color = 'text-red-500';
$comment_color = 'text-blue-500';
?>

<div class="max-w-4xl mx-auto">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-12 border-b pb-6 border-gray-200">
        <div class="text-center sm:text-left">
            <h1 class="text-4xl font-extrabold <?= $primary_color ?> mb-2">Community Feed</h1>
            <p class="text-base <?= $secondary_color ?>">See what everyone's talking about in real-time.</p>
        </div>
        <div class="flex-shrink-0">
             <a href="/posts/create" class="inline-flex items-center px-6 py-3 rounded-full text-white font-semibold shadow-md bg-teal-600 hover:bg-teal-700 transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Post
            </a>
        </div>
    </div>

    <div class="space-y-8">
        <?php if (empty($posts)): ?>
            <div class="text-center py-20 bg-gray-50 rounded-3xl shadow-lg border border-gray-200 p-12 transition-all duration-300">
                <div class="w-24 h-24 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner border-4 border-white">
                    <svg class="w-12 h-12 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold <?= $primary_color ?> mb-4">Silence in the Feed... 🤫</h3>
                <p class="<?= $secondary_color ?> text-lg mb-8 max-w-md mx-auto">Looks like no one has posted yet. Be the first to break the ice!</p>
                <a href="/posts/create" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl transition-colors inline-block font-semibold shadow-lg">
                    Start a New Conversation
                </a>
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="relative <?= $card_bg ?> rounded-3xl p-6 sm:p-8 transition-all duration-300 <?= $card_hover_style ?>">

                    <div class="mb-6">
                        <p class="text-xl font-medium <?= $accent_blue ?> mb-4 leading-snug">
                            <?= htmlspecialchars(substr($post['content'], 0, 150)) . (strlen($post['content']) > 150 ? '...' : '') ?>
                        </p>
                    </div>
                    
                    <?php if ($post['image']): ?>
                        <div class="mb-6 rounded-2xl overflow-hidden border border-gray-200 shadow-md">
                            <img src="<?= htmlspecialchars($post['image']) ?>" 
                                alt="Shared content image" 
                                class="w-full h-auto max-h-96 object-cover transform transition-transform duration-500 group-hover:scale-[1.01]">
                        </div>
                    <?php endif; ?>

                    <div class="border-t border-gray-200/80 pt-6">
                        <div class="flex items-end justify-between">
                            
                            <div class="flex items-center space-x-4">
                                <div class="relative">
                                    <?php if ($post['user_profile_picture']): ?>
                                        <div class="w-10 h-10 rounded-full border-2 border-white ring-2 ring-gray-200 overflow-hidden shadow-sm">
                                            <img src="<?= htmlspecialchars($post['user_profile_picture']) ?>" 
                                                alt="User Profile" 
                                                class="w-full h-full rounded-full object-cover">
                                        </div>
                                    <?php else: ?>
                                        <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                            <?= strtoupper(substr($post['user_name'], 0, 1)) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h3 class="font-bold <?= $primary_color ?> text-md hover:text-teal-600 transition-colors cursor-pointer"><?= htmlspecialchars($post['user_name']) ?></h3>
                                    <p class="<?= $secondary_color ?> text-xs flex items-center mt-1 font-medium">
                                        <svg class="w-3 h-3 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <?= date('M j, Y', strtotime($post['created_at'])) ?>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                
                                <button class="flex items-center space-x-1 <?= $secondary_color ?> hover:<?= $like_color ?> transition duration-300 group/like">
                                    <svg class="w-5 h-5 group-hover/like:fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-.318-.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span class="text-sm font-semibold">24</span>
                                </button>

                                <a href="/posts/<?= $post['id'] ?>" class="flex items-center space-x-1 <?= $secondary_color ?> hover:<?= $comment_color ?> transition duration-300 group/comment">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    <span class="text-sm font-semibold">8</span>
                                </a>
                                
                                <?php if ($post['user_id'] == ($_SESSION['user']['id'] ?? null)): ?>
                                <form method="POST" action="/posts/delete" class="ml-2">
                                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')"
                                            class="text-gray-400 hover:text-red-500 transition-colors duration-300 p-2 rounded-lg hover:bg-red-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>