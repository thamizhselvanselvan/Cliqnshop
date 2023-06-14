<title>Contact Us</title>

@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['cms/page'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>

    <script src="https://www.google.com/recaptcha/api.js" 
            async defer></script>


    <style>
        p{
            color: var(--ai-my-primarytext2-color);
        }
      .contact-form  .btn-primary 
      {
            background-color: var(--ai-primary);
            border: 1px solid var(--ai-primary);
            color: var(--ai-bg);
            letter-spacing: 1.5px;
            border-radius: 0;
    }
    .fa-map-marker:before,.fa-phone:before,.fa-envelope:before{
        color: var(--ai-my-primarytext-color);
    }
    /* .contact-form .btn-primary:hover 
    {
            color: #fff;
            background-color: #c5837c;
            border-color: #c17a74;
    } */
                        
    .contact-form .form-control
    {
        
        border-radius: 0;
    }
    .contact-form .form-control:focus
    {
        box-shadow: none;
        border-radius: 0;
        border: 1px solid #8b0000;
        
    }
        
        
    </style>

@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
<?= $aibody['NewMenu/Design1'] ?? '' ?>
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    


    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div>

    <div class="container pt-2">
        <!-- <div class="text-center mb-5">
            <h4 class="section-title px-5"><span class="px-2">DROP A MESSAGE BELOW TO CONTACT US</span></h4>
        </div> -->
        <div class="row px-xl-5">
        <div class="col-lg-6">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>If you have any questions or queries a member of staff will always be happy to help. Feel free to contact us by telephone or email and we will be sure to get back to you as soon as possible.</p>
                <div class="d-flex flex-column mb-3">
                    <!-- <h5 class="font-weight-semi-bold mb-3">Store 1</h5> -->
                    <p class="mb-3"><i class="fa fa-map-marker text-primary pe-2 fs-4 "></i><?= $address_info ?></p>
                    <p class="mb-3"><i class="fa fa-envelope text-primary pe-2 fs-6"></i><?= $mail_info ?></p>
                    <p class="mb-0"><i class="fa fa-phone text-primary pe-2 fs-5"></i><?= $phone_info ?></p>
                </div>
                {{-- <div class="d-flex flex-column">
                    <!-- <h5 class="font-weight-semi-bold mb-3">Store 2</h5> -->
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary pe-2 fs-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary pe-2 fs-4"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary pe-2 fs-4"></i>+012 345 67890</p>
                </div> --}}
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> {{ __('Something went wrong.') }}  
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>          
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif 
                    
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- <div id="success"></div> -->
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" method="post" action="{{ airoute('aimeos_shop_store_contact') }}">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control rounded-1 px-3 py-2" id="name" name= "name" value="{{old('name')}}" required  placeholder="Your Name"  data-validation-required-message="Please enter your name" aria-invalid="false">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control rounded-1 px-3 py-2" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" aria-invalid="false" value="{{old('email')}}">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control rounded-1 px-3 py-2" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" aria-invalid="false" value="{{old('subject')}}">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control rounded-1 px-3 py-2" rows="6" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message" aria-invalid="false">{{old('message')}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <script src="https://www.google.com/recaptcha/api.js" 
                            async defer></script>
                    <div class="g-recaptcha mb-2" id="feedback-recaptcha" 
                         data-sitekey="{{ config('services.g-recaptcha.GOOGLE_RECAPTCHA_KEY') }}">
                    </div>
                        <div>
                            <button class="btn btn-primary px-3 py-2 rounded-2" type="submit" name="contactbtn" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="map-section">
       <div class=" container">
           <h4 class="fw-bold d-flex mx-auto justify-content-center pb-3">Map Location</h4>
          <div id="map-container-google-1" class="z-depth-1-half map-container col-md-12">
            <iframe src="<?= !empty($google_map_src)? $google_map_src : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30696508.42300191!2d64.41954648440488!3d20.086752506952728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1677133801810!5m2!1sen!2sin'  ?>" frameborder="0" allowfullscreen="" style="width:100%;height:60%;">
            </iframe>
          </div>
        </div>
    </section>
        

@stop
