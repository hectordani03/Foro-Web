<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\controllers\auth\LoginController as session;
use app\models\reports;
use app\models\reportuser;
use app\models\reportpost;
use app\models\reportcomt;

class ReportsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function users($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedusers', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function posts($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedposts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function comments($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedcomts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function getReportedUsers()
    {
        $reportUser = new reportuser();
        $result = $reportUser->getAllReportedUsers();
        echo $result;
    }
    public function getReportedPosts()
    {
        $reportPost = new reportpost();
        $result = $reportPost->getAllReportedPosts();
        echo $result;
    }

    public function getReportedComments()
    {
        $reportComt = new reportcomt();
        $result = $reportComt->getAllReportedComts();
        echo $result;
    }

    public function createReport($data)
    {
        $report = new reports;
        $data['userId'] = session::sessionValidate()['id'];
        $res = $report->addReport($data);
        return $res;
    }

    public function reportUser()
    {
        $report = new reportuser;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['reportId'] = $this->createReport($data);
            $res = $report->addUserReport($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function reportPost()
    {
        $report = new reportpost;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['reportId'] = $this->createReport($data);
            $res = $report->addPostReport($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function reportComment()
    {
        $report = new reportcomt;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['reportId'] = $this->createReport($data);
            $res = $report->addComtReport($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }
}
