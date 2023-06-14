<?php
$enc = $this->encoder();

?>


<link rel="stylesheet" href="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/slider.css', 'fs-theme', true ) ) ?>">
<script defer src="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/slider.js', 'fs-theme', true ) ) ?>"></script>

<style>
    /* Catalog Session  styling start */
    
    .catalog-session-seen{
        padding: 0 10px 0 10px;
    }
   
    .catalog-session-seen .media-item {
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        height: 213px;
        /* width: 160px; */
    }

    .catalog-session-seen .seen-item h2.name{
        padding-top: 10px;
        font-size: 0.8rem;
        display: -webkit-box;
        max-width: 400px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        height: 50px;
        line-height: 22px;
        overflow: hidden;
        color: var(--ai-my-primarytext2-color);
        
    }

    .catalog-session-seen .seen-item 
    {
        padding: 15px;
        margin: 3px;
        border: 1px solid var(--ai-my-border-color);
        text-align: center;
        height: 325px;
    }
    .catalog-session-seen .price-item:first-of-type .taxrate {
        display: none;
    }
    .catalog-session-seen .price-item:first-of-type .quantity 
    {
        display: none;
    }
    
    .catalog-session-seen .price-item.default .value
    {
        color:black;        
        font-size:18px;
        font-weight: 600;
        line-height: 2;
    }
    .catalog-session-seen .seen-item:hover 
    {
        -webkit-box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
        box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
        transition: .2s;
        -moz-transition: .2s;
        -webkit-transition: .2s;
        -o-transition: .2s;
    }



   /* .catalog-session-seen .seen-item .slider-action
   {

       position: absolute;
       left: 50%;
       top: 50%;
       -webkit-transform: translateX(-50%) translateY(-50%);
       transform: translateX(-50%) translateY(-50%);
       opacity: 0;
       visibility: hidden;
       -webkit-transition: all .3s ease 0s;
       transition: all .3s ease 0s;
       z-index: 9;
       -webkit-box-shadow: 20px 20px 40px rgb(0 0 0 / 7%);
       box-shadow: 20px 20px 40px rgb(0 0 0 / 7%);
   }

   .catalog-session-seen .seen-item:hover .slider-action 
   {
        opacity: 1;
        visibility: visible;
    } */

    

    

    
     /* swiffy slider items styling for difference size screens start */
     @media (min-width: 520px)
    {
        .last-seen-slider.swiffy-slider {
                --swiffy-slider-item-count: 2;
            }
    }
     @media (min-width: 768px)
    {
                .last-seen-slider.swiffy-slider 
                {
                    --swiffy-slider-item-count: 3;
                }
    }
    @media (min-width: 992px)
    {
        .last-seen-slider.swiffy-slider 
        {
            --swiffy-slider-item-count: 6;
        }
    }
   
    /* swiffy slider items styling for difference size screens start */

   


</style>

