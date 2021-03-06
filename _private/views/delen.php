<?php $this->layout('layouts::website');?>

<title>Delen</title>

<link rel="stylesheet" href="<?php echo site_url( '/css/delen.css' ) ?>" media="all">

<?php if(isLoggedIn()): ?>
<div class="delen_container" >
    <h1>Plaats een bericht</h1>
    <form action="<?php echo url('bericht.opslaan') ?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="afbeelding">Kies afbeelding</label>
            <input id="afbeelding" name="afbeelding" type="file">
            <?php if (isset($errors['afbeelding'])): ?>
                <?php echo $errors['upload'] ?>
            <?php endif; ?>
        </div>
        <div>
            <label for="onderwerp">Onderwerp</label>
            <select id="onderwerp" name="onderwerp" id="">
                <option value="lgbt">Lgbt</option>
                <option value="depressie">Depressie</option>
                <option value="zelfverzekerd">Zelfverzekerd</option>
                <option value="mentale_gezondheid">Mentale gezondheid</option>
                <option value="onzeker">Onzeker</option>
            </select>
        </div>
        <div>
            <label for="beschrijving">Beschrijving</label>
            <textarea placeholder="max 600 tekens" id="beschrijving" name="beschrijving" cols="30" rows="8"></textarea>
        </div>
        <button class="cta-button" type="submit">Plaats bericht</button>
    </form>
</div>
<?php else: ?>
    <?php 
    header('Location: registratie.form', true, 301); 
    exit();
    ?>
<?php endif; ?>