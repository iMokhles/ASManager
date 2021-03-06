        <!-- Toastr js -->
        <script src="{{ asset(config('web_config.theme_name')) }}/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
        <script src="{{ asset(config('web_config.theme_name')) }}/assets/pages/jquery.toastr.js" type="text/javascript"></script>


{{-- Bootstrap Notifications using Prologue Alerts --}}
<script type="text/javascript">
    jQuery(document).ready(function($) {

        @foreach (Alert::getMessages() as $type => $messages)
        @foreach ($messages as $message)

        $.toast({
                heading: '',
                text: "{!! str_replace('"', "'", $message) !!}",
                position: 'top-right',
                loaderBg: '#ffffff',
                icon: "{{ $type }}",
                hideAfter: 3000,
                stack: 1
            });

        @endforeach
        @endforeach
    });
</script>