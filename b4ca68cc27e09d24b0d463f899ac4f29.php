
<?php $__env->startSection('content'); ?>

    <!-- MAIN CONTENT AREA (Deworming UI) -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Deworming & Flea/Tick Protection</h1>
                <p class="text-xs text-pink-500 font-medium">Monitor and manage internal and external parasite control schedules.</p>
            </div>
            <div>
                <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200⁠ text-xs font-semibold rounded-xl shadow-md shadow-pink-200 transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Add Parasite Record
                </button>
            </div>
        </div>

        <!-- Content Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Summary Card -->
            <div class="lg:col-span-4">
                <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-pink-100 rounded-bl-full opacity-40"></div>
                    
                    <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-pink-200 shadow-inner">
                        <span class="material-symbols-outlined text-3xl">shield</span>
                    </div>
                    
                    <h2 class="text-base font-bold text-gray-800">Parasite Protection Status</h2>
                    <p class="text-xs text-gray-400 mb-6">Current defense level for your pet.</p>

                    <div class="bg-pink-50/50 p-4 rounded-2xl border border-pink-100 space-y-3 text-left mb-6">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-500 font-medium">Deworming:</span>
                            <span class="font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Up to Date</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-500 font-medium">Flea & Tick:</span>
                            <span class="font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">Due in 5 Days</span>
                        </div>
                    </div>

                    <div class="text-[11px] text-gray-400 bg-gray-50 p-3 rounded-xl border border-gray-100">
                        💡 Regular deworming protects both your pet and your family from common parasites.
                    </div>
                </div>
            </div>

            <!-- Right Table / History UI -->
            <div class="lg:col-span-8">
                <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2">
                            <span class="material-symbols-outlined text-pink-500">history</span> Treatment History Logs
                        </h3>
                        <span class="text-xs bg-pink-50 text-pink-600 font-semibold px-3 py-1 rounded-full">Showing All Records</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="border-b border-pink-100 text-gray-400 font-semibold">
                                    <th class="pb-3 px-3">Treatment Type</th>
                                    <th class="pb-3 px-3">Product Name</th>
                                    <th class="pb-3 px-3">Date Administered</th>
                                    <th class="pb-3 px-3">Next Due Date</th>
                                    <th class="pb-3 px-3 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-50 text-gray-700">
                                <tr class="hover:bg-pink-50/30 transition">
                                    <td class="py-3.5 px-3 font-semibold flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Oral Dewormer
                                    </td>
                                    <td class="py-3.5 px-3 text-gray-500">Drontal Cat</td>
                                    <td class="py-3.5 px-3">Aug 15, 2026</td>
                                    <td class="py-3.5 px-3 font-medium text-gray-800">Nov 15, 2026</td>
                                    <td class="py-3.5 px-3 text-right">
                                        <span class="bg-emerald-50 text-emerald-600 font-semibold px-2.5 py-1 rounded-lg">Completed</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-pink-50/30 transition">
                                    <td class="py-3.5 px-3 font-semibold flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span> Spot-on Flea/Tick
                                    </td>
                                    <td class="py-3.5 px-3 text-gray-500">Frontline Plus</td>
                                    <td class="py-3.5 px-3">Sep 01, 2026</td>
                                    <td class="py-3.5 px-3 font-medium text-amber-600">Sep 25, 2026</td>
                                    <td class="py-3.5 px-3 text-right">
                                        <span class="bg-amber-50 text-amber-600 font-semibold px-2.5 py-1 rounded-lg">Due Soon</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vet-care-system\resources\views/health/deworming.blade.php ENDPATH**/ ?>