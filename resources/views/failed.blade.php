@extends('layouts.layout')

@section('content')
    
    <!-- main content -->
    <section class="form-box">
        <div>
            <div class="container-fluid">
                <div data-aos="flip-left" data-aos-delay="550" style="padding-top: 5%;padding-right: 35%;padding-bottom: 5%;padding-left: 42%;">
                    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/tdrtiskw.json"
                        trigger="loop-on-hover"
                        colors="primary:#ee6d66,secondary:#848484"
                        style="width:250px;height:250px">
                    </lord-icon>
                </div>
                <div data-aos="flip-up" data-aos-delay="300">
                    <h1 class="text-center" style="color: var(--gray-dark);">The system has not recorded your submission. <br> Please try again.</h1>
                    <h5 class="text-center" style="color: var(--gray-dark);font-style: normal;">If&nbsp;you&nbsp;have&nbsp;any&nbsp;questions,&nbsp;do not hesitate to contact us.<br></h5>
                    <div class="text-center"><br><a class="btn btn-info btn-sm text-monospace text-center border rounded-pill border-info shadow-sm" role="button" href="/menu">CONTINUE</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- main content -->


@endsection