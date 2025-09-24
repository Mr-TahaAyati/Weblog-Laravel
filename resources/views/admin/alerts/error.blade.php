@if (session('alert-error'))
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-slash-circle"></i>
         {{ session('alert-error') }}
    </div>
@endif
