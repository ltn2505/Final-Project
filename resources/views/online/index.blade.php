<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>University of Greenwich</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{ asset('img/logo.jpg') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib2/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib2/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib2/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css2/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css2/style2.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex" style="background-color:#2d3791 !important;">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <a href="#home" id="home">
                    <img style="height: 80px;" src="{{ asset('img/logo_GW_1.png') }}" />
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>160 Street 30/4, Ninh Kieu District,
                        Can Tho City</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>greenwich@gmail.com</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>0292.730.0068</small>
                    <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    @if (Session::has('notification'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('notification') }}
            <button style="float: right; border:none; background:none;" type="button" class="close"
                data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="index.html" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">UoG</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="#register" class="btn btn-primary rounded-pill py-2 px-3">Register Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/gw4.jpg') }} " style="height:750px" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Welcome to
                                        <strong>University of Greenwich</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-4 animated slideInRight">Become <br>a global
                                        citizen</h1>
                                    <a href="#register"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Register
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/gw5.jpg') }}" style="height:750px" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInLeft">Welcome to
                                        <strong>University of Greenwich</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-5 animated slideInLeft">Experience the
                                        international environment</h1>
                                    <a href="#register"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Register
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <div class="mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{ asset('img/graduated.png') }}" alt="Icon">
                        </div>
                        <h5 class="mb-3">Become an international standard student</h5>
                        <p class="mb-0">Vietnam is an international joint program between the University of
                            Greenwich, UK and FPT University since 2009 with more than 20,000 students from 12 countries
                            around the world who have been studying...</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{ asset('img/cash.png') }}" alt="Icon">
                        </div>
                        <h5 class="mb-3">Offer and scholarships up to 100% of tuition fees</h5>
                        <p class="mb-0">The scholarship fund in 2023 is worth 96 billion VND to support candidates on
                            the path to pursue their dreams
                            Offers and scholarships up to 100% of tuition fees</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="{{ asset('img/certificate.png') }}" alt="Icon">
                        </div>
                        <h5 class="mb-3">International Degree</h5>
                        <p class="mb-0">Graduates receive a bachelor's degree from the University of Greenwich (UK)
                            of universal value.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- About Start -->
    <div class="container-xxl about my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/cRXQa4K6GWY" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5" id="about">
                        <p class="fs-5 fw-medium text-primary">About Us</p>
                        <h1 class="display-6 mb-4">GREENWICH VIETNAM</h1>
                        <p class="mb-4">Greenwich Vietnam is an international joint program between the University of
                            Greenwich, UK and FPT University since 2009 with more than 20,000 students from 12 countries
                            around the world studying. The training content, lecturers and facilities are evaluated and
                            recognized for quality by experts from the University of Greenwich, UK.<br>
                            Graduates will receive a Bachelor's degree (Bachelor's Degree) from the University of
                            Greenwich, UK, which is globally valid. With this degree, students can continue their
                            studies to Master's and Doctoral degrees in many countries around the world.</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="#register">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">University of Greenwich</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cRXQa4K6GWY"
                            id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" id="register">
                    <p class="fs-5 fw-medium text-primary">Get Help</p>
                    <h1 class="display-5 mb-4">Need Our Help? We're Here!</h1>
                    <p>Greenwich Vietnam is an international joint program between the University of Greenwich,
                        UK and FPT University since 2009 with more than 20,000 students from 12 countries around the
                        world who have been studying...
                    </p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary"
                        href="tel:02927300068">
                        <span class="btn-lg-square bg-primary" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </span>
                        <span class="fs-5 fw-medium mx-4">0292.730.0068</span>
                    </a>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="mb-4">Free Register</h2>
                    <form method="POST" action="{{ route('online.store') }}">
                        @csrf
                        <input type="text" name="user_id" class="form-control" id="inputCity" placeholder=""
                            value="1" hidden>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="student_name" type="text" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select name="gender" class="form-select" id="service" required>
                                        <option selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="service">Choose Gender</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="mobile" type="text" class="form-control" id="mobile"
                                        placeholder="Your Mobile" required>
                                    <label for="mobile">Your Mobile</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="email" type="email" class="form-control" id="mail"
                                        placeholder="Your Email" required>
                                    <label for="mail">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="school_name" type="text" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                    <label for="name">Your High School</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="address" type="text" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                    <label for="name">Your Province/ City</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select name="specialized_register" class="form-select" id="service" required>
                                        <option selected>Major</option>
                                        <option value="IT">Information Technology</option>
                                        <option value="GD">Graphic Design</option>
                                        <option value="BM">Business Management</option>
                                        <option value="EM">Event Management</option>
                                        <option value="MM">Media Management</option>
                                        <option value="MKT">Marketing Manager</option>
                                    </select>
                                    <label for="service">Choose Major</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select" name="recruitment_method" id="" required>
                                        <option value="Choose Method">Choose Method</option>
                                        <option value="Grade point average 11">Grade point 11</option>
                                        <option value="Grade point average 12">Grade point 12</option>
                                        <option value="Graduation exam score">Graduation exam score</option>
                                    </select>
                                    <label for="service">Recruitment Method</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="exam_block" type="text" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                    <label for="name">Exam Block</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="recruitment_points" type="text" class="form-control"
                                        id="name" placeholder="Your Name" required>
                                    <label for="name">Recruitment Points</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input name="description" type="text" class="form-control" id="mail"
                                        placeholder="Your Email" required>
                                    <label for="question">Other Question</label>
                                </div>
                            </div>
                            <input type="text" name="status" class="form-control" value="Online" hidden>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Now</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Quote Start -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6" id="contact">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>160 Street 30/4, Ninh Kieu District, Can Tho City                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0292.730.0068</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>greenwich@gmail.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Multi - Campus</h4>
                    <p class="mb-1">Ha Noi</p>
                    <h6 class="text-light">GOLDEN PARK Building - No.2 Pham Van Bach - Yen Hoa - Cau Giay</h6>
                    <p class="mb-1">Da Nang</p>
                    <h6 class="text-light">658 Ngo Quyen - Son Tra District - Da Nang City</h6>
                    <p class="mb-1">Ho Chi Minh</p>
                    <h6 class="text-light">20 Cong Hoa Street – Ward 12 – Tan Binh District</h6>
                    <p class="mb-1">Can Tho</p>
                    <h6 class="text-light">160 Street 30/4 - Ninh Kieu District - Can Tho City</h6>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Operation Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid pt-2 px-2">
        <div class="bg-light rounded-top p-2">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; Student addmission management system of UoG-CanTho
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    Designed By <a href="https://www.facebook.com/profile.php?id=100005592406638">Thanh Nhan Le -
                        001272787</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib2/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib2/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib2/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib2/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib2/lightbox/js/lightbox.min.js') }}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js2/main.js') }}"></script>
</body>

</html>
