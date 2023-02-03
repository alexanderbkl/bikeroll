

@if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">

        {{ session('status') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
