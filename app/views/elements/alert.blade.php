@if(Session::has('flash_error'))
	<div class="alert alert-danger">
		<strong>Erreur !</strong>
		<p>{{ Session::get('flash_error') }}</p>
	</div>
@endif

@if(Session::has('flash_info'))
	<div class="alert alert-info">
		<strong>Information !</strong>
		<p>{{ Session::get('flash_info') }}</p>
	</div>
@endif

@if(Session::has('flash_warning'))
	<div class="alert alert-warning">
		<strong>Attention !</strong>
		<p>{{ Session::get('flash_warning') }}</p>
	</div>
@endif

@if(Session::has('flash_success'))
	<div class="alert alert-success">
		<strong>Succès !</strong>
		<p>{{ Session::get('flash_success') }}</p>
	</div>
@endif
