<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Care Clinic</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js para sa interactive dropdowns (sa health) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style> 
        body { font-family: 'Poppins', sans-serif; } 
        .fade-in { animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .nav-active { position: relative; }
        .nav-active::after {
            content: '';
            position: absolute;
            left: 0.75rem;
            right: 0.75rem;
            bottom: 0.2rem;
            height: 2px;
            border-radius: 9999px;
            background: #ec4899;
            transform: scaleX(0);
            transform-origin: left center;
            animation: navUnderline 0.3s ease-out forwards;
        }
        @keyframes navUnderline {
            to { transform: scaleX(1); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-white to-pink-100 min-h-screen text-gray-800">

    <!-- NAV BAR -->
    <header class="bg-white/80 backdrop-blur-md border-b border-pink-100 sticky top-0 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl flex items-center justify-center shadow-md shadow-pink-200">
                        <span class="material-symbols-outlined text-xl">pets</span>
                    </div>
                    <span class="font-bold text-lg tracking-tight text-gray-800">Vet Care Clinic</span>
                </div>

                <!-- NAV LINKS -->
                <nav class="hidden lg:flex items-center gap-1 text-xs font-medium text-gray-600">

                    
                    <a href="/dashboard" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('dashboard') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">dashboard</span> Dashboard
                    </a>

                    <a href="/my-pets" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('pets') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">pets</span> My Pets
                    </a>
                    
                    <!-- Health Dropdown (gamit alpine.js) -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 font-semibold <?php echo e(request()->routeIs('health.*') ? 'nav-active text-pink-600' : 'text-gray-600'); ?>">
                            <span class="material-symbols-outlined text-sm">favorite</span> Health 
                            <span class="material-symbols-outlined text-xs transition-transform duration-200" :class="{'rotate-180': open}">arrow_drop_down</span>
                        </button>
                        <div x-show="open" style="display: none;" class="absolute left-0 mt-1 w-52 bg-white border border-pink-100 rounded-xl shadow-xl py-2 z-50 fade-in">
                            <a href="/health/vaccination" class="block px-4 py-2 hover:bg-pink-50 text-gray-700 text-xs font-medium">Vaccination Tracker</a>
                            <a href="/health/deworming" class="block px-4 py-2 hover:bg-pink-50 text-gray-700 text-xs font-medium">Deworming & Flea/Tick</a>
                        </div>
                    </div>

                    <a href="/appointments" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('appointments') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">calendar_month</span> Appointments
                    </a>

                    <a href="/records" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('records') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">folder</span> Records
                    </a>

                    <a href="/expenses" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('expenses') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">payments</span> Expenses
                    </a>

                    <a href="/gallery" class="px-3 py-2 rounded-lg hover:bg-pink-50 hover:text-pink-600 transition flex items-center gap-1 <?php echo e(request()->routeIs('gallery') ? 'nav-active text-pink-600' : ''); ?>">
                        <span class="material-symbols-outlined text-sm">photo_library</span> Gallery
                    </a>

                </nav>

                <!-- User Profile & Logout Button -->
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 bg-pink-50/60 border border-pink-100 px-3 py-1.5 rounded-xl">
                        <span class="material-symbols-outlined text-pink-500 text-sm">account_circle</span>
                        <span class="text-xs font-semibold text-gray-700">Lovely Jane Araya</span>
                    </div>
                    
                    <!-- Logout Button -->
                    <a href="#" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition flex items-center gap-1 text-xs font-semibold" title="Log Out">
                        <span class="material-symbols-outlined text-xl">logout</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html>
<?php /**PATH C:\Users\Lovely Jane\vet-care-system\resources\views/layouts/app.blade.php ENDPATH**/ ?>