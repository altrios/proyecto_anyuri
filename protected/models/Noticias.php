<?php
class Noticias extends CActiveRecord
{
    private $connection;
    public $titulo;
    public $des;
    public $foto;
    
    public function __construct()
    {
        Yii::app()->db->connectionString;
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getNoticias()
    {
        $sql="select id,titulo,descripcion,fecha,foto from noticias;";
        $dataReader=$this->connection->createCommand($sql)->query();
        
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
    }
    public function tableName()
    {
        return 'noticias';
    }
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('titulo',$this->titulo,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    public function rules()
    {
        return array
        (
            array("titulo","ext.NoticiasValidation","valor"=>'Título'),
            array("des","required")
        );
    }
    public function insert($foto)
    {
        $sql="INSERT INTO noticias (titulo, descripcion,fecha,foto) VALUES(?,?,now(),?)";
        $command=$this->connection->createCommand($sql);
        // reemplaza el marcador de posición ":username" con el valor real de username
        $command-> bindValue(1,$_POST["Noticias"]["titulo"],PDO::PARAM_STR);
        // reemplaza el marcador de posición ":email" con el valor real de email
        $command-> bindValue(2,$_POST["Noticias"]["des"],PDO::PARAM_STR);
        $command-> bindValue(3,$foto,PDO::PARAM_STR);
        $command->execute();
        return true;
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'descripcion' => 'Precio Bs.',
            'foto'=>'Foto',
        );
    }
}