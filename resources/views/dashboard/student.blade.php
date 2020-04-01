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
                                            <img class="img-100" src="https://lh3.googleusercontent.com/proxy/wbrf5N5rwnrkrkkyjAGl38ZpQwM0PNEfcbK1xsXCKN14EXX-CoscVOLIIv9nCBEH95ufIZsUrXNVQXkalWGdU04Cwp9gPHi1rHbCiSKzMiDipF86caRtOsBcqc9ewNlj13c">
                                        </div>
                                        <div class="inf-profile">
                                            <p>Дамира Ахметова</p>
                                            <p>Начальный уровень</p>
                                        </div>
                                    </div>


                    
                                        <!-- <p>Уведомления <span>{{ $notifications->count() }}</span></p> -->
                                  
                                    <ul class="nav flex-column  prof-tabs mt-3" id="tabs-icons-text" role="tablist">
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                                <i class="ni ni-cloud-upload-96"></i>  
                                                <span>Курсы <b>0</b></span>
                                            </a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                                <i class="ni ni-bell-55"></i> 
                                                <span>Календарь <b></b></span>
                                            </a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                                <i class="ni ni-calendar-grid-58"></i>
                                                <span>Уведомления <b></b></span>
                                            </a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false">
                                                <i class="ni ni-calendar-grid-58"></i>
                                                <span>Достижения <b></b></span>
                                            </a>
                                        </li>
                                        <li class="prof-menu">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false">
                                                <i class="ni ni-calendar-grid-58"></i>
                                                <span>Домашние задания<b></b></span>
                                            </a>
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
                                                    <div class="row">
                                                        <a class="col-lg-6" href="#">
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="62.5 0.525 70 70" enable-background="new 62.5 0.525 70 70" xml:space="preserve">
                                                                        <g id="Layer_3">
                                                                        </g>
                                                                        <g id="Layer_2">
                                                                            <g>
                                                                                <g>
                                                                                    <rect x="62.5" y="0.525" fill="none" width="70" height="70"></rect>
                                                                                    <path fill="#0683C2" d="M130.487,35.525c0,2.362-3.763,4.375-4.2,6.563c-0.524,2.274,2.013,5.688,0.963,7.787
                                                                                        s-5.25,2.275-6.65,4.112c-1.487,1.838-0.699,5.95-2.537,7.438s-5.688-0.263-7.787,0.788c-2.101,1.05-3.15,5.074-5.426,5.6
                                                                                        c-2.274,0.525-4.987-2.713-7.35-2.713s-5.075,3.15-7.35,2.713c-2.275-0.525-3.413-4.55-5.425-5.6
                                                                                        c-2.1-1.051-5.95,0.699-7.788-0.788s-1.05-5.6-2.538-7.438c-1.487-1.837-5.6-1.925-6.65-4.112c-1.05-2.1,1.487-5.425,0.962-7.787
                                                                                        c-0.525-2.275-4.2-4.2-4.2-6.563c0-2.363,3.762-4.375,4.2-6.563c0.525-2.275-2.012-5.688-0.962-7.788
                                                                                        c1.05-2.1,5.25-2.275,6.65-4.112c1.488-1.837,0.7-5.95,2.538-7.438s5.688,0.263,7.788-0.788c2.1-1.05,3.15-5.075,5.425-5.6
                                                                                        c2.275-0.525,4.988,2.713,7.35,2.713s5.075-3.15,7.35-2.713c2.275,0.525,3.413,4.55,5.426,5.6c2.1,1.05,5.949-0.7,7.787,0.788
                                                                                        s1.05,5.6,2.537,7.438c1.488,1.837,5.688,1.925,6.65,4.112c1.05,2.1-1.487,5.425-0.963,7.788
                                                                                        C126.813,31.237,130.487,33.163,130.487,35.525z"></path>
                                                                                    <circle fill="#9BB63C" cx="97.5" cy="35.525" r="25.113"></circle>
                                                                                </g>
                                                                                <g>
                                                                                    <path fill="#EB7B23" d="M91.55,33.6h-3.587c-0.175,0-0.35-0.175-0.35-0.35v-3.587c0-0.175,0.175-0.35,0.35-0.35h3.587
                                                                                        c0.175,0,0.35,0.175,0.35,0.35v3.587C91.987,33.425,91.813,33.6,91.55,33.6z"></path>
                                                                                    <path fill="#EB7B23" d="M96.975,33.6h-3.587c-0.175,0-0.35-0.175-0.35-0.35v-3.587c0-0.175,0.175-0.35,0.35-0.35h3.587
                                                                                        c0.175,0,0.35,0.175,0.35,0.35v3.587C97.413,33.425,97.237,33.6,96.975,33.6z"></path>
                                                                                </g>
                                                                                <g>
                                                                                    <g>
                                                                                        <rect x="81.575" y="23.013" fill="#FFFFFF" width="29.05" height="25.987"></rect>
                                                                                        <rect x="81.575" y="20.475" fill="#F9C213" width="29.05" height="7.438"></rect>
                                                                                    </g>
                                                                                    <g>
                                                                                        <rect x="87.438" y="18.987" fill="#E74324" width="2.45" height="5.863"></rect>
                                                                                        <rect x="104.412" y="18.987" fill="#E74324" width="2.45" height="5.863"></rect>
                                                                                    </g>
                                                                                    <g>
                                                                                        <g>
                                                                                            <path fill="#EB7B23" d="M101.088,30.362v3.588c0,0.175-0.176,0.35-0.351,0.35H97.15c-0.175,0-0.35-0.175-0.35-0.35v-3.588
                                                                                                c0-0.175,0.175-0.35,0.35-0.35h3.587C100.912,30.013,101.088,30.188,101.088,30.362z"></path>
                                                                                            <path fill="#E74324" d="M106.25,39.9h-3.588c-0.175,0-0.35-0.176-0.35-0.351v-3.587c0-0.176,0.175-0.351,0.35-0.351h3.588
                                                                                                c0.175,0,0.35,0.175,0.35,0.351v3.587C106.6,39.725,106.425,39.9,106.25,39.9z"></path>
                                                                                            <path fill="#EB7B23" d="M89.712,39.9h-3.587c-0.175,0-0.35-0.176-0.35-0.351v-3.587c0-0.176,0.175-0.351,0.35-0.351h3.587
                                                                                                c0.175,0,0.35,0.175,0.35,0.351v3.587C90.063,39.725,89.888,39.9,89.712,39.9z"></path>
                                                                                            <path fill="#EB7B23" d="M95.138,39.9H91.55c-0.175,0-0.35-0.176-0.35-0.351v-3.587c0-0.176,0.175-0.351,0.35-0.351h3.588
                                                                                                c0.175,0,0.35,0.175,0.35,0.351v3.587C95.487,39.725,95.313,39.9,95.138,39.9z"></path>
                                                                                            <path fill="#EB7B23" d="M100.65,39.9h-3.588c-0.175,0-0.35-0.176-0.35-0.351v-3.587c0-0.176,0.175-0.351,0.35-0.351h3.588
                                                                                                c0.175,0,0.35,0.175,0.35,0.351v3.587C101.088,39.725,100.912,39.9,100.65,39.9z"></path>
                                                                                            <path fill="#EB7B23" d="M95.487,30.362v3.588c0,0.175-0.175,0.35-0.35,0.35H91.55c-0.175,0-0.35-0.175-0.35-0.35v-3.588
                                                                                                c0-0.175,0.175-0.35,0.35-0.35h3.588C95.313,30.013,95.487,30.188,95.487,30.362z"></path>
                                                                                            <path fill="#E74324" d="M106.6,30.362v3.588c0,0.175-0.175,0.35-0.35,0.35h-3.588c-0.175,0-0.35-0.175-0.35-0.35v-3.588
                                                                                                c0-0.175,0.175-0.35,0.35-0.35h3.588C106.425,30.013,106.6,30.188,106.6,30.362z"></path>
                                                                                            <path fill="#EB7B23" d="M95.138,45.325H91.55c-0.175,0-0.35-0.175-0.35-0.351v-3.587c0-0.175,0.175-0.351,0.35-0.351h3.588
                                                                                                c0.175,0,0.35,0.176,0.35,0.351v3.587C95.487,45.15,95.313,45.325,95.138,45.325z"></path>
                                                                                            <path fill="#EB7B23" d="M100.65,45.325h-3.588c-0.175,0-0.35-0.175-0.35-0.351v-3.587c0-0.175,0.175-0.351,0.35-0.351h3.588
                                                                                                c0.175,0,0.35,0.176,0.35,0.351v3.587C101.088,45.15,100.912,45.325,100.65,45.325z"></path>
                                                                                            <path fill="#EB7B23" d="M89.712,45.325h-3.587c-0.175,0-0.35-0.175-0.35-0.351v-3.587c0-0.175,0.175-0.351,0.35-0.351h3.587
                                                                                                c0.175,0,0.35,0.176,0.35,0.351v3.587C90.063,45.15,89.888,45.325,89.712,45.325z"></path>
                                                                                        </g>
                                                                                        <path fill="#EB7B23" d="M90.15,30.362v3.588c0,0.175-0.175,0.35-0.35,0.35h-3.587c-0.175,0-0.35-0.175-0.35-0.35v-3.588
                                                                                            c0-0.175,0.175-0.35,0.35-0.35H89.8C89.975,29.925,90.15,30.1,90.15,30.362z"></path>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <p class="subject-title">HTML + CSS</p>
                                                                    <p>Основы веб-разработки</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
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
                                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                                    <div class="card-body">
                                                        <h3>Достижения</h3>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel" aria-labelledby="tabs-icons-text-5-tab">
                                                    <div class="card-body">
                                                        <h3>Домашние задания</h3>
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