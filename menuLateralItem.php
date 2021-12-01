<?php
    @session_start();
?>
<li class="nav-item">
    <a href="#" class="nav-link" onclick="abrePagina('<?php echo $_SESSION['dados'][0]; ?>')" id="btn<?php echo $_SESSION['dados'][0]; ?>">
        <i class="fas fa-users"></i>
        <p>
            <?php
                echo $_SESSION['dados'][1];
            ?>
        </p>
    </a>
</li>