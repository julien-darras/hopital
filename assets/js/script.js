let deleteButton = document.getElementsByClassName('delete');
let searchButton = document.getElementById('search');
let pagination = document.getElementById('pagination');

for (let i=0; i < deleteButton.length; i++) {
    deleteButton[i].onclick = () => {
        confirm("Êtes-vous sûr de vouloir supprimer ce rendez-vous?");
}
    }


let deletePatient = document.getElementsByClassName('deletePatient');

for (let j=0; j < deletePatient.length; j++) {
    deletePatient[j].onclick = () => {
        confirm("Êtes-vous sûr de vouloir supprimer ce patient?");
}
    }

searchButton.onclick = () => {
    pagination.style.display = "none";
}