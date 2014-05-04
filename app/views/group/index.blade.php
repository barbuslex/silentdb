@section('title')
<h1>Gestion des groupes</h1>
@stop

@section('buttons')
<div class="text-right">
	{{ HTML::link('admin/groups/create', 'Créer un groupe', array('class' => 'btn btn-success')) }}
</div>
@stop

@section('content')
<div class="col-md-12">
	@yield('buttons')
	<div>&nbsp;</div>
	{{ $groups->links() }}
	<table class="table table-bordered table-stripped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Description</th>
				<th>Couleur</th>
				<th>Créé le</th>
				<th>Mis à jour le</th>
				<th class="text-center"><i class="glyphicon glyphicon-user" title="Nombre d'utilisateurs"></i></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($groups as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{{ $group->name }}}</td>
				<td>{{{ $group->description }}}</td>
				<td style="background-color: {{{ $group->color }}};"></td>
				<td>{{ date('d/m/Y H:i:s', strtotime($group->created_at)) }}</td>
				<td>{{ date('d/m/Y H:i:s', strtotime($group->updated_at)) }}</td>
				<td class="text-center">{{ $group->users()->count() }}</td>
				<td>
					{{ HTML::link('admin/groups/'.$group->id.'/edit', 'Editer', array('class' => 'btn btn-warning')) }}
					{{ HTML::link('admin/groups/'.$group->id, 'Voir les membres', array('class' => 'btn btn-info')) }}
				</td>
			</tr>
			@endforeach
	</table>
	{{ $groups->links() }}
	@yield('buttons')
</div>
@stop