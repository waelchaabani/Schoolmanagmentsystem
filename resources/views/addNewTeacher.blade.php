@extends('layouts.master')

@section('title', 'Add New Teacher')

<body>
	<div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
		style="background-image: url(https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);">
		<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
		<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
			<div class="grid  gap-8 grid-cols-1">
				<div class="flex flex-col ">
					<form action="insertTeacherToDatabase" method="POST">
						@csrf
						<div class="flex flex-col sm:flex-row items-center">
							<h2 class="font-semibold text-lg mr-auto">Add New Teacher*</h2>
							<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
						</div>
						<div class="mt-5">
							<div class="form">
								<div class="md:space-y-2 mb-3">
									<label class="text-xs font-semibold text-gray-600 py-2">Please Fill All The
										Informations<abbr class="hidden" title="required">*</abbr></label>
								</div>
							</div>
							<div class="md:flex flex-row md:space-x-4 w-full text-xs">
								<div class="mb-3 space-y-2 w-full text-xs">
									<label class="font-semibold text-gray-600 py-2">First Name<abbr
											title="required"></abbr></label>
									<input type="text" name="firstname" placeholder="First Name" 
										class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
										 type="text" name="integration[shop_name]"
										id="integration_shop_name">
										@if ($errors->has('firstname'))
								<p class="text-red-700 text-xs">{{ $errors->first('firstname') }}</p>
								@endif
									<p class="text-red text-xs hidden">Please fill out this field.</p>
								</div>
								<div class="mb-3 space-y-2 w-full text-xs">
									<label class="font-semibold text-gray-600 py-2">Second Name<abbr
											title="required"></abbr></label>
									<input type="text" name="secondname" placeholder="Second Name" 
										class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
										 type="text" name="integration[shop_name]"
										id="integration_shop_name">
										@if ($errors->has('secondname'))
								<p class="text-red-700 text-xs">{{ $errors->first('secondname') }}</p>
								@endif
									<p class="text-red text-xs hidden">Please fill out this field.</p>
								</div>
							</div>
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Phone Number</label>
									<input type="number" name="phonenumber" placeholder="Phone Number" 
										class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
										type="text" name="integration[street_address]" id="integration_street_address">
										@if ($errors->has('phonenumber'))
								<p class="text-red-700 text-xs">{{ $errors->first('phonenumber') }}</p>
								@endif
								</div>
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Address</label>
									<input type="text" name="Address" placeholder="Address" 
										class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
										type="text" name="integration[street_address]" id="integration_street_address">
										@if ($errors->has('Address'))
								<p class="text-red-700 text-xs">{{ $errors->first('Address') }}</p>
								@endif
								</div>
							</div>
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Age</label>
									<input type="number" name="age" placeholder="Age" 
										class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
										type="text" name="integration[street_address]" id="integration_street_address">
										@if ($errors->has('age'))
								<p class="text-red-700 text-xs">{{ $errors->first('age') }}</p>
								@endif
								</div>
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Gender<abbr
											title="required">*</abbr></label>
									<select name="gender"
										class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
										 name="integration[city_id]" id="integration_city_id">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									@if ($errors->has('gender'))
								<p class="text-red-700 text-xs">{{ $errors->first('gender') }}</p>
								@endif
									<p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.
									</p>
								</div>
							</div>
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label for="subject_id">Subject</label>
									<select name="subject_id" id="subject_id"
										class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full ">
										@foreach($subjects as $subject)
										<option value="{{ $subject->id }}" {{ old('subject_id')==$subject->id ?
											'selected' : '' }}>{{ $subject->subject }}</option>
										@endforeach
									</select>
									@if ($errors->has('subject_id'))
								<p class="text-red-700 text-xs">{{ $errors->first('subject_id') }}</p>
								@endif
									<label for="class_id">Class</label>
									<select name="class_id" id="class_id"
										class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full ">
										@foreach($classes as $class)
										<option value="{{ $class->id }}" {{ old('class_id')==$class->id ?
											'selected' : '' }}>{{ $class->class }}</option>
										@endforeach
									</select>
									@if ($errors->has('class_id'))
								<p class="text-red-700 text-xs">{{ $errors->first('class_id') }}</p>
								@endif
								</div>
							</div>
							<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
								<button
									class="mb-2 md:mb-0 bg-indigo-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-indigo-600">Add</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>