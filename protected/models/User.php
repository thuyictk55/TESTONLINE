<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $fullName
 * @property string $birthday
 * @property string $major
 *
 * The followings are the available model relations:
 * @property UserExam[] $userExams
 */
class User extends CActiveRecord {

    public $password_repeat;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, fullName', 'required'),
            array('username', 'length', 'max' => 20),
            array('username','unique'),
            array('password','length','min'=>6),
            array('birthday, major', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, fullName, birthday, major', 'safe', 'on' => 'search'),
            array('password', 'compare'),
            array('password_repeat', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userExams' => array(self::HAS_MANY, 'UserExam', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'fullName' => 'Full Name',
            'birthday' => 'Birthday',
            'major' => 'Major',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('fullName', $this->fullName, true);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('major', $this->major, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $this->password = sha1($this->password);
        parent::beforeSave();
        return TRUE;
    }
    public function getIdUser($username) {
        $list = Yii::app()->db->createCommand('select id from User  where username = "'.$username.'"')->queryAll();
        $rs = array();
        foreach ($list as $value) {
            $rs[] = $value['id'];
        }
        return $rs[0];
    }
}
