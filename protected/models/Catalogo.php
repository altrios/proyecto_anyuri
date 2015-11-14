<?php

/**
 * This is the model class for table "catalogo".
 *
 * The followings are the available columns in table 'catalogo':
 * @property integer $id
 * @property string $nombre
 * @property string $img
 * @property integer $precio
 */
class Catalogo extends CActiveRecord
{
	private $connection;
    public $nombre;
    public $precio;
    public $imagen;
    
    public function __construct()
    {
        //Yii::app()->db->connectionString
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */
	  public function getCatalogo()
    {
        $sql="select id,nombre,imagen,precio from catalogo;";
        //$dataReader=$this->connection->createCommand($sql)->query();
        
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
	/*public function tableName()
	{
		return 'catalogo';
	}*/

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, img, precio, categoria', 'required'),
			array('precio', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('img', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, img, precio, categoria', 'safe', 'on'=>'search'),
			array('img', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('title, img', 'length', 'max'=>255, 'on'=>'insert,update'),
			//array("nombre","ext.CatalogoValidation","valor"=>'Nombre'),
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
			'categoria'=>array(self::BELONGS_TO,'categorias','id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'img' => 'Imagen',
			'precio' => 'Precio',
			'categoria'=>'ctgnombre',
			'estado'=>'estado',
			'binaryfile'=>'binaryfile',
			'fileType'=>'fileType',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('categoria',$this->categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function insert($foto)
    {
        $sql="INSERT INTO catalogo (nombre, img,precio) VALUES(?,?,?)";
        $command=$this->connection->createCommand($sql);
        // reemplaza el marcador de posición ":username" con el valor real de username
        $command-> bindValue(1,$_POST["catalogo"]["nombre"],PDO::PARAM_STR);
        // reemplaza el marcador de posición ":email" con el valor real de email
        $command-> bindValue(3,$_POST["catalogo"]["precio"],PDO::PARAM_STR);
        $command-> bindValue(2,$foto,PDO::PARAM_STR);
        $command->execute();
        return true;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Catalogo the static model class
	 */
	
}
