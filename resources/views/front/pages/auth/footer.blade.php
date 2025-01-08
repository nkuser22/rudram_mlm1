	<!-- Bootstrap JS -->
	<script src="{{asset('user/u1/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('user/u1/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('user/u1/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('user/u1/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('user/u1/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});

		$(document).ready(function () {
			$("#show_hide_password1 a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password1 input').attr("type") == "text") {
					$('#show_hide_password1 input').attr('type', 'password');
					$('#show_hide_password1 i').addClass("bx-hide");
					$('#show_hide_password1 i').removeClass("bx-show");
				} else if ($('#show_hide_password1 input').attr("type") == "password") {
					$('#show_hide_password1 input').attr('type', 'text');
					$('#show_hide_password1 i').removeClass("bx-hide");
					$('#show_hide_password1 i').addClass("bx-show");
				}
			});
		});

$('.check_sponsor_exist').change(function (e) { 
    var ths = $(this);
    var res_area = $(ths).attr('data-response');
    var sponsor = $(this).val();        
	
    $.ajax({
        type: "POST",
        url: "/register/check-sponsor-exist", // Laravel route URL
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
            u_sponsor: sponsor
        },          
        success: function (response) {   
			

            if (response.error === true) {

				
                $('#' + res_area).html(response.msg).css('color', 'red');              
            } else {
                $('#' + res_area).html(response.msg).css('color', 'green');              
            }
        }
    });
});

	</script>
	<!--app JS-->
	<script src="{{asset('user/u1/assets/js/app.js')}}"></script>
</body>



</html>