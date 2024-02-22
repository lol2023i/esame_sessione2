<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servizi Offerti</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>
<body>

<!-- caricamento e decodifica in array del file json per la pagina dedicata ai servizi offerti --------------------->
<?php
    $datiJsonPaginaServiziOfferti = file_get_contents("datiPaginaServiziOfferti.json");
    $datiPaginaServiziOfferti = json_decode($datiJsonPaginaServiziOfferti, true);

    foreach ($datiPaginaServiziOfferti as $paginaServizi) {
?>

<!-- header:include del menu di navigazione --------------------------------------->
<?php include('menuNav.php'); ?>

<!-- main: dettaglio servizi offerti ----------------------------------->

<main id="centraContenuto">
<br><br><br><br><br><br><br>
    <h2 class="sottoTitolo">Servizi principali</h2>
    <p class="descrizione">
        Sono dedicato a offrire una vasta gamma di servizi di sviluppo web, progettati con attenzione e competenza per assicurare una presenza digitale che non solo rispecchi la visione unica dei miei clienti, ma che li differenzi anche in modo efficace e coinvolgente nel vasto panorama online. Con una combinazione di competenze full stack, capacità di progettazione creativa e un approccio orientato all'utente, mi impegno a fornire soluzioni web su misura che non solo soddisfano, ma superano le aspettative. La mia missione è trasformare le idee in esperienze digitali straordinarie, contribuendo al successo online dei miei clienti attraverso l'innovazione, la qualità e l'attenzione ai dettagli.
    </p>
    <br><br><strong>

    
    <?php foreach ($paginaServizi["servizi"] as $servizio) { ?>
        <h2 class="titoli3"><?= $servizio["titolo"] ?></h2>
        <img src="<?= $servizio["immagine"] ?>" alt="<?= $servizio["titolo"] ?>" height="400px" width="400px">
        <ul>
            <li><?= $servizio["descrizione"] ?></li>
        </ul>
        <br><br><br>
    <?php } ?>

    </strong>
    <br><br><br><br>
    <h2 class="sottoTitolo">Sei Interessato a qualche servizio? Mandami una richiesta tramite il modulo di seguito</h2>
</main>

<!-- footer: form + contatti + link utili + cookie policy ------------------------------------------------------------------------------------>
<footer>
    <section>
        <form class="form-stile" action="salvaDati.php" method="POST">
            <fieldset>
                <legend>MANDAMI UNA RICHIESTA</legend>
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
                    <?php foreach ($paginaServizi["servizi"] as $servizio) { ?>
                        <option value="<?= $servizio["titolo"] ?>"><?= $servizio["titolo"] ?></option>
                    <?php } ?>
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
                <li><p>Email: <?= $paginaServizi["contatti"]["email"] ?></p></li>
                <li><p>Telefono: <?= $paginaServizi["contatti"]["telefono"] ?></p></li>
            </ul>
        </address>
        <br>
        <nav>
            <h4>Link utili</h4>
            <ul>
                <?php foreach ($paginaServizi["link_utili"] as $link) { ?>
                    <li><a class="linkUtili" href="<?= $link["url"] ?>"><?= $link["testo"] ?></a></li>
                <?php } ?>
            </ul>
        </nav>
        <a class="linkUtili" href="#"><h6>Privacy & Cookie policy</h6></a>
    </section>
</footer>

<?php } ?>

<!-- include del file per salvataggio dei dati del modulo di contatto ------------------->
<?php
include ('salvaDati.php'); 
?>

</body>
</html>