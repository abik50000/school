@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header bg-transparent mb-3">
                        <div class="row align-items-center">
                            <div class="col col-xl-4">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Сегодня</h6>
                                <h2 class="mb-0">{{ date('d.m.Y') }}</h2>
                            </div> 
                            <div class="col col-xl-8">
                                <h2>Ваши дети</h2>
                                @foreach($children as $child) 
                                    <a href="{{ $child->user() }}">{{ $child->firstname }} {{ $child->lastname }}</a><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush