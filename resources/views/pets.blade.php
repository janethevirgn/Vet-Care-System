@extends('layouts.app')
@section('content')

    <div x-data="myPets()" x-init="init()" class="fade-in">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">My Registered Pets</h1>
                <p class="text-xs text-pink-500 font-medium">List of all cats and dogs under your profile.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <button @click="openFilter = !openFilter" @click.away="openFilter = false" class="px-4 py-2 bg-white border border-pink-200 hover:border-pink-300 text-pink-600 shadow-sm hover:bg-pink-50 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        <span x-text="selected"></span>
                    </button>

                    <div x-show="openFilter" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-44 bg-white border border-pink-100 rounded-2xl shadow-xl z-50 overflow-hidden">
                        <button @click="selected = 'All'; openFilter = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">All</button>
                        <button @click="selected = 'Cat'; openFilter = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Cat</button>
                        <button @click="selected = 'Dog'; openFilter = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Dog</button>
                        <button @click="selected = 'Bird'; openFilter = false" class="block w-full text-left px-3 py-2 text-xs font-medium text-gray-700 hover:bg-pink-50 transition">Bird</button>
                    </div>
                </div>

                <button @click="showRegister = true" class="group px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 hover:shadow-xl hover:shadow-pink-300 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform duration-200">add_circle</span> Register New Pet
                </button>
            </div>
        </div>

        <div class="mb-6">
            <p class="text-xs text-pink-500 font-medium">Showing: <span x-text="selected"></span> pets</p>
        </div>

        <div x-show="!pets.length" class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-12 text-center">
            <span class="material-symbols-outlined text-4xl text-pink-300 mb-2 opacity-60">pets</span>
            <p class="text-xs font-semibold text-gray-400 opacity-80">NO REGISTERED PETS AS OF THE MOMENT</p>
            <p class="text-[11px] text-gray-300 mt-1">Start by registering your first pet to keep track of their health records.</p>
        </div>

        <div x-show="pets.length" x-cloak class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
            <template x-for="pet in filteredPets()" :key="pet.id">
                <div class="relative bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-2xl p-4 pt-10 min-h-[460px] hover:shadow-2xl transition-all duration-200">
                    <div class="flex items-start justify-between gap-3 min-h-24">
                        <div @click="previewPhoto = pet.photo; previewName = pet.name; showPhoto = true" title="View pet photo" class="w-24 h-24 mx-auto bg-pink-50 rounded-full flex items-center justify-center border border-pink-200 overflow-hidden cursor-pointer hover:ring-4 hover:ring-pink-100 transition-all duration-200">
                            <template x-if="pet.photo"><img :src="pet.photo" :alt="pet.name" class="w-full h-full object-cover"></template>
                            <template x-if="!pet.photo"><span class="material-symbols-outlined text-4xl text-pink-500">pets</span></template>
                        </div>
                        <button @click="setActive(pet.id)" :class="activeId === pet.id ? 'bg-pink-500 text-white' : 'bg-pink-50 text-pink-600'" class="absolute right-4 top-4 px-2.5 py-1.5 rounded-lg text-[10px] font-semibold transition">
                            <span x-text="activeId === pet.id ? 'Active' : 'Set as active'"></span>
                        </button>
                    </div>
                    <div class="text-center">
                    <h2 x-text="pet.name" class="text-lg font-bold text-gray-800 mt-4"></h2>
                    <p x-text="pet.type + ' • ' + pet.age" class="text-[11px] text-gray-500 mt-1"></p>
                    <div class="flex items-center justify-center gap-2 mt-3 text-xs text-gray-600"><span class="material-symbols-outlined text-pink-500 text-base">cake</span><span x-text="pet.dateOfBirth || 'Birth date not added'"></span><span class="text-pink-200">|</span><span x-text="pet.lifestyle || 'Indoor'"></span></div>
                    <div class="mt-4 space-y-2 text-[11px] text-gray-600">
                        <div class="flex justify-between border-b border-pink-50 pb-2"><span>Breed</span><span x-text="pet.breed" class="font-semibold"></span></div>
                        <div class="flex justify-between border-b border-pink-50 pb-2"><span>Weight</span><span x-text="pet.weight" class="font-semibold"></span></div>
                        <div class="flex justify-between border-b border-pink-50 pb-2"><span>Vaccination</span><span x-text="pet.vaccination" class="font-semibold text-emerald-600"></span></div>
                        <div class="flex justify-between"><span>Deworming</span><span x-text="pet.deworming" class="font-semibold text-amber-600"></span></div>
                    </div>
                        <div class="flex gap-2 mt-5">
                            <button @click="openEdit(pet)" class="group flex-1 px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 hover:shadow-xl hover:shadow-pink-300 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center justify-center gap-1.5"><span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform duration-200">edit</span> Edit Pet Info</button>
                            <button @click="deletePet(pet.id)" class="w-10 px-2 py-2 bg-rose-50 hover:bg-rose-100 text-rose-500 border border-rose-100 rounded-xl transition-all duration-200 flex items-center justify-center" title="Delete pet" aria-label="Delete pet"><span class="material-symbols-outlined text-base">delete</span></button>
                        </div>
                </div>
            </template>
        </div>

        <div x-show="showPhoto" x-cloak @click.self="showPhoto = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 px-4">
            <div class="relative bg-white border border-pink-100 rounded-3xl shadow-2xl p-4 max-w-md w-full">
                <button @click="showPhoto = false" class="absolute right-3 top-3 z-10 w-8 h-8 bg-white/90 hover:bg-pink-50 text-gray-500 hover:text-pink-500 rounded-full shadow-sm transition"><span class="material-symbols-outlined text-base">close</span></button>
                <template x-if="previewPhoto"><img :src="previewPhoto" :alt="previewName" class="w-80 h-80 mx-auto object-cover rounded-full"></template>
                <template x-if="!previewPhoto"><div class="w-80 h-80 mx-auto bg-pink-50 rounded-full flex flex-col items-center justify-center"><span class="material-symbols-outlined text-6xl text-pink-300">pets</span><p class="text-xs text-gray-400 mt-2">No profile photo selected</p></div></template>
                <p x-text="previewName" class="text-center text-sm font-semibold text-gray-700 mt-3"></p>
            </div>
        </div>

        <div x-show="showRegister" x-cloak class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 px-4">
            <form @submit.prevent="registerPet" @click.away="showRegister = false" class="bg-white border border-pink-100 rounded-3xl shadow-2xl p-6 w-full max-w-md">
                <div class="flex items-center justify-between mb-5"><h3 x-text="editingId ? 'Edit Pet Info' : 'Register Pet'" class="text-lg font-bold text-gray-800"></h3><button type="button" @click="showRegister = false; editingId = null" class="text-gray-400 hover:text-pink-500"><span class="material-symbols-outlined">close</span></button></div>
                <div class="space-y-3">
                    <input x-model="form.name" required placeholder="Pet name" class="w-full border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200">
                    <div class="grid grid-cols-2 gap-3"><select x-model="form.type" class="border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200"><option>Dog</option><option>Cat</option><option>Bird</option></select><input x-model="form.age" placeholder="Age (automatic)" readonly class="border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-gray-50 rounded-xl px-3 py-2 text-xs text-gray-500 transition-colors duration-200"></div>
                    <div class="grid grid-cols-2 gap-3"><input x-model="form.breed" placeholder="Breed" class="border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200"><input x-model="form.weight" placeholder="Weight" class="border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200"></div>
                    <div class="grid grid-cols-2 gap-3"><div><label class="block text-[11px] font-semibold text-gray-600 mb-1">Date of Birth</label><input x-model="form.dateOfBirth" @change="form.age = calculateAge(form.dateOfBirth)" type="date" class="w-full border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200"></div><div><label class="block text-[11px] font-semibold text-gray-600 mb-1">Lifestyle</label><select x-model="form.lifestyle" class="w-full border border-pink-100 hover:border-pink-300 hover:bg-pink-50/70 bg-pink-50/30 rounded-xl px-3 py-2 text-xs transition-colors duration-200"><option>Indoor</option><option>Outdoor</option></select></div></div>
                    <div><label class="block text-[11px] font-semibold text-gray-600 mb-1">Select Pet Photo</label><input type="file" accept="image/*" @change="readPhoto($event)" class="block w-full text-xs text-gray-500 file:mr-3 file:rounded-lg file:border-0 file:bg-pink-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-pink-600 hover:file:bg-pink-100"></div>
                </div>
                <div class="flex justify-end gap-2 mt-5"><button type="button" @click="showRegister = false; editingId = null" class="px-4 py-2 bg-gray-100 rounded-xl text-xs font-semibold">Cancel</button><button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl text-xs font-semibold">Save Pet</button></div>
            </form>
        </div>
    </div>
    <script>
        function myPets() {
            return {
                openFilter: false, selected: 'All', pets: [], activeId: null, showRegister: false, showPhoto: false, previewPhoto: '', previewName: '', editingId: null,
                form: { name: '', type: 'Dog', age: '', breed: '', weight: '', dateOfBirth: '', lifestyle: 'Indoor', photo: '' },
                init() {
                    this.pets = JSON.parse(localStorage.getItem('vetcare_pets') || '[]').map(pet => ({ dateOfBirth: '', lifestyle: 'Indoor', photo: '', ...pet, age: this.calculateAge(pet.dateOfBirth) || pet.age }));
                    localStorage.setItem('vetcare_pets', JSON.stringify(this.pets));
                    const savedId = Number(localStorage.getItem('vetcare_active_pet_id'));
                    this.activeId = this.pets.some(pet => pet.id === savedId) ? savedId : (this.pets[0]?.id || null);
                    if (this.activeId) localStorage.setItem('vetcare_active_pet_id', this.activeId);
                },
                filteredPets() { return this.selected === 'All' ? this.pets : this.pets.filter(pet => pet.type === this.selected); },
                calculateAge(dateOfBirth) { if (!dateOfBirth) return ''; const birthDate = new Date(`${dateOfBirth}T00:00:00`); const today = new Date(); let years = today.getFullYear() - birthDate.getFullYear(); let months = today.getMonth() - birthDate.getMonth(); if (today.getDate() < birthDate.getDate()) months--; if (months < 0) { years--; months += 12; } if (years === 0) return `${months} month${months === 1 ? '' : 's'}`; return `${years} year${years === 1 ? '' : 's'}${months ? `, ${months} month${months === 1 ? '' : 's'}` : ''}`; },
                setActive(id) { this.activeId = id; localStorage.setItem('vetcare_active_pet_id', id); },
                deletePet(id) {
                    const pet = this.pets.find(item => item.id === id);
                    if (!pet || !confirm(`Delete ${pet.name}?`)) return;
                    this.pets = this.pets.filter(item => item.id !== id);
                    if (this.activeId === id) {
                        this.activeId = this.pets[0]?.id || null;
                        if (this.activeId) localStorage.setItem('vetcare_active_pet_id', this.activeId);
                        else localStorage.removeItem('vetcare_active_pet_id');
                    }
                    localStorage.setItem('vetcare_pets', JSON.stringify(this.pets));
                },
                readPhoto(event) { const file = event.target.files[0]; if (!file) return; const reader = new FileReader(); reader.onload = () => this.form.photo = reader.result; reader.readAsDataURL(file); },
                openEdit(pet) { this.editingId = pet.id; this.form = { ...pet, age: this.calculateAge(pet.dateOfBirth) || pet.age }; this.showRegister = true; },
                registerPet() {
                    this.form.age = this.calculateAge(this.form.dateOfBirth) || this.form.age || '1 year'; if (this.editingId) { const index = this.pets.findIndex(pet => pet.id === this.editingId); this.pets[index] = { ...this.pets[index], ...this.form }; this.activeId = this.editingId; } else { const pet = { id: Date.now(), name: this.form.name.trim(), type: this.form.type, age: this.form.age, breed: this.form.breed || 'Mixed Breed', weight: this.form.weight || '4.5 kg', dateOfBirth: this.form.dateOfBirth, lifestyle: this.form.lifestyle, photo: this.form.photo, vaccination: 'Up to date', deworming: 'On schedule', lastCheckup: 'No checkup yet', profile: 'Healthy and active' }; this.pets.unshift(pet); this.activeId = pet.id; }
                    localStorage.setItem('vetcare_pets', JSON.stringify(this.pets)); localStorage.setItem('vetcare_active_pet_id', this.activeId); this.showRegister = false; this.editingId = null; this.form = { name: '', type: 'Dog', age: '', breed: '', weight: '', dateOfBirth: '', lifestyle: 'Indoor', photo: '' };
                }
            };
        }
    </script>
@endsection