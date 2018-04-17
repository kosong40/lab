
<div>
	{{-- @foreach ($prak->where('kegunaan','Praktikum Sistem Digital') as $prak)
	<tr>
		<td>{{$prak->kegunaan}}</td>
	</tr>
@endforeach --}}
</div>
<div>
	@foreach ($prak->where('kegunaan','Praktikum Robotika') as $robot)
	<tr>
		<td>{{$robot->kegunaan}}</td>
	</tr>
@endforeach
</div>


