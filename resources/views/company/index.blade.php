<div class="row">
	{{-- <img class="img-fluid" src='{{ asset("uploads/company_logo/$company->logo") }}' alt="{{ $company->company_name ?? '-' }}" style="float: left;"> --}}
	<img class="img-fluid" src='{{ asset("images/lobahn-black.svg") }}' alt="{{ $company->company_name ?? '-' }}" style="float: left;width: 250px;height: auto;">	
	<div class="company_name">
		<h5>{{ $company->name ?? ''}}</h5>
		<span>{{ $company->package_id ?? ''}}</span>
		<p>{{ $company->email ?? ''}}</p>
		<p>{{ $company->phone ?? ''}}</p>
	</div>
</div><br/><br/><br/><br/>

<form class="form-inline search-form" action="{{ url('/search') }}">
    <input class="form-control mr-sm-2 input-search" type="search" name="tag" id="topics" placeholder="Search..." aria-label="Search" onfocus="this.placeholder=''" onblur="this.placeholder='Search...'" value="{{Request::get('position_title')}}" autocomplete="off">
    <button class="btn btn-primary my-2 my-sm-0 search-btn" type="submit">Search</button>
    <div class="form-group col-sm-2 ssl-filter">
        <select class="form-control" name="company_name" id="company_name">
            <option value="listing_date" {{ (Request::get('listing_date') == 'listing_date') ? 'selected' : '' }}>Listing Date</option>
            <option value="status" {{ (Request::get('status') == 'status') ? 'selected' : '' }}>Status</option>
        </select>
    </div>
</form>

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


