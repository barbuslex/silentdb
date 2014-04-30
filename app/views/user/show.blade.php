@section('title')
<div class="page-header">
	<h1>Profil de {{{ $user->username }}}</h1>
</div>
@stop

@section('content')
<div class="col-md-3 text-center">
	{{ HTML::image('img/EmptyAvatar.png') }}
</div>
<div class="col-md-9">
	{{ Form::open(array('method' => 'put')) }}
	<table class="table">
		<tbody>
			<tr>
				<th class="table-header text-info" scope="row" colspan="2">Informations utilisateur</th>
			</tr>
			<tr>
				<th scope="row">Nom d'utilisateur</th>
				<td>{{{ $user->username }}}</td>
			</tr>
			<tr>
				<th scope="row">Groupe</th>
				<td>
					@if($user->is_admin())
					{{ Form::select('group', $select_groups, $user->group_id, array('class' => 'form-control')) }}
					@else
					<span class="label label-default" style="background-color: {{ $user->group->color }};">{{ $user->group->name }}</span>
					@endif
				</td>
			</tr>
			<tr @if($errors->has('email')) has-error @endif>
				<th scope="row"><label for="email" class="control-label">Adresse email</label></th>
				<td>
					{{ Form::email('email', $user->email, array('class' => 'form-control', 'requied')) }}
					@if($errors->has('email'))
					<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</td>
			</tr>
			<tr>
				<th class="table-header text-warning" scope="row" colspan="2">Gestion du mot de passe <small>Laisser vide si vous modifiez uniquement les informations utilisateur</small></th>
			</tr>
			<tr>
				<th scope="row"><label for="old_password" class="control-label">Ancien mot de passe</label></th>
				<td>{{ Form::password('old_password', array('class' => 'form-control')) }}</td>
			</tr>
			<tr @if($errors->has('password')) class="has-error" @endif>
				<th scope="row"><label for="password" class="control-label">Nouveau mot de passe</label></th>
				<td>
					{{ Form::password('password', array('class' => 'form-control')) }}
					@if($errors->has('password'))
					<span class="text-danger">{{ $errors->first('password') }}</span>
					@endif
				</td>
			</tr>
			<tr @if($errors->has('password_confirmation')) class="has-error" @endif>
				<th scope="row"><label for="password_confirmation" class="control-label">Confirmation nouveau mot de passe</label></th>
				<td>
					{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
					@if($errors->has('password_confirmation'))
					<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
					@endif
				</td>
			</tr>
			<tr>
				<td class="buttons text-right" colspan="2">
					{{ Html::link('user/destroy/'.$user->id, 'Supprimer le compte', array('class' => 'btn btn-danger')) }}
					{{ Form::submit('Valider les modifications', array('class' => 'btn btn-primary')) }}
				</td>
			</tr>
		</tbody>
	</table>
	{{ Form::close() }}
</div>
@stop