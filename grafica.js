titulo= document.getElementById("titulo2").innerHTML;
    console.log(titulo)




// Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#grafica");
// Las etiquetas son las que van en el eje X. 


/*
var i = 1;  
while(document.getElementById("assess"+i) != null) {
document.getElementById("assess"+i).className="btn disabled btn-secondary";  
i++;} 
*/ 

const etiquetas = ["Trabajo en equipo", "Autocontrol", "Colaboración", "Comunicación"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosVentas2020 = {
    label: "Resultados por competencias",
    data: [80, 67.2,80 , 90], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosVentas2020,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});