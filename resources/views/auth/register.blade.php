<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap links -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap links -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

         <!-- Toastr -->
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- Styles --}}
        @vite(['resources/scss/app.scss'])

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

        {{-- Icon link --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

        <title>Register Page</title>

    </head>
    <body>
        <!-- Start Header Section -->
        <header></header>
        <!-- End Header Section -->

        <!-- Start Main Section -->
        <main>          
            <div class="register">
                <div class="register_content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center pt-5 pb-3">
                                <h2 class="heading-section">Register</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-8">
                                <form class="ps-3 pe-3 form"  name="myForm" id="register_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <input type="text" name="first_name" placeholder="First Name" id="first_name"  class="first_name form-control rounded-pill">
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="first_name_error"></small>
                                        </div>
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="last_name form-control  rounded-pill">
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="last_name_error"></small>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <select name="role" id="role" class="role form-control  rounded-pill">
                                                <option value="" disabled selected>Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="role_error"></small>
                                        </div>
                                       
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <input type="email" name="email" placeholder="E-mail" id="email" class="email form-control rounded-pill">
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="email_error"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <input type="password" name="password" placeholder="Password" id="my_password" minlength="6" class="password form-control  rounded-pill">
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="password_error"></small>
                                        </div>
                                        <div class="col-md-12 col-lg-6 pb-4">
                                            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" minlength="6" class="confirm_password form-control rounded-pill">
                                            <small class="text-danger m-0 p-0 mb-1 input-error" id="confirm_password_error"></small>
                                        </div>      
                                    </div>                                    
                                    <div class="d-flex justify-content-center pt-3 pb-3">
                                        <input type="submit" id="register" value="REGISTER" class="btn btn-primary rounded-pill">
                                    </div>                      
                                    <div class="d-flex justify-content-center pb-3">
                                        <a class="text-dark" href="/">Already Register</a>
                                    </div>
                                </form>
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

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        {{-- Toastr JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
            integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @vite(['resources/js/auth/register.js'])
    </body>
</html>

