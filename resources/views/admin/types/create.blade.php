@extends('admin.layouts.base')

@section('contents')
	<div class="wrapper w-50 mx-auto">
		<h1>Add New Type</h1>

		<form method="POST" action="{{ route('admin.types.store') }}" novalidate>
			@csrf

			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
					value="{{ old('name') }}">
				@error('name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="description" class="form-label">Description</label>
				<textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
				 name="description">{{ old('description') }}</textarea>
				@error('description')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<button class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection
