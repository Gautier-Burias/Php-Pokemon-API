<?php


function pokemonSprite($pokemonName, $index, $side)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    if($side===0){
         $pokemonSprite = $results[$index]->sprites->front_default;
    }
    else{
        $pokemonSprite = $results[$index]->sprites->back_default;

    }
    return $pokemonSprite;
}

// Function created id pokemon
function pokemonId($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    $pokemonId = $results[$index]->id;
    return $pokemonId;
}


/* // FIRST TRY Function created type pokemon
function pokemonType($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    $pokemonType2 = $results[$index]->types[1]->type->name;

    if($pokemonType2 !== null){
    $pokemonType1 = $results[$index]->types[0]->type->name;
    $pokemonType2 = $results[$index]->types[1]->type->name;
    return $pokemonType1.' '.$pokemonType2;
    }
    else{
        return $pokemonType1;

    }

}*/ 

function pokemonType($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    $pokemonType = $results[$index]->types[0];

    if(sizeof($results[$index]->types) >= 2){
    $pokemonType1 = $results[$index]->types[0]->type->name;
    $pokemonType2 = $results[$index]->types[1]->type->name;
    return $pokemonType1.' & '.$pokemonType2;
    }
    else{
        $pokemonType1 = $results[$index]->types[0]->type->name;
        return $pokemonType1;
    }
}

function pokemonAbilities($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    $pokemonAbility = $results[$index]->abilities[0];

    if(sizeof($results[$index]->abilities) >= 2){
    $pokemonAbility1 = $results[$index]->abilities[0]->ability->name;
    $pokemonAbility2 = $results[$index]->abilities[1]->ability->name;
    return $pokemonAbility1. ' '.$pokemonAbility2;
    }
    else{
        $pokemonAbility1 = $results[$index]->abilities[0]->ability->name;
        return $pokemonAbility1;
    }
}



/*
function search($getPokemon, $pokemonName){
    global $results;

    $search = empty($_GET['search']) ? '' : $_GET['search'];
    if (empty($_GET['search'])) 
    {
        $searchState = 0;
        
    }
    else {
        $searchState = 1;
    };
    
}
*/

?>
