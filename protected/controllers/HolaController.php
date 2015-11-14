<?php
#http://localhost/anyuri/hola/index
class HolaController extends Controller
{
	Public function actionIndex()
	{
		$model=Users::model()->findall();
		$twitter="@reciouslol";
		$this->render("index", array("model"=>$model,"twitter"=>$twitter));


	}



}



?>