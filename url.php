<?php

    // Create the general URL of PokeAPI
    $generalUrl = 'https://pokeapi.co/api/v2/pokemon/?';
    $generalUrl .= http_build_query([
        'offset' => 0,
        'limit' => 151,
    ]);
    
    // Creating URL 
    function createUrl($url, $index)
    {
        global $results;

        // Cache info
        $cacheKey = md5($url);
        $cachePath = './cache/'.$cacheKey;
        $cacheUsed = false;

        // Cache available
        if(file_exists($cachePath))
        {
            $results[$index] = file_get_contents($cachePath);
            $cacheUsed = true;
        }
        
        // Cache not available
        else
        {
            // Make request to API
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            $results[$index] = curl_exec($curl);
            curl_close($curl);

            // Save in cache
            file_put_contents($cachePath, $results[$index]);
        }

        // Decode JSON
        $results[$index] = json_decode($results[$index]);
    };

    // Create the pokemon links
    function createPokemonUrl($pokemonName, $index)
    {
        global $results;
        // Create API pokemon url
        $pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/';
        $pokemonUrl .= $pokemonName;

        createUrl($pokemonUrl, $index);
    }

    // Function to get another URL to get other info (like pokémon description etc...)
    function createInfoUrl($pokemonName, $index)
    {
        global $results;

        $pokeInfoUrl = "https://pokeapi.co/api/v2/pokemon-species/";
        $pokeInfoUrl .= $pokemonName;
        createUrl($pokeInfoUrl, $index);
    }   

    createUrl($generalUrl, 0);

    // Searching pokemon 

    if($searchedPokemon = !empty($_GET['pokemon'])){
        $searchedPokemon = empty($_GET['pokemon']) ? '' : strtolower($_GET['pokemon']);
        
    }

    // Display pokemon 

    // Error if the $searchedPokemon doesnt exist
    function error(){
        echo 'Pokémon Unknown - ';
    }
    function error2(){
        echo ' ';
    }

    $pokemon = $results[0]->results;

    
?>