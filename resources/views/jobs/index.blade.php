<x-app-layout>
    <div class="bg-gradient-to-b from-slate-900 to-slate-950 border-b border-slate-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Find Your Next Dream Role
            </h1>
            <p class="mt-2 text-base text-slate-400 max-w-2xl mx-auto">
                Discover high-impact opportunities across engineering, design, and remote roles.
            </p>

            <!-- Search & Filter Bar -->
            <div class="mt-8 max-w-3xl mx-auto">
                <form method="GET" action="{{ route('jobs.index') }}" class="p-2 bg-slate-900/90 border border-slate-700 backdrop-blur rounded-2xl shadow-2xl flex flex-col sm:flex-row gap-2">
                    <div class="flex-1 relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title, company, or city..." 
                            class="w-full bg-slate-950/60 border border-slate-700/80 rounded-xl px-4 py-3 text-white placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <div class="sm:w-44">
                        <select name="job_type" class="w-full bg-slate-950/60 border border-slate-700/80 rounded-xl px-3 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">All Types</option>
                            <option value="Full-time" {{ request('job_type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ request('job_type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Remote" {{ request('job_type') === 'Remote' ? 'selected' : '' }}>Remote</option>
                            <option value="Internship" {{ request('job_type') === 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-xl shadow-md transition">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Job Cards -->
            <div class="space-y-3">
                @forelse ($jobs as $job)
                    <div class="group p-5 bg-slate-900 border border-slate-800 hover:border-indigo-500/50 rounded-2xl shadow-sm hover:shadow-indigo-500/5 transition flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                        <div class="space-y-1.5">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('jobs.show', $job) }}" class="text-lg font-bold text-white group-hover:text-indigo-400 transition">
                                    {{ $job->title }}
                                </a>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                    {{ $job->job_type }}
                                </span>
                            </div>
                            <p class="text-sm font-medium text-slate-300">
                                <span class="text-slate-100 font-semibold">{{ $job->company }}</span> • <span class="text-slate-400">{{ $job->location }}</span>
                            </p>
                            @if ($job->salary)
                                <p class="text-xs font-semibold text-emerald-400">💵 {{ $job->salary }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('jobs.show', $job) }}" class="px-4 py-2 bg-slate-800 hover:bg-indigo-600 text-slate-200 hover:text-white rounded-xl text-xs font-semibold border border-slate-700 hover:border-transparent transition">
                                View Details →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center bg-slate-900 border border-slate-800 rounded-2xl">
                        <p class="text-slate-400 font-medium">No job postings found.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="pt-6">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>