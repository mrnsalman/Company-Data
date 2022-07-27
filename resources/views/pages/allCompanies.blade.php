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
                    {{-- <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h1 class="font-bold pl-2">Users</h1>
                    </div> --}}

                    <form action="{{ route('companies.search') }}" method="GET" class="flex flex-row space-x-10 justify-end items-baseline">

                      @csrf
          
                      <!-- Select Industry -->
                      <div>
                        <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-700 focus:ring focus:ring-sky-200 focus:ring-opacity-50" id="field" name="field">
                          <option value= '0' >All Companies</option>
                          @foreach ($industries as $industry)
                          <option value={{$industry->id}}>{{$industry->industry_name}}</option>
                          @endforeach
                          </select>
                      </div>
          
                      <!-- Search Company -->
                      <div>
                        <x-input id="search" onkeyup="search()" class="block mb-4 w-full" type="text" name="search" :value="old('search')"/>
                      </div>
          
                      <div>
                        <button class="inline-flex items-center px-4 py-2 bg-sky-900 border border-transparent rounded-md font-semibold text-sm text-white capitalize tracking-widest hover:bg-amber-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit" id="button">Search</button>
                      </div>
                  </form>
                    
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-b-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Company Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Industry
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Contact Person
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Contact Number
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Contact Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Actions
                                </th>
                              </tr>
                            </thead>
                            @if($companies->count() > 0)                            
                            @foreach($companies as $company)
                            <tbody id="normal" class="bg-white divide-y divide-gray-200">
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-md font-medium text-gray-900">
                                      {{$company->company_name}}
                                    </span>
                                  </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-md font-medium text-gray-900">
                                      {{$company->getIndustry->industry_name}}
                                    </span>
                                  </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-md font-medium text-gray-900">
                                      {{$company->contactPerson_name}}
                                    </span>
                                  </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-md font-medium text-gray-900">
                                      {{$company->contact_number}}
                                    </span>
                                  </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-md font-medium text-gray-900">
                                      {{$company->email}}
                                    </span>
                                  </td>
                                 
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span class="px-2 py-2 inline-flex text-md leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <a href="{{route('companies.show', $company->id)}}">View</a>
                                  </span>
                                  <span class="px-2 py-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <a href="{{route('companies.edit', $company->id)}}">Edit</a>
                                  </span>
                                  <span class="px-2 py-2 inline-flex text-md leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <form method="post" action="{{route('companies.destroy', $company->id)}}">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" onclick="return confirm('Are You Sure!')">Delete</button>
                                  </form>
                                  </span>
                                </td>
                              </tr>
                              @endforeach

                              @else
                                        <tr>
                                            <td class="py-10 text-center" colspan="11">
                                                <span class="text-red-500 text-lg font-bold">No comapny found added by you..!!</span>
                                            </td>
                                        </tr>

                                    @endif
                  
                              <!-- More people... -->
                            </tbody>
                          </table>
                          @if ($companies->links())
                          <div class="px-5 py-3">{{ $companies->onEachSide(1)->links()}}</div> 
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>

        </div>
    </section>
</x-app-layout>