<!-- Include Toastr CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        @if(session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif

        @if(session('info'))
            toastr.info('{{ session('info') }}');
        @endif

        @if(session('dismiss'))
            toastr.error('{{ session('dismiss') }}');
        @endif

        // Display validation errors
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
    });

    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "timeOut": "9000",
        "extendedTimeOut": "2000"
    };
</script>
