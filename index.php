<?php
# Activer le mécanisme des sessions
session_start();

# Prise du temps actuel au début du script
$time_start = microtime(true);

# Définition des variables globales du script
define('CHEMIN_MODELS','models/');
define('CHEMIN_VUES','views/');
define('CHEMIN_CONTROLEURS','controllers/');
define('DATEDUJOUR',date("j/m/Y"));
define('HEUREACTUELLE',date("H:i:s"));
define('SESSION_ID',session_id());

# Automatisation de l'inclusion des classes de la couche modèle
function chargerClasse($classe) {
    require_once('models/' . $classe . '.class.php');
}
spl_autoload_register('chargerClasse');
$time_end = microtime(true);
$time = round(($time_end - $time_start)*1000,3);

require_once(CHEMIN_VUES . 'AgeClock.php');
require_once(CHEMIN_CONTROLEURS . 'AgeClockController.php');

$controller = new AgeClockController();
$controller->run();
?>