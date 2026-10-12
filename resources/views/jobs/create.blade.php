<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white tracking-tight">
            {{ __('Post a New Job Opening') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-6 sm:p-8">
                    <form method="POST" action="{{ route('jobs.store') }}" class="space-y-6">
                        @csrf

                        <!-- Job Title -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-slate-200 mb-2">Job Title <span class="text-rose-500">*</span></label>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" required placeholder="e.g. Senior Full Stack Engineer" 
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Company & Location -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="company" class="block text-sm font-semibold text-slate-200 mb-2">Company Name <span class="text-rose-500">*</span></label>
                                <input id="company" name="company" type="text" value="{{ old('company') }}" required placeholder="e.g. Acme Innovations" 
                                    class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                <x-input-error class="mt-2" :messages="$errors->get('company')" />
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-semibold text-slate-200 mb-2">Location / Workspace <span class="text-rose-500">*</span></label>
                                <input id="location" name="location" type="text" value="{{ old('location') }}" required placeholder="e.g. Remote, Islamabad, or London" 
                                    class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>
                        </div>

                        <!-- Job Type & Salary -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="job_type" class="block text-sm font-semibold text-slate-200 mb-2">Job Type <span class="text-rose-500">*</span></label>
                                <select id="job_type" name="job_type" required 
                                    class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="Full-time" {{ old('job_type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ old('job_type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Remote" {{ old('job_type') === 'Remote' ? 'selected' : '' }}>Remote</option>
                                    <option value="Internship" {{ old('job_type') === 'Internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('job_type')" />
                            </div>
                            <div>
                                <label for="salary" class="block text-sm font-semibold text-slate-200 mb-2">Salary / Compensation <span class="text-slate-500 text-xs font-normal">(Optional)</span></label>
                                <input id="salary" name="salary" type="text" value="{{ old('salary') }}" placeholder="e.g. $80,000/yr or PKR 180k/mo" 
                                    class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-slate-200 mb-2">Detailed Description & Responsibilities <span class="text-rose-500">*</span></label>
                            <textarea id="description" name="description" rows="7" required placeholder="Outline key expectations, tech stack, and qualifications..." 
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-800">
                            <a href="{{ route('jobs.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white font-semibold text-sm rounded-xl shadow-lg shadow-indigo-600/30 transition duration-150 ease-in-out">
                                Publish Job Opening
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>