<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>
<body>

<!-- caricamento e decodifica in array del file json per la homepage -------------------->

<?php
$datiJsonHomepage = file_get_contents("datiHomepage.json");
$datiHomepage = json_decode($datiJsonHomepage, true); 
?>

<!-- header: include del menu di navigazione --------------------------------------->

<?php
include ('menuNav.php'); 
?>

<!-- main: media con messaggio introduttivo + anteprima elenco lavori ed invito a visitarli + recensioni ---------------->
<main id="centraContenuto"> 
    
    <br><br><br><br><br><br>

    <div id="video-container">
        <video src="/media/introHome.mp4" autoplay loop muted></video>
    <br>
    </div>

    <br><br><br><br><br>

    <section> 
        <p class="sottoTitolo"> <?php echo $datiHomepage[0]['sottotitolo'] ?><p>
            <br>
        <div style="display: flex; justify-content: center; gap: 200px;">
            <?php foreach ($datiHomepage[0]['lavori'] as $lavoro): ?>
                <figure>
                    <img src="<?php echo $lavoro['immagine']; ?>" alt="Foto del progetto <?php echo $lavoro['nome']; ?>" title="<?php echo $lavoro['nome']; ?>" width="300px">
                    <figcaption><?php echo $lavoro['nome']; ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div> 
        <br><br>
        <h3 class="titoli3">Vai oltre:</h3><a class="linkImportante" href="paginaElencoLavori.php">Esplora tutti i miei progetti!</a>
        <br><br><br><br><br>
        <p class="sottoTitolo">Ecco cosa dicono i miei clienti!<p>
        <br>
        <figure>
            <?php foreach ($datiHomepage[0]['recensioni'] as $recensione): ?>
                <img src="<?php echo $recensione['foto']; ?>" alt="Foto cliente <?php echo $recensione['cliente']; ?>" title="<?php echo $recensione['cliente']; ?>" width="90" > 
                <p><strong>Recensione <?php echo $recensione['cliente']; ?>:</strong></p>
                <p class="recensione"><?php echo $recensione['testo']; ?></p>
                <br><br><br>
            <?php endforeach; ?>
        </figure>
    </section>
</main>
<br>

<hr>
<!-- footer: form + contatti + link utili + cookie policy ------------------------------>
<footer>
    <br><br><br><br>
    <h2 class="sottoTitolo">Contattami tramite il seguente modulo</h2>
    <section>
        <form class="form-stile" action="salvaDati.php" method="POST">
            <fieldset>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" placeholder="Inserisci nome">
                <br><br>
                <label for="cognome">Cognome</label><br>
                <input type="text" name="cognome" placeholder="Inserisci cognome">
                <br><br>
                <label for="email">E-mail</label><br>
                <input type="email" name="email" placeholder="esempio@dominio.com">
                <br><br>
                <label for="selezione-richiesta">Richiesta principale</label><br>
                <select name="selezione-motivo">
                    <option value="#"></option>
                    <option value="richiesta-1">Richiesta 1</option>
                    <option value="richiesta-2">Richiesta 2</option>
                    <option value="richiesta-3">Richiesta 3</option>
                </select>
                <br><br>
                <label for="messaggio">Messaggio</label><br>
                <textarea name="messaggio" cols="30" rows="10" placeholder="Inserisci qui dettagli della richiesta"></textarea>
                <br>
                <input type="submit">
            </fieldset>
        </form>
    </section>
    <br>
    <section>
        <h4>Contatti</h4>
        <address>
            <ul>
                <li><p>Email: <?php echo $datiHomepage[0]['contatti']['email']; ?></p></li>
                <li><p>Telefono: <?php echo $datiHomepage[0]['contatti']['telefono']; ?></p></li>
            </ul>
        </address>

        <br>
        
        <nav>
            <h4>Link utili</h4>
            <ul>
                <?php foreach ($datiHomepage[0]['link_utili'] as $link): ?>
                    <li><a class="linkUtili" href="<?php echo $link['url']; ?>"><?php echo $link['testo']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <a class="linkUtili" href="#"><h6>Privacy & Cookie policy</h6></a>
    </section>
</footer>

<!-- include del file per salvataggio dei dati del modulo di contatto ------------------->
<?php
include ('salvaDati.php'); 
?>


</body>
</html>
