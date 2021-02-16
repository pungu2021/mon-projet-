var gx=document.querySelector('.bnt-menu');
var tex=true;
var jk=-220;
gx.addEventListener("click",function(){
      gx.classList.toggle("vio");
      if(tex==true){
          function pousser(){
              if(jk<0){
                jk+=10;
                document.querySelector(".blog-respon").style.height=window.innerHeight+"px";
                document.querySelector(".blog-respon").style.left=jk+"px";
                  setTimeout(pousser,10);
              }
              else{
                tex=false;
              }
          }
       pousser();
      }
      else{
            function repousser(){
                if(jk>-220){
                    jk-=10;
                    document.querySelector(".blog-respon").style.left=jk+"px";
                      setTimeout(repousser,10);
                  }
                  else{
                    tex=true;
                  }
            }
        repousser();
      }
});
