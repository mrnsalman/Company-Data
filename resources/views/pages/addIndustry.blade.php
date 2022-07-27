<x-app-layout>
    <section class="w-full">
        <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between container items-baseline">
                    <h1 class="font-bold pl-2">Add Industry</h1>
                    <a href="{{ route('industries.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fa fa-plus-circle pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add Industry</span>
                    </a>
                </div>
            </div>

                <div class="flex flex-col py-32 sm:px-10 md:px-10 lg:px-10 w-full xl:w-2/3 h-screen container mx-auto">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('industries.store') }}">
                        @csrf
                        <!-- Industry Name -->
                        <div class="mt-4">
                            <x-label for="industry_name" :value="__('Industry Name')" />
            
                            <x-input id="industry_name" class="block mt-1 w-full" type="text" name="industry_name" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Add Industry') }}
                            </x-button>
                        </div>
                    </form>
                  </div>

        </div>
    </section>
</x-app-layout>