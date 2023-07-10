@extends('admin.layouts.base')

@section('contents')
	<div class="wrapper w-50 mx-auto">
		<h1>Add New Project</h1>

		{{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

		<form method="POST" action="{{ route('admin.projects.store') }}" novalidate>
			@csrf

			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
					value="{{ old('title') }}">
				@error('title')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			{{-- Add input select for types of projects --}}
			<div class="mb-3">
				<label for="type" class="form-label">Type</label>
				<select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
				@error('type_id')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="url_image" class="form-label">URL Image</label>
				<input type="url" class="form-control @error('url_image') is-invalid @enderror" id="url_image" name="url_image"
					value="{{ old('url_image', 'https://picsum.photos/id/' . rand(100, 800) . '/500/300') }}">
				@error('url_image')
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

			<div class="mb-3">
				<label for="creation_date"" class="form-label">Creation Date</label>
				<input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date"
					name="creation_date"" value="{{ old('creation_date') }}">
				@error('creation_date')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="url_repo" class="form-label">URL repo</label>
				<input type="url" class="form-control @error('url_repo') is-invalid @enderror" id="url_repo" name="url_repo"
					value="{{ old('url_repo') }}">
				@error('url_repo')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>


			<button class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection
