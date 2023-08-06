<div class="container my-5">
    <div class="p-2 text-center bg-body-tertiary rounded-3">
        <img src="{{asset('assets/img/02.png')}}" alt="" width="150" height="150">
        <h3 class="text-body-emphasis">{{$control->title_message}}</h3>
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            {{$control->message}}
        </p>
        <div class="d-inline-flex gap-2 mb-5">
            <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
               <i class="bi bi-hourglass-split bi flex-shrink-0 me-2" role="img" aria-label="primary:"></i> En cours...
            </button>
        </div>
    </div>
</div>