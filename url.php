<?php

    // How many pokemon to display



    if($searchedPokemon = !empty($_GET['pokemon'])){
        $searchedPokemon = empty($_GET['pokemon']) ? '' : strtolower($_GET['pokemon']);

    }
    $step = empty($_GET['displayed']) ? 50 : $_GET['displayed'];

    // Searching pokemon 
    if(!empty($_GET['pokemon'])){
        $pokemonsearched = $_GET['pokemon'];
            if($pokemonsearched === 'pikachu'){
                echo 'COUCOU';
            }
            else{
                echo '';
            }
    }
    // Create API general url
    $generalUrl = 'https://pokeapi.co/api/v2/pokemon/?';
    $generalUrl .= http_build_query([
        'offset' => 0,
        'limit' => $step,
    ]);
    
    // Function creating urls when needed
    function createUrl($url, $index)
    {
        global $results;

        // Create cache info
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

    // Function created pokemon links
    function createPokemonUrl($pokemonName, $index)
    {
        global $results;
        // Create API pokemon url
        $pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/';
        $pokemonUrl .= $pokemonName;

        createUrl($pokemonUrl, $index);
    }

    // Function to get another URL to get other info, like pokémon description etc...
    function createInfoUrl($pokemonName, $index)
    {
        global $results;

        $pokeInfoUrl = "https://pokeapi.co/api/v2/pokemon-species/";
        $pokeInfoUrl .= $pokemonName;
        createUrl($pokeInfoUrl, $index);
    }



    // Function created sprite pokemon links
   

    createUrl($generalUrl, 0);

    $pokemon = $results[0]->results;
    $count = $results[0]->count;
?>