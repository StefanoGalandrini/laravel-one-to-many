@php $user = Auth::user(); @endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
	<div class="container-fluid">
		<a class="navbar-brand h1" href="{{ route('guests.home') }}">MY PROJECTS</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						PROJECTS
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('admin.projects.index') }}">Index</a></li>
						<li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">Create</a></li>
						@if (isset($project))
							<li><a class="dropdown-item" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a></li>
						@endif
						@if (isset($project))
							<li>
								<button type="button" class="btn btn-danger btn-sm js-delete ms-2" data-bs-toggle="modal"
									data-bs-target="#deleteModal" data-id="{{ $project->id }}">
									Delete
								</button>
							</li>
						@endif
					</ul>
				</li>
			</ul>

			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						{{ $user->name }}
					</a>
					<ul class="dropdown-menu">
						<li class="nav-item dropdown">
							<a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Edit profile</a>
						</li>
						<li class="nav-item dropdown">
							<form action="{{ route('logout') }}" method="post">
								@csrf
								<button class="btn btn-warning mx-2">Logout</button>
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

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
