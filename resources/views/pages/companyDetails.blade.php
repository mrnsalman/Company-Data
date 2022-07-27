<x-app-layout>
    <section class="w-full">
        <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between container items-baseline">
                    <h1 class="font-bold pl-2">Company List</h1>
                    <a href="{{ route('companies.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                      <i class="fa fa-plus-circle pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add Company</span>
                    </a>
                </div>
            </div>

                <div class="flex flex-col py-12 w-full sm:px-5 md:px-4 lg:px-3 xl:px-2 h-screen container mx-auto">
                    <!-- component -->
                        <div class="w-full py-10 px-10">
                            <div>
                            <div class="sm:flex space-x-7 md:items-start items-center">
                                <div>
                                <h1 class="text-gray-700 text-4xl font-bold my-2">{{$company->company_name}}</h1>
                                <p class="text-gray-500 text-lg tracking-wide mb-6 md:max-w-lg">Submitted By <span class="text-blue-700 font-bold">{{$company->user->name}}</span></p>
                            </div>
                            </div>
                            <div class="sm:grid lg:grid-cols-4 grid-cols-2 sm:gap-x-4">
                            <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                <div>
                                <span class="text-sm text-slate-400">Location</span>
                                <h1 class="text-md font-bold text-gray-700">{{$company->company_address}}</h1>
                                </div>
                                <div>
                                    <i class="fas fa-map-marker-alt pr-0 md:pr-3 text-5xl text-blue-500 pl-5"></i>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                <div>
                                <span class="text-sm text-slate-400">Contact Person</span>
                                <h1 class="text-md font-bold text-gray-700">{{$company->contactPerson_name}}</h1>
                                </div>
                                <div>
                                    <i class="fa fa-user pr-0 md:pr-3 text-5xl text-green-500"></i>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                <div>
                                <span class="text-sm text-slate-400">Designation</span>
                                <h1 class="text-md font-bold text-gray-700">{{$company->designation}}</h1>
                                </div>
                                <div>
                                    <i class="fa fa-portrait pr-0 md:pr-3 text-5xl text-yellow-500"></i>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                <div>
                                <span class="text-sm text-slate-400">Contact Number</span>
                                <h1 class="text-md font-bold text-gray-700">{{$company->contact_number}}</h1>
                                </div>
                                <div>
                                    <i class="fa fa-phone pr-0 md:pr-3 text-5xl text-amber-500"></i>
                                </div>
                            </div>
                            </div>

                            <div class="sm:grid lg:grid-cols-4 grid-cols-2 sm:gap-x-4 py-10">
                                <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                    <div>
                                    <span class="text-sm text-slate-400">Contact Email</span>
                                    <h1 class="text-md font-bold text-gray-700">{{$company->email}}</h1>
                                    </div>
                                    <div>
                                        <i class="fa fa-envelope pr-0 md:pr-3 text-5xl text-teal-500 pl-5"></i>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center bg-white shadow-md p-6 rounded-md mb-4">
                                    <div>
                                    <span class="text-sm text-slate-400">Industry</span>
                                    <h1 class="text-md font-bold text-gray-700">{{$company->getIndustry->industry_name}}</h1>
                                    </div>
                                    <div>
                                        <i class="fas fa-industry pr-0 md:pr-3 text-5xl text-violet-500 pl-5"></i>
                                    </div>
                                </div>
                                </div>
                                </div>
                        </div>
                  </div>

        </div>
    </section>
</x-app-layout>