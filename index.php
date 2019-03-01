<?php
    include('url.php');
    include('get.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokédex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
</head>
<body>
    <h1>Pokedex</h1>
    <form class="formSearch"action="" method="get">
        <input class ="input" type="text" name="pokemon" placeholder="Search a Pokemon">
        <input class ="submitfirst" value="Search" type="submit">
    </form>
    <!--
    <form action="" method="get">
        <label for="displayed">Display 200 Pokemon until : </label>
        <input type="number" name="displayed" placeholder="Example : 600">
        <input value="Set" type="submit">
    </form>
-->
    <div class="list-pokemon">

    <?php if(!empty($_GET['pokemon'])): ?>
    <div class="pokeinfo" style ="display : flex">
            <h2>Pokémon Information</h2> 
            <p class="pokeinfotype"><?= $searchedPokemon ?> is a <?= pokemonType($searchedPokemon, 3, 1)?> type pokémon.<br/></p>
            <p class="pokeinfoabilities">This pokémon abilities are :  <?= pokemonAbilities($searchedPokemon, 4, 1)?></p>
            <img class="infosprite" src="<?= pokemonSprite($searchedPokemon, 2, 0)?>">
            <form action="" method="get">
                <input class ="submit" value="Perform a new search" type="submit">
             </form> 
             <p class = "pokeinfodescription">Description : <?= pokemonDescription($searchedPokemon, 4, 1)?></p>

        </div>
    <?php endif;?>

    <?php foreach($pokemon as $_pokemon): ?>
        <div class="list-item-pokemon">
            <p class="pokeid"><?= pokemonId($_pokemon->name, 1)?>.</p>
            <div class="sprites-container">
                <img class="sprite sprite-0" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
            </div>
            <p class ="pokename"><?= $_pokemon->name ?></p>
            <p class="poketype">Type: <?= pokemonType($_pokemon->name, 3, 1)?></p>
        </div>

        <div class="pokeinfo">
            <h2>Pokémon Information</h2> 
            <p class="pokeinfotype"><?= $_pokemon->name ?> is a <?= pokemonType($_pokemon->name, 3, 1)?> type pokémon.<br/></p>
            <p class="pokeinfoabilities">This pokémon abilities are :  <?= pokemonAbilities($_pokemon->name, 4, 1)?></p>
            <img class="infosprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
            <p class = "close-button">Close information</p>
            <p class = "pokeinfodescription">Description : <?= pokemonDescription($_pokemon->name, 4, 1)?></p>
        </div>

    <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>