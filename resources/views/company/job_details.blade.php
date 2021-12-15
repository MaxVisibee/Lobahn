<h2>Marketing Communication Manager</h2>

<form class="form-inline search-form" action="{{ url('/search') }}">
    <div class="form-group col-sm-2 ssl-filter">
        <select class="form-control" name="company_name" id="company_name">
            <option value="listing_date" {{ (Request::get('listing_date') == 'listing_date') ? 'selected' : '' }}>Listing Date</option>
            <option value="status" {{ (Request::get('status') == 'status') ? 'selected' : '' }}>Status</option>
        </select>
    </div>
</form>

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
			<tr>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
				<td>{{ $company->name ?? ''}}</td>
			</tr>
		</table>
	</div>
</div> 


