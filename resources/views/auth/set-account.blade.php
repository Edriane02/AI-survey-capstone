<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Account Setup | DCISM Evaluation Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/dcismicon.png')}}">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css')}}" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css -->
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom-style.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            background: rgb(26, 71, 214);
            background: linear-gradient(90deg, rgba(26, 71, 214, 0.6) 0%, rgba(25, 199, 131, 0.6) 72%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .animated-background {
            background: linear-gradient(270deg, rgba(26, 71, 214, 0.5), rgba(25, 199, 131, 0.5));
            background-size: 400% 400%;

            -webkit-animation: AnimatedBg 10s ease infinite;
            -moz-animation: AnimatedBg 10s ease infinite;
            animation: AnimatedBg 10s ease infinite;
        }

            @-webkit-keyframes AnimatedBg {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @-moz-keyframes AnimatedBg {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @keyframes AnimatedBg {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }

        .set-pass-card {
            max-width: 500px;
            margin: 0 auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 50px;
        }

        .form {
            width: auto;
            padding: 0 1rem;
            box-sizing: border-box;
        }

        .btn-set-pass {
            background-color: #0b1175;
            color: #FFFFFF;
        }

        .btn-set-pass:hover {
            background-color: #0e4707;
            color: #FFFFFF;
        }

        .btn-set-pass:active {
            background-color: #0e4707 !important;
            color: #FFFFFF !important;
        }

        .text-welcome {
            /* color: #0e4707; */
            font-weight: 700;
        }

        .progress-step {
            width: 2rem;
            height: 2rem;
            background: #ccc;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-weight: bold;
        }

        .progress-step.active {
            background: #0b1175;
        }

        .progress-step.completed {
            background: #19c783;
        }

        @media (max-width: 768px) {
            .set-pass-card {
                border-radius: 15px;
            }
        }
    </style>
</head>

<body class="animated-background">
    <div class="container-fluid col-lg-5 bg-white set-pass-card">
        <div class="mb-4 text-center">
            <a href="{{ route('login') }}" class="d-block auth-logo">
                <img src="{{ asset('assets/images/dcismicon.png')}}" alt="" width="130">
            </a>
        </div>

        <div class="set-account-content my-auto">
            <div class="text-center">
                <h3 class="mt-2 fw-bold">Welcome to DCISM Evaluation Portal!</h3>
            </div>

            <!-- Progress Steps -->
            <div class="position-relative m-4 d-flex justify-content-between align-items-center">
                <div id="step1-indicator" class="progress-step active">1</div>
                <div class="flex-grow-1 mx-2">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
                    </div>
                </div>
                <div id="step2-indicator" class="progress-step">2</div>
            </div>

            <div class="form-container" id="formContainer">
                <!-- Step 1 -->
                <div class="form" id="form1">
                    <div class="text-center">
                        <h4>Set Your Account Password</h4>
                    </div>
                    <form id="passwordForm" class="pt-2" method="POST" action="{{ route('auth.save-password', ['email' => $user->email]) }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ request('token') }}">

                        <div class="mb-3">
                            <label class="form-label">Set New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" id="new-password">
                                <button class="btn btn-light" type="button" onclick="togglePassword('new-password')"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="confirm-password">
                                <button class="btn btn-light" type="button" onclick="togglePassword('confirm-password')"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form" id="form2" style="display: none;">
                    <div class="text-center">
                        <h4>Upload Required Documents</h4>
                    </div>
                    <form id="uploadForm" action="#" class="dropzone">
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                            </div>
                            <h5>Drop files here or click to upload.</h5>
                        </div>
                    </form>
                </div>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button id="backButton" class="btn btn-secondary w-25" type="button" style="display:none;">Back</button>
                    <button id="nextButton" class="btn btn-set-pass w-25" type="button">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form1 = document.getElementById('form1');
            const form2 = document.getElementById('form2');
            const backButton = document.getElementById('backButton');
            const nextButton = document.getElementById('nextButton');
            const progressBar = document.querySelector('.progress-bar');
            const step1 = document.getElementById('step1-indicator');
            const step2 = document.getElementById('step2-indicator');

            let currentStep = 1;

            nextButton.addEventListener('click', function () {
                if (currentStep === 1) {
                    const password = document.getElementById('new-password').value;
                    const confirmPassword = document.getElementById('confirm-password').value;
                    const token = document.querySelector('[name="token"]').value;

                    if (password !== confirmPassword || password.length < 8) {
                        Swal.fire('Error', 'Passwords must match and be at least 8 characters.', 'error');
                        return;
                    }

                    $.ajax({
                        url: $('#passwordForm').attr('action'),
                        method: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            password: password,
                            password_confirmation: confirmPassword,
                            token: token
                        },
                        success: function () {
                            // Move to Step 2
                            form1.style.display = 'none';
                            form2.style.display = 'block';
                            backButton.style.display = 'inline-block';
                            nextButton.textContent = 'Submit';
                            progressBar.style.width = '100%';
                            step1.classList.remove('active');
                            step1.classList.add('completed');
                            step2.classList.add('active');
                            currentStep = 2;
                        },
                        error: function (xhr) {
                            Swal.fire('Error', xhr.responseJSON.error || 'Failed to save password.', 'error');
                        }
                    });
                } else if (currentStep === 2) {
                    Swal.fire('Success', 'Study load uploaded successfully!', 'success').then(() => {
                        window.location.href = "{{ route('login') }}";
                    });
                }
            });

            backButton.addEventListener('click', function () {
                if (currentStep === 2) {
                    form1.style.display = 'block';
                    form2.style.display = 'none';
                    backButton.style.display = 'none';
                    nextButton.textContent = 'Next';
                    progressBar.style.width = '50%';
                    step2.classList.remove('active');
                    step1.classList.add('active');
                    currentStep = 1;
                }
            });

            // Dropzone
            Dropzone.autoDiscover = false;
            new Dropzone('#uploadForm', {
                paramName: "file",
                maxFiles: 1,
                acceptedFiles: ".pdf,.jpg,.jpeg,.png",
                init: function () {
                    this.on("success", function () {
                        Swal.fire('Success', 'File uploaded successfully!', 'success');
                    });
                    this.on("error", function (file, response) {
                        Swal.fire('Error', response.error || 'Upload failed.', 'error');
                    });
                }
            });
        });
    </script>
</body>

</html>