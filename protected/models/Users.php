<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $created
 * @property integer $ban
 * @property integer $role
 * @property string $email
 */
class Users extends CActiveRecord
{

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
    public $verifyCode;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('created, ban, role', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>50),
			array('email', 'email'),
            array('username', 'match', 'pattern'=>'/^([A-Za-z0-9 ]+)$/u', 'message'=>'Допустимые символы A-Za-z0-9 '),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, created, ban, role, email', 'safe', 'on'=>'search'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Имя',
			'password' => 'Пароль',
			'created' => 'Зарегестрирован',
			'ban' => 'Бан',
			'role' => 'Роль',
			'email' => 'Email',
            'verifyCode' => 'Код с картинки'
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('role',$this->role);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave() {
        if($this->isNewRecord) {
            $this->created = time();
            $this->role = 1;
        }
        $this->password = md5('fsaf43f-fds'.$this->password);
        return parent::beforeSave();
    }

    /**
     * @return array Array of all users
     */
    public static function all()
    {
        return CHtml::listData(self::model()->findAll(), 'id', 'username');
    }


    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
