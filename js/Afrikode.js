var tax=["votre développement est notre priorité","apprendre selon votre rythme","nous sommes là a votre écoute"];
var txt=document.querySelector(".al1");
var bo=0;
function ro(){
    var lon=tax[bo].length,jk=1;
    var op=0;
    var chainetxt=tax[bo];
    function ecrireText(){
      if(op<lon){
           txt.innerHTML+=chainetxt.substr(op,1);
           op++;
           setTimeout(ecrireText,50);
       }
       else{
        bo++
       }
    }
    function effecertext(){
     if(jk<=lon){
         txt.innerHTML=chainetxt.substr(0,lon-jk);
         jk++;
         setTimeout(effecertext,50);
     }
     else{
         if(bo==3)
           {
            bo=0;
           }
     }
    }
    setTimeout(ecrireText,2000);
    setTimeout(effecertext,8000);
    setTimeout(ro,11000);
}
window.addEventListener("load",function(){
    ro();
});

var pl=document.getElementById("new");
var affi=document.getElementById("toto");
pl.addEventListener("keyup",function(){
     var len=pl.value.length;
    // var n =len.search("/.com|.fr|.yahoo/");
    if(len<8 && len!=""){
        affi.innerHTML="ce champ ne peut contenir moins de 8 caracteres"
    }
    else{
        affi.innerHTML="";
    }
});

// newsletter du site avec ajax 
var vb=document.getElementById('news');
document.getElementById("news").addEventListener("click",function(e){
              e.preventDefault();
              var xhl;
            if(window.XMLHttpRequest){
               xhl=new XMLHttpRequest();
            }
            else if(window.ActiveXObject){
                xhl=new ActiveXObject(Microsoft.XMLHTTP);
            }
     var data= new FormData(vb);
    xhl.onreadystatechange=function(){
        if(xhl.readyState==4 && xhl.status==200){
      document.getElementById("toto").innerHTML=xhl.responseText;
      if(xhl.responseText=='<span id="su">votre message à été envoyé avec succes</span>'){
           var cr=document.createAttribute("disabled");
           var gx=document.querySelector(".ne");
           cr.value="disabled"; 
           gx.setAttributeNode(cr);
           document.getElementById("new").value="";
      }
        }
        else
        document.getElementById("toto").innerHTML="erreur";
    }
    xhl.open("POST","./news.php");
    xhl.send(data);
});

var tc=document.querySelector(".commentaire-btn");
var pseudo=document.querySelector("#pseudo");
var messa=document.querySelector("#message");
var gmail=document.querySelector("#gmail");
tc.addEventListener("click",function(e){
    if(pseudo.value=="" || messa.value=="" || gmail.value==""){
        e.preventDefault();
        document.querySelector(".errow").style.display="block";
        document.querySelector(".errow").innerHTML="veuillez remplir tous les champs";
    }
    else
    document.querySelector(".errow").innerHTML="";
    
});
// partie de livre gratuit pour apprendre le web 
var myForm=document.getElementById("my-form");
myForm.addEventListener("submit",function(e){
    e.preventDefault();
    var xhl;
    if(window.XMLHttpRequest){
       xhl=new XMLHttpRequest();
    }
    else if(window.ActiveXObject){
        xhl=new ActiveXObject(Microsoft.XMLHTTP);
    }
var data= new FormData(myForm);
xhl.onreadystatechange=function(){
if(xhl.readyState==4 && xhl.status==200){
document.getElementById("rece").innerHTML=xhl.responseText;
}
else
document.getElementById("toto").innerHTML="erreur";
}
xhl.open("POST","./ne.php");
xhl.send(data);
});

//BOnus partie Apropos

var myForm2=document.getElementById("momo");
myForm2.addEventListener("click",function(e){
    e.preventDefault();
    var xhl;
    if(window.XMLHttpRequest){
       xhl=new XMLHttpRequest();
    }
    else if(window.ActiveXObject){
        xhl=new ActiveXObject(Microsoft.XMLHTTP);
    }
var data= new FormData(myForm2);
xhl.onreadystatechange=function(){
if(xhl.readyState==4 && xhl.status==200){
document.getElementById("rece2").innerHTML=xhl.responseText;
}
else
document.getElementById("toto").innerHTML="erreur";
}
xhl.open("POST","./ne.php");
xhl.send(data);
});

