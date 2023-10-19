<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

         {{-- bootstrap css v5.2 --}}
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

         <!-- Toastr -->
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 
         {{-- Styles --}}
         @vite(['resources/scss/app.scss'])
 
         <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />


        <title>Forgot Password Page</title>

    </head>
    <body>
        <!-- Start Header Section -->
        <header></header>
        <!-- End Header Section -->

        <!-- Start Main Section -->
        <main>
            <div class="forgot_password">
                <div class="forgot_password_content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center pt-3 pb-3">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-6">
                                <div class="login-wrap p-0">
                                    <h3 class="pb-3 text-center text-success">You can reset your password here.</h3>
                                    <form class="ps-3 pe-3 form" method="post" action="/forgot-password" name="myForm" id="form">
                                        @csrf
                                        <div class="col-md-12 col-lg-12 pb-3">
                                            <input type="text" name="email" placeholder="E-mail" id="email" class="form-control @error('email') is-invalid @enderror rounded-pill">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 col-lg-12 pb-3">
                                            <input type="password" name="password" placeholder="New Password" id="my_password" class="form-control @error('password') is-invalid @enderror rounded-pill">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 col-lg-12 pb-3">
                                            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror rounded-pill">
                                            @if ($errors->has('confirm_password'))
                                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-center pt-3 pb-3">
                                            <input type="submit" value="RESET PASSWORD" class="btn btn-info forgot-password px-3">
                                        </div>
                                        <div class="d-flex justify-content-end pb-3">
                                            <a href="/">Back to Login?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End Main Section -->

        <!-- Start Footer Section -->
        <footer>

        </footer>
        <!-- End Footer Section -->

       {{-- jquery cdn  --}}
       <script src="https://code.jquery.com/jquery-3.6.3.min.js"
       integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

       {{-- bootstrap js v5.2  --}}
       <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

       {{-- Toastr JS --}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
           integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           
    </body>
</html>

