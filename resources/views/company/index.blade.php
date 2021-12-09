<h2>Position Listing</h2>

<div class="row">
	<div class="col-md-12">
		<table>
			<th>
				<td>Reference</td>
				<td>Position Title</td>
				<td>Unview</td>
				<td>View</td>
				<td>Connected</td>
				<td>Listing Date</td>
				<td>Expire Date</td>	
			</th>
			@foreach ($companies as $key => $com)
			<tr>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
				<td>{{ $com->name ?? ''}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div> 


