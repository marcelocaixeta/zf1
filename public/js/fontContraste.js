
jQuery(window).load(function() {
/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx altera o contraste da tela xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx*/

carregarCookie();

   function setActiveStyleSheet(title) {
/*        HTMLLinkElement.getAttribute("rel").indexOf("style") != -1
    HTMLListElement.getAttribute("title")
    HTMLLinkElement.getAttribute("rel").indexOf("alt") != -1*/
        var i, a, main;
        for(i=0;(a=document.getElementsByTagName("link")[i]);i++)
        {
            if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
                a.disabled = true;
                if(a.getAttribute("title") == title) a.disabled = false;
            }
        }
    }


/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ações dos botões de contraste */

     $("#contraste").click(function(){
        setActiveStyleSheet("contraste");
        criarCookie();
        return false;
     });

     $("#contrasteNormal").click(function(){
        setActiveStyleSheet("padrao");
        criarCookie();
        return false;
     });



/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx carrega o cookie atual */

function carregarCookie(e) {
    var cookie = readCookie("style");
    var title = cookie ? cookie : getPreferredStyleSheet();

    setActiveStyleSheet(title);
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx criar o cookie */

function criarCookie(e) {
    var title = getActiveStyleSheet();
    createCookie("style", title, 365);
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx pega a folha de estilo preferida ativa */

function getActiveStyleSheet() {
    var i, a;
    for(i=0;(a=document.getElementsByTagName("link")[i]);i++)
    {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")
            && !a.disabled) return a.getAttribute("title");
    }
return null;
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx função criar cookie */

function createCookie(name,value,daes) {
    if (daes) {
        var date = new Date();
        date.setTime(date.getTime()+(daes*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx função ler cookie */

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length,c.length);
    }
    return null;
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx função pegar o preferida estilo */

function getPreferredStyleSheet() {
    var i, a;
    for(i=0;(a=document.getElementsByTagName("link")[i]);i++)
    {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("rel").indexOf("alt") == -1 && a.getAttribute("title")
           ) 
            return a.getAttribute("title");
    }
    return null;
}

/*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx*/
});