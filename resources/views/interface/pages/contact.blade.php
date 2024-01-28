@extends('interface.layout_interface')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Liên hệ</h6>
            <h1 class="mb-5">Liên hệ với chúng tôi</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos
                </p>
                <div class="d-flex align-items-center mb-4">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                        style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
               
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3295.1227633338535!2d106.70442022113241!3d10.843156461499005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529649850badb%3A0x617177104127c8ea!2sFPT%20AfterSchool%20-%20CS%20V%E1%BA%A1n%20Ph%C3%BAc!5e0!3m2!1svi!2s!4v1705971340525!5m2!1svi!2s"
                    width="600" height="450" style="min-height: 300px; border:0;" aria-hidden="false" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
           
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên" required>
                                <label for="name">Tên</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                <label for="email"> Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                        <label for="phone"> Số Điện Thoại </label>
                                </div>
                        </div>
                        <div class="col-12">
                            
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nội dung" name="comment" id="comment"
                                required
                                    style="height: 100px"></textarea>
                                <label for="content"> Nội dung</label>

                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>

               
        </div>
    </div>
</div>
@endsection