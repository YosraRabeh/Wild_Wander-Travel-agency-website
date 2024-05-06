<?php
// Inclusion du fichier où se trouve la classe ReservationC
include_once 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Controller\ReservationC.php';

// Création d'une instance de la classe ReservationC
$reservationC = new ReservationC();

// Appel de la fonction getOffresLesPlusReservees() pour récupérer les données
$data = $reservationC->getOffresLesPlusReservees();

// Conversion des données en format JSON et retour
$data_json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques de réservation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="statistiqueChart" width="400" height="400"></canvas> <!-- Modifier la taille du canvas -->

    <script>
        $(document).ready(function() {
            var jsonData = <?php echo $data_json; ?>; // Inclure les données JSON directement dans le script

            var labels = [];
            var values = [];
            var colors = []; // Tableau de couleurs

            // Parcourir les données et extraire les labels, les valeurs et les couleurs
            jsonData.forEach(function(item) {
                labels.push(item.nom_offre); // Nom de l'offre
                values.push(item.nombreReservations); // Nombre de réservations
                colors.push(getRandomColor()); // Ajouter une couleur aléatoire
            });

            var ctx = document.getElementById('statistiqueChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut', // Changer le type de graphique en "doughnut" pour un graphique circulaire
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de réservations',
                        data: values,
                        backgroundColor: colors, // Utiliser les couleurs définies
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true, // Afficher la légende
                            position: 'right' // Position de la légende
                        }
                    }
                }
            });
        });

        // Fonction pour obtenir une couleur aléatoire
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
</body>
</html>
