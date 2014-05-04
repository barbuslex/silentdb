@section('title')
<h1>Gestion des groupes > <span class="label label-default" style="background-color: {{ $group->color }};">{{{ $group->name }}}</span></h1>
@stop

@section('content')
<div class="col-md-12">
	{{ HTML::link('admin/groups', '< Retour aux groupes', array('class' => 'btn btn-default')) }}
</div>
<div>&nbsp;</div>
<div class="col-md-12">
	<table class="table table-bordered table-stripped">
		<thead>
			<th>#</th>
			<th>Nom d'utilisateur</th>
			<th>Email</th>
			<th>Groupe</th>
		</thead>
		<tbody>
			@if($group->users->count() > 0)
			@foreach($group->users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{{ $user->username }}}</td>
				<td>{{{ $user->email }}}</td>
				<td><span class="label label-default" style="background-color: {{ $group->color }};">{{{ $group->name }}}</span></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="3" class="text-danger">Aucun membre</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
<div class="col-md-12">
	{{ HTML::link('admin/groups', '< Retour aux groupes', array('class' => 'btn btn-default')) }}
</div>
@stop
