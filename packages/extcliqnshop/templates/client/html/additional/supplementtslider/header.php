<?php
$enc = $this->encoder();
?>




<link rel="stylesheet" href="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/slider.css', 'fs-theme', true ) ) ?>">
<link rel="stylesheet" href="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/catalog-lists.css', 'fs-theme', true ) ) ?>">


<script defer src="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/slider.js', 'fs-theme', true ) ) ?>"></script>
<script defer src="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/catalog-lists.js', 'fs-theme', true ) ) ?>"></script>


<style>
    @media (min-width: 992px)
    {
        .catalog-list.swiffy-slider {
            --swiffy-slider-item-count: 6;
        }
    }
</style>