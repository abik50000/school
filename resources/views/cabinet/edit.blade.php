@extends('layouts.app')
 
@section('content')


<div class="container-fluid pt-9">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="http://localhost:8000/argon/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                Администратор<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                            <hr class="my-4">
                            <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                            <a href="#">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Редактировать кабинет</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cabinets.update', $cabinet_info->id) }}" autocomplete="off">
                            <h6 class="heading-small text-muted mb-4">Информация о кабинете</h6>
                            @csrf
                            @method('PATCH')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-cabinet">Имя</label>
                                    <input type="text" name="cabinet" id="input-cabinet" class="form-control form-control-alternative" placeholder="Имя" value="{{ $cabinet_info->cabinet }}" required="" autofocus="">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Сохранить</button>
                                </div>
                            </div>
                        </form>
                       <!--  <hr class="my-4"> -->

                    </div>
                </div>
            </div>
        </div>
        
  
</div>







@endsection