<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int $id_buku
 * @property int $id_anggota
 * @property string $tanggal_pinjam
 * @property string $tanggal_kembali
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_anggota', 'tanggal_pinjam', 'tanggal_kembali'], 'required'],
            [['id_buku', 'id_anggota'], 'integer'],
            [['tanggal_pinjam', 'tanggal_kembali'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Buku',
            'id_anggota' => 'Anggota',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'tanggal_kembali' => 'Tanggal Kembali',
        ];
    }
    public function getBuku()
    {
        return $this->hasOne(Buku::class, ['id' => 'id_buku']);
    }
    public  function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id'=>'id_anggota']);
    }
    public function getManyBuku()
    {
        return $this->hasMany(Buku::class, ['id_buku' => 'id']);
    }
    public function getPeminjamanCount()
    {
        return static::find()->count();
    }
    public static function getGrafikPeminjamanByBulan()
     {
        $list = [];
        for ($i=1; $i <=12  ; $i++) { 
            $peminjaman = Peminjaman::find()
            ->andWhere(['between', 'tanggal_pinjam', date('Y')."-".$i."-1", date('Y')."-".$i."-31"])->count();
            $list[] = $peminjaman;
        }
        return $list;
     }
}
