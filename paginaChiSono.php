<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi sono</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>
    
<body>

<!-- caricamento e decodifica in array del file json per la pagina Chi Sono --------------------->
    <?php
        $datiJsonPaginaChiSono = file_get_contents ("datiPaginaChiSono.json");
        $datiPaginaChiSono = json_decode ($datiJsonPaginaChiSono,true);
    ?>

<!-- header: include del menu di navigazione --------------------------------------->
    <?php
    include ('menuNav.php'); 
    ?>

<!-- main: storia dell'attività + esperienze --------------------------------------------------------------------------------------->
    <main id="centraContenuto">
        <br><br><br><br><br><br><br>

        <h2 class="sottoTitolo">Qualcosa su di me</h2>
            <p class="descrizione">
                Benvenuti sul mio sito web, sono Lorenzo, uno sviluppatore web full stack. 
                La mia expertise spazia dalla progettazione visiva all'implementazione logica dei siti web. 
                Inizialmente laureato in economia, ho canalizzato la mia passione per il digitale 
                per specializzarmi e perseguire con dedizione questo affascinante percorso professionale.
            </p>
            <p class="descrizione" >
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
                officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
                officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
                officia voluptatem id delectus. 
            </p>

        <br><br><br>

        <h2 class="sottoTitolo" >Come è nata la mia attività</h2>
        <p class="descrizione">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, optio? 
            Obcaecati molestias, voluptates, deserunt ratione dolores magnam perferendis quidem 
            nobis voluptatem sapiente dicta consequatur porro! Tenetur provident culpa asperiores 
            voluptates?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. 
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. Beatae facere, odio voluptatem placeat saepe esse. Magni ut odit iusto!
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo consectetur quisquam beatae neque iusto velit
            officia voluptatem id delectus. 
        </p>

        <br><br><br>

        <h2 class="sottoTitolo" >Le mie esperienze</h2>
        <br>
        <figure>
        <?php foreach ($datiPaginaChiSono[0]['esperienze']['immagini'] as $immagine): ?>
                <img src="<?php echo $immagine['src']; ?>" alt="<?php echo $immagine['alt']; ?>" height="400px" width="400px">
                <figcaption><Strong><?php echo $immagine['alt']; ?>:</Strong> Lorem ipsum dolor sit amet consectetur, Lorem ipsum dolor</figcaption>
                <br><br><br><br><br>
            <?php endforeach; ?>
            
            
        </figure>
        <h2 class="sottoTitolo">Sei interessato a collaborare? mandami una richiesta tramite il modulo di seguito</h2>
    </main>


<!-- footer: form + contatti + link utili + cookie policy ------------------------------------------------------------------------------------>

    <footer>
        <section>
            <form class="form-stile" action="salvaDati.php" method="POST">
                <fieldset>
                    <legend>MANDAMI UNA RICHIESTA</legend>
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" placeholder="Insersci nome">
                    <br><br>
                    <label for="cognome">Cognome</label><br>
                    <input type="text" name="cognome" placeholder="Insersci cognome">
                    <br><br>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" placeholder="esempio@dominio.com">
                    <br><br>
                    <label for="selezione-richiesta">Richiesta principale</label><br>
                    <select name="selezione-motivo">
                        <option value=""></option>
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
                    <li><p>Email: <?php echo $datiPaginaChiSono[0]['contatti']['email']; ?></p></li>
                    <li><p>Telefono: <?php echo $datiPaginaChiSono[0]['contatti']['telefono']; ?></p></li>
                </ul>
            </address>

            <br>
            
            <nav>
                <h4>Link utili</h4>
                <ul>
                    <?php foreach ($datiPaginaChiSono[0]['link_utili'] as $link): ?>
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