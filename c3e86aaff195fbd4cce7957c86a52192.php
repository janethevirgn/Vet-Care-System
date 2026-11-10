<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Care Clinic</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts & Material Symbols para sa mas desenteng icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-linear-to-br from-pink-50 via-white to-pink-100 min-h-screen flex items-center justify-center p-4">

    <!-- Main Container Card -->
    <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-2xl rounded-3xl w-full max-w-md p-8 relative overflow-hidden">
        
        <!-- Background Glow Accents -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-pink-200 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-pink-100 rounded-full blur-3xl opacity-60"></div>

        <!-- Logo & Header Section -->
        <div class="text-center relative z-10 mb-6">
            <!-- Paggamit ng Google Material Symbol para sa cute at desenteng logo icon -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-pink-500 text-white rounded-2xl shadow-lg shadow-pink-200 mb-3 transform hover:scale-105 transition duration-300">
                <span class="material-symbols-outlined text-3xl">pets</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Vet Care Clinic</h1>
            <p class="text-xs text-pink-500 font-medium mt-1 flex items-center justify-center gap-1">
                Your Pet’s Digital Companion 🐾
            </p>
        </div>

        <!-- Tabs para sa Login / Register -->
        <div class="flex bg-pink-50/80 p-1 rounded-xl mb-6 relative z-10 border border-pink-100">
            <button id="loginTabBtn" onclick="switchTab('login')" class="flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 bg-white text-pink-600 shadow-sm">Login</button>
            <button id="registerTabBtn" onclick="switchTab('register')" class="flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-pink-600">Register</button>
        </div>

        <!-- LOGIN FORM -->
        <form id="loginForm" action="<?php echo e(route('login.owner')); ?>" method="POST" class="space-y-4 relative z-10">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Email Address</label>
                <input type="email" name="email" required autocomplete="email"
                    class="w-full px-4 py-2.5 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="name@example.com">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Password</label>
                <input type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-2.5 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="Password">
            </div>

            <button type="submit" 
                 class="w-full py-3 bg-gradient-to-r from-pink-500 to-rose-400 hover:from-pink-600 hover:to-rose-500 text-white font-semibold rounded-xl shadow-lg shadow-pink-200 transition-all duration-300 flex items-center justify-center gap-2 text-sm group">
                <span class="material-symbols-outlined text-sm group-hover:scale-110 transition transform">how_to_reg</span> 
                Login to Portal
            </button>
        </form>

        <!-- REGISTER FORM -->
        <form id="registerForm" action="<?php echo e(route('register.owner')); ?>" method="POST" class="space-y-4 relative z-10 hidden">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Full Name</label>
                <input type="text" name="name" required 
                    class="w-full px-4 py-2 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="Juan Dela Cruz">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Email Address</label>
                <input type="email" name="email" required 
                    class="w-full px-4 py-2 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="name@example.com">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Phone Number</label>
                <input type="tel" name="phone" id="phoneInput" required maxlength="13"
                    class="w-full px-4 py-2 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="09XX-XXX-XXXX">
            </div>

            <div>
                <label class="block text-xs font-medium text-gray-600 mb-1">Password (Min 8 chars)</label>
                <input type="password" name="password" required minlength="8" 
                    class="w-full px-4 py-2 bg-pink-50/20 border border-pink-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:bg-white transition"
                    placeholder="Password">
            </div>

           <button type="submit" 
                class="w-full py-3 bg-gradient-to-r from-pink-500 to-rose-400 hover:from-pink-600 hover:to-rose-500 text-white font-semibold rounded-xl shadow-lg shadow-pink-200 transition-all duration-300 flex items-center justify-center gap-2 text-sm group">
                <span class="material-symbols-outlined text-sm group-hover:scale-110 transition transform">how_to_reg</span> 
                Create Owner Account
            </button>
        </form>

    </div>

    <script>
        function switchTab(tab) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const loginBtn = document.getElementById('loginTabBtn');
            const registerBtn = document.getElementById('registerTabBtn');

            if (!loginForm || !registerForm || !loginBtn || !registerBtn) {
                return;
            }

            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginBtn.className = "flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 bg-white text-pink-600 shadow-sm";
                registerBtn.className = "flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-pink-600";
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                registerBtn.className = "flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 bg-white text-pink-600 shadow-sm";
                loginBtn.className = "flex-1 py-2 text-xs font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-pink-600";
            }
        }

        const phoneInput = document.getElementById('phoneInput');

        if (phoneInput) {
            phoneInput.addEventListener('input', function (e) {
                let digits = e.target.value.replace(/\D/g, '').slice(0, 11);
                let formatted = '';

                if (digits.length > 0) {
                    formatted = digits.substring(0, 4);
                }

                if (digits.length >= 5) {
                    formatted += '-' + digits.substring(4, 7);
                }

                if (digits.length >= 8) {
                    formatted += '-' + digits.substring(7, 11);
                }

                e.target.value = formatted;
            });
        }

        function handleRegister(event) {
            event.preventDefault();
            alert('Account successfully Created! Please Login.');
            switchTab('login');
        }
    </script>
</body>
</html><?php /**PATH C:\Users\Lovely Jane\vet-care-system\resources\views\welcome.blade.php ENDPATH**/ ?>