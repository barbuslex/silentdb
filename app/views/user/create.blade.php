@section('title')
<div class="page-header">
    <h1>Inscription</h1>
</div>
@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
	{{ Form::open(array('url' => 'user', 'class' => 'form-horizontal')) }}
    
	<div class="form-group @if($errors->has('username')) has-error @endif">
        <label for="username" class="col-md-4 control-label">Nom d'utilisateur</label>
        <div class="col-md-8">
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => "Nom d'utilisateur", 'required')) }}
            @if($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group @if($errors->has('email')) has-error @endif">
        <label for="email" class="col-md-4 control-label">Email</label>
        <div class="col-md-8">
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Adresse email', 'required')) }}
            @if($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    
    <div class="form-group @if($errors->has('email_confirmation')) has-error @endif">
        <label for="email_confirmation" class="col-md-4 control-label">Confirmation de l'email</label>
        <div class="col-md-8">
            {{ Form::email('email_confirmation', Input::old('email_confirmation'), array('class' => 'form-control', 'placeholder' => "Confirmation de l'email", 'required')) }}
            @if($errors->has('email_confirmation'))
            <span class="text-danger">{{ $errors->first('email_confirmation') }}</span>
            @endif
        </div>
    </div>
    
    <div class="form-group @if($errors->has('password')) has-error @endif">
        <label for="password" class="col-md-4 control-label">Mot de passe</label>
        <div class="col-md-8">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe', 'required')) }}
            @if($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
        <label for="password_confirmation" class="col-md-4 control-label">Confirmation du mot de passe</label>
        <div class="col-md-8">
            {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmation du mot de passe', 'required')) }}
            @if($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </div>
    
    <div class="register-buttons form-group">  
      <div class="col-md-offset-3 col-md-9 text-right">
      		{{ HTML::link(URL::previous(), 'Annuler', array('class' => 'btn btn-link')) }}
      		{{ Form::submit('Valider', array('class' => 'btn btn-primary')) }}
      </div>                                                
    </div>
    {{ Form::close() }}  
</div>
@stop