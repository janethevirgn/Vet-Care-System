@extends('layouts.app')
@section('content')

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Pet Expenses & Budget</h1>
                <p class="text-xs text-pink-500 font-medium">Monitor clinic fees, food, and grooming expenses.</p>
            </div>
            <div>
                <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200⁠ text-xs font-semibold rounded-xl shadow-md shadow-pink-200 transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Add New Expense
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white/90 border border-pink-100 shadow-md rounded-2xl p-3.5 transition-all duration-200 ease-out hover:-translate-y-0.5 hover:shadow-lg hover:shadow-pink-200 hover:border-pink-300">
                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider block mb-1">Overall Expenses</span>
                <span class="text-lg font-bold text-gray-800">₱0.00</span>
            </div>
            <div class="bg-white/90 border border-pink-100 shadow-md rounded-2xl p-3.5 transition-all duration-200 ease-out hover:-translate-y-0.5 hover:shadow-lg hover:shadow-pink-200 hover:border-pink-300">
                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider block mb-1">Total Expenses (This Year 2026)</span>
                <span class="text-lg font-bold text-gray-800">₱0.00</span>
            </div>
            <div class="bg-white/90 border border-pink-100 shadow-md rounded-2xl p-3.5 transition-all duration-200 ease-out hover:-translate-y-0.5 hover:shadow-lg hover:shadow-pink-200 hover:border-pink-300">
                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider block mb-1">Total Expenses (This Month)</span>
                <span class="text-lg font-bold text-gray-800">₱0.00</span>
            </div>
            <div class="bg-white/90 border border-pink-100 shadow-md rounded-2xl p-3.5 transition-all duration-200 ease-out hover:-translate-y-0.5 hover:shadow-lg hover:shadow-pink-200 hover:border-pink-300">
                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wider block mb-1">Total Expenses (Today)</span>
                <span class="text-lg font-bold text-gray-800">₱0.00</span>
            </div>
        </div>

        <div class="bg-white/95 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6">
            <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-pink-500">receipt_long</span> Expense History
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs align-middle">
                    <thead>
                        <tr class="border-b border-pink-100 text-gray-400 font-semibold align-middle">
                            <th class="pb-3 px-2 text-center">Pet Name</th>
                            <th class="pb-3 px-2 text-center">Description</th>
                            <th class="pb-3 px-2 text-center">Category</th>
                            <th class="pb-3 px-2 text-center">Date</th>
                            <th class="pb-3 px-2 text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-50 text-gray-700">
                        <tr class="align-middle">
                            <td class="py-3 px-2 font-semibold text-center">Mila</td>
                            <td class="py-3 px-2 font-semibold text-center">Cat Food & Vitamins</td>
                            <td class="py-3 px-2 text-gray-500 text-center">Nutrition</td>
                            <td class="py-3 px-2 text-center">Sep 15, 2026</td>
                            <td class="py-3 px-2 text-center font-bold text-gray-800">₱0.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection