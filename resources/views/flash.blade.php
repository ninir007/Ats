@if( session()->has('flash_message') )
<script type="text/javascript">

    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };

        toastr.{{ session('flash_message.level') }}("{{ session('flash_message.message') }}", "{{ session('flash_message.title') }}" );

    }, 1000);

</script>
@endif