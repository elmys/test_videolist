<?php

namespace common\models\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;


class DateToTimeBehavior extends AttributeBehavior {

public $timeAttribute;

public function getValue($event) {
        if (empty($this->timeAttribute)) {
            throw new InvalidConfigException(
            'Can`t find "fromAttribute" property in ' . $this->owner->className()
            );
        }

        if (!empty($this->owner->{$this->attributes[$event->name]})) { // $model->_created_at
            $this->owner->{$this->timeAttribute} = strtotime($this->owner->{$this->attributes[$event->name]});
            return date('d.m.Y', $this->owner->{$this->timeAttribute});
        } else
            if (!empty($this->owner->{$this->timeAttribute}) && is_numeric($this->owner->{$this->timeAttribute})) {
                $this->owner->{$this->attributes[$event->name]} = date('d.m.Y', $this->owner->{$this->timeAttribute});
                return $this->owner->{$this->attributes[$event->name]};
        }else if($event->name == ActiveRecord::EVENT_BEFORE_INSERT){
                $this->owner->{$this->timeAttribute} = strtotime("now");
                return date('d.m.Y', $this->owner->{$this->timeAttribute});
            }

        return null;
    }
}