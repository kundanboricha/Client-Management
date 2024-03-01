<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div
            class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by <a>Kundan</a>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>



<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>

<script src="{{ asset('vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>


<!-- Page JS -->
</body>

</html>


<script>
function copyToClipboard(text) {
var input = document.createElement('input');
input.setAttribute('value', text);
document.body.appendChild(input);
input.select();
document.execCommand('copy');
document.body.removeChild(input);
alert('Address copied to clipboard');
}
</script>
