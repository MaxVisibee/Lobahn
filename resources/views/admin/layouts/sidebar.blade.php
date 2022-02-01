<ul class="nav">
    <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li
        class="has-sub {{ request()->is('admins*') || request()->is('roles*') || request()->is('permissions*') ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>User Management</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('admins.index') }}">Admin</a></li>
            <li><a href="{{ route('roles.index') }}">Role</a></li>
            <li><a href="{{ route('permissions.index') }}">Permission</a></li>
        </ul>
    </li>
    <li class="{{ request()->is('seekers*') ? 'active' : '' }}">
        <a href="{{ route('seekers.index') }}">
            <i class="fas fa-user-friends" aria-hidden="true"></i>
            <span>Seekers</span>
        </a>
    </li>
    <li class="{{ request()->is('companies*') ? 'active' : '' }}">
        <a href="{{ route('companies.index') }}">
            <i class="fas fa-landmark" aria-hidden="true"></i>
            <span>Companies</span>
        </a>
    </li>
    <li class="{{ request()->is('opportunities*') ? 'active' : '' }}">
        <a href="{{ route('opportunities.index') }}">
            <i class="fa fa-industry" aria-hidden="true"></i>
            <span>Job Opportunity</span>
        </a>
    </li>
    <li
        class="has-sub {{ request()->is('job_types*') || request()->is('job_skills*') || request()->is('job_experiences*') ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <span>Job Attributes</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('countries.index') }}">Location</a></li>
            <li><a href="{{ route('job_types.index') }}">Contract Terms</a></li>
            <!-- <li><a href="{{ route('target_pays.index') }}">Target Pay</a></li> -->
            <li><a href="{{ route('job_shifts.index') }}">Contract Hour</a></li>
            <li><a href="{{ route('keywords.index') }}">Keywords</a></li>
            <li><a href="{{ route('carrier_levels.index') }}">Management Levels</a></li>
            <li><a href="{{ route('job_experiences.index') }}">Years(Job Experiences)</a></li>
            <li><a href="{{ route('degree_levels.index') }}">Education Levels</a></li>
            <li><a href="{{ route('institutions.index') }}">Academic Institutions</a></li>
            <li><a href="{{ route('languages.index') }}">Languages</a></li>
            <li><a href="{{ route('language-levels.index') }}">Language Levels</a></li>
            <li><a href="{{ route('geographicals.index') }}">Geographical Experiences</a></li>
            <li><a href="{{ route('job_skills.index') }}">Software & Tech Knowledge</a></li>
            <li><a href="{{ route('qualifications.index') }}">Qualifications</a></li>
            <li><a href="{{ route('key_strengths.index') }}">Key Strenghts</a></li>
            <li><a href="{{ route('job_titles.index') }}">Position Titles</a></li>
            <li><a href="{{ route('industries.index') }}">Industries</a></li>
            <li><a href="{{ route('sub_sectors.index') }}">Sub Sectors</a></li>
            <li><a href="{{ route('functional_areas.index') }}">Functional Areas</a></li>
            <li><a href="{{ route('specialities.index') }}">Specialities</a></li>
            <li><a href="{{ route('job_applies.index') }}">Job Applies</a></li>
            <li><a href="{{ route('job-title-categories.index') }}">Job Title Category</a></li>
            {{-- <li><a href="{{ route('study_fields.index') }}">Fields of Study</a></li>
            <li><a href="{{ route('tech_knowledges.index') }}">Tech Knowledge</a></li>
            <li><a href="{{ route('job_functions.index') }}">Functions</a></li>
            <li><a href="{{ route('job_applies.index') }}">Job Applies</a></li> --}}
        </ul>
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
    </li> --}}
    <li class="{{ request()->is('packages*') ? 'active' : '' }}">
        <a href="{{ route('packages.index') }}">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>Packages</span>
        </a>
    </li>
    <!--
    <li class="{{ request()->is('events*') ? 'active' : '' }}">
        <a href="{{ route('events.index') }}">
            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            <span>Events</span>
        </a>
    </li>
    -->
    <!-- <li class="{{ request()->is('news*') ? 'active' : '' }}">
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
       </li> -->
    <li
        class="has-sub {{ request()->is('job_types*') || request()->is('job_skills*') || request()->is('job_experiences*') ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="far fa-list-alt" aria-hidden="true"></i>
            <span>CMS</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('banners.index') }}">Banners</a></li>
            <li><a href="{{ route('news_categories.index') }}">News Categories</a></li>
            <li><a href="{{ route('news.index') }}">News</a></li>
            <li><a href="{{ route('news_events.index') }}">Events</a></li>
            <li><a href="{{ route('faqs.index') }}">FAQs</a></li>
            <li><a href="{{ route('terms.index') }}">Terms & Conditions </a></li>
            <li><a href="{{ route('privacies.index') }}">Privacy</a></li>
            <li><a href="{{ route('communities.index') }}">Communities</a></li>
            <li><a href="{{ route('partners.index') }}">Partners</a></li>
            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
            <li><a href="{{ route('abouts.index') }}">About Us</a></li>
            <li><a href="{{ route('contacts.index') }}">Contacts</a></li>
            <li><a href="{{ route('meta.index') }}">Meta Data</a></li>
            <li><a href="{{ route('talent-discovery.edit') }}">Talent Discovery</a></li>
            <li><a href="{{ route('career-partner.edit') }}">Career Partner</a></li>
            <li><a href="{{ route('connect.edit') }}">Connect</a></li>
            <li><a href="{{ route('membership.edit') }}">Membership</a></li>
        </ul>
    </li>

    <li class="{{ request()->is('mail*') ? 'active' : '' }}">
        <a href="{{ route('mail.index') }}">
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <span>Mail</span>
        </a>
    </li>

    <li
        class="has-sub {{ request()->is('payment_methods*') || request()->is('site-settings*') || request()->is('suitability-ratios*') ? 'active' : '' }}">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>Setting</span>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('site-settings.edit') }}">Site Setting</a></li>
            <li><a href="{{ route('payment_methods.index') }}">Payment Methods</a></li>
            <li><a href="{{ route('suitability-ratios.index') }}">Suitability Ratios</a></li>
        </ul>
    </li>

    <!-- begin sidebar minify button -->
    <li>
        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                class="fa fa-angle-double-left"></i></a>
    </li>
    <!-- end sidebar minify button -->
</ul>
