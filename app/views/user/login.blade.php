@section('title')
<div class="page-header">
  <h1>Connexion</h1>
</div>
@stop

@section('content')

<div class="col-md-8 col-md-offset-2">
	{{ Form::open(array('class' => 'form-horizontal')) }}
    
	   <div class="form-group @if($errors->has('username')) has-error @endif">
        <label for="username" class="col-md-4 control-label">Nom d'utilisateur</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
            @if($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>
    </div>
    
    <div class="form-group @if($errors->has('password')) has-error @endif">
        <label for="password" class="col-md-4 control-label">Mot de passe</label>
        <div class="col-md-8">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
            @if($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    
    <div class="register-buttons form-group">  
      <div class="col-md-offset-3 col-md-9 text-right">
      		{{ HTML::link(URL::previous(), 'Annuler', array('class' => 'btn btn-link')) }}
      		{{ Form::submit('Connexion', array('class' => 'btn btn-success')) }}
      </div>                                                
    </div>
    {{ Form::close() }}  
</div>

@stop