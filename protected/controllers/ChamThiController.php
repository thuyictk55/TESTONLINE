<?php

class ChamThiController extends Controller {

    public function actionChamthi() {
        $model = new Eqa;
        $id = $_GET['examId'];
        $list = $model->getListQuestion($id);
        if (isset($_POST['Eqa']['Option'])) {
            $option = array_map('strtoupper', $_POST['Eqa']['Option']);
            $this->redirect(array('result', 'option' => $option, 'id' => $id));
        }
        $this->render('chamthi', array('model' => $model, 'id'=>$id,'list' => $list));
    }

    public function actionExamcode() {
        $model = new Eqa;
        $error = 0;
        $ids = Exam::getAllId();
//        $model->validate($model->examId);
        if (isset($_POST['examId'])) {
            $examId = $_POST['examId'];
            $model->examId = $examId;
            if ($model->validate(array('examId'))) {
                if ($model->getListQuestion($examId) != null) {
                    $this->redirect(array('chamthi', 'examId' => $examId));
                }
                else $error = 1;
                //else echo '<span style="color:red">Exam code not existed!<br></span>';
            }
        }

        $this->render('examcode', array('model' => $model, 'ids'=>$ids,'error'=>$error));
    }

    public function actionResult() {
        $model = new Eqa;
        $questionModel = new Question;
        $option = $_GET['option'];
        $examId = $_GET['id'];
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
//        $this->redirect(array('result', 'examId'=>$examId, 'arrayDA'=>$arrayDA,'count'=>$count));
        }

//        $this->render('result', array('model'=>$model, 'option'=>$option, 'DA'=>$DA, 'dapan'=>$dapan,'examId'=>$examId));
        $this->render('result', array('model' => $model, 'option' => $option, 'examId' => $examId, 'arrayDA' => $arrayDA, 'count' => $count, 'dapandung' => $dapandung));
    }

    /////////////tim ra vi tri chua dap an dung /////////////////////
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
