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

        {{-- Icon link --}}
        {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> --}}

        <title>Login Page</title>

    </head>
    <body>
        <!-- Start Header Section -->
        <header></header>
        <!-- End Header Section -->

        <!-- Start Main Section -->
        <main>
            <div class="login">
                <div class="login_content">
                    <div class="container">
                            <div class="row justify-content-center pt-5">
                                <div class="col-md-6 text-center pt-5 pb-3">
                                    <h2 class="heading-section">Login</h2>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-6">
                                    <div class="login-wrap p-0">
                                        <form class="ps-3 pe-3 form" name="myForm" id="form">
                                            @csrf
                                            <div class="col-md-12 col-lg-12 pb-3">
                                                <input type="text" name="email" placeholder="E-mail" id="email" value="" class="form-control rounded-pill">
                                            </div>
                                            <div class="col-md-12 col-lg-12 pb-3">
                                                <input type="password" name="password" placeholder="Password" id="password" @error('password') is-invalid @enderror value="" class="form-control rounded-pill">
                                            </div>
                                            <div class="d-flex justify-content-center pt-3 pb-3">
                                                <input type="submit" value="SIGN IN" id="login_user" class="btn btn-success submit px-3">
                                            </div>
                                            <div class="d-flex justify-content-between pb-3">
                                                <a class="text-dark" href="/register">Register</a>
                                                <a class="text-dark" href="/forgot-password">Forgot Password?</a>
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

        @vite(['resources/js/auth/register.js'])
        
    </body>
</html>

