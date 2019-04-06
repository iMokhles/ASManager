<li class="dropdown notification-list">
    <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="mdi mdi-earth"></i>
            @php($localKey = 'applocale')
            @if(session($localKey) === 'en')
                @lang('web_dashboard.english')
            @elseif(session($localKey) === 'ar')
                @lang('web_dashboard.arabic')
            @endif
        <i class="mdi mdi-chevron-down"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
        <a href="{{route('user.lang.set', ['en'])}}" class="dropdown-item">
            @lang('web_dashboard.english')
        </a>

        <a href="{{route('user.lang.set', ['ar'])}}" class="dropdown-item">
            @lang('web_dashboard.arabic')
        </a>

    </div>
</li>