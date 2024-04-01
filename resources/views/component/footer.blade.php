<footer class="py-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
            <p class="mb-0 fs-7 text-secondary">
                &copy; Blogku <br>
                Andre Apriyana
            </p>
            <a href="https://maxy.academy/" class="mb-0 fs-7 link">
                Maxy Academy
            </a>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#body').summernote({
            height: 400,
            tabsize: 5
        });
    });
</script>
</body>
</html>
