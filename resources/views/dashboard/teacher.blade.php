@extends('layouts.app')
@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent mb-3">
                        <div class="row align-items-center">
                            <div class="col col-xl-4">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Сегодня запланировано</h6>
                                <h2 class="text-white mb-0">{{ date('d.m.Y') }}</h2>
                            </div>
                            <div class="col col-xl-8">
                                <table class="table align-items-center white-bg">
                                    <thead class="thead-light">
                                        <tr>
                                           <th>#</th>
                                           <th>Время</th>
                                           <th>Класс</th>
                                           <th>Кабинет</th>
                                           <th>Предмет</th>
                                           <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($timetables as $timetable)
                                        <tr>
                                            <th scope="row">{{ $timetable->id }}</th>
                                            <td>{{ $timetable->lesson->start }} - {{ $timetable->lesson->end }}</td>
                                            <td>{{ $timetable->grade->grade }} {{ $timetable->grade->name }}</td>
                                            <td>{{ $timetable->cabinet->cabinet }}</td>
                                            <td>{{ $timetable->subject->name }}</td>
                                            <td class="text-right"><a href="{{ route('journal', $timetable->id) }}" class="btn btn-primary"><i class="ni ni-calendar-grid-58"></i></a></td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                </table>
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