<title>Reset Password</title>

@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    
    <style>
            
            .bg-gray-100 
            {
                
                background-color: white !important;
            }
            p{
              color:#a7a7a7 !important;
              font-size:12px;
            }
            .btn-primary{
                background-color: var(--ai-primary);
                border-radius: 0;
                
            }
            .btn-primary:hover{
                background-color: var(--ai-warning);
                border: 1px solid var(--ai-warning);
                
            }
            .img-fluid
            {
                height: 20px !important;
            }

            .form-control:focus 
            {                                    
              outline: none;
              box-shadow: none;
              border:1px solid #dfdfdf;
                
            }
            .form-control
            {
              border:1px solid #dfdfdf;
              font-size:13px;
              padding:8px;
            }

            /* @media (min-width: 992px)
            {
                    .my-lg-14 {
                    margin-bottom: 5rem!important;
                    margin-top: 15rem!important;
                }
            } */
            .my-8 {
                margin-bottom: 5rem!important;
                margin-top: 10rem!important;
            }
            @media (min-width: 992px)
            {
                .my-lg-14 {
                    margin-bottom: 5rem!important;
                    margin-top: 15rem!important;
                }
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



<!-- start section login -->
  <section class="my-8">
    <div class="container">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-sm-6 col-xs-6 col-lg-4 order-lg-1 ">
          <!-- img -->
          
          <img alt="Illusration" src="{{asset('../img/r-password.png')}}" decoding="async" data-nimg="intrinsic" srcset="{{asset('../img/r-password.png')}} 1x, {{asset('../img/r-password.png')}} 2x" style=" inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block;  min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;padding-bottom: 50px;padding-bottom: 50px;">
        </div>
        <!-- col -->
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
          <div class="mb-lg-9 mb-5">
            <h3 class="mb-1  fw-bold">Forgot your password?</h3>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
          </div>

          @if ($errors->any())
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> {{ __('Whoops! Something went wrong.') }}  
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>          
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        
          @if (session('status'))            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">                 
                {{ session('status') }}       
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

          <form method="POST" action="{{ airoute('password.update') }}">
            @csrf
            
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="row g-3">
              <!-- row -->

              <div class="col-12">
                <!-- input -->                
                <input  class="form-control" type="email" name="email" placeholder="Email" value="{{old('email',$request->email)}}" required autofocus>                
              </div>

              <div class="col-12">
                <!-- input -->
                <input  class="form-control"  id="password" placeholder="{{__('Password')}}" type="password" name="password" required autocomplete="current-password" autocomplete="new-password">
                
              </div>
              <div class="col-12">
                <!-- input -->
                <input  class="form-control"  id="password_confirmation" placeholder="{{__('Confirm Password')}}" type="password" name="password_confirmation" required autocomplete="current-password" autocomplete="new-password">
                
              </div>
              
              
              <!-- btn -->
              <div class="col-12 d-grid"> 
                <button type="submit" class="btn btn-primary rounded-1">{{ __('Reset Password') }}</button>
              </div>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<!-- end section login -->

@stop