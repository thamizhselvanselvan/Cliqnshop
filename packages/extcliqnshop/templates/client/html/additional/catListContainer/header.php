<?php
$enc = $this->encoder();
?>


<style>
        ul, li {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }
        
        .luxury-brands-products ul {
                display: flex;
                flex-wrap: wrap;
                margin: 0px -9px;
                justify-content: center;
        }
        
        .luxury-brands-products ul li a {
            border: 1px solid #e3e9ed;
            border-radius: 10px;
            display: block;
            padding: 15px;
            text-align: center;
            font-size: 10px;
            line-height: 18px;
            color: #404258;
            font-weight: 600;
            font-family: "Poppins", sans-serif !important;
            height: 100%;
        }
        .luxury-brands-products ul li a:hover {
                /* background: rgb(139 0 0); */
                transform: translateY(-10px);
                transition: transform 350ms;
            }
            
        .luxury-brands-products ul li a:hover img
        {
            -webkit-animation:spin 1000ms linear infinite;
            -moz-animation:spin 1000ms linear infinite;
            animation:spin 1000ms linear infinite;
        }

        @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

        .luxury-brands-products ul li span {
            width: 50px;
            height: 50px;
            display: block;
            margin: 0px auto 5px;
        }
        .luxury-brands-products ul li span img {
            width: 100%;
        }

        .luxury-brands-products ul li {
            margin: 10px;
            width: calc(91% / 7);
            min-height: 70px;
            margin-bottom: 15px;
        }

        @media (max-width: 1700px)
        {
                .luxury-brands-products ul li {
                margin: 10px;
                width: calc(90% / 7);
                min-height: 70px;
            }
        }
        @media (max-width: 1600px)
        {
                .luxury-brands-products ul li {
                width: calc(90% / 7);
                margin: 9px;
            }
        }
        @media (max-width: 1070px)
        {
            .luxury-brands-products ul li {
                width: calc(89% / 5);
            }
        }

        @media (max-width: 992px)
        {
            .luxury-brands-products ul li {
                    width: calc(95% / 5);
                    margin: 4px;
                }   
        }
        @media (max-width: 768px)
        {
            .luxury-brands-products ul li a {
                font-size: 11px;
                padding: 8px;
            }
            products ul li {
                width: calc(93% / 6);
                margin: 4px;
            }
            .luxury-brands-products ul li span {
                height: 40px;
                width: 40px;
            }
        }
        @media only screen and (max-width:650px){
            .block-heading > span {
                font-size: 9px;
                font-weight: 600;
                line-height: 20px;
                padding:0;
            }
            .brand-link >.brand-img{
                max-height: 35px;
            }
        }
        @media (max-width: 576px)
        {
                .luxury-brands-products ul li a {
                font-size: 10px;
            }
            .luxury-brands-products ul li {
                min-width: auto;
                width: calc(91% / 3);
            }
            
        }

   </style>