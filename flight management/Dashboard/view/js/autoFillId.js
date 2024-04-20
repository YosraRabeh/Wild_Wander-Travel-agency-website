window.onload = function() {
    // Obtenez une référence à votre champ d'entrée d'ID
    var idField = document.getElementById('id');

    // Obtenez une référence à vos autres champs d'entrée
    var companyField = document.querySelector('.company');
    var departureCityField = document.querySelector('.departure_city');
    var destinationField = document.querySelector('.destination');
    // Ajoutez d'autres champs si nécessaire

    // Définissez votre fonction pour générer un ID en fonction des valeurs entrées
    function generateId() {
        // Générer un nombre aléatoire entre 100000 et 999999
        return Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
    }

    // Définissez une fonction pour mettre à jour l'ID chaque fois qu'une valeur est entrée dans les autres champs
    function updateId() {
        idField.value = generateId();
    }

    // Ajoutez des écouteurs d'événements 'input' à vos autres champs d'entrée
    companyField.addEventListener('input', updateId);
    departureCityField.addEventListener('input', updateId);
    destinationField.addEventListener('input', updateId);
    // Ajoutez des écouteurs d'événements à d'autres champs si nécessaire

    // Utilisez votre fonction pour définir la valeur du champ d'entrée d'ID
    idField.value = generateId();
}
