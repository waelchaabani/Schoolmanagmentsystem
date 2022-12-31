@extends('layouts.master')

@section('title', 'Email Reset Password')

<body>
    <!--- Email Reset Password HTML Code START--->
    <div class="h-screen flex">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">Welcome To</h1>
                <p class="text-white mt-1">School Managment System</p>
            </div>
        </div>
        <div class="flex w-1/2 justify-center items-center bg-white">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="text-gray-800 font-bold text-2xl mb-1">Email Adress</label>

                    <div class="col-md-6 mt-8">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Adress</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4 mt-3">
                        <button type="submit"
                            class="  block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Send
                            Password Reset Link</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--- Email Reset Password HTML Code END--->
</body>