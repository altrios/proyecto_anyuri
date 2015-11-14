<?php

class ImagenController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	

	
    public function actionCreate()////cuarto////
     
	{
    	$model=new catalogo();
        
        if(isset($_POST["catalogo"]))
        {
            $model->attributes=$_POST['catalogo'];
            if($model->validate())
            {
               /**
                * realizamos el upload de la foto
                * */
               $file=CUploadedFile::getInstance($model,"img");
               //echo $file->getExtensionName();exit;
               //die("estamos aqui");
               $name=sha1($file->getName()).".jpg";
               //die("name=".$name);
               if($file->getExtensionName()=="jpg" or $file->getExtensionName()=="jpeg")
               {
                    $file->saveAs(Yii::getPathOfAlias("webroot")."/anyuri/catalogo/".$name);
               }else
               {
                Yii::app()->user->setFlash('mensaje','Sólo fotos JPG por favor');
                $this->refresh();
               }
               
               /**
                * se hace el insert del registro
                * */
               $guardar=$model->insert($name);
               if($guardar)
               {
                    Yii::app()->user->setFlash('mensaje','El registro se ha creado exitosamente');
                $this->redirect(Yii::app()->request->baseUrl."/catalogo");
               }else
               {
                Yii::app()->user->setFlash('mensaje','La foto debe ser sólo JPG');
                $this->refresh();
               }
            }
        }
        
		$this->render('_form',compact("model"));
	}
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Catalogo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Catalogo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Catalogo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='catalogo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
