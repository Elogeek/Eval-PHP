<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DB/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';


use App\Entity\User;
use App\Manager\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new UserManager();

switch ($requestType) {
    // Obtention d'informations.
    case 'GET':
        if (isset($_GET['id']))
            echo getUser($manager, intval($_GET['id']));
        else
            echo getUser($manager);
        break;
    // Ajout d'un nouvel user.
    case 'POST':
        // PRéparation de la réponse.
        $response = [
            'error' => 'success',
            'message' => 'Utilisateur ajouté avec succès',
        ];

        $data = json_decode(file_get_contents('php://input'));
        if (isset($data->firstname, $data->lastname, $data->school)) {
            $school = intval($data->school);
            $result = $manager->addUser($data->firstname, $data->lastname, $school);
            if (!$result) {
                $response = [
                    'error' => 'danger',
                    'message' => 'Une erreur est survenue en ajoutant cet étudiant',
                ];
            }
        } else {
            $response = [
                'error' => 'danger',
                'message' => 'Le nom, prénom ou école est manquant',
            ];
        }
        echo json_encode($response);
        break;
    // supprimer un  user
    case 'DELETE':
        break;
    default:
        break;
}

/**
 * Return the students list.
 * @param UserManager $manager
 * @return false|string
 */
function getUsers(UserManager $manager): string
{
    $response = [];
    // Obtention des students.
    $data = $manager->getUsers();
    foreach ($data as $user) {
        /* @var User $user */
        $response[] = [
            'id' => $user->getId(),
            'email' => $email->getEmail(),
        ];
    }
    // Envoi de la réponse ( on encode notre tableau au format json ).
    return json_encode($response);
}

/**
 * Return only one student.
 * @param UserManager $manager
 * @param int $id
 * @return string
 */
function getUser(UserManager $manager, int $id): string
{
    $student = $manager->getUsers();
    $response = [
        'id' => $id->getId(),
        'email' => $email->getEmail(),
    ];

    return json_encode($response);
}

exit;
