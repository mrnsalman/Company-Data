<x-app-layout>
    <section class="w-full">
        <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between items-baseline container">
                    <h1 class="font-bold pl-2">
                        
                        Edit Profile
                        
                    </h1>
                </div>
            </div>

                <div class="flex flex-col py-32 sm:px-10 md:px-10 lg:px-10 w-full xl:w-2/3 h-screen container mx-auto">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('updateProfile', $user->id) }}">
            @method('put')
            @csrf

            <!-- ID -->
            <div>
                {{-- <x-label for="id" :value="__('ID')" /> --}}

                <x-input id="id" class="block mt-1 w-full" type="hidden" name="id" :value="old('id',$user->id)" required autofocus />
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)" required />
            </div>

            {{-- <div class="mt-4">
                <x-label for="role" :value="__('User Role')" />
                <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-700 focus:ring focus:ring-sky-200 focus:ring-opacity-50" id="role" name="role">
                  <option value="admin" 
                  @if($user->role == 'admin')
                  selected
                  @else
                  ''
                  @endif
                  >Admin</option>
                  <option value="user"
                  @if($user->role == 'user')
                  selected
                  @else
                  ''
                  @endif>User</option>
                </select>
            </div> --}}

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                        {{ __('Update Profile') }}
                </x-button>
            </div>
        </form>
                  </div>

        </div>
    </section>
</x-app-layout>