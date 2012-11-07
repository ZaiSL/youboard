@layout('application')

@section('content')
	
	Привет дорогой наш пользователь:
	
	<?php echo Auth::user()->username; ?>
	
	<?php
	$yt_client = Auth::user()->youtrack;
	$projects = $yt_client->get_accessible_projects();
	?>
	
	<br /><br />Вот проекты, к которым ты имеешь доступ
	<ul>
	@foreach ($projects as $project)
		<li>{{ $project->name }}</li>
	@endforeach
	</ul>

@endsection
