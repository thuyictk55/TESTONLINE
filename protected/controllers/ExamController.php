<?php

class ExamController extends Controller {

    public $layout = 'column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('create', 'update', 'preview', 'download'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('view', 'delete'),
                'expression' => array('ExampleController', 'allowOnlyOwner'),
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

    public function actionView($id) {
        $modelEqa = new Eqa;
        $this->render('view', array(
            'model' => $this->loadModel($id)
        ));
    }

    public function actionCreate() {
        $model = new Exam;
//        $eqamodel = new Eqa;
//        $modelQuestion = new Question;
//        $modelEqa = new Eqa;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {

            $model->attributes = $_POST['Exam'];
            //$easy = mang cau hoi easy da duoc shuffle
            //$noEasy = so cau hoi easy
            $noEasy = $_POST['Exam']['NoEasy'];
            $noMedium = $_POST['Exam']['NoMedium'];
            $noHard = $_POST['Exam']['NoDifficult'];
            $subjectId = $_POST['Exam']['subjectId'];

            //shuffle string xong roi
//
            $transaction = Yii::app()->db->beginTransaction();
            $success = $model->save(false);
            $modelid = $model->id;
            $modelEqa = new Eqa;
            $modelEqa->examId = $model->id;
            $modelQuestion = new Question;

//                $easy = shuffle($modelQuestion->getQuestion("easy"));
//                $medium = shuffle($modelQuestion->getQuestion("medium"));
//                $hard = shuffle($modelQuestion->getQuestion("hard"));
            $easy = $modelQuestion->getQuestByDiff("easy", $subjectId);
            shuffle($easy);
            $medium = $modelQuestion->getQuestByDiff("medium", $subjectId);
            shuffle($medium);
            $hard = $modelQuestion->getQuestByDiff("hard", $subjectId);
            shuffle($hard);

//                $noEasy = $model->NoEasy;
//                $noMedium = $model->NoMedium;
//                $noHard = $model->NoDifficult;
            $j = 0;

            for ($i = 0; $i < $noEasy; $i++) {
                $question[$i] = $easy[$j];
                $j++;
            }
            $j = 0;
            for ($i = $noEasy; $i < $noEasy + $noMedium; $i++) {
                $question[$i] = $medium[$j];
                $j++;
            }
            $j = 0;
            for ($i = $noEasy + $noMedium; $i < $noEasy + $noMedium + $noHard; $i++) {
                $question[$i] = $hard[$j];
                $j++;
            }
            $stringArray = "ABCD";
            shuffle($question);


            for ($i = 0; $i < ($noEasy + $noMedium + $noHard); $i++) {
                $modelEqa->examId = $model->id;
                $modelEqa->questionId = $question[$i];
                $modelEqa->random = str_shuffle($stringArray);
                $modelEqa->id = NULL;
                $modelEqa->isNewRecord = TRUE;
                if ($modelEqa->save()) $success1 = $success and true;
                else $success1 = $success and false;
            }

//            $success = $success ? $modelEqa->save(false) : $success;
            if ($success)
                $transaction->commit();
            else
                $transaction->rollBack();

            if (isset($_POST['save'])) {
                //$this->redirect(array('download'));
                $this->redirect(array('preview', 'id' => $model->id, 'subject' => $subjectId));
            } else {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
        //////////////transaction here ///////////////////
        ////////////////////////////////////////////////////
    }

    public function actionPreview() {
        $exammodel = new Exam;
        $eqamodel = new Eqa;
        $questionmodel = new Question;
        $examId = $_GET['id'];
        $list = $exammodel->getAll($examId);
        $rs = array();
        $i = 0;
        $listQuest = array();
        $questionArr = array();
        $listEqa = $eqamodel->getListQuestion($examId);
        //echo $examId;
        //print_r($listEqa);
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
        //print_r($rs);
        //die();
        $time = $rs[0] * 60;
//        $time = $rs[0];
        if (isset($_POST['generate'])) {
            $html = $_POST['html'];
            $this->redirect(array('download', 'html' => $html, 'examId' => $examId));
        }
        $this->render('preview', array('exammodel' => $exammodel, 'time' => $time, 'questionArr' => $questionArr, 'listQuest' => $listQuest, 'examId' => $examId));
    }

    public function actionDownload() {
        $examId = $_GET['examId'];
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        Yii::import('application.vendor.*');
        Yii::setPathOfAlias('phpword', Yii::getPathOfAlias('application.vendor.phpword'));

        require('PHPWord/PHPWord.php');
        require_once 'phpword/PHPWord.php';
        require_once 'simplehtmldom/simple_html_dom.php';
        require_once 'htmltodocx_converter/h2d_htmlconverter.php';
        require_once 'example_files/styles.inc';

        $PHPWord = new PHPWord();
        spl_autoload_register(array('YiiBase', 'autoload'));

        //$mCanvasType = Yii::app()->user->getState('mCanvasType'); 
        //Your Yii methods variables call here
        //or you can call your method ie.
        //$html = $this->html->data();//returned $html or your HTML/XHTML DOM.
        //$html = '<table align=center><tr><td>sdkhfsk</td><td>dsjfhjskd</td></tr><tr><td text-align="center">gfgfgfgretgretretr</td><td>dsjfhjskd</td></tr></table>';
        $html = $_GET['html'];

        spl_autoload_unregister(array('YiiBase', 'autoload'));

        $phpword_object = new PHPWord();
        $section = $phpword_object->createSection();
        $html_dom = new simple_html_dom();
        $html_dom->load('<html><body>' . $html . '<body><html>'); // here $html is the Html/XHTML DOM Which You Have to pass
        $html_dom_array = $html_dom->find('html', 0)->children();

        $initial_state = array(
            // Required parameters:
            'phpword_object' => &$phpword_object, // Must be passed by reference.
            'base_root' => 'http://test.local', // Required for link elements - change it to your domain.
            'base_path' => '/htmltodocx/', // Path from base_root to whatever url your links are relative to.
            // Optional parameters - showing the defaults if you don't set anything:
            'current_style' => array('size' => '11'), // The PHPWord style on the top element - may be inherited by descendent elements.
            'parents' => array(0 => 'body'), // Our parent is body.
            'list_depth' => 0, // This is the current depth of any current list.
            'context' => 'section', // Possible values - section, footer or header.
            'pseudo_list' => TRUE, // NOTE: Word lists not yet supported (TRUE is the only option at present).
            'pseudo_list_indicator_font_name' => 'Wingdings', // Bullet indicator font.
            'pseudo_list_indicator_font_size' => '7', // Bullet indicator size.
            'pseudo_list_indicator_character' => 'l ', // Gives a circle bullet point with wingdings.
            'table_allowed' => TRUE, // Note, if you are adding this html into a PHPWord table you should set this to FALSE: tables cannot be nested in PHPWord.
            'treat_div_as_paragraph' => TRUE, // If set to TRUE, each new div will trigger a new line in the Word document.
            // Optional - no default:    
            'style_sheet' => htmltodocx_styles_example(), // This is an array (the "style sheet") - returned by htmltodocx_styles_example() here (in styles.inc) - see this function for an example of how to construct this array.
        );
        htmltodocx_insert_html($section, $html_dom_array[0]->nodes, $initial_state);
        $html_dom->clear();
        unset($html_dom);

        $h2d_file_uri = tempnam('', 'htd');
        $objWriter = PHPWord_IOFactory::createWriter($phpword_object, 'Word2007');
        $objWriter->save($h2d_file_uri);

        // Download the file:
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=Examcode' . $examId . '.docx');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($h2d_file_uri));
        ob_clean();
        flush();
        $status = readfile($h2d_file_uri);
        unlink($h2d_file_uri);
        exit;
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {
            $model->attributes = $_POST['Exam'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Exam');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
//        # mPDF
//        $mPDF1 = Yii::app()->ePdf->mpdf();
// 
//        # You can easily override default constructor's params
//        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
// 
//        # render (full page)
//        $mPDF1->WriteHTML($this->render('index', array(), true));
// 
//        # Load a stylesheet
//        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
//        $mPDF1->WriteHTML($stylesheet, 1);
// 
//        # renderPartial (only 'view' of current controller)
//        $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
// 
//        # Renders image
//        $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
// 
//        # Outputs ready PDF
//        $mPDF1->Output();
// 
//        ////////////////////////////////////////////////////////////////////////////////////
// 
//        # HTML2PDF has very similar syntax
//        $html2pdf = Yii::app()->ePdf->HTML2PDF();
//        $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
//        $html2pdf->Output();
// 
//        ////////////////////////////////////////////////////////////////////////////////////
// 
//        # Example from HTML2PDF wiki: Send PDF by email
//        $content_PDF = $html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
//        require_once(dirname(__FILE__).'/pjmail/pjmail.class.php');
//        $mail = new PJmail();
//        $mail->setAllFrom('webmaster@my_site.net', "My personal site");
//        $mail->addrecipient('mail_user@my_site.net');
//        $mail->addsubject("Example sending PDF");
//        $mail->text = "This is an example of sending a PDF file";
//        $mail->addbinattachement("my_document.pdf", $content_PDF);
//        $res = $mail->sendmail();
    }

    public function actionAdmin() {
        $model = new Exam('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Exam']))
            $model->attributes = $_GET['Exam'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Exam::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'exam-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

// loi co ban:
//2: sai lam khi cho $question[$i] = $easy[$i];