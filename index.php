<?php
include './public/header.php';
include './includes/data.inc.php';
include './styles.php';
?>

<main>

    <section>
        <h1>Mes produits</h1>

        <div>
            <div>
                <a href="">
                    <img src=<?php echo $cat0['image']; ?> alt="">
                </a>
                <p class="legende">
                    <?php echo $cat0['titre'] . ' - ' . $cat0['prix'] ; ?>

            </div>
            
            <div>
                <a href="">
                    <img src="./medias/affiches/chaussure.jpeg" alt="">
                </a>
                <p class="legende">Rmax - $ 299.99</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/barbec.jpeg" alt="">
                </a>
                <p class="legende">rechaud barbecue et autre - $ 7999.99</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/bourse.jpeg" alt="">
                </a>
                <p class="legende">Porte feuille - $ 24.45</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/boursepers.jpeg" alt="">
                </a>
                <p class="legende">bourse + design - $ 30</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/briquet.jpeg" alt="">
                </a>
                <p class="legende">briquet - $ 14.99</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/canf.jpeg" alt="">
                </a>
                <p class="legende">caniffe - $ 59.99</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/gourde.jpeg" alt="">
                </a>
                <p class="legende">gourde personnalsee - $ 79.99</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/jbl.jpeg" alt="">
                </a>
                <p class="legende">speaker JBL- $ 159.99</p>
            </div>
        </div>
    </section>


</main>
</body>

</html>