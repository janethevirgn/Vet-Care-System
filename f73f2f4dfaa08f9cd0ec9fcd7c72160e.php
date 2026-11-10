
<?php $__env->startSection('content'); ?>
    <div x-data="dashboardPets()" x-init="init()" class="fade-in">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Pet Dashboard & Analytics</h1>
            <p class="text-xs text-pink-500 font-medium">Overview of your pet's health status and digital health records.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <div class="lg:col-span-4" x-show="!pets.length">
                <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-8 text-center relative overflow-hidden">
                    <div class="w-24 h-24 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-dashed border-pink-300">
                        <span class="material-symbols-outlined text-4xl text-pink-400">pets</span>
                    </div>
                    <h2 class="text-lg font-bold text-gray-800 mb-1">No Pet Registered</h2>
                    <p class="text-xs text-gray-400 mb-6 px-4">Register your cat or dog to see your pet health dashboard and analytics.</p>
                    <button @click="showRegister = true" class="group w-full py-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 hover:shadow-xl hover:shadow-pink-300 text-white rounded-xl text-xs font-semibold shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform duration-200">add_circle</span> Register Pet
                    </button>
                </div>
            </div>
            
            <div class="lg:col-span-8 flex items-center justify-center bg-white/40 border border-dashed border-pink-200 rounded-3xl p-12 text-center opacity-60" x-show="!pets.length">
                <div>
                    <span class="material-symbols-outlined text-5xl text-pink-300 mb-2">analytics</span>
                    <h3 class="text-sm font-semibold text-gray-600">Analytics Preview Locked</h3>
                    <p class="text-xs text-gray-400 mt-1">Please register a pet on the left panel to display health data.</p>
                </div>
            </div>
        </div>

        <div x-show="pets.length" x-cloak class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-4">
                <div class="relative bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl rounded-3xl p-6 pt-20 min-h-[480px]">
                    <div class="min-h-24">
                        <div @click="showPhoto = true" title="View pet photo" class="absolute left-1/2 top-20 -translate-x-1/2 w-24 h-24 bg-pink-50 rounded-full flex items-center justify-center border border-pink-200 overflow-hidden cursor-pointer hover:ring-4 hover:ring-pink-100 transition-all duration-200">
                            <template x-if="activePet().photo"><img :src="activePet().photo" :alt="activePet().name" class="w-full h-full object-cover"></template>
                            <template x-if="!activePet().photo"><span class="material-symbols-outlined text-4xl text-pink-500">pets</span></template>
                        </div>
                        <div class="absolute right-4 top-4">
                            <button @click="openSwitch = !openSwitch" class="px-3 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white rounded-xl text-xs font-semibold shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200">Switch Pet</button>
                            <div x-show="openSwitch" @click.away="openSwitch = false" x-transition class="absolute right-0 mt-2 w-48 bg-white border border-pink-100 rounded-2xl shadow-xl z-20 overflow-hidden">
                                <template x-for="pet in pets" :key="pet.id">
                                    <button @click="selectPet(pet.id)" class="w-full text-left px-4 py-3 hover:bg-pink-50 border-b border-pink-50 text-xs font-semibold text-gray-700">
                                        <span x-text="pet.name"></span>
                                        <span x-show="pet.id === activeId" class="float-right text-pink-500">Active</span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-pink-400 font-semibold mt-4">Active Pet Profile</p>
                    <h2 x-text="activePet().name" class="text-xl font-bold text-gray-800 mt-1"></h2>
                    <p x-text="activePet().type + ' • ' + activePet().age" class="text-xs text-gray-500 mt-1"></p>
                    <div class="flex items-center justify-center gap-2 mt-3 text-xs text-gray-600">
                        <span class="material-symbols-outlined text-pink-500 text-base">cake</span>
                        <span x-text="activePet().dateOfBirth ? activePet().dateOfBirth : 'Birth date not added'"></span>
                        <span class="text-pink-200">|</span>
                        <span x-text="activePet().lifestyle ? activePet().lifestyle : 'Lifestyle not added'"></span>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-5 text-xs">
                        <div class="border border-pink-100 rounded-xl p-3"><p class="text-gray-400">Weight</p><p x-text="activePet().weight" class="font-bold text-gray-700 mt-1"></p></div>
                        <div class="border border-pink-100 rounded-xl p-3"><p class="text-gray-400">Breed</p><p x-text="activePet().breed" class="font-bold text-gray-700 mt-1"></p></div>
                        <div class="border border-pink-100 rounded-xl p-3"><p class="text-gray-400">Vaccines</p><p x-text="activePet().vaccination" class="font-bold text-emerald-600 mt-1"></p></div>
                        <div class="border border-pink-100 rounded-xl p-3"><p class="text-gray-400">Deworming</p><p x-text="activePet().deworming" class="font-bold text-amber-600 mt-1"></p></div>
                    </div>
                    </div>
                        <button @click="openEdit()" class="group w-full mt-5 px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 hover:shadow-xl hover:shadow-pink-300 text-white shadow-lg shadow-pink-200 transform hover:-translate-y-0.5 transition-all duration-200 text-xs font-semibold rounded-xl flex items-center justify-center gap-1.5"><span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform duration-200">edit</span> Edit Pet Info</button>
                </div>
            </div>
            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white/90 border border-pink-100 rounded-2xl p-5 shadow-sm"><p class="text-xs text-pink-500 font-semibold">Overall Wellness</p><p class="text-3xl font-bold text-gray-800 mt-2">96%</p><p class="text-xs text-gray-400 mt-1">For <span x-text="activePet().name"></span></p></div>
                    <div class="bg-white/90 border border-pink-100 rounded-2xl p-5 shadow-sm"><p class="text-xs text-pink-500 font-semibold">Vaccination</p><p x-text="activePet().vaccination" class="text-2xl font-bold text-gray-800 mt-2"></p><p class="text-xs text-gray-400 mt-1">Pet-specific status</p></div>
                    <div class="bg-white/90 border border-pink-100 rounded-2xl p-5 shadow-sm"><p class="text-xs text-pink-500 font-semibold">Deworming</p><p x-text="activePet().deworming" class="text-2xl font-bold text-gray-800 mt-2"></p><p class="text-xs text-gray-400 mt-1">Pet-specific schedule</p></div>
                </div>
                <div class="bg-white/90 border border-pink-100 shadow-xl rounded-3xl p-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-800">Health Overview</h3>
                    <p class="text-xs text-gray-500 mt-1">Showing records for <span x-text="activePet().name"></span>.</p>
                    <div class="grid md:grid-cols-2 gap-4 mt-5">
                        <div class="bg-pink-50/50 border border-pink-100 rounded-2xl p-4"><p class="text-xs font-semibold text-pink-500">Last Checkup</p><p x-text="activePet().lastCheckup" class="text-sm font-bold text-gray-700 mt-2"></p></div>
                        <div class="bg-pink-50/50 border border-pink-100 rounded-2xl p-4"><p class="text-xs font-semibold text-pink-500">Profile Status</p><p x-text="activePet().profile" class="text-sm font-bold text-gray-700 mt-2"></p></div>
                    </div>
                </div>
                <div class="bg-white/90 border border-pink-100 shadow-xl rounded-3xl p-6 mt-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Wellness Trend</h3>
                            <p class="text-xs text-gray-500 mt-1">Recent wellness checks for <span x-text="activePet().name"></span>.</p>
                        </div>
                        <span class="text-[10px] uppercase tracking-[0.18em] text-pink-400 font-semibold">Last 6 months</span>
                    </div>

                    <div class="h-56">
                        <svg viewBox="0 0 720 220" class="w-full h-full" role="img" aria-label="Pet wellness trend line graph">
                            <line x1="48" y1="24" x2="48" y2="184" stroke="#fbcfe8" stroke-width="1" />
                            <line x1="48" y1="184" x2="700" y2="184" stroke="#fbcfe8" stroke-width="1" />
                            <line x1="48" y1="104" x2="700" y2="104" stroke="#fce7f3" stroke-width="1" stroke-dasharray="4 5" />
                            <line x1="48" y1="24" x2="700" y2="24" stroke="#fce7f3" stroke-width="1" stroke-dasharray="4 5" />
                            <text x="10" y="28" fill="#9ca3af" font-size="11">100</text>
                            <text x="18" y="108" fill="#9ca3af" font-size="11">90</text>
                            <text x="18" y="188" fill="#9ca3af" font-size="11">80</text>
                            <polyline points="48,136 178,112 308,120 438,72 568,88 698,48" fill="none" stroke="#ec4899" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <polygon points="48,136 178,112 308,120 438,72 568,88 698,48 698,184 48,184" fill="#fce7f3" opacity="0.45" />

                            <template x-for="point in [[48,136],[178,112],[308,120],[438,72],[568,88],[698,48]]" :key="point[0]">
                                <circle :cx="point[0]" :cy="point[1]" r="5" fill="#ffffff" stroke="#ec4899" stroke-width="3" />
                            </template>
                            
                            <text x="32" y="207" fill="#9ca3af" font-size="11">Apr</text>
                            <text x="162" y="207" fill="#9ca3af" font-size="11">May</text>
                            <text x="292" y="207" fill="#9ca3af" font-size="11">Jun</text>
                            <text x="422" y="207" fill="#9ca3af" font-size="11">Jul</text>
                            <text x="552" y="207" fill="#9ca3af" font-size="11">Aug</text>
                            <text x="682" y="207" fill="#9ca3af" font-size="11">Sep</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="showPhoto" x-cloak @click.self="showPhoto = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 px-4">
            <div class="relative bg-white border border-pink-100 rounded-3xl shadow-2xl p-4 max-w-md w-full">
                <button @click="showPhoto = false" class="absolute right-3 top-3 z-10 w-8 h-8 bg-white/90 hover:bg-pink-50 text-gray-500 hover:text-pink-500 rounded-full shadow-sm transition"><span class="material-symbols-outlined text-base">close</span></button>
                <template x-if="activePet().photo"><img :src="activePet().photo" :alt="activePet().name" class="w-80 h-80 mx-auto object-cover rounded-full"></template>
                <template x-if="!activePet().photo"><div class="w-80 h-80 mx-auto bg-pink-50 rounded-full flex flex-col items-center justify-center"><span class="material-symbols-outlined text-6xl text-pink-300">pets</span><p class="text-xs text-gray-400 mt-2">No profile photo selected</p></div></template>
                <p x-text="activePet().name" class="text-center text-sm font-semibold text-gray-700 mt-3"></p>
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
                <div class="flex justify-end gap-2 mt-5"><button type="button" @click="showRegister = false" class="px-4 py-2 bg-gray-100 rounded-xl text-xs font-semibold">Cancel</button><button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl text-xs font-semibold">Save Pet</button></div>
            </form>
        </div>
    </div>

    <script>
        function dashboardPets() {
            return {
                pets: [], activeId: null, openSwitch: false, showRegister: false, showPhoto: false,
                form: { name: '', type: 'Dog', age: '', breed: '', weight: '', dateOfBirth: '', lifestyle: 'Indoor', photo: '' },
                editingId: null,
                init() {
                    this.pets = JSON.parse(localStorage.getItem('vetcare_pets') || '[]').map(pet => ({ dateOfBirth: '', lifestyle: 'Indoor', photo: '', ...pet, age: this.calculateAge(pet.dateOfBirth) || pet.age }));
                    localStorage.setItem('vetcare_pets', JSON.stringify(this.pets));
                    const savedId = Number(localStorage.getItem('vetcare_active_pet_id'));
                    this.activeId = this.pets.some(pet => pet.id === savedId) ? savedId : (this.pets[0]?.id || null);
                    if (this.activeId) localStorage.setItem('vetcare_active_pet_id', this.activeId);
                },
                activePet() { return this.pets.find(pet => pet.id === this.activeId) || {}; },
                calculateAge(dateOfBirth) { if (!dateOfBirth) return ''; const birthDate = new Date(`${dateOfBirth}T00:00:00`); const today = new Date(); let years = today.getFullYear() - birthDate.getFullYear(); let months = today.getMonth() - birthDate.getMonth(); if (today.getDate() < birthDate.getDate()) months--; if (months < 0) { years--; months += 12; } if (years === 0) return `${months} month${months === 1 ? '' : 's'}`; return `${years} year${years === 1 ? '' : 's'}${months ? `, ${months} month${months === 1 ? '' : 's'}` : ''}`; },
                selectPet(id) { this.activeId = id; this.openSwitch = false; localStorage.setItem('vetcare_active_pet_id', id); },
                readPhoto(event) { const file = event.target.files[0]; if (!file) return; const reader = new FileReader(); reader.onload = () => this.form.photo = reader.result; reader.readAsDataURL(file); },
                openEdit() { const pet = this.activePet(); this.editingId = pet.id; this.form = { ...pet, age: this.calculateAge(pet.dateOfBirth) || pet.age }; this.showRegister = true; },
                registerPet() {
                    this.form.age = this.calculateAge(this.form.dateOfBirth) || this.form.age || '1 year'; if (this.editingId) { const index = this.pets.findIndex(pet => pet.id === this.editingId); this.pets[index] = { ...this.pets[index], ...this.form }; this.activeId = this.editingId; } else { const pet = { id: Date.now(), name: this.form.name.trim(), type: this.form.type, age: this.form.age, breed: this.form.breed || 'Mixed Breed', weight: this.form.weight || '4.5 kg', dateOfBirth: this.form.dateOfBirth, lifestyle: this.form.lifestyle, photo: this.form.photo, vaccination: 'Up to date', deworming: 'On schedule', lastCheckup: 'No checkup yet', profile: 'Healthy and active' }; this.pets.unshift(pet); this.activeId = pet.id; }
                    localStorage.setItem('vetcare_pets', JSON.stringify(this.pets)); localStorage.setItem('vetcare_active_pet_id', this.activeId); this.showRegister = false; this.editingId = null; this.form = { name: '', type: 'Dog', age: '', breed: '', weight: '', dateOfBirth: '', lifestyle: 'Indoor', photo: '' };
                }
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lovely Jane\vet-care-system\resources\views/dashboard.blade.php ENDPATH**/ ?>