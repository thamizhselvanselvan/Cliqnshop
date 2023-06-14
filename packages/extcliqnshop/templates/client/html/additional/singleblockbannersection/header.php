<?php
$enc = $this->encoder();
?>

 <!-- single block banner stylesheet start  -->
<style>
    .single-block-section .background[data-background] {
        font-size: 4vw;
    }
    .single-block-section .background {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #F5F5F5;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        color: #FFFFFF;
        padding: 2rem 0;
    }
    .single-block-section .container-xl {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }
    @media only screen and (max-width:768px){
        .single-block-section .background .container-xl div >p{
            font-size: 20px;
            padding-bottom: 10px;
            margin: 0;
        }
        .single-block-section .background .container-xl div >h6{
            font-size: 13px;
            padding-bottom: 15px;
        }
    }
</style>
<!-- single block banner stylesheet end   -->
