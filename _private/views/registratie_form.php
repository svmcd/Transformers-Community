<?php $this->layout('layouts::website');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/registratie.css' ) ?>" media="all">

<title>registreren</title>

<div class="registratie-container">
    <div>
        <img class="registratie_image" src="<?php echo site_url( '/images/signup_image.png' ) ?>" alt="image">
    </div>
    <div class="registratie_box">
        <div>
            <h3>Word lid 😊</h3>
            <p>Voor jongeren (16-27 j.) die zich zelfverzekerd willen
    voelen en tegenslagen omzetten in kracht.</p>
        </div>
        <form action="<?php echo url("registratie.verwerking")?>" method="POST">
        
            <input minlength="3" class="form_element" type="text" name="gebruikersnaam" value="" id="gebruikersnaam" placeholder="gebruikersnaam">
                
            <input class="form_element" type="email" name="email" value="" id="email" placeholder="email">

            <input minlength="6" class="form_element" type="password" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord">

            <button class="form_element cta-button" type="submit">Registreren</button>

        </form>

        <p>Of log <a class="registratie_box_link" href="<?php echo url( 'login.form' ) ?>"<?php if ( current_route_is( 'login.form' ) ): ?> <?php endif ?>>hier</a> in als je al een account hebt</p>
        <!-- <p>of log <a href="#">hier</a> in als je al een account hebt</p> -->
    </div>
</div>

