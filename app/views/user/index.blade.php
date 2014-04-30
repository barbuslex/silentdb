@section('title')
<div class="page-header">
	<h1>Liste des utilisateurs</h1>
</div>
@stop

@section('content')
<table class="table table-bordered table-stripped">
	<thead>
		<th>Nom</th>
		<th>Groupe</th>
		<th>Profil</th>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{{ $user->username }}}</td>
			<td>
				<span class="label label-default" style="background-color: {{ $user->group->color }};">{{{ $user->group->name }}}</span>
			</td>
			<td>
				{{ HTML::link('user/'.$user->id, 'Voir le profil', array('class' => 'btn btn-primary')) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop