@extends('cliqnshop::base')
<title>Privacy Policy</title>
@section('aimeos_header')

<?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    


    <style>
        div.container p{
            font-size: 15px;
            color: #606060;
            font-style: normal;
            font-weight: normal;
        }
        div.container li{
            font-size: 15px;
            color: #606060;
        }
        @media only screen and (max-width: 700px){
        div.container p {
            font-size: 13px;
        }
        div.container li{
            font-size: 13px;
        }
        div.container h5{
            font-size: 16px;
        }
        h2{
            font-size: 20px;
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
    


    <div class="container pb-4">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 120px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Privacy Policy </h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Privacy Notice page</p>
            </div>
        </div>
    </div>

    <?php if(isset($content) && $content ): ?>
        <div class="container">
            <?= $content ?>
        </div>
    <?php else : ?>
        {{-- <div class="container">               
            <p>At <span class="fw-bolder">cliqnshop</span> , accessible from <a href="https://cliqnshop.com/">cliqnshop.com</a>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by <span class="fw-bolder">cliqnshop</span>  and how we use it.</p>
            
            <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>
            
            <p class="pb-3">This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in <span class="fw-bolder">cliqnshop</span>. This policy is not applicable to any information collected offline or via channels other than this website.</p>
            
            <h5 class="fw-bold">Consent</h5>
            
            <p class="pb-3 ps-4">By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
            
            <h5 class="fw-bold">Information we collect</h5>
            
            <p class="ps-4">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
            <p class="ps-4">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
            <p class="pb-3 ps-4">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>
            
            <h5 class="fw-bold">How we use your information</h5>
            
            <p class="pb-3">We use the information we collect in various ways, including to:</p>
            
            <ul class="pb-3">
            <li>Provide, operate, and maintain our website</li>
            <li>Improve, personalize, and expand our website</li>
            <li>Understand and analyze how you use our website</li>
            <li>Develop new products, services, features, and functionality</li>
            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
            <li>Send you emails</li>
            <li>Find and prevent fraud</li>
            </ul>
            
            <h5 class="fw-bold">Log Files</h5>
            
            <p class="pb-3 ps-4"><span class="fw-bolder">Cliqnshop</span>  follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>
            
            <h5 class="fw-bold">Cookies and Web Beacons</h5>
            
            <p class="pb-3 ps-4">Like any other website, <span class="fw-bolder">cliqnshop</span>  uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>
            
            
            
            <h5 class="fw-bold">Advertising Partners Privacy Policies</h5>
            
            <P class="ps-4">You may consult this list to find the Privacy Policy for each of the advertising partners of <span class="fw-bolder">cliqnshop</span> .</p>
            
            <p class="ps-4">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on <span class="fw-bolder">cliqnshop</span> , which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>
            
            <p class="pb-3 ps-4">Note that <span class="fw-bolder">cliqnshop</span>  has no access to or control over these cookies that are used by third-party advertisers.</p>
            
            <h5 class="fw-bold">Third Party Privacy Policies</h5>
            
            <p class="ps-4"><span class="fw-bolder">Cliqnshop's</span> Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>
            
            <p class="pb-3 ps-4">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>
            
            <h5 class="fw-bold">CCPA Privacy Rights (Do Not Sell My Personal Information)</h5>
            
            <p class="ps-4">Under the CCPA, among other rights, California consumers have the right to:</p>
            <p class="ps-4">Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
            <p class="ps-4">Request that a business delete any personal data about the consumer that a business has collected.</p>
            <p class="ps-4">Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
            <p class="pb-3 ps-4">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
            
            <h5 class="fw-bold">GDPR Data Protection Rights</h5>
            
            <p class="ps-4">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
            <p class="ps-4">The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
            <p class="ps-4">The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
            <p class="ps-4">The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
            <p class="ps-4">The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
            <p class="ps-4">The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
            <p class="ps-4">The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
            <p class="pb-3 ps-4">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>
            
            <h5 class="fw-bold">Children's Information</h5>
            
            <p class="ps-4">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>
            
            <p class="ps-4"><span class="fw-bolder">Cliqnshop</span>  does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

        </div> --}}
    <?php endif ?>
        
        

@stop
