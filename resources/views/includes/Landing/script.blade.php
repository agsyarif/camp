<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js') }}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js') }}"></script>
<script src="{{ asset('/js/toggleModal.js') }}"></script>
{{-- <script src="{{ asset('/js/bootstrap.min.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $(".modal").on('click', ':not(.relative)', function(e) {
            e.stopPropagation();
        });
        $("#loginModal").on('click', function(e) {
            toggleModal('loginModal');
        });
        $("#registerModal").on('click', function(e) {
            toggleModal('registerModal');
        });
    });
</script>
