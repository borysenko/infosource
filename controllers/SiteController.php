<?php

namespace app\controllers;

use app\models\Giphy;
use app\models\Tree;
use Yii;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReCaptcha()
    {
        $model = new Giphy();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->renderAjax('image-random', [
                'url_image_random' => $model->getRandomGif()
            ]);
        }

        return $this->renderAjax('re-captcha', [
            'model' => $model
        ]);
    }
}
