@extends('layouts.layout')

@section('content')
    
    <section id="hero">
        <div class="hero-content" data-aos="fade-up" style="background-image: url('assets/reveal/hero-carousel/1.jpg'); background-size: cover;">
            <h2>Get Phon<span>e</span> Book<br>now!</h2>
            <div>
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
        </div>

        
    </section><!-- End Hero Section -->

    <!-- ======= About Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="assets/reveal/hero-carousel/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content">
                    <h2>Digitizing Your Phone Book</h2>
                    <h3>Make your communication journey smooth and steadily.</h3>

                    <ul>
                        <li><i class="bi bi-check-circle"></i> Quick </li>
                        <li><i class="bi bi-check-circle"></i> Safe </li>
                        <li><i class="bi bi-check-circle"></i> Intelligent</li>
                    </ul>

                </div>
            </div>
        </div>
    </section><!-- End About Section -->

@endsection