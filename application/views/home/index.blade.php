@layout('application')

@section('content')
	
	Привет дорогой наш пользователь: {{ $username }}
	
	<br /><br />Вот проекты, к которым ты имеешь доступ
	<ul>
	@foreach ($projects as $project)
		<li>{{ $project->name }}</li>
	@endforeach
	</ul>

@endsection
