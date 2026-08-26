<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-2xl font-bold text-gray-900">
            Bienvenido de nuevo
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Inicia sesión para acceder a tu cuenta
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label
                for="email"
                :value="__('Correo electrónico')"
                class="mb-2"
            />

            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>

                <x-text-input
                    id="email"
                    class="block w-full pl-10 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="correo@ejemplo.com"
                />
            </div>

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <x-input-label
                    for="password"
                    :value="__('Contraseña')"
                />


            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z"/>
                    </svg>
                </div>

                <x-text-input
                    id="password"
                    class="block w-full pl-10 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />
            </div>

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Remember -->
        <div class="flex items-center">
            <label
                for="remember_me"
                class="inline-flex items-center cursor-pointer"
            >
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Mantener mi sesión iniciada
                </span>
            </label>
        </div>

        <!-- Button -->
        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 transition-all duration-200 text-base font-semibold shadow-md hover:shadow-lg"
            >
                Iniciar sesión
            </x-primary-button>
        </div>
    </form>


</x-guest-layout>

