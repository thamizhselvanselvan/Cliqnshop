<?php
$enc = $this->encoder();
?>

<style>
    .Two-banner-section{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    @media only screen and (max-width:576px){
        .Two-banner-section{
            grid-template-columns: 1fr;
            grid-gap: 10px;
        }
        .Two-banner-section >div{
            padding: 0 10px;
        }
    }
</style>