<?php namespace Mitch\LaravelDoctrine\Traits;

trait EmailReminder {

    /**
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
} 