<!-- Vendor Js -->
<script src="{{ asset('enduser/theviet/js/vendors.js') }}"></script>
<!-- /Vendor js -->

<!-- Plugins Js -->
<script src="{{ asset('enduser/theviet/js/plugins.js') }}"></script>
<!-- /Plugins Js -->
<!-- Main JS -->
<script src="{{ asset('enduser/theviet/js/main.js') }}"></script>
<!-- /Main JS -->
<script>



     var myModal = new bootstrap.Modal(document.getElementById('modalAutoShow'), {
         keyboard: false
     });
     setTimeout(function () {
         myModal.show();
     }, 3000);

    $(document).ready(function () {

        let buttonSubmit = $('.btn-popupShow');
        let modalShow = $('#modalAutoShow');
        buttonSubmit.on('click', function (e) {
            console.log('e', e);
            e.preventDefault();
            $.ajax({
                url: "{{route('ajaxPopupInterval')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "name": modalShow.find('.name').val(),
                    "phone": modalShow.find('.phone').val(),
                    "email": modalShow.find('.email').val(),
                    "address": modalShow.find('.address').val(),
                    // "content": modalShow.find('.content').val()
                },
                beforeSend: function () {
                    modalShow.find('.btn-popupShow').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>`);
                },
                success: function (response) {
                    if (response.success == true) {
                        modalShow.find('.btn-popupShow').html('Send message');
                        modalShow.find('.success').html(`<p class="alert-success p-10 mt-5">Gửi thông tin thành công !!</p>`);
                        resetForm();
                    }
                }
            });

        });

        function resetForm() {
            modalShow.find('.name').val('');
            modalShow.find('.phone').val('');
            modalShow.find('.email').val('');
            modalShow.find('.address').val('');
        }

        $("#modalAutoShow").on('hidden.bs.modal', function (e) {
            $(this).find('.success').html('')
        });

    });

    var videoSrc;
    $('.video-btn').click(function () {
        videoSrc = $(this).data("src");
    });
    $('#modalShowVideo').on('shown.bs.modal', function (e) {
        $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        $("#video").attr('width', '100%');
        $("#video").attr('height', '500px');
    })
    $('#modalShowVideo').on('hide.bs.modal', function (e) {
        $("#video").attr('src', videoSrc);
    })



</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages = document.querySelectorAll("img.lazy");
        var lazyloadThrottleTimeout;

        function lazyload () {
            if(lazyloadThrottleTimeout) {
                clearTimeout(lazyloadThrottleTimeout);
            }

            lazyloadThrottleTimeout = setTimeout(function() {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function(img) {
                    if(img.offsetTop < (window.innerHeight + scrollTop)) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    }
                });
                if(lazyloadImages.length == 0) {
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }

        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    });
</script>
@yield('script')

