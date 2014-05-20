<?php

class ThitructiepController extends Controller {

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('ExamCode'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionExamcode() {
        $model = new Exam;
        $loginmodel = new LoginForm;
//      $exammodel = new Eqa;
        
        // display the login form
//        $model->validate();
        if (isset($_POST['Exam']['subjectId']) || !empty($_POST['Exam']['subjectId'])) {
            $id = $_POST['Exam']['subjectId'];
            //$list = $model->getListQuestion($id);
            $examId = $model->getId($id);
            $this->redirect(array('thi', 'examId' => $examId));
        }  
            

        
        $this->render('examcode', array('model' => $model));
    }

    public function actionThi() {
        $exammodel = new Exam;
        $eqamodel = new Eqa;
        $questionmodel = new Question;
        $examId = $_GET['examId'];
        $list = $exammodel->getAll($examId);
        $rs;
        $i = 0;
        $listQuest = array();
        $questionArr = array();
        $listEqa = $eqamodel->getListQuestion($examId);
        foreach ($listEqa as $value) { //lay toan bo question Id
            $listQuest[$value['questionId']] = $value['random'];
        }
        foreach ($listQuest as $k => $value) {
            $questionArr[] = $questionmodel->getAllQuest($k);
        }

        foreach ($list as $value) {
            $rs[$i] = $value['time'];
            $i++;
        }
//        $time = $rs[0] * 60;
        $time = $rs[0]/10;
        if (isset($_POST['Exam']['Option'])) {
            $option = array_map('strtoupper',$_POST['Exam']['Option']);
            $this->redirect(array('result', 'option' => $option, 'examId' => $examId));
        }
        $this->render('thi', array('exammodel' => $exammodel, 'time' => $time, 'questionArr' => $questionArr, 'listQuest' => $listQuest));
    }

    public function actionResult() {
        $model = new Eqa;
        $user_exam = new UserExam;
        $questionModel = new Question;
        $usermodel = new User;
        $option = $_GET['option'];
        $examId = $_GET['examId'];
        $count = 0;
        $i = 0;
        $dapandung = array();
        $arrayDA = array();
        $chuoidapan = array();
        foreach ($option as $key => $o) {
            $DA[] = $model->getChuoiDA($examId, $key);
            $chuoidapan[] = $questionModel->getDA($key);
            $option1 = $this->chuyenDoiDA($o); // lay chi so dap an
            $dapan = $this->getDADung($examId, $key); // lay dap an dung tu model
            $dapandung[] = $questionModel->getDA($key);
            if ($option1 == $dapan) {
                $count++;
                $arrayDA[$i++] = 1;
            } else {
                $arrayDA[$i++] = 0;
            }
        }
           $userName = Yii::app()->session['username'];
           $userId = $usermodel->getIdUser($userName);
           $user_exam->userId = $userId;
           $user_exam->examId = $examId;
//           $Info = $usermodel->getAllInfo($username);
              $score = (10/count($option)* $count);  
             $user_exam->score = $score;
             $user_exam->testDate = date("Y/m/d");
             $user_exam->save(FALSE);
              
        $this->render('result', array('model' => $model, 'option' => $option, 'examId' => $examId, 'arrayDA' => $arrayDA, 'count' => $count, 'dapandung' => $dapandung,'userName'=>$userName));
    }

    public function getDADung($examId, $questionId) {
        $questionModel = new Question;
        $eqaModel = new Eqa;
        $dapAn = $questionModel->getDA($questionId); //tra ve dap an cua cau hoi
        $chuoiDA = $eqaModel->getChuoiDA($examId, $questionId);
        for ($i = 0; $i < strlen($chuoiDA); $i++) {
            if ($chuoiDA[$i] == $dapAn)
                return $i;
        }
    }

    //////////////dau vao /////////////
    public function chuyenDoiDA($DA) {
        switch ($DA) {
            case "A":
                return 0;
                break;
            case "B":
                return 1;
                break;
            case "C":
                return 2;
                break;
            case "D":
                return 3;
                break;
            default :
                return -1;
                break;
        }
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
