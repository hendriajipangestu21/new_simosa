<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/isotope/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets_style/assets_depan/lib/lightbox/js/lightbox.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url() ?>assets_style/assets_depan/js/main.js"></script>

<script>
$(document).ready(function () {
    var num = 30; //number of pixels before modifying styles

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > num) {
            $('.navigasi').addClass('sticky-top');
        } else {
            $('.navigasi').removeClass('sticky-top');
        }
    });
});
</script>