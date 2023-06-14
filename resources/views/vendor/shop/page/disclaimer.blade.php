<title>Disclaimer</title>

@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
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
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Disclaimer</h2>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Disclaimer
            </p>
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
            <p class="pb-2">&emsp;&emsp; This website serves as <span class="fw-bolder">cliqnshop's</span> official online presence and offers general information about the company. We respect your privacy on <span class="fw-bolder">cliqnshop</span>. We are committed in giving you accurate and useful information about us, and we believe that gathering Personal Information (defined below) through <a href="https://cliqnshop.com/">www.cliqnshop.com</a> (the "Site") enables us to do just that. Collecting this information also enables us to learn more about the goods and services that you find most useful. Our Privacy Policy covers the kinds of information we collect online and how we utilise it. Payment information is handled by licensed payment gateway service providers; we do not collect payment information. <span class="fw-bolder">Cliqnshop</span> is the only owner of all of the text, graphics, trademarks, and other information published on this website. The data and content are based on the laws in force in India and the United States.</p>
            <p class="pb-2">Every attempt is done to ensure that the information on this site is accurate and up to date, neither <span class="fw-bolder">cliqnshop</span> nor the information it contains, whether it be text, graphics, hyperlinks, or other objects, are guaranteed to be accurate or complete. This website and the information, materials, and product references (if any) contained therein, including without limitation, text, graphics, and links, are provided "as is" and without any express or implied claims or guarantees of any kind. The products stated on the website may differ in size, quality, and other qualities and are just mentioned for the purpose of graphical presentation. Before making a purchase, the buyer might research costs, quality, and other factors.</p>
            <p class="pb-2">The brands and manufacturers listed on this website are not affiliated with <span class="fw-bolder">cliqnshop</span>, unless otherwise stated differently. All goods, though, are authentic and come from trustworthy wholesalers and vendors. In some situations, the manufacturer, distributor, or direct seller of the goods may be identified as such on the product listing or by the words "Sold by..."</p>
            <p class="pb-2"><span class="fw-bolder">Cliqnshop</span> expressly disclaims any implied warranties, including but not limited to implied warranties of merchantability, fitness for a particular purpose, non-infringement, freedom from computer virus, and warranties arising from course of dealing or course of performance, to the fullest extent permitted by law. The site's functionalities are not guaranteed to be error-free or uninterrupted by <span class="fw-bolder">cliqnshop</span>, and neither is the server that hosts the site, which <span class="fw-bolder">cliqnshop</span> does not guarantee is free of viruses or other malicious elements. In terms of the materials' completeness, correctness, accuracy, sufficiency, usefulness, timeliness, reliability, or other aspects, <span class="fw-bolder">cliqnshop</span> makes no guarantees or claims regarding their usage.</p>
            <p class="pb-2">Whether or not <span class="fw-bolder">cliqnshop</span> contributed the site's contents, <span class="fw-bolder">cliqnshop</span> disclaims all liability for any special, indirect, incidental, or consequential damages that may result from the use of, or the inability to use, the site and/or the materials therein.</p>
            <p class="pb-2">The intellectual property laws protect all of the content on the Site, including all text, graphics, logos, button icons, pictures, audio clips, and software. This content is the sole property of <span class="fw-bolder">cliqnshop</span> or its content suppliers. The entire body of the content on the Site was assembled by <span class="fw-bolder">cliqnshop</span> and is its sole property, which is safeguarded by intellectual property laws. The Site's software is all owned by <span class="fw-bolder">cliqnshop</span> or its software vendors and is therefore protected by intellectual property laws. The Site's content may not be used in any other ways, including duplication, alteration, distribution, transmission, reinterpretation, exhibition, or performance</p>
            <p class="pb-2">The text, graphics, links, and other content on the site are all supplied "as is" and are only good while supplies last. The information, services, and product offers that are advertised there are the best deals currently available. Additionally, neither <span class="fw-bolder">cliqnshop</span> nor its suppliers represent nor guarantee the accuracy, completeness, or timeliness of the information accessible through the Site. Typographical errors are not our fault. Information regarding prices and availability is subject to change without advance warning.</p>
            <p class="pb-2">This website's content is liable to change at any time without prior notification. Without previous written consent from a designated individual, commercial use of any of this site's contents is prohibited. No portion of the website may be copied and sold or distributed for profit, nor may it be altered or added to any other work, publication, or website—whether in print or digital form—including postings on other websites. All other rights are reserved by <span class="fw-bolder">cliqnshop</span>.</p>
            <p class="pb-2">There may be some hyperlinks on this site that take you elsewhere. Any information found on a website that is linked to this one has not been checked for validity or legality. References to any external links should not be taken as a recommendation of the hyperlinks or their contents since <span class="fw-bolder">cliqnshop</span> is not responsible for the content of any such external connections.</p>
            <p class="pb-2">An invitation to invest in <span class="fw-bolder">cliqnshop</span> or any of its entities is not implied by any information on this website. Without restriction, any loss of profit, indirect, incidental, or consequential, neither <span class="fw-bolder">cliqnshop</span> nor their respective officers, employees, or agents shall be held accountable for any loss, destruction, or expenditure arising out of access to or use of this site or any site linked to it.</p>
            <p class="pb-2">Whilst also accessing this site, users are presumed to consent to the Mumbai, India courts' jurisdiction over any actions resulting from or connected to it.</p>
        </div> --}}
    <?php endif ?>

    

@stop
