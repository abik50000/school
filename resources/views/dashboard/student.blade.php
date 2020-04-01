@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')
  
<style>
.mark-btn {
    padding: 0.3rem 0.75rem;
    border-radius: 0;
    border: none !important;
}
.notification {
    color: #eee;
}
.notification span {
    width: 8px;
    height: 8px;
    display: inline-block;
    background: #8bc34a;
    animation: greenlight 2s ease infinite;
    border-radius: 50%;
    position: relative;
    top: -2px;
}
@keyframes greenlight {
    from {
        
    }
    50% {
        box-shadow: 0 0 5px #8bc34a;
    }
    to {

    }
}

</style>
<style>
.mark-btn[data-id="1"] {background: #4caf50;}
.mark-btn[data-id="2"] {background: #8bc34a;}
.mark-btn[data-id="3"] {background: #ff7600;}
.mark-btn[data-id="4"] {background: #ff3131;}
.mark-btn[data-id="5"] {background: #111;}
</style>
    <div class="container mt-3">

        <div class="row">

                            <div class="col col-xl-4 mb-5 mb-xl-0">
                                <div class="white-block">
                                    <div class="block-profile">
                                        <div class="img-profile">
                                            <img class="img-100" src="https://daryn.online/custom/image/default.jpg">
                                        </div>
                                        <div class="inf-profile">
                                        <p class="fs-16 title-bold">{{ auth()->user()->name }}</p>
                                        <p>&nbsp;</p>
                                        </div>
                                    </div>
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Сегодня</h6>
                                    <h2 class="mb-0">{{ date('d.m.Y') }}</h2>
                              

                    
                                        <!-- <p>Уведомления <span>{{ $notifications->count() }}</span></p> -->
                                  
                                    <ul class="nav flex-column  prof-tabs" id="tabs-icons-text" role="tablist">
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                                <i class="ni ni-cloud-upload-96 mr-2"></i> Сегодня 
                                                <span class="badge badge-success-2">{{ $timetables->count() }}</span>
                                            </a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i> Оценки</a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Расписание</a>
                                        </li>
                                    </ul>
                                    @foreach($notifications as $note)
                                        <p class="notification"><span></span> {{ $note->text }}</p>
                                    @endforeach
                                </div>
                            </div> 
                            <div class="col col-xl-8 mb-5 mb-xl-0">
                                <div class="">
                                    <div class="card shadow">
                                        <div class="_card-body">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                    <table class="table align-items-center white-bg">
                                                        <thead class="thead-light">
                                                            <tr>
                                                               <th>#</th>
                                                               <th>Время</th>
                                                               <th>Предмет</th>
                                                               <th>Кабинет</th>
                                                               <th class="text-right">Преподаватель</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($timetables as $timetable)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                <td><i class="bg-warning"></i>{{ $timetable->lesson->start }} - {{ $timetable->lesson->end }}</td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4"><i class="bg-success"></i>
                                                                       {{ $timetable->subject->name }}
                                                                    </span>
                                                                </td>
                                                                <td>{{ $timetable->cabinet->cabinet }}</td>
                                                                <td class="text-right">{{ $timetable->teacher->firstname }} {{ $timetable->teacher->lastname }}</td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                    <div class="_card-body">
                                                        <div class="">
                                                            <table class="table align-items-center">
                                                            @foreach($subjects as $subject)
                                                            
                                                                
                                                                    <tr>
                                                                        <td><h3 style="margin-bottom: 0;">{{ $subject->name }}</h3></td>
                                                                        <td style="width: 100%;">
                                                                            @foreach($subject->marks as $mark_wrap)
                                                                                @foreach($mark_wrap as $mark)
                                                                                    <button class="btn btn-default mark-btn" type="button" data-id="{{ $mark->mark->id }}">{{ $mark->mark->mark }}</button>
                                                                                @endforeach
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                               
                                                                
                                                                    
                                                                
                                                                 
                                                            
                                                            @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                                    <div class="card-body">
                                                        <h3>Текущая неделя</h3>
                                                        <button class="btn btn-default" type="button">Понедельник <br> 20 января</button>
                                                        <button class="btn btn-default" type="button">Вторник <br> 21 января</button>
                                                        <button class="btn btn-default" type="button">Среда <br> 22 января</button>
                                                        <button class="btn btn-default" type="button">Четверг <br> 23 января</button>
                                                        <button class="btn btn-default" type="button">Пятница <br> 24 января</button>
                                                        <button class="btn btn-default" type="button">Суббота <br> 25 января</button>

                                                        <h3 class="mt-5">Следующая неделя</h3>
                                                        <button class="btn btn-default" type="button">Понедельник <br> 27 января</button>
                                                        <button class="btn btn-default" type="button">Вторник<br> 28 января</button>
                                                        <button class="btn btn-success" type="button">Среда<br> 29 января</button>
                                                        <button class="btn btn-secondary" type="button">Четверг<br> 30 января</button>
                                                        <button class="btn btn-secondary" type="button">Пятница<br> 31 января</button>
                                                        <button class="btn btn-secondary" type="button">Суббота<br> 1 февраля</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
        
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush