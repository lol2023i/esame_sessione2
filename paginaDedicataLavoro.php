<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progetto innovativo</title>
    <link rel="stylesheet" href="/css/style.min.css">

</head>
<body>

<!-- caricamento e decodifica in array del file json per la pagina dedicata al singolo progetto --------------------->
    <?php
        $datiJsonPaginaDedicataLavoro = file_get_contents ("datiPaginaDedicataLavoro.json");
        $datiPaginaDedicataLavoro = json_decode ($datiJsonPaginaDedicataLavoro,true);
    ?>

<!-- header: include del menu + presentazione progetto con illustrazioni dello stesso ----------------------------------------------------->
    
    <header>
        <section>
            
        <?php include ('menuNav.php'); ?>

        </section>

        <br><br><br><br><br><br><br>

        <section id="centraContenuto">
        <h2 class="sottoTitolo"><?php echo $datiPaginaDedicataLavoro[0]['introduzione']['titolo']; ?></h2>

        <div style="display: flex; justify-content: center; gap: 10px;">
            <figure>

                <img src="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][0]['src']; ?>"
                     alt="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][0]['alt']; ?>"
                     title="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][0]['titolo']; ?>"
                     width="600px">
                <p><figcaption><strong><?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][0]['data']; ?></strong></figcaption></p>

                <br>
            </figure>
            <figure>

                <img src="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][1]['src']; ?>"
                     alt="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][1]['alt']; ?>"
                     title="<?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][1]['titolo']; ?>"
                     width="600px">
                <figcaption><strong><?php echo $datiPaginaDedicataLavoro[0]['introduzione']['immagini'][1]['data']; ?></strong></figcaption>
            </figure>

        </div>

    </section>
    </header>

<!-- main: spefiche tecniche del progetto + video intervista ------------------------------------------------------------------------>

    <main id="centraContenuto">
        <section>
        <h3 class="titoli3"><?php echo $datiPaginaDedicataLavoro[0]['specifiche']['titolo']; ?></h3>
        <ul>
            <?php foreach ($datiPaginaDedicataLavoro[0]['specifiche']['elenco_specifiche'] as $specifica): ?>
                <li><strong><?php echo $specifica; ?></strong></li>
            <?php endforeach; ?>
        </ul>

            <br>

            <h3 class="titoli3" >Obbiettivo finale del progetto</h3>

            <p class="descrizione">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. 
                Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo 
                prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli,
                 ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni 60, 
                 con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente 
                 da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.
                 Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. 
                Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo 
                prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli,
                 ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni 60, 
                 con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente 
                 da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum
                 da software di impaginazione come Aldus PageMaker, che includeva versioni 
            </p>
        </section>

        <br><br><br>

        <section>
        <h3 class="sottoTitolo"><?php echo $datiPaginaDedicataLavoro[0]['video_intervista']['titolo']; ?></h3>

        <div>
            <video src="<?php echo $datiPaginaDedicataLavoro[0]['video_intervista']['src']; ?>" autoplay loop controls width="1200px"></video>
        </div>
    </section>
    <br><br>
    <h2 class="sottoTitolo">VUOI COSTRUIRE INSIEME IL TUO PROGETTO? COMPILA IL FORM DI SEGUITO</h2>
    
        
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
                <li><p>Email: <?php echo $datiPaginaDedicataLavoro[0]['contatti']['email']; ?></p></li>
                <li><p>Telefono: <?php echo $datiPaginaDedicataLavoro[0]['contatti']['telefono']; ?></p></li>
            </ul>
            </address>

            <br>
            
            <nav>
                <h4>Link utili</h4>
                <ul>
                <?php foreach ($datiPaginaDedicataLavoro[0]['link_utili'] as $link): ?>
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