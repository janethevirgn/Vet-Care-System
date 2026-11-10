@extends('layouts.app')
@section('content')

    <div x-data="{
        view: 'Upcoming',
        openMenu: false,
        openModal: false,
        confirmedOnly: true
    }" class="fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Clinic Appointments</h1>
                <p class="text-xs text-pink-500 font-medium">Manage upcoming checkups and veterinary schedules.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <button @click="openMenu = !openMenu" @click.away="openMenu = false" class="px-4 py-2 bg-white border border-pink-200 hover:border-pink-300 text-pink-600 shadow-sm hover:bg-pink-50 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">calendar_month</span>
                        <span x-text="view"></span>
                    </button>

                    <div x-show="openMenu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-44 bg-white border border-pink-100 rounded-2xl shadow-xl z-50 overflow-hidden">
                        <button @click="view = 'Upcoming'; openMenu = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Upcoming</button>
                        <button @click="view = 'Past'; openMenu = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Past</button>
                        <button @click="view = 'Cancelled'; openMenu = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Cancelled</button>
                    </div>
                </div>

                <button @click="openModal = true" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Book New Appointment
                </button>
            </div>
        </div>

        <div class="flex items-center justify-end mb-4">
            <div class="inline-flex items-center gap-3 bg-white/90 backdrop-blur-md border border-pink-100 shadow-md rounded-full px-3 py-2">
                <span class="text-[11px] font-semibold text-gray-600">Confirmed only</span>
                <button type="button" @click="confirmedOnly = !confirmedOnly" :class="confirmedOnly ? 'bg-pink-500' : 'bg-gray-300'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                    <span :class="confirmedOnly ? 'translate-x-5' : 'translate-x-1'" class="inline-block h-4 w-4 rounded-full bg-white shadow transform transition-transform duration-200"></span>
                </button>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6">
            <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-pink-500">event_upcoming</span> <span x-text="view"></span> Appointments
            </h3>
           <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-12 text-center">
                <span class="material-symbols-outlined text-4xl text-pink-300 mb-2 opacity-60">event_busy</span>
                <p class="text-xs font-semibold text-gray-400 opacity-70">No Appointments</p>
                <p class="text-[11px] text-gray-300 mt-1">You haven't scheduled any veterinary checkups yet.</p>
            </div>
        </div>

        <div x-show="openModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50">
            <div @click.away="openModal = false" class="bg-white/95 backdrop-blur-md border border-pink-100 shadow-2xl rounded-3xl p-6 w-full max-w-md fade-in">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Book Appointment</h3>
                    <button @click="openModal = false" class="p-2 text-gray-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition" aria-label="Close modal">
                        <span class="material-symbols-outlined text-lg">close</span>
                    </button>
                </div>

                <div class="space-y-3">
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">Pet</label>
                        <select class="w-full border border-pink-100 bg-pink-50/30 rounded-xl px-3 py-2 text-xs text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-200">
                            <option>Mila</option>
                            <option>Buddy</option>
                            <option>Luna</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">Date</label>
                        <input type="date" class="w-full border border-pink-100 bg-pink-50/30 rounded-xl px-3 py-2 text-xs text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-200">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">Reason</label>
                        <textarea rows="3" class="w-full border border-pink-100 bg-pink-50/30 rounded-xl px-3 py-2 text-xs text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-200" placeholder="Vaccination, checkup, dental care..."></textarea>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-end gap-2">
                    <button @click="openModal = false" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-semibold transition">Cancel</button>
                    <button @click="openModal = false" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white shadow-lg shadow-pink-200 rounded-xl text-xs font-semibold transition">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection