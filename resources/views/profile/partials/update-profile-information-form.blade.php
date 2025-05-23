<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Form untuk kirim ulang verifikasi email -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Container Flex: Kiri (form), Kanan (foto) -->
    <div class="flex flex-col md:flex-row md:justify-between mt-6 gap-8">
        <!-- Form kiri -->
        <form method="post" action="{{ route('profile.update') }}" class="flex-1 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- Nama -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- About Me -->
            <div>
                <x-input-label for="about_me" :value="__('About Me')" />
                <textarea id="about_me" name="about_me" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                    rows="3">{{ old('about_me', $user->profile->about_me ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
            </div>

            <!-- Nomor Telepon -->
            <div>
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                    :value="old('phone', $user->profile->phone ?? '')" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <!-- Tombol Simpan -->
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>

        <!-- Foto Profil Kanan -->
        <div class="w-full md:w-1/4 flex flex-col items-center md:items-end">
            @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                    alt="Profile Photo" class="w-28 h-28 rounded-full object-cover mb-4 shadow-md">
            @endif

            <div class="w-full">
                <x-input-label for="profile_photo" :value="__('Update Photo')" />
                <x-text-input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full" />
                <p class="text-sm text-gray-500 mt-1">Max size: 2MB. JPG/PNG only.</p>
            </div>
        </div>
    </div>
</section>
