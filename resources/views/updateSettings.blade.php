@extends('layouts.master')

@section('title', 'Settings')


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
        <div class="min-h-screen pt-2 font-mono my-16">
          <div class="container mx-auto">
            <div class="inputs w-full max-w-2xl p-6 mx-auto">
              <h2 class="text-2xl text-gray-900">Account Setting</h2>
              <form class="mt-6 border-t border-gray-400 pt-4" action="/settings/{{$account->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class='flex flex-wrap -mx-3 mb-6'>
                  <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                      for='grid-text-1'>Full Name</label>
                    <input
                      class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                      id='grid-text-1' type='text' name="fullName" value="{{$account->fullName}}">
                  </div>
                  <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                      for='grid-text-1'>Username</label>
                    <input
                      class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                      id='grid-text-1' type='text' name="username" value="{{$account->username}}">
                  </div>
                  <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                      for='grid-text-1'>Email</label>
                    <input
                      class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                      id='grid-text-1' type='email' name="email" value="{{$account->email}}">
                  </div>
                  <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                      for='grid-text-1'>password</label>
                    <input
                      class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                      id='grid-text-1' type='password' name="password" placeholder="Enter Your Password....">
                  </div>
                  <div class="flex justify-end">
                    <button
                      class="appearance-none bg-indigo-600 text-white px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                      type="submit">Update</button>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>