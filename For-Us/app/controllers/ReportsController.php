<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\controllers\auth\LoginController as session;

class ReportsController extends Controller
{
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

    public function reportUser()
    {
        // $report = new report;
        // $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        // $data['userId'] = session::sessionValidate()['id'];
        // $res = $report->reportUser($data);
        // echo json_encode(["r" => $res]);
    }
}
