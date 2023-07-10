@extends('admin.layouts.base')

@section('contents')
	<div class="wrapper w-100 mx-auto">
		{{-- Messaggio di conferma cancellazione --}}
		{{-- @if (session('delete_success'))
			@php $type = session('delete_success') @endphp
			<div class="alert alert-danger">
				Type "{{ $type->name }}" has been deleted
			</div>
		@endif --}}

		<h1>Types</h1>
		<div class="d-flex justify-content-center">
			<table class="table table-bordered table-secondary table-striped table-hover table-rounded">
				<thead>
					<tr class="thead-dark">
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($types as $type)
						<tr>
							<td class="fs-10">{{ $type->id }}</td>
							<td class="fs-4">{{ $type->name }}</td>
							<td class="fs-15">{{ $type->description }}</td>
							<td>
								<a href="{{ route('admin.types.show', ['type' => $type]) }}" class="btn btn-warning btn-sm">Show</a>
								<a href="{{ route('admin.types.edit', ['type' => $type]) }}" class="btn btn-primary btn-sm">Edit</a>
								<button type="button" class="btn btn-danger btn-sm js-delete" data-bs-toggle="modal"
									data-bs-target="#deleteModal" data-id="{{ $type->id }}">
									Delete
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>


			<!-- Modal -->
			<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Are you sure?
						</div>
						<div class="modal-footer">
							<form action="" data-template="{{ route('admin.projects.destroy', ['project' => '*****']) }}" method="post"
								class="d-inline-block" id="confirm-delete">
								@csrf
								@method('delete')
								<button class="btn btn-danger">Yes</button>
							</form>
							<button type="button" class="btn btn-secondary">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
