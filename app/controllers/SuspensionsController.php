<?php

namespace app\controllers;

use app\classes\redirect;
use app\models\suspensions as sp;
use app\models\user;
use app\models\reports;
use app\models\reportuser;
use app\models\log;
use app\controllers\auth\LoginController as session;
class SuspensionsController extends Controller
{

    public function createSuspension()
    {
        $suspension = new sp;
        $user = new user;
        $report = new reports;
        $log = new log;

        ob_start();
        $date = date("Y-m-d H:i:s");
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $period = $data['period'];
            $duration = $period;

            if ($duration != '0') {
                if ($duration == '1') {
                    $seconds = 1 * 24 * 60 * 60;
                } elseif ($duration == '3') {
                    $seconds = 3 * 24 * 60 * 60;
                } elseif ($duration == '7') {
                    $seconds = 7 * 24 * 60 * 60;
                } elseif ($duration == '31') {
                    $seconds = 31 * 24 * 60 * 60;
                } else {
                    exit();
                }
                $period = date("Y-m-d H:i:s", strtotime($date . " + $seconds seconds"));
                $status = 2;
                require_once '../app/views/templates/emails/suspendUser.php';
                $subject = 'Your Account has been suspended';
                $data['action'] = "User suspended";
            } else {
                $period = $date;
                $duration = 0;
                $status = 0;
                require_once '../app/views/templates/emails/banUser.php';
                $subject = 'Your Account has been baned';
                $data['action'] = "User baned";
            }

            $data['period'] = $period;
            $data['duration'] = $duration;

            $data['active'] = $status;
            $data['activer'] = 1;

            $res = $user->updateUserStatus($data);
            $res2 = $report->updateReportStatus($data);
            $res3 = $suspension->addSuspension($data);
            $data['idUser'] = session::sessionValidate()['id'];
            $log->logActions($data);

            $message = ob_get_clean();
            if ($res === false && $res2 === false && $res3 === false) {
            } else {
                sendMail($data['email'], $subject, $message);
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function removeSuspension($data)
    {
        $user = new user;
        $report = new reportUser;
        $suspension = new sp;
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['active'] = 1;
            $res = $report->deleteReportUser($data);
            $res2 = $suspension->deleteSuspension($data);
            $res3 = $user->updateUserStatus($data);
            ob_start();
            require_once '../app/views/templates/emails/removeBanUser.php';
            $subject = 'Your Account has been reactivated';
            $message = ob_get_clean();
            $data['action'] = "User re-stablished";
            $data['idUser'] = session::sessionValidate()['id'];
            $log->logActions($data);            
            if ($res === false && $res2 === false && $res3 === false) {
            } else {
                sendMail($data['email'], $subject, $message);
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function totalBannedUsers()
    {
        $sp = new sp();
        $limitDate = date('Y-m-d H:i:s', strtotime('-5 days'));
        $oldSp = $sp->getTotalSpUntil($limitDate);
        $newSp = $sp->getnewSp($limitDate);
        $oldSp = json_decode($oldSp);
        $newSp = json_decode($newSp);
        $response = [
            'oldSp' => $oldSp,
            'newSp' => $newSp,
        ];

        echo json_encode($response);
    }
}
