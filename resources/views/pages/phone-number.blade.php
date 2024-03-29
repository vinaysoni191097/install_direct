<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="font-body lg:text-3xl text-2xl font-bold text-dark-charcoal">Almost there!</div>
        <p class="gray-text text-lg font-normal mb-6 mt-1">Welcome! Please enter your phone number.</p>



        <!-- phone -->
        <div class="mt-4 relative ">
            <x-input-label for="phone" :value="__('Phone number')" />
            <x-text-input id="phone" type="tel" class="block mt-2 w-full h-11" placeholder="+44 (555) 000-0000"
                name="phone" :value="old('phone')" required autocomplete="off" maxlength="10"
                onkeypress="return onlyNumberKey(event)" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <x-text-input id="telCode" type="hidden" class="block mt-1 w-full" name="telCode" :value="+44"
                required autocomplete="off" />
        </div>


        <div class="flex items-center  mt-4">
            <x-primary-button class="w-full py-3 mt-4">
                {{ __('Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>