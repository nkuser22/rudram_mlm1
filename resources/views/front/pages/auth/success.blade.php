@include('front/pages/header')



<!-- Success Section Start -->
<section class="success-section section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 text-center">
                <div class="success-box">
                    <!-- Animated Success Icon -->
                    <div class="success-icon mb-4">
                        <img src="{{ asset('front/f1/images/icon/successicon.gif') }}" class="img-fluid" alt="Success Icon">
                    </div>

                    <h3 class="mb-3">Account Created Successfully!</h3>
                    <p class="mb-4">
                        Your account has been created successfully. Below are your credentials:
                    </p>

                    <!-- Credentials Section -->
                    <div class="credentials-box mb-4">
                        <div class="form-group">
                            <label for="username">Email Address:</label>
                            <div class="input-group">
                                <input type="text" id="username" value="{{ session('username') }}" class="form-control" readonly>
                                <button class="btn btn-outline-primary copy-btn" onclick="copyToClipboard('username')">
                                    <i class="fa-solid fa-copy"></i> 
                                </button>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="text" id="password" value="{{ session('password') }}" class="form-control" readonly>
                                <button class="btn btn-outline-primary copy-btn" onclick="copyToClipboard('password')">
                                    <i class="fa-solid fa-copy"></i> 
                                </button>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('login') }}" class="btn btn-danger btn-lg">
                        <i class="fa-solid fa-arrow-right"></i> Go to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Success Section End -->

@include('front/pages/footer')

<!-- JavaScript for Copy to Clipboard -->
<script>
    function copyToClipboard(id) {
        var copyText = document.getElementById(id);
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(copyText.value).then(function() {
            alert("Copied: " + copyText.value);
        }).catch(function(err) {
            alert("Failed to copy!");
        });
    }
</script>

<style>
    .success-section {
        background: #f8f9fa;
        padding: 60px 20px;
    }

    .success-box {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .success-icon img {
        width: 100px;
        height: auto;
    }

    .credentials-box {
        text-align: left;
    }

    .form-group label {
        font-weight: bold;
    }

    .input-group {
        display: flex;
    }

    .copy-btn {
        margin-left: 10px;
    }
</style>
