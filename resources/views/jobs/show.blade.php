<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $jobPost->title }}
            </h2>
            <a href="{{ route('jobs.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                ← Back to Jobs
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg space-y-6">
                <div>
                    <span class="px-3 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                        {{ $jobPost->job_type }}
                    </span>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $jobPost->title }}</h1>
                    <p class="text-md text-gray-600 dark:text-gray-400">{{ $jobPost->company }} • {{ $jobPost->location }}</p>
                    @if ($jobPost->salary)
                        <p class="text-sm text-green-600 dark:text-green-400 font-semibold mt-1">Salary: {{ $jobPost->salary }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">Posted {{ $jobPost->created_at->diffForHumans() }}</p>
                </div>

                <hr class="border-gray-200 dark:border-gray-700" />

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">About the Role</h3>
                    <div class="text-gray-700 dark:text-gray-300 whitespace-pre-line leading-relaxed">
                        {{ $jobPost->description }}
                    </div>
                </div>

                <hr class="border-gray-200 dark:border-gray-700" />

                <!-- Action Section -->
                <div>
                    @guest
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-md text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Want to apply for this job?</p>
                            <a href="{{ route('login') }}" class="mt-2 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Log in to Apply
                            </a>
                        </div>
                    @else
                        @if (Auth::user()->isSeeker())
                            <form method="POST" action="{{ route('applications.store', $jobPost) }}" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Apply for this Position</h3>
                                <div>
                                    <x-input-label for="resume" :value="__('Upload Resume (PDF, DOC, DOCX - Max 5MB)')" />
                                    <input id="resume" name="resume" type="file" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300" />
                                    <x-input-error class="mt-2" :messages="$errors->get('resume')" />
                                </div>
                                <div>
                                    <x-input-label for="cover_letter" :value="__('Cover Letter / Note (Optional)')" />
                                    <textarea id="cover_letter" name="cover_letter" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm" placeholder="Why are you a good fit for this role?"></textarea>
                                </div>
                                <x-primary-button>{{ __('Submit Application') }}</x-primary-button>
                            </form>
                        @elseif(Auth::user()->id === $jobPost->user_id)
                            <div class="flex items-center gap-4">
                                <a href="{{ route('jobs.my-jobs') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Manage in My Posted Jobs →</a>
                            </div>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>