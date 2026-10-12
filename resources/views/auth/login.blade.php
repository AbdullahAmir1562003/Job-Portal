<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h2>
        <p class="text-sm text-slate-400 mt-1">Sign in to manage your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">Email Address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-indigo-400 hover:text-indigo-300 font-medium" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-slate-950 border-slate-700 text-indigo-600 focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-xs text-slate-400">Remember my session</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-2.5 px-4 bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white font-semibold text-sm rounded-xl shadow-lg shadow-indigo-600/30 transition duration-150">
                Log in
            </button>
        </div>

        <div class="text-center pt-3 border-t border-slate-800">
            <p class="text-xs text-slate-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1 underline">Register here</a>
            </p>
        </div>
    </form>
</x-guest-layout>