<h2>Company Profile</h2>

<div class="row">
	<h5>Member Status</h5>
	<p>{{ $company->company_name ?? ''}}</p>
	<p>{{ $company->jobTitle->job_title ?? ''}}</p>
</div>

<div class="row">
	<h5>Billing History</h5>
	<p>{{ $company->website ?? ''}}</p>
	<p>{{ $company->industry_id ?? ''}}</p>
	<p>{{ $company->sub_sector_id ?? ''}}</p>
	<p>{{ $company->description ?? ''}}</p>
</div>
