<?php

/**
 * This is the model class for table "user_exam".
 *
 * The followings are the available columns in table 'user_exam':
 * @property integer $id
 * @property integer $userId
 * @property integer $examId
 * @property double $score
 * @property string $testDate
 *
 * The followings are the available model relations:
 * @property Exam $exam
 * @property User $user
 */
class UserExam extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_exam';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, examId, score, testDate', 'required'),
            array('userId, examId', 'numerical', 'integerOnly' => true),
            array('score', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, userId, examId, score, testDate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'exam' => array(self::BELONGS_TO, 'Exam', 'examId'),
            'user' => array(self::BELONGS_TO, 'User', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'userId' => 'User',
            'examId' => 'Exam',
            'score' => 'Score',
            'testDate' => 'Test Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('userId', $this->userId);
        $criteria->compare('examId', $this->examId);
        $criteria->compare('score', $this->score);
        $criteria->compare('testDate', $this->testDate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getIdOfUser($userName) {
        $modelUser = new User;
        $list = Yii::app()->db->createCommand('select user_exam.examId,user_exam.score,user_exam.testDate from user_exam , user where user_exam.userId = user.id and user.username = "' . $userName . '"')->queryAll();
        $rs = array();
        foreach ($list as $value) {
            $rs[] = $value;
        }
        return $rs;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserExam the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
