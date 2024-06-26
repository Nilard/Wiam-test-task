<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use app\models\Image;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $max = 1000;
        $images = array_column(Image::find()->asArray()->all(), 'image_id');
        $imageId = 0;
        $break = 0;

        // Checks if image already exists in tha database.
        // To avoid infinite loop this cycle is limited.
        while ($break < $max) {
            $imageId = rand(1, $max);
            if (in_array($imageId, $images)) {
                $break++;
            } else {
                break;
            }
        }

        $imageUrl = "https://picsum.photos/id/{$imageId}/600/500";

        return $this->render('index', [
            'imageId' => $imageId,
            'imageUrl' => $imageUrl,
        ]);
    }

    /**
     * Approve action.
     *
     * @return Response|string
     */
    public function actionApprove($imageId)
    {
        // Sets response format to JSON.
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Creates image with appropriate status.
        $image = new Image();
        $image->image_id = $imageId;
        $image->status = Image::STATUS_APPROVED;

        // Adds image to database.
        if ($image->save()) {
            return ['success' => true];
        }
        return ['success' => false];
    }

    /**
     * Reject action.
     *
     * @return Response|string
     */
    public function actionReject($imageId)
    {
        // Sets response format to JSON.
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        // Creates image with appropriate status.
        $image = new Image();
        $image->image_id = $imageId;
        $image->status = Image::STATUS_REJECTED;

        // Adds image to database.
        if ($image->save()) {
            return ['success' => true];
        }
        return ['success' => false];
    }
}
