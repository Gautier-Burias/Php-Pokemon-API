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
    <link rel="icon" type="image/png" href="fav-ic/pokeball.png" />
</head>
<body>
    <h1>Pokedex</h1>
    <form class="formSearch"action="" method="get">
        <input class ="input" type="text" name="pokemon" placeholder="Search any Pokemon">
        <input class ="submitfirst" value="Search" type="submit">
    </form>
    <div class="list-pokemon">

    <?php if(!empty($_GET['pokemon'])): ?>
    <div class="pokeinfo" style ="display : flex">
            <h2>Pokémon Information</h2> 
            <p class = "pokeinfoname"><?= $searchedPokemon ?></p>
            <p class="pokeinfotype"><strong>Type : </strong><?= pokemonType($searchedPokemon, 3, 1)?><br/></p>
            <p class="pokeinfoabilities"><strong>Abilities : </strong><?= pokemonAbilities($searchedPokemon, 4, 1)?></p>
            <img class="infosprite" src="<?= pokemonSprite($searchedPokemon, 2, 0)?>">
            <p class="pokeheight"><strong>Height : </strong><?= pokemonHeight($searchedPokemon, 4, 1)?>0cm<br/></p>
            <p class="pokeweight"><strong>Weight : </strong><?= pokemonWeight($searchedPokemon, 4, 1)?>Kg</p>


            
            <form action="" method="get">
                <input class ="submit" value="Perform a new search" type="submit">
             </form> 
             <p class = "pokeinfodescription"><strong>Description : </strong><?= pokemonDescription($searchedPokemon, 4, 1)?></p>

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
            <p class = "pokeinfoname"><?= $_pokemon->name ?></p>
            <p class="pokeinfotype"><strong>Type : </strong><?= pokemonType($_pokemon->name, 3, 1)?><br/></p>            <p class="pokeinfoabilities"><strong>Abilities : </strong><?= pokemonAbilities($_pokemon->name, 4, 1)?></p>
            <img class="infosprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
            <p class = "close-button">Close information</p>
            <p class = "pokeinfodescription"><strong>Description : </strong><?= pokemonDescription($_pokemon->name, 4, 1)?></p>
            <p class="pokeheight"><strong>Height : </strong><?= pokemonHeight($_pokemon->name, 4, 1)?>0cm <br/></p>
            <p class="pokeweight"><strong>Weight : </strong><?= pokemonWeight($_pokemon->name, 4, 1)?>Kg</p>
            

        </div>

    <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>