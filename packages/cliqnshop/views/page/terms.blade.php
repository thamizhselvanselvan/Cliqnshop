@extends('cliqnshop::base')
<title>Terms And Conditions</title>
@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>

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
    


    <div class="container pb-4 ">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h2 class="font-weight-semi-bold text-uppercase mb-3">Terms And Conditions</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Terms And Conditions</p>
            </div>
        </div>
    </div>

   <style>
        div.container {
        background-color: #ffffff;
        }
        div.container p {
        font-family: Arial;
        font-size: 15px;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        text-transform: none;
        color: #606060;
        background-color: #ffffff;
        }
        @media only screen and (max-width: 700px){
        div.container p {
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

    <?php if(isset($content) && $content ): ?>
        <div class="container">
            <?= $content ?>
        </div>
    <?php else : ?>
        {{-- <div class="container">
            <p>Greetings from <span class="fw-bolder">cliqnshop</span>!</p>
            <p>The terms and conditions listed below govern the usage of the <span class="fw-bolder">cliqnshop</span> Website, which is located at <a href="https://cliqnshop.com" target="_blank">https://cliqnshop.com</a>.</p>
            <p>We imply that you agree to these terms and conditions by using this website. If you do not agree to all of the terms and conditions listed on this page, do not use <span class="fw-bolder">cliqnshop</span> any further.</p>
            <p class="pb-2">The terms "Client," "You," and "Your" refer to the users of this website who have agreed to the terms and conditions set forth by the Company. This terminology also applies to all other agreements: the "Terms and Conditions," the "Privacy Statement," the "Disclaimer Notice," and all related documents. Our Company is referred to as "The Company," "Ourselves," "We," "Ours," and "Us." The terms "Party," "Parties," or "Us" include both the Client and us. All terms refer to the offer, acceptance, and consideration of payments that are necessary to start the process of our assistance to the client in the most qualified way possible to meet all of their needs and to provide the services that the company has stated they will provide, in accordance with and subject to, applicable U.S. and Indian law. Any usage of the aforementioned terminology or other words in the singular, plural, he/she, or they format is understood to be interchangeable and to be referring to the same.</p>
            <h5 class="fw-bold">Cookies</h5>
            <p class="ps-4">We use cookies in our operations. You consented to the use of cookies in accordance with the privacy statement of <span class="fw-bolder">cliqnshop</span> by browsing the website.</p>
            <p class="pb-2 ps-4">Cookies are used by the majority of interactive websites to allow us to retrieve user information for each visit. Our website uses cookies to enable the functionality of some areas so that users can navigate it more easily. Cookies may also be used by some of our affiliate and advertising partners.</p>
            <h5 class="fw-bold">Trademark, Copyright and Restriction</h5>
            <p class="ps-4">The Sites are managed and run by <a href="https://cliqnshop.com/">cliqnshop.com</a> unless otherwise stated explicitly. All content on the Sites is covered by copyrights, trademarks, and other intellectual property rights that either we own and manage directly or that are held by third parties who have granted us a license to use their content. This includes all photographs, graphics, audio clips, and video clips.</p>
            <p class="pb-2 ps-4">The content on the Sites that we own, operate, license, or control is only for your private, non-commercial use. You may not, directly or indirectly, use such material for any other purpose, including copying, reproducing, republishing, uploading, posting, transmitting, or distributing it via email or other electronic methods. You may also not let another person do so. Modification of the materials, use of the materials on any other website or networked computer environment, or use of the materials for any purpose other than personal, non-commercial use are all prohibited without the owner's prior written consent and constitutes violations of copyrights, trademarks, and other proprietary rights. Any use for which you receive any remuneration, whether in money or otherwise, is a commercial use for the purposes of this clause.</p>
            <h5 class="fw-bold">Privacy</h5>
            <p class="pb-2 ps-4">Our Privacy Policy, which may be found in the privacy policy, governs how the Site is used.</p>
            <h5 class="fw-bold">Disclaimer and Content Liability</h5>
            <p class="ps-4">The Sites, along with all information, software, goods, and services made available to you through the Sites, are provided "as is" and "as available" without any express or implied representations or guarantees, unless otherwise stated in writing.</p>
            <p class="ps-4">Without limiting the aforementioned sentence, <a href="https://cliqnshop.com/">cliqnshop.com</a> does not guarantee that any of the following things will be true: </p>
            <p class="ps-4">- The Sites or any of them will always be accessible; or </p>
            <p class="ps-4">- The information on the Sites is exhaustive, accurate, true, or not deceptive.</p>
            <p class="ps-4">You won't be held responsible in any way by <a href="https://cliqnshop.com/">cliqnshop.com</a> for the contents of, usage of, or anything else related to, this website. The Sites, its servers, electronic messages transmitted from <a href="https://cliqnshop.com/">cliqnshop.com</a>, information, content, materials, products (including software), or services featured on or otherwise made available to you through the Sites are not guaranteed to be free of viruses or other harmful components by cliqnshop.com.</p>
            <p class="ps-4">Nothing on the sites should be interpreted as advice of any kind. Limitations on implied warranties and the exclusion or restriction of certain damages are prohibited by some laws. Some or all of the aforementioned exclusions, limitations, or disclaimers may not apply to you if these laws apply to you, and you may also be entitled to other rights. If such laws apply to you, the liability cap will be the highest amount permitted by the relevant legislation.</p>
            <p class="pb-2 ps-4">Each product sold on <a href="https://cliqnshop.com/">cliqnshop.com</a> is subject to the laws of the state in which it is purchased. If <a href="https://cliqnshop.com/">cliqnshop.com</a> is unable to deliver a product due to the effects of a different state's laws, <a href="https://cliqnshop.com/">cliqnshop.com</a> will refund or credit the amount it received from the sale of the product in question. Any special, incidental, indirect, or consequential damages or losses of any kind resulting from the use of Credits or anything connected to the Credits are expressly disclaimed by <a href="https://cliqnshop.com/">cliqnshop.com</a>.</p>
            <h5 class="fw-bold">Reservation of Rights</h5>
            <p class="pb-2 ps-4">If you link to our Website in any way, we reserve the right to ask you to remove it. Upon request, all links to our Website will be immediately removed. In addition, we reserve the right to amend these terms and conditions and linking policy at any time. The terms and conditions of this linking agreement apply to you if you link continuously to our Website.</p>
            <h5 class="fw-bold">Risk of loss</h5>
            <p class="ps-4">A shipment contract governs all purchases made on the Sites. Upon our delivery to the carrier, the risk of loss and title pass to you.</p>
        </div> --}}
    <?php endif ?>

@stop
