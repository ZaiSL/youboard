@layout('application')

@section('content')
	Форма авторизации
	
	<?php

	echo Form::open('auth_me', 'POST');

	echo Form::label('username', 'Username') . Form::text('username', Input::old('username'));
	echo Form::label('password', 'Password') . Form::password('password');

	echo Form::submit('Auth Me!');

	echo Form::close();

	?>

@endsection
