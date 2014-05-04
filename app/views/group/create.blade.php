@section('title')
<h1>Gestion des groupes > Création</h1>
@stop

@section('content')
<div class="col-md-12">
	{{ Form::open(array('class' => 'form-horizontal', 'url' => 'admin/groups')) }}
	    <div class="form-group @if($errors->has('name')) has-error @endif">
	    	{{ Form::label('name', 'Nom', array('class' => 'col-sm-2 control-label')) }}
	        <div class="col-sm-10">
	        	{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nom du groupe', 'required')) }}
	        	@if($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
	        	@endif
	        </div>
	    </div>

	    <div class="form-group @if($errors->has('description')) has-error @endif">
	    	{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
	        <div class="col-sm-10">
	        	{{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description du groupe...')) }}
	        	@if($errors->has('description'))
				<span class="text-danger">{{ $errors->first('description') }}</span>
	        	@endif
	        </div>
	    </div>

	    <div class="form-group @if($errors->has('color')) has-error @endif">
	    	{{ Form::label('color', 'Couleur', array('class' => 'col-sm-2 control-label')) }}
	        <div class="col-sm-10">
	        	{{ Form::text('color', null, array('class' => 'form-control group-color', 'placeholder' => '#FFFFFF', 'required')) }}
	        	@if($errors->has('color'))
				<span class="text-danger">{{ $errors->first('color') }}</span>
	        	@endif
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10 text-right">
	        	{{ HTML::link('admin/groups', 'Annuler', array('class' => 'btn btn-default')) }}
	        	{{ Form::submit('Créer', array('class' => 'btn btn-success')) }}
	        </div>
	    </div>
	{{ Form::close() }}
</div>
@stop

@section('script')
<script>
$(function() {
    $('.group-color').keyup(function(e) {
        e.preventDefault();
        console.log('key');
        $(this).css('background-color', $(this).val());
    });
});
</script>
@stop