## Pokédex Using PokéAPI

This project is a Pokédex using the https://pokeapi.co/.

## How I made this ?

I made this Pokédex using PHP to get all the infos about the pokémon that I needed.
I also used a bit of Javascript to make dynamic contents and ofc HTML and CSS.

# Working with the API 

Setting up the url.php files was a bit hard at first, but after searching info on internet and after I asked some of my classmates, I managed to do it well.
Once the url.php file was ready, I only needed to create all the function I wanted in the getInfo.php (to get the sprite, the types, the abilities etc ).
Sometimes if i wanted info who where not available in the https://pokeapi.co/api/v2/pokemon/?, I create another function to get another url.
For example, if I wanted the description of a pokémon, available in https://pokeapi.co/api/v2/pokemon-species/, I do this 
```bash
function createInfoUrl($pokemonName, $index)
    {
        global $results;

        $pokeInfoUrl = "https://pokeapi.co/api/v2/pokemon-species/";
        $pokeInfoUrl .= $pokemonName;
        createUrl($pokeInfoUrl, $index);
    } 
```
So I can use this URL in the getInfo.php to get any pokémon description.

## Features : 

## 1 -Display 

This pokédex display 151 pokémons basically, all the 1st pokémon generation (from Bulbasaur to Mew).

## 2 -The information pannel

When you click on any pokémon, a information pannel will show up, giving you more info about the pokémon like :

-A sprite of the pokémon and his shiny form
-His type
-His abilities
-His height
-His weight
-A description

## 3 -The search Bar 

Even if I only display only the 1st pokémon generation, of course, you can search any existing pokémon.
Enter the name of the pokémon and the information pannel wiill show up, giving you all the infos about the pokémon.

## Problem encountered

I only displayed 151 pokémon because if i displayed more than 200, the site begin to bug.
Then I decided to only display the 1st generation and put a search bar where you can search every pokémon you want.

⚠️ Sometimes it take some seconds before the information pannel pop up after searching a pokémon ⚠️

Some others problems : Sometimes the API doesnt work the way we want, for example
if i wanted the pokémon description in english, that was the flavor_text_entries[1] for almost all pokémon but for some that was not
So we need to fix thoses problems ourself 

```bash
if($pokemonDescription = $results[$index]->flavor_text_entries[1]->language->name === 'en'){
        $pokemonDescription = $results[$index]->flavor_text_entries[1]->flavor_text;
        return $pokemonDescription;

    } // In case the description is in japanese, i fix it and put the english one
    else{
        $pokemonDescription = $results[$index]->flavor_text_entries[2]->flavor_text;
        return $pokemonDescription;
    } 
```

And thats it! 

## Thanks for reading :)













