<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property string $content
 * @property integer $subjectId
 * @property string $difficulty
 * @property string $A
 * @property string $B
 * @property string $C
 * @property string $D
 * @property string $Answer
 *
 * The followings are the available model relations:
 * @property Eqa[] $eqas
 * @property Subject $subject
 */
class Question extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('subjectId, content, difficulty, A, B, C, D, Answer', 'required'),
            array('subjectId', 'numerical', 'integerOnly' => true),
            array('difficulty', 'length', 'max' => 20),
            array('Answer', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, content, subjectId, difficulty, A, B, C, D, Answer', 'safe', 'on' => 'search'),
            array(
                'Answer',
                'match', 'pattern' => '/^[A|B|C|D]{1}$/',
                'message' => 'Answer must be A, B, C or D',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'eqas' => array(self::HAS_MANY, 'Eqa', 'questionId'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subjectId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'content' => 'Content',
            'subjectId' => 'Subject',
            'difficulty' => 'Difficulty',
            'A' => 'Option A',
            'B' => 'Option B',
            'C' => 'Option C',
            'D' => 'Option D',
            'Answer' => 'Answer',
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
        $criteria->compare('content', $this->content, true);
        $criteria->compare('subjectId', $this->subjectId);
        $criteria->compare('difficulty', $this->difficulty, true);
        $criteria->compare('A', $this->A, true);
        $criteria->compare('B', $this->B, true);
        $criteria->compare('C', $this->C, true);
        $criteria->compare('D', $this->D, true);
        $criteria->compare('Answer', $this->Answer, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Question the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getList() {
        $list = Yii::app()->db->createCommand('select * from Subject ')->queryAll();

        $rs = array();
        foreach ($list as $item) {
//process each item here
            $rs[$item['id']] = $item['name'];
        }
        return $rs;
    }

    public function getQuestByDiff($difficulty, $subjectId) {
        $list = Yii::app()->db->createCommand('select * from Question where difficulty="' . $difficulty . '" and subjectId = "' . $subjectId . '"')->queryAll();
        $rs = array();
        $i = -1;
        foreach ($list as $item) {
            $rs[++$i] = $item['id'];
        }
        if ($i < 0)
            return null;
        return $rs;
    }

    //tra ve dap an cua cau hoi
    public function getDA($param) {
        $list = Yii::app()->db->createCommand('select Answer from Question where id="' . $param . '"')->queryAll();
        $rs = array();
        $i = 0;
        foreach ($list as $item) {
            $rs[$i] = $item['Answer'];
            $i++;
        }
        return $rs[0];
    }

    public function getAllQuest($param) {
        $list = Yii::app()->db->createCommand('select * from Question where id="' . $param . '"')->queryAll();
        return $list[0];
    }

}
