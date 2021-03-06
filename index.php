<?php
session_start();
require_once 'admin/backend/config.php';
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia modi dolore magnam! Iste libero voluptatum autem, sapiente ullam earum nostrum sed magnam vel laboriosam quibusdam, officia, esse vitae dignissimos nulla?
        </aside>
        <main>
            <!-- query -->
        <?php 
            require_once 'admin/backend/conn.php';
            $query = "SELECT * FROM rides";
            $statement = $conn->prepare($query);
            $statement->execute();
            $rides = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

            <div class="attracties">
                <?php foreach ($rides as $ride): ?>
                    <div class="attractie <?php if($ride['fast_pass']) echo "large"?>">
                        <img src="<?php echo 'img/attracties/' . $ride['img_file']?>" alt="plaat">
                        <div class="ride-bottom">
                            <p><i><?php echo "<div class='themeland'>" . $ride['themeland'] . "</div>"?></i></p>
                            <h2><?php echo $ride['title']?></h2>
                            <p><?php echo $ride['description']?></p>
                        </div>
                        <?php if($ride['fast_pass']): ?>
                            <div class="fast-pass">	
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, minima soluta magnam, necessitatibus ullam consequuntur sunt consectetur animi ea dolore repellendus eaque voluptates? Aspernatur sunt rerum aut illo nihil voluptas.</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus maxime ipsum quasi ducimus quod rerum sapiente eius! Rem quod exercitationem consequatur ut sit sequi aspernatur, corrupti laborum ducimus soluta accusantium.</p>
                                <button><img src="img/ticket.png" alt="ticket">FAST PASS</button> 
                            </div>
                            <?php endif; ?>
                    </div>
                            
                <?php endforeach; ?>
            </div>
            


        </main>
    </div>

</body>

</html>
