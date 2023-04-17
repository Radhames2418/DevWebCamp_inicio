<?php
    include_once __DIR__ . '/conferencias.php'
?>

<section class="resumen">
    <div class="resumen__grid">
        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total ?></p>
            <p class="resumen__texto resumen__texto--texto">speakers</p>
        </div>

        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total ?></p>
            <p class="resumen__texto resumen__texto--texto">conferencias</p>
        </div>

        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total ?></p>
            <p class="resumen__texto resumen__texto--texto">workshops</p>
        </div>

        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto resumen__texto--texto">asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertos en DevWebCamp</p>

    <div class="speakers__grid">
        <?php foreach ($ponentes as $ponente) { ?>
            <div data-aos="<?php aos_animacion(); ?>" class="speaker">
                <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" alt="Imagen Ponente"/>
                </picture>

                <div class="speaker__informacion">
                    <h4 class="speaker__nombre"><?php echo $ponente->nombre . " " . $ponente->apellido; ?></h4>

                    <p class="speaker__ubicacion">
                        <?php echo $ponente->ciudad . ", " . $ponente->pais; ?>
                    </p>

                    <nav class="speaker-sociales">
                        <?php
                            $redes = json_decode($ponente->redes);
                        ?>

                        <?php if(!empty($redes->facebook)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="https://facebook.com/<?php echo $redes->facebook?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->twitter)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="https://twitter.com/<?php echo $redes->twitter?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->youtube)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="https://youtube.com/<?php echo $redes->youtube ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->instagram)) { ?>
                            <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="https://instagram.com/<?php echo $redes->instagram ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->tiktok)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="https://tiktok.com/<?php echo $redes->tiktok ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>

                        <?php if(!empty($redes->github)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="https://github.com/<?php echo $redes->github ?>">
                                <span class="speaker-sociales__ocultar">Github</span>
                            </a>
                        <?php } ?>
                    </nav>

                    <ul class="speaker__listado-skills">
                        <?php $tags = explode(',', $ponente->tags) ?>
                        <?php foreach ($tags as $tag) { ?>
                            <li class="speaker__skill">
                                <?php echo $tag ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="boletos">
    <h2 class="boletos__heading">Boletos & Precios</h2>
    <p class="boletos__descripcion">Precios para DevWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial">
            <h4 class="boleto__logo">
                &#60; DevWebCamp />
                <p class="boleto__plan">Presencial</p>
                <p class="boleto__precio">$199</p>
            </h4>
        </div>
        <div class="boleto boleto--virtual">
            <h4 class="boleto__logo">
                &#60; DevWebCamp />
                <p class="boleto__plan">Virtual</p>
                <p class="boleto__precio">$49</p>
            </h4>
        </div>
        <div class="boleto boleto--gratis">
            <h4 class="boleto__logo">
                &#60; DevWebCamp />
                <p class="boleto__plan">Gratis</p>
                <p class="boleto__precio">$0</p>
            </h4>
        </div>
    </div>

    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver Paquetes</a>
    </div>
</section>