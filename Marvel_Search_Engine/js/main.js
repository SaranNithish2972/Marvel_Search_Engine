import * as func from './modules/functions.js'
import * as elem from './modules/elements.js'

let ACCESSDATA
(async () => {
    ACCESSDATA = await func.getAccessData()
})()

const marvel = {
    createListOfCharacters: async (startsWith) => {
        const URLAPI = `https://gateway.marvel.com:443/v1/public/characters?${ACCESSDATA.tsAccess}&nameStartsWith=${startsWith}&apikey=${ACCESSDATA.publicKey}&${ACCESSDATA.md5HashAccess}`;
        const response = await fetch(URLAPI)
        const json = await response.json()
        
        // Code to create list of possible choices
        {
            func.cleanGuidebook()
            if (json.data.results.length == 1) {
                marvel.renderCharacter(json.data.results[0].id)
                document.getElementById('marvelUniversePicture').style.display="none"
            } 
            else  if (json.data.results.length == 0) {
            alert("No results found");
            }
            else {
                // document.getElementById('marvelUniversePicture').style.display="none"
                for (let index = 0; index < json.data.results.length; index++) {
                    const heroFound = json.data.results[index];
                    let tempNode = elem.templateSearchResults.content
                    let htmlNode = document.importNode(tempNode,true)
                    htmlNode.querySelector('.character_search_result__container__name').textContent = heroFound.name
                    htmlNode.querySelector('.character_search_result__picture').setAttribute("src", `${heroFound.thumbnail.path}.${heroFound.thumbnail.extension}`)
                    htmlNode.querySelector('.character_search_result__container').setAttribute("id", `resultID${index}`)
                    elem.characterSearchResults.appendChild(htmlNode)
                    func.$(`resultID${index}`).classList.add(`search_result_color_${Math.floor(Math.random()*4+1)}`)
                    func.$(`resultID${index}`).addEventListener("click" , () => {
                        marvel.renderCharacter(heroFound.id)
                    })
                    document.getElementById('resultsStart').scrollIntoView()
                }
            }
        }
    },
    renderCharacter: async (id) => {
        const URLAPI = `https://gateway.marvel.com:443/v1/public/characters/${id}?${ACCESSDATA.tsAccess}&apikey=${ACCESSDATA.publicKey}&${ACCESSDATA.md5HashAccess}`
        const response = await fetch(URLAPI)
        const json = await response.json()    
        const heroSelected = await json.data.results[0]
        var name = heroSelected.name;
    var location=document.getElementById("city").textContent;
              fetch('insert.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: "name=" + name +"&location="+ location
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
  });
 
        let comicURI = []
        let seriesURI = []
        let storiesURI = []
        let moreInfoURI = []
        
        func.renderMainInfo(elem.templateCharacterRender, heroSelected, elem.characterGalery, 1)
        func.renderElementsStructure(
            elem.charactersGalery_comicRailTemplate, 
            'charactersGalery_comicRailTemplate', 
            elem.charactersGalery_comicsRail, 
            'charactersGalery_comicsRail', 
            heroSelected.comics.items, 
            'comicPicture', 
            comicURI, 
            marvel.renderComic, 
            ACCESSDATA,
            'rail')
        
        func.renderElementsStructure(
            elem.charactersGalery_seriesRailTemplate, 
            'charactersGalery_seriesRailTemplate', 
            elem.charactersGalery_seriesRail, 
            'charactersGalery_seriesRail', 
            heroSelected.series.items, 
            'seriesPicture', 
            seriesURI, 
            marvel.renderSeries, 
            ACCESSDATA,
            'rail')

        func.renderElementsStructure(
            elem.charactersGalery_storiesListTemplate, 
            'charactersGalery_storiesListTemplate', 
            elem.charactersGalery_storiesList, 
            'charactersGalery_storiesList', 
            heroSelected.stories.items, 
            'storiesLink', 
            storiesURI, 
            marvel.renderStories, 
            ACCESSDATA,
            'list')

        func.renderInfoLinks(
            charactersGalery_moreInfoTemplate, 
            'charactersGalery_moreInfoTemplate', 
            charactersGalery_moreInfo, 
            'charactersGalery_moreInfo', 
            heroSelected.urls)
        
        func.renderImages(comicURI, 'comicPicture', ACCESSDATA)
        func.renderImages(seriesURI, 'seriesPicture', ACCESSDATA)   
    },
   
}

// document.getElementById('mainTitle').addEventListener("click", ()=>{
//     location.reload()
// })

elem.searchButton.addEventListener("click", ()=>{
    let hero = elem.searchHeroBar.value
    marvel.createListOfCharacters(hero)
})

elem.findRandomButton.addEventListener("click", async ()=>{
    const alphabet = 'abcdefghijklmnopqrstuvwxyz'
    const URLAPI = `https://gateway.marvel.com:443/v1/public/characters?${ACCESSDATA.tsAccess}&nameStartsWith=${alphabet[Math.floor(Math.random() * alphabet.length)]}&apikey=${ACCESSDATA.publicKey}&${ACCESSDATA.md5HashAccess}`;
    const response = await fetch(URLAPI)
    const json = await response.json()
    marvel.renderCharacter(json.data.results[Math.floor(Math.random() * json.data.results.length)].id)
})