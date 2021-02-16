// dark mode du site avec cookie de javascript
//var bt=document.querySelector('.lune');
/*function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  } 
  // recuperation cookie
  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  // verification cookie
  function checkCookie() {
    var user = getCookie("dark");
    if (user != "") {
           return true;
    } else {
       return false;
    }
  } 

  function suppression_cookie(cle){
    document.cookie = cle+'=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC'; 
  }
  */
 /* var cible=document.querySelectorAll('.dar');
  var darkall=document.querySelectorAll('.darkt');
  var tx=document.querySelectorAll('.dark');
  cible.forEach(function(elem){
  elem.addEventListener("click",function(e){
      e.preventDefault();
   
     /* var user = getCookie("dark");
      if (user != "") {
          suppression cookie
        suppression_cookie("dark");
        darkall.forEach(function(element){
            element.classList.remove('dark');
           });
           cible.innerHTML="mode_dark";*/
      /* document.querySelector(".blog-titre").style.color="black";
       bt.setAttribute("src","images/lune.png");
            // ajax
            var xmlhttp = new XMLHttpRequest();
            if(window.XMLHttpRequest){
              xmlhttp=new XMLHttpRequest();
           }
           else if(window.ActiveXObject){
            xmlhttp=new ActiveXObject(Microsoft.XMLHTTP);
           }
         xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         alert(this.responseText);
         
      }
    };
    xmlhttp.open("GET", "./cookie.php?de=detruit", true);
    xmlhttp.send();

    /*FIN ajax de la condition if
      } else {
          // creation cookie
        setCookie("dark", "nuit",365);
          darkall.forEach(function(element){
           element.classList.add('dark');
          });
          cible.innerHTML="mode_light";
          document.querySelector(".blog-titre").style.color="white";
          bt.setAttribute("src","images/soleil.png");
          //ajax

          var xmlhttp = new XMLHttpRequest();
          if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
         }
         else if(window.ActiveXObject){
          xmlhttp=new ActiveXObject(Microsoft.XMLHTTP);
         }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              alert(this.responseText);
            }
          };
          xmlhttp.open("GET", "./cookie.php?de=creer", true);
          xmlhttp.send();

          //FIN de Ajax de condition else ou en francais sinon

      }
  });
});// fin de fonction avec foreach
*//*
  });
});
  //verification de le lancement du site
 window.addEventListener("load",function(){
    var check=checkCookie();
    if(check==true){
      cible.forEach(function(pap){
        pap.innerHTML="mode_light";
      });
    }
    else{
      cible.forEach(function(pap){
        pap.innerHTML="mode_dark";
      });
    }
  });

*/