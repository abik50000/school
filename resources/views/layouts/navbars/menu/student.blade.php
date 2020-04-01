 <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i> {{ __('Панель') }}
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="ni ni-planet text-primary"></i> {{ __('Расписание') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('student_diary') }}">
        <i class="ni ni-pin-3 text-primary"></i> {{ __('Дневник') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('student_notifications') }}">
        <i class="ni ni-bell-55 text-primary"></i> {{ __('Уведомления') }}
    </a>
</li>