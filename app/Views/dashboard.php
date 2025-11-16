<?php
$title = 'Dashboard | AuthBoard';
ob_start();

// Note: The $user variable is assumed to be available here.
?>

<div class="min-h-screen bg-slate-50 py-10">
    <div class="max-w-6xl mx-auto px-4 lg:px-0 space-y-8">

        <!-- PAGE HEADER -->
        <section class="space-y-3">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-2xl md:text-3xl font-semibold text-slate-900">
                        Welcome back, <?= htmlspecialchars($_SESSION['user']['name'] ?? 'there') ?>.
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Here’s a quick overview of your account, activity, and shortcuts.
                    </p>
                </div>

                <div class="flex flex-col items-start sm:items-end gap-2">
                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 border border-emerald-100">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 mr-2"></span>
                        Account status: Active
                    </span>
                    <span class="text-xs text-slate-400">
                        Last login: Just now · IP: 192.168.1.1
                    </span>
                </div>
            </div>
        </section>

        <!-- TOP METRIC CARDS -->
        <section class="grid gap-5 md:grid-cols-3">
            <!-- Account Health -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex flex-col justify-between">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-400">Profile</p>
                        <p class="text-sm font-semibold text-slate-800">Account Health</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center">
                        <span class="text-emerald-500 text-lg">✔</span>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between text-xs text-slate-400">
                        <span>Completion</span>
                        <span>92%</span>
                    </div>
                    <div class="h-2.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full w-[92%] bg-emerald-500 rounded-full"></div>
                    </div>
                    <p class="text-xs text-slate-400 mt-1">
                        Add a profile photo to reach 100%.
                    </p>
                </div>
            </div>

            <!-- Community Pulse -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex flex-col justify-between">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-400">Community</p>
                        <p class="text-sm font-semibold text-slate-800">Community Pulse</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-indigo-50 flex items-center justify-center">
                        <span class="text-indigo-500 text-lg">💬</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <p class="text-2xl font-semibold text-slate-900 leading-tight">
                        12 <span class="text-base font-normal text-slate-400">new posts</span>
                    </p>
                    <p class="text-xs text-slate-400">
                        4 ongoing discussions · 3 mentions today.
                    </p>
                    <button class="mt-2 inline-flex items-center text-xs font-medium text-indigo-600 hover:text-indigo-700">
                        View community activity
                        <span class="ml-1">→</span>
                    </button>
                </div>
            </div>

            <!-- Security & Devices -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex flex-col justify-between">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-400">Security</p>
                        <p class="text-sm font-semibold text-slate-800">Security & Devices</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center">
                        <span class="text-emerald-500 text-lg">🛡</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-medium text-emerald-700">
                        MFA enabled
                    </span>
                    <p class="text-xs text-slate-400">
                        3 trusted devices connected. Last new device 2 days ago.
                    </p>
                    <button class="mt-2 inline-flex items-center text-xs font-medium text-slate-600 hover:text-slate-800">
                        Manage security
                        <span class="ml-1">→</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- MIDDLE ROW: USER INFO + QUICK ACTIONS -->
        <section class="grid gap-5 lg:grid-cols-[2fr,1fr]">
            <!-- USER INFORMATION -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-slate-900">User Information</h2>
                    <button class="text-xs font-medium text-indigo-600 hover:text-indigo-700 inline-flex items-center">
                        Edit profile
                        <span class="ml-1">→</span>
                    </button>
                </div>

                <dl class="divide-y divide-slate-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                <span class="text-sm">👤</span>
                            </div>
                            <div>
                                <dt class="text-xs text-slate-400 uppercase tracking-wide">Full name</dt>
                                <dd class="text-sm font-medium text-slate-800">
                                    <?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?>
                                </dd>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                <span class="text-sm">✉</span>
                            </div>
                            <div>
                                <dt class="text-xs text-slate-400 uppercase tracking-wide">Email address</dt>
                                <dd class="text-sm font-medium text-slate-800">
                                    <?= htmlspecialchars($_SESSION['user']['email'] ?? 'example@email.com') ?>
                                </dd>
                            </div>
                        </div>
                        <span class="mt-2 sm:mt-0 inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-medium text-emerald-700">
                            Verified
                        </span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                <span class="text-sm">⏱</span>
                            </div>
                            <div>
                                <dt class="text-xs text-slate-400 uppercase tracking-wide">Last login</dt>
                                <dd class="text-sm font-medium text-slate-800">
                                    Just now <span class="text-slate-400 font-normal">(IP: 192.168.1.1)</span>
                                </dd>
                            </div>
                        </div>
                        <button class="mt-2 sm:mt-0 text-xs font-medium text-slate-500 hover:text-slate-700">
                            View history
                        </button>
                    </div>
                </dl>
            </div>

            <!-- QUICK ACTIONS -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
                <h2 class="text-base font-semibold text-slate-900 mb-4">Quick Actions</h2>
                <div class="space-y-3">

                    <a href="/posts" class="block">
                        <div class="flex items-center justify-between rounded-xl border border-slate-100 bg-emerald-50/60 px-4 py-3 hover:bg-emerald-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-white flex items-center justify-center text-emerald-500">
                                    📄
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">View all posts</p>
                                    <p class="text-xs text-slate-500">See what’s happening in the community.</p>
                                </div>
                            </div>
                            <span class="text-slate-400 text-lg">›</span>
                        </div>
                    </a>

                    <a href="/posts/create" class="block">
                        <div class="flex items-center justify-between rounded-xl border border-slate-100 bg-indigo-50/70 px-4 py-3 hover:bg-indigo-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-white flex items-center justify-center text-indigo-500">
                                    ＋
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">Create new post</p>
                                    <p class="text-xs text-slate-500">Share your thoughts with your network.</p>
                                </div>
                            </div>
                            <span class="text-slate-400 text-lg">›</span>
                        </div>
                    </a>

                    <a href="/settings/security" class="block">
                        <div class="flex items-center justify-between rounded-xl border border-slate-100 bg-rose-50/70 px-4 py-3 hover:bg-rose-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-white flex items-center justify-center text-rose-500">
                                    🔐
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">Change password</p>
                                    <p class="text-xs text-slate-500">Update your security credentials.</p>
                                </div>
                            </div>
                            <span class="text-slate-400 text-lg">›</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- BOTTOM ROW: ACTIVITY + LOGIN HISTORY (optional, can extend later) -->
        <section class="grid gap-5 lg:grid-cols-2">
            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-slate-900">Recent Activity</h2>
                    <button class="text-xs font-medium text-slate-500 hover:text-slate-700">
                        View all
                    </button>
                </div>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex justify-between">
                        <span>Commented on a post</span>
                        <span class="text-xs text-slate-400">2 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Created a new post</span>
                        <span class="text-xs text-slate-400">30 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Enabled MFA</span>
                        <span class="text-xs text-slate-400">Yesterday</span>
                    </li>
                </ul>
            </div>

            <!-- Login History -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-slate-900">Login History</h2>
                    <button class="text-xs font-medium text-slate-500 hover:text-slate-700">
                        Manage devices
                    </button>
                </div>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex justify-between">
                        <span>Chrome · Windows · Sylhet</span>
                        <span class="text-xs text-slate-400">Just now</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Chrome · Windows · Sylhet</span>
                        <span class="text-xs text-slate-400">Today · 11:24 AM</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Safari · iOS · Dhaka</span>
                        <span class="text-xs text-slate-400">Yesterday · 9:12 PM</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>