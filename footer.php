<?php
    /**
    *   The template for displaying the footer
    *
    *   @package understrap
    **/

    defined( 'ABSPATH' ) || exit;
?>

<footer>
    <div class="container px-4 py-5">
        <div class="d-flex justify-content-between">
            <div>
                &copy; <?= date('Y') ?> Pokie Kie
            </div>
            <div>
                Website by Kyle Minto
            </div>
        </div>
    </div>
</footer>

<!-- Closing tags following the header file -->

</div>
<?php wp_footer(); ?>
</body>
</html>