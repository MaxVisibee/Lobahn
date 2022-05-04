@php
$routes = explode('.', Request::route()->getName());
$page = $routes[0];
@endphp
<ul class="nav">
    <li class="{{ $page == 'dashboard' ? 'active' : '' }}">
        <a href=" {{ route('dashboard.index') }}">
            <i class="fa fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="{{ $page == 'seekers' ? 'active' : '' }}">
        <a href="{{ route('seekers.index') }}">
            <i class="fas fa-user-friends" aria-hidden="true"></i>
            <span>Candidate</span>
        </a>
    </li>
    <li class="{{ $page == 'companies' ? 'active' : '' }}">
        <a href="{{ route('companies.index') }}">
            <i class="fas fa-building" aria-hidden="true"></i>
            <span>Employer</span>
        </a>
    </li>
    <li class="{{ $page == 'opportunities' ? 'active' : '' }}">
        <a href="{{ route('opportunities.index') }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>Job Opportunity</span>
        </a>
    </li>
    <li class="{{ $page == 'packages' ? 'active' : '' }}">
        <a href="{{ route('packages.index') }}">
            <i class="fa fa-list-ul" aria-hidden="true"></i>
            <span>Packages</span>
        </a>
    </li>
    {{-- <li class="{{ $page == 'mail' ? 'active' : '' }}">
        <a href="{{ route('mail.index') }}">
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <span>Mail</span>
        </a>
    </li> --}}
    <li class="has-sub 
        {{ $page == 'mail' || ($page == 'manual_mail') == 'sub_sectors' ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <span>Mail</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ $page == 'mail' ? 'active' : '' }}"><a href="{{ route('mail.index') }}">Filter Mail</a>
            </li>
            <li class="{{ $page == 'manual_mail' ? 'active' : '' }}"><a href="{{ route('mail.manual') }}">Manual
                    Mail</a>
            </li>
        </ul>
    </li>
    {{-- <li class="{{ $page == 'payments' ? 'active' : '' }}">
        <a href="{{ route('payments.index') }}">
            <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
            <span>Payment Transitions</span>
        </a>
    </li> --}}
    <li
        class="has-sub 
        {{ $page == 'institutions' || $page == 'job_shifts' || $page == 'degree_levels' || $page == 'job_types' || $page == 'functional_areas' || $page == 'geographicals' || $page == 'industries' || $page == 'job_experiences' || $page == 'job_titles' || $page == 'job-title-categories' || $page == 'keywords' || $page == 'key_strengths' || $page == 'languages' || $page == 'language-levels' || $page == 'countries' || $page == 'carrier_levels' || $page == 'qualifications' || $page == 'job_skills' || $page == 'specialities' || $page == 'study_fields' || $page == 'target_companies' || $page == 'sub_sectors' ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <span>Job Attributes</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ $page == 'institutions' ? 'active' : '' }}"><a
                    href="{{ route('institutions.index') }}">Academic Institutions</a></li>
            <li class="{{ $page == 'job_shifts' ? 'active' : '' }}"><a
                    href="{{ route('job_shifts.index') }}">Contract Hours</a></li>
            <li class="{{ $page == 'degree_levels' ? 'active' : '' }}"><a
                    href="{{ route('degree_levels.index') }}">Education Level</a></li>
            <li class="{{ $page == 'job_types' ? 'active' : '' }}"><a
                    href="{{ route('job_types.index') }}">Employment terms</a></li>
            <li class="{{ $page == 'functional_areas' ? 'active' : '' }}"><a
                    href="{{ route('functional_areas.index') }}">Functional Area</a></li>
            <li class="{{ $page == 'geographicals' ? 'active' : '' }}"><a
                    href="{{ route('geographicals.index') }}">Geographical Experience</a></li>
            <li class="{{ $page == 'industries' ? 'active' : '' }}"><a
                    href="{{ route('industries.index') }}">Industry sector</a></li>
            <li class="{{ $page == 'job_experiences' ? 'active' : '' }}"><a
                    href="{{ route('job_experiences.index') }}">Job Experiences</a></li>
            <li class="{{ $page == 'job_titles' ? 'active' : '' }}"><a href="{{ route('job_titles.index') }}">Job
                    Titles</a></li>
            <li class="{{ $page == 'job-title-categories' ? 'active' : '' }}"><a
                    href="{{ route('job-title-categories.index') }}">Job Title Categories</a></li>
            <li class="{{ $page == 'keywords' ? 'active' : '' }}"><a
                    href="{{ route('keywords.index') }}">Keywords</a></li>
            <li class="{{ $page == 'key_strengths' ? 'active' : '' }}"><a
                    href="{{ route('key_strengths.index') }}">Key
                    Strenghts</a></li>
            <li class="{{ $page == 'languages' ? 'active' : '' }}"><a
                    href="{{ route('languages.index') }}">Languages</a></li>
            <li class="{{ $page == 'language-levels' ? 'active' : '' }}"><a
                    href="{{ route('language-levels.index') }}">Language Level</a></li>
            <li class="{{ $page == 'countries' ? 'active' : '' }}"><a
                    href="{{ route('countries.index') }}">Location</a></li>
            <li class="{{ $page == 'carrier_levels' ? 'active' : '' }}"><a
                    href="{{ route('carrier_levels.index') }}">Management Level</a></li>
            <li class="{{ $page == 'qualifications' ? 'active' : '' }}"><a
                    href="{{ route('qualifications.index') }}">Qualifications</a></li>
            <li class="{{ $page == 'job_skills' ? 'active' : '' }}"><a
                    href="{{ route('job_skills.index') }}">Software & Tech Knowledge</a></li>
            <li class="{{ $page == 'specialities' ? 'active' : '' }}"><a
                    href="{{ route('specialities.index') }}">Specialities</a></li>
            <li class="{{ $page == 'study_fields' ? 'active' : '' }}"><a
                    href="{{ route('study_fields.index') }}">Study Fields</a></li>
            <li class="{{ $page == 'target_companies' ? 'active' : '' }}"><a
                    href="{{ route('target_companies.index') }}">Target Companies</a></li>
            <li class="{{ $page == 'sub_sectors' ? 'active' : '' }}"><a
                    href="{{ route('sub_sectors.index') }}">Sub-sectors</a></li>


            {{-- <li><a href="{{ route('job_applies.index') }}">Job Applies</a></li> --}}
            <!-- <li><a href="{{ route('target_pays.index') }}">Target Pay</a></li> -->
            {{-- <li><a href="{{ route('study_fields.index') }}">Fields of Study</a></li>
            <li><a href="{{ route('tech_knowledges.index') }}">Tech Knowledge</a></li>
            <li><a href="{{ route('job_functions.index') }}">Functions</a></li>
            <li><a href="{{ route('job_applies.index') }}">Job Applies</a></li> --}}
        </ul>
    </li>

    <li
        class="has-sub {{ $page == 'abouts' || $page == 'banners' || $page == 'blogs' || $page == 'career-partner' || $page == 'communities' || $page == 'connect' || $page == 'contacts' || $page == 'news_events' || $page == 'faqs' || $page == 'membership' || $page == 'meta' || $page == 'news' || $page == 'news_categories' || $page == 'partners' || $page == 'privacies' || $page == 'talent-discovery' || $page == 'terms' ? 'active' : '' }} ">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="far fa-list-alt" aria-hidden="true"></i>
            <span>Content Manangement</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ $page == 'abouts' ? 'active' : '' }}"><a href=" {{ route('abouts.index') }}">About
                    Us</a>
            </li>
            <li class="{{ $page == 'banners' ? 'active' : '' }}"><a
                    href=" {{ route('banners.index') }}">Banners</a>
            </li>
            <li class="{{ $page == 'blogs' ? 'active' : '' }}"><a href=" {{ route('blogs.index') }}">Blogs</a>
            </li>
            <li class="{{ $page == 'career-partner' ? 'active' : '' }}"><a
                    href=" {{ route('career-partner.edit') }}">Career
                    Partner</a></li>
            <li class="{{ $page == 'communities' ? 'active' : '' }}"><a
                    href=" {{ route('communities.index') }}">Communities</a>
            </li>
            <li class="{{ $page == 'connect' ? 'active' : '' }}"><a
                    href=" {{ route('connect.edit') }}">Connect</a>
            </li>
            <li class="{{ $page == 'contacts' ? 'active' : '' }}"><a
                    href=" {{ route('contacts.index') }}">Contact</a></li>
            <li class="{{ $page == 'news_events' ? 'active' : '' }}"><a
                    href=" {{ route('news_events.index') }}">Events</a>
            </li>
            <li class="{{ $page == 'faqs' ? 'active' : '' }}"><a href=" {{ route('faqs.index') }}">FAQs</a></li>
            <li class="{{ $page == 'membership' ? 'active' : '' }}"><a
                    href=" {{ route('membership.edit') }}">Membership</a>
            </li>
            <li class="{{ $page == 'meta' ? 'active' : '' }}"><a href=" {{ route('meta.index') }}">Meta Data</a>
            </li>
            <li class="{{ $page == 'news' ? 'active' : '' }}"><a href=" {{ route('news.index') }}">News</a></li>
            <li class="{{ $page == 'news_categories' ? 'active' : '' }}"><a
                    href=" {{ route('news_categories.index') }}">News
                    Categories</a></li>
            <li class="{{ $page == 'partners' ? 'active' : '' }}"><a
                    href=" {{ route('partners.index') }}">Partners</a></li>
            <li class="{{ $page == 'privacies' ? 'active' : '' }}"><a
                    href=" {{ route('privacies.index') }}">Privacy</a></li>
            <li class="{{ $page == 'talent-discovery' ? 'active' : '' }}"><a
                    href=" {{ route('talent-discovery.edit') }}">Talent
                    Discovery</a></li>
            <li class="{{ $page == 'terms' ? 'active' : '' }}"><a href="{{ route('terms.index') }}">Terms &
                    Conditions </a></li>
        </ul>
    </li>
    <li
        class="has-sub {{ $page == 'site-settings' || $page == 'edit-payment' || $page == 'suitability-ratios' ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span> Setting</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ $page == 'site-settings' ? 'active' : '' }}"><a
                    href="{{ route('site-settings.edit') }}">Site Setting</a></li>
            <li class="{{ $page == 'edit-payment' ? 'active' : '' }}"><a
                    href="{{ route('edit-payment.index') }}">Payment Keys (Stripe)</a></li>
            <li class="{{ $page == 'suitability-ratios' ? 'active' : '' }}"><a
                    href="{{ route('suitability-ratios.index') }}">Suitability Ratios</a></li>
        </ul>
    </li>
    <li class="has-sub {{ $page == 'admins' || $page == 'roles' || $page == 'permissions' ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>User Management</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ $page == 'admins' ? 'active' : '' }}"><a href="{{ route('admins.index') }}">Admin</a>
            </li>
            <li class="{{ $page == 'roles' ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Role</a>
            </li>
            <li class="{{ $page == 'permissions' ? 'active' : '' }}"><a
                    href="{{ route('permissions.index') }}">Permission</a></li>
        </ul>
    </li>
    {{-- <li
        class="has-sub {{ request()->is('job_types*') || request()->is('job_skills*') || request()->is('job_experiences*')? 'active': '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="far fa-list-alt" aria-hidden="true"></i>
            <span>Activity Log</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('abouts.index') }}">Admin Users</a></li>
            <li><a href="{{ route('banners.index') }}">Coporate Users</a></li>
        </ul>
    </li> --}}

    <li class="{{ $page == 'activitylog' ? 'active' : '' }}">
        <a href="{{ route('activitylog') }}">
            <i class="fas fa-database" aria-hidden="true"></i>
            <span>Activity Log</span>
        </a>
    </li>


    {{-- <li
        class="has-sub {{ request()->is('job_types*') || request()->is('job_skills*') || request()->is('job_experiences*') ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>Location Management</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('countries.index') }}">Countries</a></li>
            <li><a href="{{ route('areas.index') }}">Areas</a></li>
            <li><a href="{{ route('districts.index') }}">Districts</a></li>
        </ul>
    </li> 
    <li class="{{ request()->is('events*') ? 'active' : '' }}">
        <a href="{{ route('events.index') }}">
            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            <span>Events</span>
        </a>
    </li><li class="{{ request()->is('news*') ? 'active' : '' }}">
        <a href="{{ route('news.index') }}">
         <i class="fas fa-newspaper"></i></i>
         <span>News</span>
        </a>
       </li>
       <li class="{{ request()->is('banners*') ? 'active' : '' }}">
        <a href="{{ route('banners.index') }}">
         <i class="fas fa-newspaper"></i></i>
         <span>Bannes</span>
        </a>
       </li> --}}

    <!-- begin sidebar minify button -->
    <li>
        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                class="fa fa-angle-double-left"></i></a>
    </li>
    <!-- end sidebar minify button -->
</ul>
