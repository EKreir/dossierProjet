
<div class="container">
    <h1 class="text-center my-4">Bienvenue au Zoo</h1>

    <!-- Présentation -->
    <section class="my-5">
        <h2>Présentation</h2>
        <p>Découvrez notre magnifique zoo, un lieu de découverte et d'aventures pour petits et grands !</p>
        <img src="/public/images/zoo_overview.jpg" class="img-fluid" alt="Vue du zoo">
    </section>

    <!-- Habitats (statique) -->
    <section class="my-5">
        <h2>Nos habitats</h2>
        <ul>
            <li>Savane</li>
            <li>Jungle</li>
            <li>Marais</li>
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
                <img src="/public/images/lion.jpg" class="img-fluid" alt="Lion">
                <p>Lion</p>
            </div>
            <div class="col-md-3">
                <img src="/public/images/zebra.jpg" class="img-fluid" alt="Zèbre">
                <p>Zèbre</p>
            </div>
            <div class="col-md-3">
                <img src="/public/images/alligator.jpg" class="img-fluid" alt="Alligator">
                <p>Alligator</p>
            </div>
            <div class="col-md-3">
                <img src="/public/images/toucan.jpg" class="img-fluid" alt="Toucan">
                <p>Toucan</p>
            </div>
        </div>
    </section>

    <section class="my-5">
    <h2>Horaires d'ouverture</h2>
    <ul>
        <?php 
        // Vérifie si $hours est bien un tableau associatif
        if (is_array($hours)) {
            foreach ($hours as $day => $hour):
                // Assure-toi que $day et $hour sont des chaînes de caractères
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
