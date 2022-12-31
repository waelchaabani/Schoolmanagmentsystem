@extends('layouts.master')

@section('title', 'Dashboard')


<body>
  <div class="min-h-screen flex">
    @include('layouts.sidebar')
    <div class="bg-indigo-50 flex-grow py-12 px-10">
      <div class="flex justify-between">
        <div>
          <h4 class="text-sm font-bold text-indigo-600">Hi @if (Session::has('loginName'))
            {{Session::get('loginName')}},
            @endif</h4>
          <h1 class="text-4xl font-bold text-indigo-900 mt-">Welcome to School Managment System!</h1>
        </div>
        <div>
          <div class="flex items-center border rounded-lg bg-white w-max py-2 px-4 space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input class="outline-none" type="text" placeholder="Search" />
          </div>
        </div>
      </div>
      <div>
        <div class="flex space-x-4">
          @include('layouts.statestique')
          <div class="flex items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
            <div>
              <a href="addNewStudent"><span class="text-sm font-semibold text-gray-400">Add New Student</span></a>
            </div>
            <div>
              <a href="addNewStudent"><img src="https://img.icons8.com/material-outlined/24/000000/plus--v1.png" /></a>
            </div>
          </div>
        </div>
        <div class="flex mt-10 justify-center">
          @if (session('warning'))
          <div class="alert alert-warning">
            {{ session('warning') }}
          </div>
          @endif
          <table class="min-w-max w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Full Name</th>
                <th class="py-3 px-6 text-center">Age</th>
                <th class="py-3 px-6 text-center">Gender</th>
                <th class="py-3 px-6 text-center">Address</th>
                <th class="py-3 px-6 text-center">Phone Number</th>
                <th class="py-3 px-6 text-center">Class</th>
                <th class="py-3 px-6 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              @foreach (\App\Models\Student::all() as $students)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  {{$students->id}}
                </td>
                <td class="py-3 px-6 text-left">
                  <div class="flex items-center">
                    {{$students->firstname}} {{$students->secondname}}
                  </div>
                </td>
                <td class="py-3 px-6 text-center">
                  <div class="flex items-center justify-center">
                    {{$students->age}}
                  </div>
                </td>
                <td class="py-3 px-6 text-center">
                  {{$students->gender}}
                </td>
                <td class="py-3 px-6 text-center">
                  {{$students->Address}}
                </td>
                <td class="py-3 px-6 text-center">
                  {{$students->phonenumber}}
                </td>
                <td class="py-3 px-6 text-center">
                  {{-- {{$students->class_id}} --}}
                  {{ $students->class->class }}

                </td>
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form action="/edit/{{$students->id}}/edit" method="GET">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="updateBTN">
                          <img src="https://img.icons8.com/material-outlined/24/000000/pencil--v2.png" />
                        </button>
                      </form>
                    </div>
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form action="/delete/{{$students->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                          <img src="https://img.icons8.com/material-outlined/24/000000/trash--v2.png" />
                        </button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div></div>
        <div></div>
      </div>
      <div></div>
      <div></div>
    </div>
  </div>
</body>