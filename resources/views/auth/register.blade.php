<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-tight">Create an Account</h2>
        <p class="text-sm text-slate-400 mt-1">Join as a Job Seeker or Employer</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Full Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Email Address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Role Selection -->
        <div>
            <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Register As</label>
            <select id="role" name="role" required
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <option value="seeker" {{ old('role') === 'seeker' ? 'selected' : '' }}>Job Seeker (Looking for jobs)</option>
                <option value="employer" {{ old('role') === 'employer' ? 'selected' : '' }}>Employer (Posting jobs)</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-2.5 px-4 bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white font-semibold text-sm rounded-xl shadow-lg shadow-indigo-600/30 transition duration-150">
                Register
            </button>
        </div>

        <div class="text-center pt-3 border-t border-slate-800">
            <p class="text-xs text-slate-400">
                Already registered?
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1 underline">Log in here</a>
            </p>
        </div>
    </form>
</x-guest-layout>