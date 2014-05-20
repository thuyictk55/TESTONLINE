<?php

/**
 * This is the model class for table "exam".
 *
 * The followings are the available columns in table 'exam':
 * @property integer $id
 * @property string $name
 * @property integer $subjectId
 * @property integer $time
 * @property integer $NoEasy
 * @property integer $NoMedium
 * @property integer $NoDifficult
 *
 * The followings are the available model relations:
 * @property Eqa[] $eqas
 * @property Subject $subject
 * @property UserExam[] $userExams
 */
class Exam extends CActiveRecord {
    public $Option = array();
    public $html;
    
//    public function getOption(){
//        return $this->Option;
//    }
//    public function setOption($option) {
//        $this->Option = $option;
//    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'exam';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, subjectId, time, NoEasy', 'required'),
            array('subjectId, time, NoEasy, NoMedium, NoDifficult', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 25),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, subjectId, time, NoEasy, NoMedium, NoDifficult', 'safe', 'on' => 'search'),
        );
    }

    ///////////////////////////////////////////////////////Demo//////////////////////////////////////////
    public function getListName() {
        $list = Yii::app()->db->createCommand('select * from Subject ')->queryAll();

        $rs = array();
        foreach ($list as $item) {
//process each item here
            $rs[$item['id']] = $item['name'];
        }
        return $rs;
    }
    static public function getAllId() {
        $list = Yii::app()->db->createCommand('select id from Exam')->queryAll();
        $res = array();
        foreach ($list as $l) {
            $res[] = $l['id'];
        }
        return $res;
    }
    public function getAll($param) {
        $list = Yii::app()->db->createCommand('select * from Exam where  id ="'.$param.'"')->queryAll();
        return $list;
    }
    public function getNoQuestion($id){
        $list = Yii::app()->db->createCommand('select * from Exam where id = "'.$id.'"')->queryAll();
        $rs = 0;
        foreach ($list as $l){
       $rs = $l['NoEasy'] + $l['NoMedium'] + $l['NoDifficult'];
        }
        return $rs;
    }
    public function getId($id) {
        $list = Yii::app()->db->createCommand('select id from Exam where subjectId = "'.$id.'"')->queryAll();
        $rs = array();
        foreach ($list as $value) {
            $rs[] = $value['id'];
        }
        shuffle($rs);
        return $rs[0];
    }
    public function getSubjectId($id) {
        $list = Yii::app()->db->createCommand('select subjectId from Exam where id = "'.$id.'"')->queryAll();
        $rs = array();
        foreach ($list as $value) {
            $rs[] = $value['subjectId'];
        }
        return $rs[0];
    }
    public function getName($id) {
        $list = Yii::app()->db->createCommand('select name from Exam where id = "'.$id.'"')->queryAll();
        $rs = array();
        foreach ($list as $value) {
            $rs[] = $value['name'];
        }
        return $rs[0];
    }
    public function createWordFile($sql) {
        
    }
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'eqas' => array(self::HAS_MANY, 'Eqa', 'examId'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subjectId'),
            'userExams' => array(self::HAS_MANY, 'UserExam', 'examId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'subjectId' => 'Subject',
            'time' => 'Time',
            'NoEasy' => 'Number Easy Question',
            'NoMedium' => 'Number Medium Question',
            'NoDifficult' => 'Number Difficult Question',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('subjectId', $this->subjectId);
        $criteria->compare('time', $this->time);
        $criteria->compare('NoEasy', $this->NoEasy);
        $criteria->compare('NoMedium', $this->NoMedium);
        $criteria->compare('NoDifficult', $this->NoDifficult);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Exam the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
