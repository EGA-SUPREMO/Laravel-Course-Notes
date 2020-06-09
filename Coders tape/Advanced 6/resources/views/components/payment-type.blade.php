<div {{ $attributes -> merge(['class' => 'text-center']) }}>
	<h1>{{ $title }}</h1>
	<h2><strong>{{ $miniinfo }}</strong></h2>
	<p>
		For you
	</p>
	<br>
	<p>{{ $info}}</p>
	<ul>
		@foreach($list('my custom item -'.$miniinfo) as $item)
			<li>{{ $item }}</li>
		@endforeach
	</ul>
	{{ $slot }}
	<h3>END OF THIS COMPONENT</h3>
</div>
