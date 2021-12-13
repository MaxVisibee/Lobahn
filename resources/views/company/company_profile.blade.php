<h2>Company Profile</h2>

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
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
				<td>{{ $company->company_name ?? ''}}</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<img class="img-fluid" src='{{ asset("uploads/company_logo/$company->logo") }}' alt="{{ $company->company_name ?? '-' }}" style="float: left;">
	<div class="company_name">
		<h5>{{ $company->name ?? ''}}</h5>
		<span>{{ $company->package_id ?? ''}}</span>
		<p>{{ $company->email ?? ''}}</p>
		<p>{{ $company->phone ?? ''}}</p>
	</div>
</div>

<div class="row">
	<h5>Profile</h5>
	<p>{{ $company->company_name ?? ''}}</p>
	<p>{{ $company->jobTitle->job_title ?? ''}}</p>
</div>

<div class="row">
	<h5>Company Profile</h5>
	<p>{{ $company->website ?? ''}}</p>
	<p>{{ $company->industry_id ?? ''}}</p>
	<p>{{ $company->sub_sector_id ?? ''}}</p>
	<p>{{ $company->description ?? ''}}</p>
</div>

<div class="row">
	<h5>Password</h5>
	<span>Password changed date</span>
</div>
