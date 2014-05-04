@section('title')
<h1>Gestion des groupes > Edition</h1>
@stop

@section('content')

{{ Form::open(array('class' => 'form-horizontal', 'method' => 'put')) }}
    <div class="form-group">
    	{{ Form::label('name', 'Nom', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => 'Nom', 'required')) }}
        </div>
    </div>

    <div class="form-group">
    	{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::textarea('description', $group->description, array('class' => 'form-control', 'placeholder' => 'Description...', 'required')) }}
        </div>
    </div>

    <div class="form-group">
    	{{ Form::label('color', 'Couleur', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('color', $group->color, array('class' => 'form-control group-color', 'placeholder' => '#FFFFFF', 'required', 'style' => 'background-color: '.$group->color.';')) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-right">
        	{{ HTML::link('admin/groups', 'Annuler', array('class' => 'btn btn-default')) }}
        	{{ Form::submit('Modifier', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
{{ Form::close() }}
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