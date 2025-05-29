<x-guest-layout>
    <h1 class="my-4 text-center text-6xl font-bold leading-tight tracking-tight uppercase text-gray-900 md:text-2xl  ">
             Register
    </h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
       <div>
       <x-input-label for="first_name" :value="__('First Name')" />
       <x-text-input id="first_name" placeholder="First Name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
       <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
      </div>

<!-- Last Name -->
     <div class="mt-4">
     <x-input-label for="last_name" :value="__('Last Name')" />
     <x-text-input id="last_name" placeholder="Last Name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
     <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div> 
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="someone@example.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            placeholder="••••••••"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
           <a class="underline text-sm text-gray-600   hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
        <div class="flex items-center w-full py-3 mt-4">


            <x-primary-button class="">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
