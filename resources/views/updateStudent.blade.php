@extends('layouts.master')

@section('title', ' Update Student')

<body>
	<div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
		style="background-image: url(https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2072&q=80);">
		<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
		<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
			<div class="grid  gap-8 grid-cols-1">
				<form action="/edit/{{$students->id}}" method="POST">
					@csrf
					@method('PUT')
					<div class="flex flex-col sm:flex-row items-center">
						<h2 class="font-semibold text-lg mr-auto">Update Student*</h2>
						<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
					</div>
					<div class="mt-5">
						<div class="form">
							<div class="md:space-y-2 mb-3">
								<label class="text-xs font-semibold text-gray-600 py-2">Please Update The
									Information That You Want!<abbr class="hidden" title="required">*</abbr></label>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">First Name<abbr
										title="required"></abbr></label>
								<input type="text" name="firstname" placeholder="First Name"
									value="{{$students->firstname}}" required
									class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
									required="required" type="text" name="integration[shop_name]"
									id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Second Name<abbr
										title="required"></abbr></label>
								<input type="text" name="secondname" placeholder="Second Name"
									value="{{$students->secondname}}" required
									class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
									required="required" type="text" name="integration[shop_name]"
									id="integration_shop_name">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
						<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
							<div class="w-full flex flex-col mb-3">
								<label class="font-semibold text-gray-600 py-2">Phone Number</label>
								<input type="number" name="phonenumber" placeholder="Phone Number"
									value="{{$students->phonenumber}}" required
									class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
									type="text" name="integration[street_address]" id="integration_street_address">
							</div>
							<div class="w-full flex flex-col mb-3">
								<label class="font-semibold text-gray-600 py-2">Address</label>
								<input type="text" name="Address" placeholder="Address" value="{{$students->Address}}"
									required
									class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
									type="text" name="integration[street_address]" id="integration_street_address">
							</div>
						</div>
						<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
							<div class="w-full flex flex-col mb-3">
								<label class="font-semibold text-gray-600 py-2">Age</label>
								<input type="number" name="age" placeholder="Age" value="{{$students->age}}" required
									class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
									type="text" name="integration[street_address]" id="integration_street_address">
							</div>
							<div class="w-full flex flex-col mb-3">
								<label class="font-semibold text-gray-600 py-2">Gender<abbr
										title="required">*</abbr></label>
								<select name="gender"
									class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
									required="required" name="integration[city_id]" id="integration_city_id">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								<p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.
								</p>
							</div>
						</div>
						<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
							<div class="w-full flex flex-col mb-3">
								<label class="font-semibold text-gray-600 py-2">Class</label>
								<select name="class_id"
									class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
									id="grid-state">
									@foreach ($classes as $class)
									<option value="{{ $class->id }}">{{ $class->class }}</option>
									@endforeach
								</select>
								
							</div>
						</div>

						<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
							<form action="/" method="GET">
								<button
									class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
									Cancel </button>
							</form>
							<button
								class="mb-2 md:mb-0 bg-indigo-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-indigo-600">Update</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
</body>