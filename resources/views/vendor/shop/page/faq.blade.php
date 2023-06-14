<title>Frequently Asked Questions</title>
@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    

    <style> 
      :root {
        --primeryColor: #000000;
        --primeryBg: #ffffff;
        --activeBefore: #FFE817;
        --borderColor: #ccc;
      }
  
      .section-faq {
        display: grid;
        grid-template-columns: 0.4fr 1fr;
      }
  
      .nav-link {
        color: var(--ai-my-primarytext-color);
        cursor: pointer;
      }
  

      #scontent,
      #tcontent,
      #fourcontent {
        display: none;
      }
  
      .colopse {
        display: flex;
        align-items: center;
        position: relative;
      }
  
      .nav-item>a:hover {
        font-weight: 700;
        color: var(--primeryColor);
      }
  
      /*code to change background color*/
      .navbar-nav>.active>a {
        background-color: #C0C0C0;
        color: fee2c1;
      }
  
      .accordion-button:not(.collapsed) {
        color: var(--primeryColor);
        background-color: var(--primeryBg);
        font-weight: bold;
        box-shadow: none;
      }
  
      .accordion-item:last-of-type .accordion-button.collapsed {
        border-radius: 0;
      }
  
      .accordion-item {
        background-color: var(--primeryBg);
        border: none;
        margin: 15px 0;
      }
      .accordion-body
      {
        color: var(--ai-my-primarytext2-color);
      }
  
      .accordion-button:not(.collapsed)::after {
        background-image: none;
        content: "\f068" !important;
        font: normal normal normal 14px/1 FontAwesome !important;
        transform: rotate(-180deg);
        font-weight: bold;
      }
  
      .accordion-button::after {
        margin-left: auto;
        content: "\2b";
        width: 10px;
        /* font: normal normal normal 14px/1 FontAwesome; */
        background-image: none;
        font-weight: 900;
        font-size: 20px;
      }
  
      .accordion-button {
        border: 1px solid var(--ai-my-border-color);
      }
  
      .accordion-item:first-of-type .accordion-button {
        border-radius: 0;
      }
  
      .accordion-button:focus {
        outline-style: none;
        box-shadow: none;
        border: 1px solid var(--borderColor);
      }
  
      .faq-active {
        padding: 0.5rem 0.5rem 0.5rem 2.5rem;
        position: relative;
        font-weight: 700;
        color: var(--primeryColor) !important;
      }
  
      .faq-active::before {
        content: "";
        position: absolute;
        left: 17px;
        top: 17px;
        width: 16px;
        height: 4px;
        color: var(--activeColor);
        background: linear-gradient(90deg, #000000 21.85%, #a5a3a3 84.87%);
      }

      .tab-content h4
      {
          font-weight: bold;
      }
      .accordion-button {    
          font-weight: bold;
      }
      @media only screen and (max-width: 700px){
        .section-faq {
        display: grid;
        grid-template-columns:1fr;
        grid-gap: 15px;
      }
      .nav-link {
        font-size: 0.8rem;
      }
      .faq-active{
        padding: 0.5rem 0.5rem 0.5rem 1rem;
      }
      .faq-active::before{
        display:none;
      }
      .active{
        color:"green "
      }
      /* .active::before{
        content:none;
      } */
      .faq-left{
        display: grid;
        grid-gap: 10px;
        grid-template-columns: 1fr 1fr;
        margin-bottom: 10px;
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
    


    <div class="container  mb-3">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h2 class="font-weight-semi-bold  ">Frequently Asked Questions</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">FAQ </p>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid pt-5"> --}}
        {{-- <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">What can we help you find?</span></h2>
        </div> --}}
        
        

        

        <section class="container section-faq ">
            
              <ul class="nav flex-column faq-left" id="myDIV">
                <li class="nav-item ">
                  <a class="nav-link faq-active" id="1-tab" onclick="show1()">Returns & refunds</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="2-tab" onclick="show2()">Order & delivery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="3-tab" onclick="show3()">Customs clearance & cancellation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="4-tab" onclick="show4()">Payments and fees</a>
                </li>
              </ul>
           
            <div class="faq-right">


              {{-- tab 1 content  --}}
              <div id="fcontent" class="tab-content">
                {{-- start accordion return policy --}}
                  <h4>RETURN POLICY</h4>
                  <div class="accordion" id="accordionReturn">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                          aria-expanded="true" aria-controls="collapseOne">
                          Do You Have An Exchange Policy?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionReturn">
                        <div class="accordion-body">
                          <strong> Unfortunately,</strong> we do not have an exchange policy. The customer can return a wrong, damaged, defective, or missing part / incomplete product. In case of damaged product, the customer should inform the assigned courier company and cliqnshop within <code>3 days</code> of the delivery and in case of other conditions the return window is open for <code>7 days</code> after delivery. Our policy does not address customer concerns after <code> 7 days</code> of delivery. We apologize for the inconvenience caused.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Where Can I Upload Images Of The Damaged Or Incorrect Products That Were Delivered To Me?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionReturn">
                        <div class="accordion-body">
                          The customer needs to contact our support team to report an issue regarding the damaged, defective, or wrong product. A link will be provided to the customer on the registered email address after the customer support team has been contacted.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          On Which Conditions Are Returns Applicable?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionReturn">
                        <div class="accordion-body">
                          Only wrong, damaged, defective product(s) or product(s) with missing parts can be returned.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Under Which Conditions Product Are Not Eligible For A Return?
                        </button>
                      </h2>
                      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionReturn">
                        <div class="accordion-body">
                          <ul>
                            <li>Specific categories like innerwear, lingerie, swimwear, beauty products, perfumes/deodorant, and clothing freebies, grocery &amp; gourmet, jewellery, pet supplies, books, music, movies, batteries, etc., are not eligible for return and refund.</li>
                            <li>Products with missing labels or accessories.</li>
                            <li>Digital products.</li>
                            <li>Products that have been tampered with or have missing serial numbers.</li>
                            <li>A product that has been used or installed by the customer.</li>
                            <li>Any product not in its original form or packaging.</li>
                            <li>Refurbished products or pre-owned products are not eligible for returns.</li>
                            <li>Products that are not damaged, defective, or different from what was originally ordered.</li></ul>
                        </div>
                      </div>
                    </div>

                  </div>
                {{-- end accordion return policy --}}
                
                {{-- start accordion return policy --}}
                <h4 style="padding-top: 40px;">REFUND POLICY</h4>
                <div class="accordion" id="accordionRefund">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                        aria-expanded="true" aria-controls="collapseFive">
                        When Will The Refund Amount Get Credited To My Account?
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingOne"
                      data-bs-parent="#accordionRefund">
                      <div class="accordion-body">
                        In the event of a return, the refund process will begin only after the product has been received, inspected & examined at our warehouse facility. Once the product is deemed eligible for a refund, the refund amount will be credited to your bank account/ cliqnshop account /original payment method.

                        Once we initiate a refund, it will take approximately 7-10 business days for the amount to reflect in the original payment method. However, the time for refunds to your bank account will vary differently according to your bank's settlement policy. In the case of Ucredit the amount will reflect in your cliqnshop account within 24-48 working hours. Please contact our support team for more information.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        What Should You Do In Case Of A Late Or Missing Refund?
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionRefund">
                      <div class="accordion-body">
                        <ul>
                          <li>Monitor your bank account as the settlement of inter-bank transactions may takes longer than expected.</li>
                          <li>Contact your bank and have the transaction ID ready to share.</li>
                          <li>In case you have yet to receive a refund, please contact our customer support team.</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        How Will The Refund Be Processed After Returning The Product?
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionRefund">
                      <div class="accordion-body">
                        Once the product returns to our warehouse, we would initiate a refund. It will take approximately 7-10 business days for the amount to reflect in the original payment method. However, the same varies according to the bank's settlement standards. In the case of Ucredit the amount will reflect in your  account within 24-48 working hours. Please contact our support team for more information.
                      </div>
                    </div>
                  </div>
                </div>
              {{-- end accordion return policy --}}

              </div>


              {{-- tab 2 content --}}
              <div id="scontent" class="tab-content">
                <h4>Order & Delivery</h4>
                <div class="accordion" id="accordionOrderDelivery">
                  


                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#order1"
                        aria-expanded="true" aria-controls="collapseOne">
                        How Do I Keep Track Of My Order?
                      </button>
                    </h2>
                    <div id="order1" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionCustomClearance">
                      <div class="accordion-body">
                        You can track your order with the help of a “Track order link” that you will receive in your order confirmation mail/SMS.
                        You can click on ‘Track Order’ option available at the bottom of the page to track orders on our website.
                        App users can view the ‘track order’ option available on the menu icon. Feel free to contact our support team for further assistance.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#order2" aria-expanded="false" aria-controls="collapseTwo">
                        Can I Change The Products Once I Have Placed An Order?
                      </button>
                    </h2>
                    <div id="order2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionCustomClearance">
                      <div class="accordion-body">
                        Unfortunately, we cannot change the product once order placed.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#order3" aria-expanded="false" aria-controls="collapseThree">
                        Can I Have A Copy Of The Order Invoice Sent To My Email Address?
                      </button>
                    </h2>
                    <div id="order3" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionCustomClearance">
                      <div class="accordion-body">
                        Yes, an order invoice can be provided on request. Please contact the customer service team for assistance.
                      </div>
                    </div>
                  </div>


                </div>
              </div>


              {{-- tab 3 contnt  --}}
              <div id="tcontent" class="tab-content">
                <h4>Customs Clearance</h4>
                    <div class="accordion" id="accordionCustomClearance">
                      
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#order1"
                            aria-expanded="true" aria-controls="collapseOne">
                            Do I Need To Pay Any Extra Amount For Customs After Placing An Order?
                          </button>
                        </h2>
                        <div id="order1" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                          data-bs-parent="#accordionCustomClearance">
                          <div class="accordion-body">
                            <ul>
                              <li>If customs have been paid upfront: The customer does not have to pay anything at the time of delivery and if any amount is charged by the courier company, please contact our customer support for assistance.</li>
                              <li>In the case that customs, duties, and taxes are not charged upfront. The customer will need to pay these charges at the time of the delivery.</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                            data-bs-target="#order2" aria-expanded="false" aria-controls="collapseTwo">
                            Who Will Be Responsible For Customs Clearance?
                          </button>
                        </h2>
                        <div id="order2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                          data-bs-parent="#accordionCustomClearance">
                          <div class="accordion-body">
                            The courier company usually takes care of the customs clearance procedure. However, the customs authority might require an urgent declaration or additional documents from the customer. You will need to provide all required documents and paperwork as soon as possible to the courier company so that they can present them to the customs authority.

                            When the customs are not paid upfront with the order, the customer is responsible for paying customs charges, arranging necessary documentation, and getting the shipment cleared from customs.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                            data-bs-target="#order3" aria-expanded="false" aria-controls="collapseThree">
                            What Will Happen If The Shipment Is Stuck In Customs?
                          </button>
                        </h2>
                        <div id="order3" class="accordion-collapse collapse" aria-labelledby="headingThree"
                          data-bs-parent="#accordionCustomClearance">
                          <div class="accordion-body">
                            <p>As to each such purchase made by the customer through the cliqnshop website, the recipient in the destination country in all instances shall be the “Importer of Record” and must comply with all the laws and regulations of said destination country for the product(s) purchased through the cliqnshop Website.</p>
                            <p>The courier company usually takes care of the customs clearance procedure. In case the shipment is held at the customs clearance processes due to missing or absence of proper paperwork/documents/declaration/ government license or certificates required from the ‘Importer of Record’:</p>
                            <ul>
                              <li class="mb-2">If the ‘Importer of Record’ fails to provide the required documents and paperwork to the custom authorities and as a result the product(s) are confiscated by the customs, cliqnshop will not issue a refund. Therefore, we strongly recommend that you make advance preparations &amp; submit the relevant documents when requested by the custom authorities.</li>
                              <li>If the shipment is returned to our warehouse in case of missing/absent paperwork etc. from the customer’s side, cliqnshop will only refund the purchase price of the product(s) to the customer. Shipping and return charges will not be included in the refund.</li></ul>

                          </div>
                        </div>                   
                      </div>

                    </div>

                    <h4 style="padding-top: 40px;"> Cancellation</h4>

                    <div class="accordion" id="accordionCancellation">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                            aria-expanded="true" aria-controls="collapseFive">
                            Will I Get A Complete Refund During Order Cancellation?
                          </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingOne"
                          data-bs-parent="#accordionCancellation">
                          <div class="accordion-body">
                            <ul>
                              <li>If the shipment is ready for dispatch or is already dispatched from the seller A portion of shipping price will be deducted from the total refund amount affected in the shipment.</li>
                              <li>If the order/product has been processed by the seller but not yet shipped, the customer is eligible for a full refund</li>
                              <li>If the order/product has not been created/processed by the seller: the customer is eligible for a full refund.</li>
                              <li>If the shipment has already left for your country and the Airway bill number is available from the courier company on the tracking page. We will not be able to cancel your order.</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How Do I Cancel Order?
                          </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                          data-bs-parent="#accordionCancellation">
                          <div class="accordion-body">
                              <ul>
                                <li>Go to your account</li>
                                <li>Under </li>
                                <li>If the order cancellation option is not available, please contact us customer support team for order cancellation.</li>
                              </ul>
                          </div>
                        </div>
                      </div>
                      
                    </div>

              </div>


              {{-- tab 4 content --}}
              <div id="fourcontent" class="tab-content">
                <h4>Payments and Fees</h4>

                <div class="accordion" id="accordionPayments">
                      
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-normal fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#order1"
                        aria-expanded="true" aria-controls="collapseOne">
                        Does Cliqnshop Charge Anything Extra Because Of The Difference In Currency?
                      </button>
                    </h2>
                    <div id="order1" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionPayments">
                      <div class="accordion-body">
                        cliqnshop do not charge anything extra apart from shipping and custom charges. When you make a payment in a particular currency, your bank might charge for the difference in the currency if the transaction amount is in US dollars ($)
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#order2" aria-expanded="false" aria-controls="collapseTwo">
                        How Are Customs Fees Calculated?
                      </button>
                    </h2>
                    <div id="order2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionPayments">
                      <div class="accordion-body">
                        <ul>
                          <li>For customs paid front: Customs/Import duties and taxes fees levied at checkout are an estimation of the fees and are not exact. If actual customs fees exceed the estimated customs fees taken at the time of placing an order, CliqnShop will pay the additional fees charged.</li>
                          <li>For customs that have not been paid upfront: Customs/Import Duties &amp; Taxes will be calculated by the customs authorities.</li></ul>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collaccordionPaymentspsed fw-normal fs-6" type="button" data-bs-toggle="collapse"
                        data-bs-target="#order3" aria-expanded="false" aria-controls="collapseThree">
                        What Actions Are Required To Be Taken In The Case Where Payment Has Been Deducted But No Orders Have Been Placed?
                      </button>
                    </h2>
                    <div id="order3" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionPayments">
                      <div class="accordion-body">
                        <ul>
                          <li>Check your bank/card statement and see whether the amount has been reversed in your account.</li>
                          <li>Wait 24-hours. The amount deducted will be automatically reversed into your account.</li>
                          <li>Contact our support team for further assistance.</li></ul>

                      </div>
                    </div>                   
                  </div>

                </div>

              </div>

               

      
            </div>
        </section>


        <script>

          const fContent = document.getElementById("fcontent");
          const sContent = document.getElementById("scontent");
          const tContent = document.getElementById("tcontent");
          const fourContent = document.getElementById("fourcontent");
      
      
      
          function show1() {
            fContent.style.display = "block";
            sContent.style.display = "none";
            tContent.style.display = "none";
            fourContent.style.display = "none";
          }
          function show2() {
            fContent.style.display = "none";
            sContent.style.display = "block";
            tContent.style.display = "none";
            fourContent.style.display = "none";
          }
          function show3() {
            fContent.style.display = "none";
            sContent.style.display = "none";
            tContent.style.display = "block";
            fourContent.style.display = "none";
          }
          function show4() {
            fContent.style.display = "none";
            sContent.style.display = "none";
            tContent.style.display = "none";
            fourContent.style.display = "block";
          }

          const anchors = Array.from(document.getElementsByClassName('nav-link'))

            anchors.forEach(a => {
              a.addEventListener('click', function(e) {
                anchors.forEach(a => {
                  a.classList.remove('faq-active')
                })

                e.currentTarget.classList.add('faq-active')
              })  
            })
      
        </script> 

@stop
