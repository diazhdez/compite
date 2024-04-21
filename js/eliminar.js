function confirmacion(e){
    if (confirm("¿Está seguro que desea eliminarlo? Una vez eliminado no podrá restaurarse")){
        return true;
    }else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table_item_link");
for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}