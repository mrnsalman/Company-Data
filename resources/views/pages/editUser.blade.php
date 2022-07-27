<x-app-layout>
    <section class="w-full">
        <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between items-baseline container">
                    <h1 class="font-bold pl-2">
                        
                        Edit User
                        
                    </h1>
                    <a href="{{ route('adduser') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fas fa-user-plus pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add User</span>
                    </a>
                </div>
            </div>

                <div class="flex flex-col py-32 sm:px-10 md:px-10 lg:px-10 w-full xl:w-2/3 h-screen container mx-auto">

                    {{-- <form class="px-8 pt-6 pb-8 mb-4 rounded">
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0 md:w-1/2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="firstName"
                                    type="text"
                                    placeholder="First Name"
                                />
                            </div>
                            <div class="md:ml-2 md:w-1/2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                    Last Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="lastName"
                                    type="text"
                                    placeholder="Last Name"
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="Email"
                            />
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    placeholder="******************"
                                />
                                <p class="text-xs italic text-red-500">Please choose a password.</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                    Confirm Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="c_password"
                                    type="password"
                                    placeholder="******************"
                                />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                Register Account
                            </button>
                        </div>
                    </form> --}}
                    <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('updateUser', $user->id) }}">
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

            <div class="mt-4">
                <x-label for="role" :value="__('User Role')" />
  
                {{-- <x-input id="role" class="block mt-1 w-full" type="select" name="role" :value="old('email')" required /> --}}
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
            </div>

            {{-- <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                :value="old('password',$user->password)"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                :value="old('password_confirmation',$user->password)"
                                name="password_confirmation" required />
            </div> --}}

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                        {{ __('Update User') }}
                </x-button>
            </div>
        </form>
                  </div>

        </div>
    </section>
</x-app-layout>