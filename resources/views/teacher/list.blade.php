@extends('layouts.app')   
@section('content')

<div class="container-fluid pt-9">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="">
                              <h3 class="col-12 mb-0">Учители</h3>
                            </div>
                            <div class="">
                              <a href="{{ route('teachers.create') }}" class="btn btn-icon btn-3 btn-primary">
                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                <span class="btn-inner--text">Добавить</span>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
  <br>
   <div class="row">
        <div class="col-12">
          


<div class="table-responsive">
    <table class="table align-items-center">
    <thead class="thead-light">
        <tr>
           <th>Id</th>
           <th>Имя</th>
           <th>Фамилия</th>
           <th>Логин</th>
           <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <th scope="row">
                {{ $teacher->id }}
            </th>
           <td>{{ $teacher->firstname }}</td>
           <td>{{ $teacher->lastname }}</td>
           <td>{{ date('Y-m-d', strtotime($teacher->created_at)) }}</td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="{{ route('teachers.edit',$teacher->id)}}" class="dropdown-item">Редактировать</a>
                        <form action="{{ route('teachers.destroy', $teacher->id)}}" method="post">
                          {{ csrf_field() }}
                          @method('DELETE')
                          <button type="submit" class="dropdown-item">Удалить</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

         
          {!! $teachers->links() !!}
       </div> 
   </div>
                    </div>
                </div>
            </div>
        </div>
        
  
</div>




 @endsection  