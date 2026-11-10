@extends('layouts.app')
@section('content')

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Vaccination Tracker</h1>
                <p class="text-xs text-pink-500 font-medium">Track core and non-core vaccines for your pet.</p>
            </div>
            <div>
                <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200⁠ text-xs font-semibold rounded-xl shadow-md shadow-pink-200 transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Add Vaccine Record
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-4">
                <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6 text-center relative overflow-hidden">
                    <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-pink-200">
                        <span class="material-symbols-outlined text-3xl">vaccines</span>
                    </div>
                    <h2 class="text-base font-bold text-gray-800">Immunization Rate</h2>
                    <p class="text-xs text-gray-400 mb-6">Overall vaccine compliance.</p>
                    <div class="bg-pink-50/50 p-4 rounded-2xl border border-pink-100 space-y-2 text-left">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-500">Core Vaccines:</span>
                            <span class="font-bold text-pink-600">Completed</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6">
                    <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-pink-500">history</span> Vaccine History
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="border-b border-pink-100 text-gray-400 font-semibold">
                                    <th class="pb-3 px-3">Vaccine Name</th>
                                    <th class="pb-3 px-3">Date Given</th>
                                    <th class="pb-3 px-3">Next Booster</th>
                                    <th class="pb-3 px-3 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-50 text-gray-700">
                                <tr class="hover:bg-pink-50/30 transition">
                                    <td class="py-3.5 px-3 font-semibold">Rabies Vaccine</td>
                                    <td class="py-3.5 px-3 text-gray-500">Jan 10, 2026</td>
                                    <td class="py-3.5 px-3 font-medium">Jan 10, 2027</td>
                                    <td class="py-3.5 px-3 text-right">
                                        <span class="bg-emerald-50 text-emerald-600 font-semibold px-2.5 py-1 rounded-lg">Up to Date</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection