<?php

namespace common\models;

use Yii;
use common\models\behaviors\DateToTimeBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "playlist".
 *
 * @property string $id
 * @property string $title
 * @property string $url
 * @property string $created_at
 * @property string $order
 * @property string $provider
 */
class Playlist extends \yii\db\ActiveRecord
{
    public $_created_at;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'playlist';
    }

    public function behaviors()
    {
        return [
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => '_created_at',
                    ActiveRecord::EVENT_BEFORE_VALIDATE => '_created_at',
                    ActiveRecord::EVENT_AFTER_FIND => '_created_at',
                ],
                'timeAttribute' => 'created_at'
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'order'], 'integer'],
            ['_created_at', 'date', 'format' => 'php:d.m.Y'],
            [['title', 'url'], 'string', 'max' => 255],
            [['provider'], 'string', 'max' => 100],
            [['url'], 'unique'],
            ['url', 'validateVideoLink'],
        ];
    }

    public function validateVideoLink($attribute, $params, $validator)
    {
        foreach (\Yii::$app->params['videohosts'] as $key => $videohost) {
            preg_match($videohost['mask'], $this->$attribute, $matches);
            if(count($matches) > 1){
                $this->provider = $key;
                break;
            }
        }
        if (!isset($matches) || !$matches) {
            $this->addError($attribute, 'Неправильная ссылка на видео.');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'url' => 'Url',
            'created_at' => 'Добавлено',
            '_created_at' => 'Добавлено',
            'order' => 'Order',
            'provider' => 'Provider',
        ];
    }

    protected function getVideoId(){
        if(!$this->url)
            return false;

        preg_match(\Yii::$app->params['videohosts'][$this->provider]['mask'], $this->url, $matches);
        if(count($matches) > 1)
            return $matches[1];
        else
            return null;
    }

    protected function getVideoCode(){
        if(!$this->url)
            return false;

            if(\Yii::$app->params['videohosts'][$this->provider]){
                if($this->provider == 'vkontakte'){
                    //video315690434_171694598
                    $params = $this->VideoId;
                    $params = substr_replace($params, '', 0, 5);
                    $params = explode('_', $params);
                    $res = str_replace("%videoId%", $params[0], \Yii::$app->params['videohosts'][$this->provider]['code']);
                    return str_replace("%videoId1%", $params[1], $res);
                }
                return str_replace("%videoId%", $this->VideoId, \Yii::$app->params['videohosts'][$this->provider]['code']);
            }
        return false;
    }
}
