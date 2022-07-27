<x-app-layout>
    <section class="w-full">
        <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between container items-baseline">
                    <h1 class="font-bold pl-2">Add Company</h1>
                    <a href="{{ route('companies.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fa fa-plus-circle pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add Company</span>
                    </a>
                </div>
            </div>

                <div class="flex flex-col py-32 sm:px-10 md:px-10 lg:px-10 lg: w-full xl:w-2/3 h-auto container mx-auto">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('companies.store') }}">
                        @csrf
                        <!-- User ID -->
                        <div class="mt-4">
                            <x-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id" :value="old('industry_id', Auth::user()->id)" />
                        </div>

                        <!-- Company Name -->
                        <div class="mt-4">
                            <x-label for="company_name" :value="__('Company Name')" />
            
                            <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" />
                        </div>
                        <!-- Industry ID -->
                        <div class="mt-4">
                            <x-label for="industry_id" :value="__('Choose Industry')" />
  
                            <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-700 focus:ring focus:ring-sky-200 focus:ring-opacity-50" id="industry_id" name="industry_id">
                            @foreach ($industries as $industry)
                            <option value={{$industry->id}}>{{$industry->industry_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- Company Address -->
                        <div class="mt-4">
                            <x-label for="company_address" :value="__('Company Address')" />
            
                            <x-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" />
                        </div>
                        <!-- Contact Person -->
                        <div class="mt-4">
                            <x-label for="contactPerson_name" :value="__('Contact Person')" />
            
                            <x-input id="contactPerson_name" class="block mt-1 w-full" type="text" name="contactPerson_name" />
                        </div>
                        <!-- Designation -->
                        <div class="mt-4">
                            <x-label for="Designation" :value="__('Designation')" />
            
                            <x-input id="Designation" class="block mt-1 w-full" type="text" name="Designation" />
                        </div>
                        <!-- Contact Number -->
                        <div class="mt-4">
                            <x-label for="contact_number" :value="__('Contact Number')" />
            
                            <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" />
                        </div>
                        <!-- Contact Email -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Contact Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" />
                        </div>
                        <!-- Unique ID -->
                        <div class="mt-4">
                            <x-input id="unique_id" class="block mt-1 w-full" type="hidden" name="unique_id" />
                        </div>
                        <!-- Strength -->
                        <div class="mt-4">
                            <x-label for="strength" :value="__('Strength')" />
            
                            <x-input id="strength" class="block mt-1 w-full" type="text" name="strength" />
                        </div>
                        <!-- Loopholes -->
                        <div class="mt-4">
                            <x-label for="loopholes" :value="__('Loopholes')" />
            
                            <x-input id="loopholes" class="block mt-1 w-full" type="text" name="loopholes" />
                        </div>
                        <!-- Scopes -->
                        <div class="mt-4">
                            <x-label for="scopes" :value="__('Scopes')" />
            
                            <x-input id="scopes" class="block mt-1 w-full" type="text" name="scopes" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Add Company') }}
                            </x-button>
                        </div>
                    </form>
                  </div>

        </div>
    </section>
</x-app-layout>