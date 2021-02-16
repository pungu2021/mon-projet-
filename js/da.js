// dark mode du site avec cookie de javascript
var cib;
var darkall=document.querySelectorAll('.darkt');
var bt=document.querySelector('.lune');
var blo=document.querySelector('.blog-titre');
var cible=document.querySelectorAll('.dar');
  var darkall=document.querySelectorAll('.darkt');
  var tx=document.querySelectorAll('.dark');
  cible.forEach(function(elem){
  elem.addEventListener("click",function(e){
      e.preventDefault();
      // document.querySelector(".blog-titre").style.color="black";
     
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
         cib=this.responseText;
         if(cib=="creer"){
            darkall.forEach(function(element){
                element.classList.add('dark');
               });
            document.querySelector(".darkt").style.color="white";
            bt.setAttribute("src","images/soleil.png");
         }
         else{
            bt.setAttribute("src","images/lune.png");
            darkall.forEach(function(element){
                element.classList.remove('dark');
               });
            document.querySelector(".darkt").style.color="black";
         }
         
      }
    };
    xmlhttp.open("GET", "./cookie.php?de=detruit", true);
    xmlhttp.send();
  });
});
  //verification de le lancement du site
 window.addEventListener("load",function(){
    var check=checkCookie();
    if(check==true){
      cible.forEach(function(pap){
        pap.innerHTML="mode_light";
      });
      blo.style.color="white";
    }
    else{
      cible.forEach(function(pap){
        pap.innerHTML="mode_dark";
      });
    }
  });

