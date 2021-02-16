var sup=document.querySelectorAll(".supprimer");
sup.forEach(element => {
    element.addEventListener("click",function(e){
        if(confirm("voulez vous vraiment supprimer cet article definitivement dans votre base de données?")){
            
        }
        else{
            e.preventDefault();
        }
    });
});
var su=document.querySelectorAll(".bt");
su.forEach(element => {
    element.addEventListener("click",function(e){
        if(confirm("voulez vous vraiment supprimer cet article definitivement dans votre base de données?")){
            
        }
        else{
            e.preventDefault();
        }
    });
});
var app=document.querySelectorAll(".app");
app.forEach(element => {
    element.addEventListener("click",function(e){
        if(confirm("voulez vous vraiment approuver ce commentaire  dans vos commentaire d'article ?")){
            
        }
        else{
            e.preventDefault();
        }
    });
});