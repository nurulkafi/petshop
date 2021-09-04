<script src="{{ asset('admin/assets/vendors/toastify/toastify.js') }}"></script>
<script src="{{ asset('admin/assets/js/extensions/toastify.js') }}"></script>
@if (Session::has('success'))
<script>
    Toastify({
        text: "{{ Session::get('success') }}",
        duration: 3000,
        close:true,
        gravity:"bottom",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
</script>
@endif
@if (Session::has('failed'))
<script>
    Toastify({
        text: "{{ Session::get('failed') }}",
        duration: 3000,
        close:true,
        gravity:"bottom",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
</script>
@endif
