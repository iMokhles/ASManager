<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

<!-- Analytics -->
<li class="treeview">
    <a href="#"><i class="fa fa-pie-chart"></i> <span>@lang('backpack::base.analytics')</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('/analytics/countries') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_countries')</span></a></li>
        <li><a href="{{ backpack_url('/analytics/cities') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_cities')</span></a></li>
        <li><a href="{{ backpack_url('/analytics/browsers') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_browser')</span></a></li>
        <li><a href="{{ backpack_url('/analytics/os') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_os')</span></a></li>
        <li><a href="{{ backpack_url('/analytics/visitors') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_visitors')</span></a></li>
        <li><a href="{{ backpack_url('analytics/referrer') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_referrer')</span></a></li>
        <li><a href="{{ backpack_url('analytics/urls') }}"><i class="fa fa-area-chart"></i> <span>@lang('backpack::base.by_urls')</span></a></li>
    </ul>
</li>

<!-- Users, Roles Permissions -->
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>@lang('backpack::base.users_roles')</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>@lang('backpack::base.users')</span></a></li>
        <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>@lang('backpack::base.roles')</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>@lang('backpack::base.permissions')</span></a></li>
    </ul>
</li>


<li><a href="{{ backpack_url('requests') }}"><i class="fa fa-list"></i> <span>{{ trans('backpack::base.requests') }}</span></a></li>
<li><a href="{{ backpack_url('offers') }}"><i class="fa fa-bullhorn"></i> <span>{{ trans('backpack::base.offers') }}</span></a></li>
<li><a href="{{ backpack_url('invoices') }}"><i class="fa fa-certificate"></i> <span>{{ trans('web_dashboard.invoices') }}</span></a></li>

<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}'><i class='fa fa-hdd-o'></i> <span>@lang('backpack::base.backup')</span></a></li>


<li><a href='{{route("log-viewer::logs.list")}}'><i class='fa fa-history'></i> <span>@lang('backpack::base.logs')</span></a></li>