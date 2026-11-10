
<?php $__env->startSection('content'); ?>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Medical Records & History</h1>
                <p class="text-xs text-pink-500 font-medium">Digital archives of diagnoses, prescriptions, and vet notes.</p>
            </div>
            <div>
                <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200⁠ text-xs font-semibold rounded-xl shadow-md shadow-pink-200 transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Upload New Record
                </button>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6">
            <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-pink-500">description</span> Archive Files
            </h3>
            <div class="p-4 bg-pink-50/20 border border-dashed border-pink-200 rounded-2xl text-center">
                <span class="material-symbols-outlined text-4xl text-pink-300 mb-1">folder_open</span>
                <p class="text-xs font-semibold text-gray-700">No custom medical documents uploaded yet.</p>
                <p class="text-[11px] text-gray-400 mt-0.5">Upload scanned prescriptions or medical certificates here.</p>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lovely Jane\vet-care-system\resources\views/records.blade.php ENDPATH**/ ?>