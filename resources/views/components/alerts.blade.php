<div id="toastsContainerTopRight" class="toasts-top-right fixed">
    @if ($message = Session::get('warning'))
    <div class="toast bg-warning fade show" role="alert" aria-live="assertive" aria-atomic="true" id="warning-toast">
        <div class="toast-header">
            <strong class="mr-auto">Aviso!</strong>
            <button onclick="$('#warning-toast').hide()" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">{{$message}}</div>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true" id="danger-toast">
        <div class="toast-header">
            <strong class="mr-auto">Erro!</strong>
            <button onclick="$('#danger-toast').hide()" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">{{$message}}</div>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true" id="success-toast">
        <div class="toast-header">
            <strong class="mr-auto">Sucesso!</strong>
            <button onclick="$('#success-toast').hide()" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">{{$message}}</div>
    </div>
    @endif
</div>

@push('scripts')
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
@endpush
