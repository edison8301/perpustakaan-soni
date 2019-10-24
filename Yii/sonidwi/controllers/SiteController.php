<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Anggota;
use app\models\Buku;
use app\models\Kategori;
use app\models\RegisterForm;
use app\models\ForgetPasswordForm;
use app\models\User;
use Mpdf\Mpdf;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        //return $this->render('index');
        $this->layout = 'main';

        if (User::isAdmin() || User::isAnggota() || User::isPetugas()) {
            return $this->render('index');
        } else {
            return $this->redirect(['site/login']);
        }
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (User::isAdmin()) {
                return $this->redirect(['site/index']);
            }
            elseif (User::isAnggota()) {
                return $this->redirect(['site/index']);
            }
            elseif (User::isPetugas()) {
                return $this->redirect(['site/index']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function  actionStus()
    {
        $sql='SELECT count(id),Nama FROM kategori GROUP BY Nama';
        
        $dataProvider=new CSqlDataProvider($sql,array(
                            'keyField' => 'id',
        ));
        $this->render('stus',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionExportPdf()
    {
        $this->layout='main1';
        $model = Buku::find()->All();
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template',['model'=>$model]));
        $mpdf->Output('DataBuku.pdf','D');
        exit;
    }
    public function actionExportPdfa()
    {
        $this->layout='main1';
        $model = Anggota::find()->All();
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templata',['model'=>$model]));
        $mpdf->Output('DataAnggota.pdf','D');
        exit;
    }
    public function actionExportPdfsppkl()
    {
        $this->layout='main1';
        $model = Buku::find()->All();
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('templatc',['model'=>$model]));
        $mpdf->Output('Surat Pengantar PKL (Kelompok).pdf','D');
        exit;
    }
    public function actionRegister()
   {
       //agar secara otomatis membuat sendiri
       $this->layout='main-login';
       //$model untuk layout register
       $model = new RegisterForm();

       if ($model->load(Yii::$app->request->post()) && $model->validate()) {

           $anggota = new Anggota();
           $anggota->nama = $model->nama;
           $anggota->alamat = $model->alamat;
           $anggota->telepon = $model->telepon;
           $anggota->email = $model->email;
           $anggota->save();

           $user = new User();
           $user->username = $model->username;
           $user->password = $model->password;
           $user->id_anggota = $anggota->id;
           $user->id_petugas = 0;
           $user->id_user_role = 2;
           $user->status = 2;
           $user->save();

           return $this->redirect(['site/login']);
       }

       //untuk memunculkan form dari halaman register
       return $this->render('register', ['model'=>$model]);
   }
   public function actionForget()
  {
      $this->layout = 'main-login';
      $model = new ForgetPasswordForm();

      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if (!$model->Email()) {
              Yii::$app->session->setFlash('Gagal', 'Email tidak ditemukan');
              return $this->refresh();
          }
          else
          {
              Yii::$app->session->setFlash('Berhasil', 'Cek Email Anda');
              return $this->redirect(['site/login']);
          }
      }
      return $this->render('forget', [
          'model' => $model,
      ]);
  }
}
