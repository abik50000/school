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
                            <h3 class="col-12 mb-0">Редактировать день</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('lessons.update', $lesson_info->id) }}" autocomplete="off">
                            <h6 class="heading-small text-muted mb-4">Информация об уроке</h6>
                            @csrf
                            @method('PATCH')

                            <div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-start">Начало</label>
                                            <div class="input-group date datepicker" id="datetimepicker3" data-target-input="nearest" data-type="time">
                                                <input class="form-control datetimepicker-input" type="text"  data-target="#datetimepicker3" placeholder="Время" id="input-start" name="start"  value="{{ $lesson_info->start }}">
                                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker" >
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-end">Конец</label>
                                            <div class="input-group date datepicker" id="datetimepicker3" data-target-input="nearest" data-type="time">
                                                <input class="form-control datetimepicker-input" type="text"  data-target="#datetimepicker3" placeholder="Время" id="input-end" name="end"  value="{{ $lesson_info->end }}">
                                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker" >
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-lesson_change">Смена</label>
                                            <select name="lesson_change" id="">
                                                <option value="1" @if($lesson_info->lesson_change == 1) selected @endif>1</option>
                                                <option value="2" @if($lesson_info->lesson_change == 2) selected @endif>2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-lesson_number">Номер урока</label>
                                            <select name="lesson_number" id="">
                                                <option value="1" @if($lesson_info->lesson_number == 1) selected @endif>1</option>
                                                <option value="2" @if($lesson_info->lesson_number == 2) selected @endif>2</option>
                                                <option value="3" @if($lesson_info->lesson_number == 3) selected @endif>3</option>
                                                <option value="4" @if($lesson_info->lesson_number == 4) selected @endif>4</option>
                                                <option value="5" @if($lesson_info->lesson_number == 5) selected @endif>5</option>
                                                <option value="6" @if($lesson_info->lesson_number == 6) selected @endif>6</option>
                                                <option value="7" @if($lesson_info->lesson_number == 7) selected @endif>7</option>
                                                <option value="8" @if($lesson_info->lesson_number == 8) selected @endif>8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="pl-lg-4">                      
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