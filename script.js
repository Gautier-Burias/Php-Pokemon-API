const button = document.querySelectorAll(".list-item-pokemon")
const menu = document.querySelectorAll(".pokeinfo")
const closeButton = document.querySelectorAll('.close-button')
const infosearched = document.querySelector('.pokeinfo searched')

for(let i = 0; i < button.length; i++)
{
    button[i].addEventListener(
        "click", function()
        {
            for(let i = 0; i < menu.length; i++)
            {
                menu[i].style.display = "none"
            }
            menu[i].style.display = "flex"
        }
    ) 
    closeButton[i].addEventListener('click',
() =>{
  menu[i].style.display = 'none'
})
}

if(infosearched.style.display = 'flex'){
    infosearched.style.width = '100%;'
    infosearched.style.height = '100%;'
}