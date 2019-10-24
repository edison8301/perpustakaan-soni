<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $nama
 * @property string $tahun_terbit
 * @property int $id_penulis
 * @property int $id_penerbit
 * @property int $id_kategori
 * @property string $sinopsis
 * @property string $sampul
 * @property string $berkas
 */
class Buku extends \yii\db\ActiveRecord
{
    public $url;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['tahun_terbit'], 'safe'],
            [['id_penulis', 'id_penerbit', 'id_kategori'], 'integer'],
            [['sinopsis'], 'string'],
            [['nama', 'berkas','url'], 'string', 'max' => 255],
            [['url'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun_terbit' => 'Tahun Terbit',
            'id_penulis' => 'Penulis',
            'id_penerbit' => 'Penerbit',
            'id_kategori' => 'Kategori',
            'sinopsis' => 'Sinopsis',
            'sampul' => 'Sampul',
            'berkas' => 'Berkas',
        ];
    }
     public  function getPenerbit()
    {
        return $this->hasOne(Penerbit::className(), ['id'=>'id_penerbit']);
    }
    public  function getPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id'=>'id_penulis']);
    }
    public  function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id'=>'id_kategori']);
    }
    public function getCaritahun() {
       $yearNow = date("Y");
       $yearFrom = $yearNow - 30;
       $yearTo = $yearNow;
 
       $arrYears = array();
       foreach (range($yearFrom, $yearTo) as $number) {
              $arrYears[$number] = $number; 
       }
       $arrYears2 = array_reverse($arrYears, true);
 
       return $arrYears2;
}
public function getBukuCount()
    {
        return static::find()->count();
    }
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama');
    }

}
