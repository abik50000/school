@extends('layouts.app')   
@section('content')

<style>
.mark-btn {
    padding: 0.3rem 0.75rem;
    border-radius: 0;
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

<div class="container-fluid pt-9">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="">
                              <h3 class="col-12 mb-0">Все уведомления ({{ $notifications->count() }})</h3>
                            </div>
            
                          
                        </div>
                    </div>
                    <div class="card-body">
                    <br>
                     <div class="row">
                          <div class="col-12">
                            
                            @foreach($notifications as $note)
                                <p class="notification" style="color: #000"><span></span> <b>{{ $note->created_at }}</b> : {{ $note->text }}</p>
                            @endforeach


                          
                         </div> 
                     </div>
                    </div>
                </div>
            </div>
        </div>
        
  
</div>


@endsection  