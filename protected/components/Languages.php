<?php
class Languages extends CApplicationComponent
{
    public $useLanguage = false;
    public $autoDetect = false;
    public $languages = array('en', 'ru',);
    public $languagesTitles = array('ru' => 'Russian', 'en' => 'English');
    public $defaultLanguage = 'en';
    public $id = 'siteLang';
    public function init()
    {
        if ($this->useLanguage)
            $this->initLanguage();
    }
    private function initLanguage()
    {
        $language = Yii::app()->session->itemAt('language');
        if ($language === null && $this->defaultLanguage)
            $language = $this->defaultLanguage;
        if ($language === null && $this->autoDetect)
            $language = Yii::app()->getRequest()->getPreferredLanguage();
        if ($language === 'uk_ua')
            $language = 'uk';
        $languageId = array_search($language, $this->languages);
        $language = $this->languages[$languageId === false ? 0 : $languageId];
        Yii::app()->session['language'] = $language;
        Yii::app()->setLanguage($language);
    }
}