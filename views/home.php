<?php include 'template/clientHeader.php'; ?>

<?php include 'template/clientNavbar.php'; ?>

<div class="container">
    <h1 class="text-center my-4">Bienvenue au Zoo</h1>

    <!-- Présentation -->
    <section class="my-5">
        <h2>Présentation</h2>
        <p>Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960.
Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font
extrêmement attention à leurs santés. Chaque jour, plusieurs vétérinaires viennent afin
d’effectuer les contrôles sur chaque animal avant l’ouverture du zoo afin de s’assurer que tout
se passe bien, de même, toute la nourriture donnée est calculée afin d’avoir le bon grammage. Découvrez notre magnifique zoo, un lieu de découverte et d'aventures pour petits et grands !</p>

    </section>

    <div id="carouselZoo" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/pexels-rifkyilhamrd-788200.jpg" class="d-block w-100 carrousel-img" alt="Jungle">
        </div>
        <div class="carousel-item">
            <img src="/images/tourist-train-938568_1280.jpg" class="d-block w-100 carrousel-img" alt="Train">
        </div>
        <div class="carousel-item">
            <img src="/images/toco-toucan-ramphastos-toco.jpg" class="d-block w-100 carrousel-img" alt="Toucan">
        </div>
        <div class="carousel-item">
            <img src="/images/pexels-reneasmussen-1581384.jpg" class="d-block w-100 carrousel-img" alt="Resto">
        </div>
        <div class="carousel-item">
            <img src="/images/savane-1.jpg" class="d-block w-100 carrousel-img" alt="Savane">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselZoo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselZoo" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>


    <!-- Habitats (statique) -->
    <section class="my-5">
        <h2>Nos habitats</h2>
        <ul>
            <li>Savane</li>
            <p>La savane d'Arcadia est un vaste espace ensoleillé, parsemé d'herbes hautes et d'acacias, où les visiteurs peuvent observer des animaux majestueux évoluer dans leur environnement naturel. Ce paysage ouvert, ponctué de points d'eau, offre un habitat idéal pour les espèces qui cohabitent ici.</p>
            <li>Jungle</li>
            <p>La jungle d'Arcadia est une forêt tropicale dense, riche en biodiversité, où la lumière filtre à travers un feuillage épais. Les sons des oiseaux exotiques et des cris des singes créent une atmosphère vibrante. Cet habitat humide et chaud abrite de nombreuses espèces fascinantes.</p>
            <li>Marais</li>
            <p>Le marais d'Arcadia est un écosystème unique, avec des zones d'eau stagnante et des plantes aquatiques luxuriantes. Ce milieu riche en boue et en humidité attire une variété d'animaux qui s'épanouissent dans cette zone humide, offrant aux visiteurs un aperçu fascinant de la vie aquatique et terrestre.</p>
        </ul>
    </section>

    <!-- Services (statique) -->
    <section class="my-5">
        <h2>Nos services</h2>
        <ul>
            <li>Restaurant - Une pause gourmande au cœur de la nature</li>
            <li>Train touristique - Tarif : 5€ par personne</li>
            <li>Guide touristique - Explorez le zoo avec un expert</li>
        </ul>
    </section>

    <!-- Races animales (statique) -->
    <section class="my-5">
        <h2>Nos animaux</h2>
        <div class="row">
            <div class="col-md-3">
                <img src="/images/image.jpeg" class="img-fluid" alt="Lion">
                <p>Lion</p>
            </div>
            <div class="col-md-3">
                <img src="/images/zebre.jpg" class="img-fluid" alt="Zèbre">
                <p>Zèbre</p>
            </div>
            <div class="col-md-3">
                <img src="/images/1309518-Crocodile.jpg" class="img-fluid" alt="Alligator">
                <p>Alligator</p>
            </div>
            <div class="col-md-3">
                <img src="/images/toco-toucan-ramphastos-toco.jpg" class="img-fluid" alt="Toucan">
                <p>Toucan</p>
            </div>
        </div>
    </section>

    <section class="my-5">
    <h2>Avis des visiteurs</h2>
    <?php if (!empty($approvedReviews)): ?>
        <ul>
            <?php foreach ($approvedReviews as $review): ?>
                <li>
                    <strong><?= htmlspecialchars($review['pseudo']) ?></strong> (<?= $review['rating'] ?>/5)
                    <p><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun avis validé pour le moment.</p>
    <?php endif; ?>
</section>

    <section class="my-5">
    <h2>Horaires d'ouverture</h2>
    <ul>
        <?php
        if (is_array($hours)) {
            foreach ($hours as $day => $hour):
                if (is_string($day) && is_string($hour)):
        ?>
                    <li><?= htmlspecialchars($day) ?> : <?= htmlspecialchars($hour) ?></li>
        <?php
                endif;
            endforeach;
        } else {
            echo "<li>Pas d'horaires disponibles.</li>";
        }
        ?>
    </ul>
</section>

</div>

<?php include 'template/clientFooter.php'; ?>