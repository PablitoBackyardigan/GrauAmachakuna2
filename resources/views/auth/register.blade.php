<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Zona Selection -->
        <div class="mt-6">
            <x-input-label :value="__('Selecciona una zona del parque')" />

            <!-- DEFINICIONES SVG (INVISIBLES) -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
                <defs>
                    <g id="zona1"><polygon points="12.15 327.3 50.28 289.34 176.15 286.53 85.38 397.85 12.15 327.3" /></g>
                    <g id="zona2"><polygon points="94.15 404.23 188.49 286.53 282.79 286.53 221.17 461.43 94.15 404.23" /></g>
                    <g id="zona3"><polygon points="63.21 279.13 182.87 277.6 221.17 226.19 122.96 219.38 63.21 279.13" /></g>
                    <g id="zona4"><polygon points="196.32 276.4 235.47 217.85 310.53 222.11 288.4 276.4 196.32 276.4" /></g>
                    <g id="zona5"><polygon points="132.83 209.17 233.94 216.15 349 35.3 306.62 32.23 132.83 209.17" /></g>
                    <g id="zona6"><polygon points="238.19 214.79 353.6 35.3 388.06 65.17 310.53 219.38 238.19 214.79" /></g>
                    <g id="zona7"><polygon points="355.89 258.45 427.89 98.87 490.96 135.38 407.47 309.51 355.89 258.45" /></g>
                    <g id="zona8"><polygon points="415.13 315.89 506.28 393.77 578.02 371.3 487.89 154.79 415.13 315.89" /></g>
                </defs>
            </svg>

            <!-- MAPA VISIBLE -->
            <div class="border border-gray-300 rounded p-2 w-full overflow-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 500" class="w-full h-auto">
                    <image href="{{ asset('images/parque_grau.png') }}" x="0" y="0" width="600" height="500" />

                    @foreach (\App\Models\Zone::all() as $zone)
                        @php
                            $zoneId = strtolower(str_replace(' ', '', $zone->name)); // ZONA 1 → zona1
                            $color = ($zone->available && $zone->vacancies > 0) ? 'green' : 'red';
                        @endphp
                        <use href="#{{ $zoneId }}"
                             class="zona"
                             data-zone-id="{{ $zone->id }}"
                             fill="{{ $color }}"
                             opacity="0.5"
                             stroke="black"
                             stroke-width="1" />
                    @endforeach
                </svg>
            </div>

            <!-- Input oculto -->
            <input type="hidden" id="zone_id" name="zone_id" value="{{ old('zone_id') }}" required>
            <x-input-error :messages="$errors->get('zone_id')" class="mt-2" />
        </div>

        <!-- Script de selección -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.zona').forEach(zona => {
                    if (zona.getAttribute('fill') === 'red') {
                        zona.style.pointerEvents = 'none'; // zonas ocupadas no son seleccionables
                        return;
                    }

                    zona.addEventListener('click', () => {
                        document.querySelectorAll('.zona').forEach(z => z.setAttribute('stroke-width', 1));
                        zona.setAttribute('stroke-width', 5);
                        document.getElementById('zone_id').value = zona.getAttribute('data-zone-id');
                    });
                });
            });
        </script>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
