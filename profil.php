<?php
					// Connexion à la base de données
					$host = "localhost";
					$user = "username";
					$password = "password";
					$database = "database_name";
					$conn = mysqli_connect($host, $user, $password, $database);

					// Vérifier si la connexion a échoué
					if (!$conn) {
						die("La connexion a échoué : " . mysqli_connect_error());
					}

					// Récupérer les informations de réservation de l'utilisateur
					$user_id = 1; // L'ID de l'utilisateur connecté
					$query = "SELECT * FROM reservations WHERE user_id = '$user_id'";
					$result = mysqli_query($conn, $query);

					// Afficher les informations de réservation
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['date_debut'] . "</td>";
						echo "<td>" . $row['date_fin'] . "</td>";
						echo "<td>";
						if ($row['statut'] == "en_cours") {
							echo "En cours";
						} elseif ($row['statut'] == "termine") {
							echo "Terminé";
						} elseif ($row['statut'] == "effectue") {
							echo "Effectué";
						}
						echo "</td>";
						echo "</tr>";
					}

					// Fermer la connexion à la
					// Fermer la connexion à la base de données
					mysqli_close($conn);
				?>