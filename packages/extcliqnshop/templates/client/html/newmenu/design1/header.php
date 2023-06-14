<?php

    $enc = $this->encoder();

?>

<link rel="stylesheet" href="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/newmenu.css', 'fs-theme', true ) ) ?>">
<script defer src="<?= $enc->attr( $this->content( $this->get( 'contextSiteTheme', 'default' ) . '/newmenu.js', 'fs-theme', true ) ) ?>"></script>







