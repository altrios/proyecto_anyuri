<?php

class DbController extends Controller
{

	public function actionIndex()
	{
    	$model=new Noticias();
        $datos=$model->getNoticias();
		$this->render('index',compact("datos"));
    $this->render('index',compact("datos"));

	}
  public function actionView($id)
  {
    $this->render('view',array(
      'model'=>$this->loadModel($id),
    ));

  }
  public function loadModel($id)
  {
    $model=Noticias::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }
    
    public function actionAdd()
	{
    	$model=new Noticias();
        
        if(isset($_POST["Noticias"]))
        {
            $model->attributes=$_POST['Noticias'];
            if($model->validate())
            {
               /**
                * realizamos el upload de la foto
                * */
               $file=CUploadedFile::getInstance($model,"foto");
               //echo $file->getExtensionName();exit;
               //die("estamos aqui");
               $name=sha1($file->getName()).".jpg";
               //die("name=".$name);
               if($file->getExtensionName()=="jpg" or $file->getExtensionName()=="jpeg")
               {
                    $file->saveAs(Yii::getPathOfAlias("webroot")."/uploads/noticias/".$name);
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
                $this->redirect(Yii::app()->request->baseUrl."/db");
               }else
               {
                Yii::app()->user->setFlash('mensaje','La foto debe ser sólo JPG');
                $this->refresh();
               }
            }
        }
        
		$this->render('add',compact("model"));
	}


	
}