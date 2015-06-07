<table id="{{$id}}" class="uk-table uk-table-hover {{$class}}">
	<colgroup>
		@for($i = 0; $i< count($columns); $i++)
			<col class="con{{$i}}">
		@endfor
	</colgroup>
	<thead>
		<tr>
			@foreach($coloumns as $i => $c)
				<th align="center" valign="middle" class="head{{$i}}">{{$c}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($d as $dd)
		<tr>
			@foreach($d as $dd)
				<td>{{$dd}}</td>
			@endforeach
		</tr>
		@endforeach
	</tbody>
</table>
@if (!$noScript)
	@include('datatable::javascript', array('id'=>$id, 'class' => $class,'options'=>$options,'callbacks'=>$callbacks))
@endif