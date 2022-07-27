<x-app-layout>
  <section class="w-full">
      <div id="main" class="main-content bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

          <div class="bg-gray-800 pt-3">
              <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                  <h1 class="font-bold pl-2">Dashboard</h1>
              </div>
          </div>

          <div class="flex flex-wrap container mx-auto">

              <div class="w-full md:w-1/2 xl:w-1/3 py-6 pr-32">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5">
                      <div class="flex flex-row items-center">
                          <div class="flex-shrink pr-4">
                              <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-building fa-2x fa-inverse"></i></div>
                          </div>
                          <div class="flex-1 text-right md:text-center">
                              <h2 class="font-bold uppercase text-gray-600">Total Companies</h2>
                          <p class="font-bold text-3xl"> {{$total_companies}} <span class="text-blue-500"><i class="fas fa-caret-up"></i></span></p>
                          </div>
                      </div>
                  </div>
                  <!--/Metric Card-->
              </div>

              <div class="w-full md:w-1/2 xl:w-1/3 py-6 px-16">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                      <div class="flex flex-row items-center">
                          <div class="flex-shrink pr-4">
                              <div class="rounded-full p-5 bg-green-600"><i class="fas fa-industry fa-2x fa-inverse"></i></div>
                          </div>
                          <div class="flex-1 text-right md:text-center">
                              <h2 class="font-bold uppercase text-gray-600">Total Industries</h2>
                          <p class="font-bold text-3xl"> {{$total_industries}} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p>
                          </div>
                      </div>
                  </div>
                  <!--/Metric Card-->
              </div>

              <div class="w-full md:w-1/2 xl:w-1/3 py-6 pl-32">
                  <!--Metric Card-->
                  <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-600 rounded-lg shadow-xl p-5">
                      <div class="flex flex-row items-center">
                          <div class="flex-shrink pr-4">
                              <div class="rounded-full p-5 bg-red-600"><i class="fa fa-user fa-2x fa-inverse"></i></div>
                          </div>
                          <div class="flex-1 text-right md:text-center">
                              <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                          <p class="font-bold text-3xl"> {{$total_users}} <span class="text-red-500"><i class="fas fa-caret-up"></i></span></p>
                          </div>
                      </div>
                  </div>
                  <!--/Metric Card-->
              </div>

          </div>

              <div class="flex flex-col py-10 w-full sm:px-5 md:px-4 lg:px-3 xl:px-2 h-screen container mx-auto">
                  <div class="rounded-t-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between items-baseline container">
                      <h1 class="font-bold pl-2">Users</h1>
                      @if (Auth::user()->role == 'admin')
                      <a href="{{ route('adduser') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800">
                        <i class="fas fa-user-plus pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Add User</span>
                      </a>
                      @endif
                  </div>
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-b-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                              </th>
                              @if (Auth::user()->role == 'admin')
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                              </th>
                              @endif
                            </tr>
                          </thead>
                          @if($users->count() > 0)                            
                          @foreach($users as $user)
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{asset('images/avatar5.png')}}" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-md font-bold text-gray-900">
                                      {{$user->name}}
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-md font-medium text-gray-900">
                                  {{$user->email}}
                                </span>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Active
                                </span>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                                {{$user->role}}
                              </td>
                              @if (Auth::user()->role == 'admin')
                              <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  <a href="{{route('editUser', $user->id)}}">Edit</a>
                                </span>
                                <span class="px-2 py-2 inline-flex text-md leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                  {{-- <a href="{{ route('deleteUser', $user->id) }}" onclick="return confirm('Are You Sure!')">Delete</a> --}}
                                  <form method="post" action="{{route('deleteUser', $user->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are You Sure!')">Delete</button>
                                </form>
                                </span>
                              </td>
                              @endif 
                            </tr>
                            @endforeach

                            @else
                                      <tr>
                                          <td colspan="11">
                                              <span class="text-bold text-red-500">No user found in the system..!!</span>
                                          </td>
                                      </tr>

                                  @endif
                
                            <!-- More people... -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

      </div>
  </section>
</x-app-layout>