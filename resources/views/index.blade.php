<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>IMCS-Alumni Managment System </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>

<body>


    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p class="fs-6">Welcome To Alumni Management System Of <em>University of Sindh.</em></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                            <li><a class="btn btn-outline-secondary rounded-circle  border border-white me-3"
                                    href="#"><i class="fa fa-facebook "></i></a></li>
                            <li><a class="btn btn-outline-secondary rounded-circle  border border-white me-3"
                                    href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="btn btn-outline-secondary rounded-circle  border border-white me-3"
                                    href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="btn btn-outline-secondary rounded-circle  border border-white me-3"
                                    href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo fst-italic">
                            U-SINDH Alumni
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            {{-- add hover able square borders using bootstrap on  each and every existing  button  below # --}}

                            <li class="scroll-to-section"><a href="{{ route('index') }}" class="active ">Home</a>
                            </li>
                            <li><a class=" " href="{{ route('meetings') }}">Meetings</a></li>
                            <li class="scroll-to-section"><a href="#apply">Our Network</a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu" style="border-radius: 20px;">
                                    {{-- <li><a href="Meeting">Upcoming Meetings
                                        </a></li> --}}
                                    <li><a href="{{ route('meeting.details') }}">Meeting Details</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>

                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            {{-- <li class="scroll-to-section"><a href=" {{ url('/register') }}">Register </a></li> --}}
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!--*****Menu End*****-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--*****Header Area End*****-->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="images/imcs.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            {{-- <h6>Hello Students</h6> --}}
                            <h3 class="fst-italic text-white text-center "> Welcome U-SINDH Alumni
                            </h3>
                            <p>We are proud of our alumni community that continues to inspire, lead, and make an impact
                                across diverse fields. This platform is dedicated to keeping you connected with IMCS,
                                fostering lifelong relationships, and creating opportunities to grow, collaborate, and
                                give back.</p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="">Join Us Now!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">

                        <div class="item">
                            <div class="icon">
                                {{-- first image --}}
                                <img src="images/CS.jpeg"
                                    alt=""class=" card-img-top card-img-top     rounded-circle">
                            </div>
                            <div class="down-content">
                                <h4 class="card-title">INSTITUTE OF MATHEMATICS & COMPUTER SCIENCE</h4>
                                <p class="card-text">Focuses on algorithms, programming, and computer systems for
                                    problem-solving and innovation.</p>

                            </div>
                        </div>

                        {{-- 2nd image --}}

                        <div class="item">
                            <div class="icon">
                                <img src="images/SE.jpeg"
                                    alt=""class=" card-img-top card-img-top rounded-circle">
                            </div>
                            <div class="down-content">
                                <h4 class="card-title text-uppercase">Software Engineering</h4>
                                <p class="card-text">Specializes in software design, development, testing, and
                                    maintenance to build reliable systems.</p>

                            </div>
                        </div>

                        {{-- 3rd image --}}
                        <div class="item">
                            <div class="icon">
                                <img src="images/IT.png" alt=""class=" card-img-top rounded-circle">
                            </div>
                            <div class="down-content">
                                <h4 class="card-title text-uppercase">Information Technology</h4>
                                <p class="card-text">Covers IT infrastructure, databases, and enterprise systems to
                                    support organizations digitally.</p>

                            </div>
                        </div>
                        {{-- 4th image --}}
                        <div class="item">
                            <div class="icon">
                                <img src="images/DS.png" alt=""class=" card-img-top rounded-circle">
                            </div>
                            <div class="down-content">
                                <h4 class="card-title text-uppercase">Data Science</h4>
                                <p class="card-text">Focuses on data analysis, visualization, and machine learning to
                                    extract meaningful insights.</p>

                            </div>
                        </div>

                        {{-- 5th image --}}
                        <div class="item">
                            <div class="icon">
                                <img src="images/AI.jpeg" alt=""class=" card-img-top rounded-circle">
                            </div>
                            <div class="down-content">
                                <h4 class="card-title text-uppercase">Artificial Intelligence</h4>
                                <p class="card-text">Explores intelligent systems, neural networks, and automation
                                    inspired by human intelligence.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Upcoming Department</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories">
                        <h4>Meeting Catgories</h4>
                        <ul>
                            <li><a href="#">Sed tempus enim leo</a></li>
                            <li><a href="#">Aenean molestie quis</a></li>
                            <li><a href="#">Cras et metus vestibulum</a></li>
                            <li><a href="#">Nam et condimentum</a></li>
                            <li><a href="#">Phasellus nec sapien</a></li>
                        </ul>
                        <div class="main-button-red">
                            <a href="meetings.html">All Upcoming categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>00</span>
                                    </div>
                                    <a href="meeting-details.html"><img src="images/meeting-01.jpg" alt="Nclass="
                                            card-img-top rounded-circle" ew Lecturer Meeting"></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>Nov <span>10</span></h6>
                                    </div>
                                    <a href="meeting-details.html">
                                        <h4>New Lecturers Meeting</h4>
                                    </a>
                                    <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>00</span>
                                    </div>
                                    <a href="meeting-details.html"><img src="images/meeting-02.jpg"
                                            alt="Online Teaching"></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>Nov <span>24</span></h6>
                                    </div>
                                    <a href="meeting-details.html">
                                        <h4>Online Teaching Techniques</h4>
                                    </a>
                                    <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>00</span>
                                    </div>
                                    <a href="meeting-details.html"><img src="images/meeting-03.jpg"
                                            alt="Higher Education"></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>Nov <span>26</span></h6>
                                    </div>
                                    <a href="meeting-details.html">
                                        <h4>Higher Education Conference</h4>
                                    </a>
                                    <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>00</span>
                                    </div>
                                    <a href="meeting-details.html"><img src="images/meeting-04.jpg"
                                            alt="Student Training"></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>Nov <span>30</span></h6>
                                    </div>
                                    <a href="meeting-details.html">
                                        <h4>Student Training Meetup</h4>
                                    </a>
                                    <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="apply-now" id="apply">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item">
                                <h3>ALUMNI NETWORK</h3>
                                <p>Connect with fellow alumni through our dedicated network, fostering lifelong
                                    relationships and professional growth.</p>
                                <div class="main-button-red">
                                    <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item">
                                <h3>CAREER SERVICES</h3>
                                <p>Access career resources, job boards, and mentorship programs to support your
                                    professional journey.</p>
                                <div class="main-button-yellow">
                                    <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordions is-first-expanded">
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>ALUMNI EVENTS</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Participate in exclusive alumni events, reunions, and networking opportunities to
                                        stay connected with your alma mater and peers.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>GIVING BACK</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Learn about ways to contribute to the university's growth and support current
                                        students through scholarships and mentorship.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>ALUMNI SPOTLIGHT</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Discover inspiring stories of alumni achievements and contributions across
                                        various
                                        fields.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion last-accordion">
                            <div class="accordion-head">
                                <span>STAY CONNECTED</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Follow us on social media and subscribe to our newsletter to stay updated on
                                        alumni news and events.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Popular Courses</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-courses-item owl-carousel">
                        <div class="item">
                            <img src="images/course-01.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$160</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-02.jpg" alt="Course Two">
                            <div class="down-content">
                                <h4>Curabitur molestie dignissim purus vel</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$180</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-03.jpg" alt="">
                            <div class="down-content">
                                <h4>Nulla at ipsum a mauris egestas tempor</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-04.jpg" alt="">
                            <div class="down-content">
                                <h4>Aenean molestie quis libero gravida</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-01.jpg" alt="">
                            <div class="down-content">
                                <h4>Lorem ipsum dolor sit amet adipiscing elit</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$250</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-02.jpg" alt="">
                            <div class="down-content">
                                <h4>TemplateMo is the best website for Free CSS</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$270</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-03.jpg" alt="">
                            <div class="down-content">
                                <h4>Web Design Templates at your finger tips</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$340</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-04.jpg" alt="">
                            <div class="down-content">
                                <h4>Please visit our website again</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$360</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-01.jpg" alt="">
                            <div class="down-content">
                                <h4>Responsive HTML Templates for you</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$400</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-02.jpg" alt="">
                            <div class="down-content">
                                <h4>Download Free CSS Layouts for your business</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$430</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-03.jpg" alt="">
                            <div class="down-content">
                                <h4>Morbi in libero blandit lectus cursus</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$480</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/course-04.jpg" alt="">
                            <div class="down-content">
                                <h4>Curabitur molestie dignissim purus</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-8">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <span>$560</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="our-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>A Few Facts About Our University</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content percentage">
                                        <div class="count-digit">94</div>
                                        <div class="count-title">Succesed Students</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content">
                                        <div class="count-digit">126</div>
                                        <div class="count-title">Current Teachers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content new-students">
                                        <div class="count-digit">2345</div>
                                        <div class="count-title">New Students</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content">
                                        <div class="count-digit">32</div>
                                        <div class="count-title">Awards</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="video">
                        <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img
                                src="images/play-icon.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  add review section where review by users is given  it should have to be displayed --}}
    <section class="reviews">




        <section class="contact-us" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 align-self-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="contact" action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Let's get in touch</h2>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="name" type="text" id="name"
                                                    placeholder="YOURNAME...*" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="email" type="text" id="email"
                                                    pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..."
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="subject" type="text" id="subject"
                                                    placeholder="SUBJECT...*" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..."
                                                    required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="button">SEND MESSAGE
                                                    NOW</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="right-info">
                            <ul>
                                <li>
                                    <h6>Phone Number</h6>
                                    <span>92335-1233892</span>
                                </li>
                                <li>
                                    <h6>Email Address</h6>
                                    <span>alumni@usindh.edu.pk</span>
                                </li>
                                <li>
                                    <h6>Address</h6>
                                    <span>University of Sindh, Jamshoro</span>
                                </li>
                                <li>
                                    <h6>Website URL</h6>
                                    <span>www.alumniusindh.edu.pk</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           <div class="footer">
            <div class="container mx-auto py-8 px-4">
                <div class="row">
                    <div class="col-3 ">
                        <h2 class="text-xl text-start font-bold text-white ">Alumni Network</h2>
                        <p class="text-sm text-start text-white">
                            University of Sindh Alumni Portal – Connecting graduates across generations
                            and strengthening lifelong bonds.
                        </p>
                    </div>
                    <div class="col-3">
                        <h2 class="text-xl text-start font-bold text-white ">Quick Links</h2>
                        <ul class="space-y-2 text-start">
                            <li><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li><a href="{{ url('/about') }}" class="text-white">About Us</a></li>
                            <li><a href="{{ url('/events') }}" class="text-white">Events</a></li>
                            <li><a href="{{ url('/jobs') }}" class="text-white">Job Board</a></li>
                            <li><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h2 class="text-xl text-start font-bold text-white">Contact</h2>
                        <ul class="space-y-2 text-start text-sm text-white">
                            <li>📍 University of Sindh, Jamshoro</li>
                            <li>📧 alumni@usindh.edu.pk</li>
                            <li>☎️ +92-xxx-xxxxxxx</li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h2 class="text-xl text-start font-bold text-white">Stay Connected</h2>
                        <div class="flex text-start space-x-4 text-white">
                            {{-- write them in order list --}}
                            <ol>
                                <li><a href="#" class="text-white text-start"><i
                                            class="bi bi-facebook color-facebook"></i> Facebook</a></li>
                                <li><a href="#" class="text-white text-start"><i
                                            class="bi bi-linkedin color-linkedin"></i> LinkedIn</a></li>
                                <li><a href="#" class="text-white text-start"><i
                                            class="bi bi-instagram color-instagram"></i> Instagram</a></li>
                                <li><a href="#" class="text-white text-start"><i
                                            class="bi bi-twitter color-twitter"></i> Twitter</a></li>
                            </ol>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5 text-center">
                        <p class="text-sm text-gray-400">© 2025 University of Sindh Alumni Portal. All rights reserved.
                        </p>
                        <p class="text-xs  text-gray-500">Powered by BSCS Final Year Project Team</p>
                    </div>
                </div>
            </div>
            </footer>
        </div>
        </section>


        <!-- Scripts -->
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="js/isotope.min.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/lightbox.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/video.js"></script>
        <script src="js/slick-slider.js"></script>
        <script src="js/custom.js"></script>
        <script>
            //according to loftblog tut
            $('.nav li:first').addClass('active');

            var showSection = function showSection(section, isAnimate) {
                var
                    direction = section.replace(/#/, ''),
                    reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                    reqSectionPos = reqSection.offset().top - 0;

                if (isAnimate) {
                    $('body, html').animate({
                            scrollTop: reqSectionPos
                        },
                        800);
                } else {
                    $('body, html').scrollTop(reqSectionPos);
                }

            };

            var checkSection = function checkSection() {
                $('.section').each(function() {
                    var
                        $this = $(this),
                        topEdge = $this.offset().top - 80,
                        bottomEdge = topEdge + $this.height(),
                        wScroll = $(window).scrollTop();
                    if (topEdge < wScroll && bottomEdge > wScroll) {
                        var
                            currentId = $this.data('section'),
                            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                        reqLink.closest('li').addClass('active').
                        siblings().removeClass('active');
                    }
                });
            };

            $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
                e.preventDefault();
                showSection($(this).attr('href'), true);
            });

            $(window).scroll(function() {
                checkSection();
            });
        </script>
</body>

</body>

</html>
