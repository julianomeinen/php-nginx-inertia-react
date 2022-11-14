<?php

namespace app\controllers;

use tebe\inertia\web\Controller;
use app\components\SharedDataFilter;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;

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
                'only' => ['index', 'logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'logout'],
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
            [
                'class' => SharedDataFilter::class
            ]
        ];
    }

    /**
     * Displays errorpage.
     *
     * @return string
     */
    public function actionError()
    {
        $this->layout = 'error';
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            $exception = new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
        Yii::$app->getResponse()->setStatusCodeByException($exception);
        return $this->render(
            'error',
            [
                'name' => $exception->getName(),
                'message' => $exception->getMessage(),
                'exception' => $exception,
            ]
        );
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionHome()
    {
        Yii::$app->session->setFlash('success', 'success message');
        Yii::$app->session->setFlash('error', 'error message');
        Yii::$app->session->setFlash('errors', 'error testing');
        return $this->inertia(
            'Home',
            [
                'text_from_controller' => 'Text from controller. Date: ' . date('Y-m-d H:i:s')
            ]
        );
    }

    /**
     * Displays contact.
     *
     * @return string
     */
    public function actionContact()
    {
        return $this->inertia('Contact');
    }

    /**
     * Displays about.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->inertia('About');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $postData = Yii::$app->request->post();
        $model = new LoginForm();
        if ($model->load($postData, '')) {
            if ($model->login()) {
                return $this->goBack();
            }
            Yii::$app->session->setFlash('errors', $model->getErrors());
        }

        return $this->inertia('Login');
    }
}