<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Image;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->request->get('token') === 'xyz123';
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays admin page.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $images = Image::find()->all();
        return $this->render('index', ['images' => $images]);
    }

    /**
     * Cancel Decision action.
     *
     * @return Response|string
     */
    public function actionCancelDecision($imageId)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $image = Image::find()->where(['image_id' => $imageId])->one();

        if ($image && $image->delete()) {
            return ['success' => true];
        }
        return ['success' => false];
    }
}
