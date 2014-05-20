<?php

/**
 * This is the model class for table "eqa".
 *
 * The followings are the available columns in table 'eqa':
 * @property integer $id
 * @property integer $examId
 * @property integer $questionId
 * @property string $random
 *
 * The followings are the available model relations:
 * @property Exam $exam
 * @property Question $question
 */
class Eqa extends CActiveRecord {

    public $Option = array();

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'eqa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('examId, questionId, random', 'required'),
            array('id, examId, questionId', 'numerical', 'integerOnly' => true),
            array('random', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, examId, questionId, random', 'safe', 'on' => 'search'),
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
            'question' => array(self::BELONGS_TO, 'Question', 'questionId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'examId' => 'Exam',
            'questionId' => 'Question',
            'random' => 'Random',
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
        $criteria->compare('examId', $this->examId);
        $criteria->compare('questionId', $this->questionId);
        $criteria->compare('random', $this->random, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getChuoiDA($param, $questId) {
        $list = Yii::app()->db->createCommand('select random from eqa where examId = "' . $param . '" and questionId = "'.$questId.'"')->queryAll();
        $i = 0;
        $rs = array();
        foreach ($list as $item) {
            $rs[$i] = $item['random'];
            $i++;
        }
        return $rs[0];
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Eqa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getListQuestion($param) {
        $list = Yii::app()->db->createCommand('select * from eqa where examid = "' . $param . '"')->queryAll();
        return $list;
    }
    
}
