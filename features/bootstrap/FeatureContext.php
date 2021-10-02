<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context
{
    /**
     * @When the user navigates to {https:\/\/birzha.tech\/}
     */
    public function theUserNavigatesToHttpsBirzhaTech()
    {
        try {
            $session = $this->getSession();
            $session->visit($this->locatePath('/'));
            echo $this->getSession()->getCurrentUrl();
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/logo\/ should be visible
     */
    public
    function theObjectLogoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.container .logo');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute src of object \/logo\/ should be equal to {\/images\/logo.png}
     */
    public
    function theValueOfAttributeSrcOfObjectLogoShouldBeEqualToImagesLogoPng()
    {
        try {
            $page = $this->getSession()->getPage();

            $element = $page->find('css', '.logo');

            if ($element->getAttribute('src') == '/images/logo.png') {
                echo 'PASSED';
            } else {
                var_dump($element->getAttribute('src'));
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the object \/menu\/ should be visible
     */
    public
    function theObjectMenuShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.menu');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/language\/ should be visible
     */
    public
    function theObjectLanguageShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.language');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/currencies\/ should be visible
     */
    public
    function theObjectCurrenciesShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.currencies');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the object \/phone\/ should be visible
     */
    public
    function theObjectPhoneShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.phone');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the button \/login\/ should be visible
     */
    public
    function theButtonLoginShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.login');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @When the user clicks on object \/login\/
     */
    public
    function theUserClicksOnObjectLogin()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.login');
        foreach ($elements as $item) {
            if ($item->isVisible()) {
                $item->click();
            }
        }
        echo $this->getSession()->getCurrentUrl();
    }


    /**
     * @Then the return code of URL from attribute href of object \/login\/ should be equal to \/two hundred\/
     */
    public
    function theReturnCodeOfUrlFromAttributeHrefOfObjectLoginShouldBeEqualToTwoHundred()
    {
        $handle = curl_init('https://birzha.tech/login');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($httpCode == 200) {
            echo 'STATUS CODE 200 | ' . PHP_EOL;
        } else {
            echo $httpCode;
        }
        curl_close($handle);
    }

    /**
     * @Then the button \/register\/ should be visible
     */
    public
    function theButtonRegisterShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.registration');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @When the user clicks on object \/register\/
     */
    public
    function theUserClicksOnObjectRegister()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.registration');
        foreach ($elements as $item) {
            if ($item->isVisible()) {
                $item->click();
            }
        }
        echo $this->getSession()->getCurrentUrl();
    }

    /**
     * @Then the value of attribute href of object \/registration\/ should be equal to {\/register}
     */
    public function theValueOfAttributeHrefOfObjectRegistrationShouldBeEqualToRegister()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.buttons .registration');
        foreach ($elements as $element) {
            if ($element->getAttribute('href') == '/register') {
                echo 'PASSED';
            } else {
                echo 'FALSE';
            }
        }
    }

    /**
     * @Then the return code of URL from attribute href of object \/register\/ should be equal to \/two hundred\/
     */
    public
    function theReturnCodeOfUrlFromAttributeHrefOfObjectRegisterShouldBeEqualToTwoHundred()
    {
        $handle = curl_init('https://birzha.tech/register');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($httpCode == 200) {
            echo 'STATUS CODE 200 | ' . PHP_EOL;
        } else {
            echo $httpCode;
        }
        curl_close($handle);

    }


    /**
     * @And the value of attribute href of object \/login\/ should be equal to {\/login}
     */
    public function theValueOfAttributeHrefOfObjectLoginShouldBeEqualToLogin2()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.login');
        foreach ($elements as $element) {
            if ($element->getAttribute('href') == '/login') {
                echo 'PASSED';
            } else {
                echo 'FALSE';
            }
        }
    }

    /**
     * @Then the value of attribute href of object \/login\/ should be equal to {\/login}
     */
    public function theValueOfAttributeHrefOfObjectLoginShouldBeEqualToLogin()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.login');
        foreach ($elements as $element) {
            if ($element->getAttribute('href') == '/login') {
                echo 'PASSED';
            } else {
                echo 'FALSE';
            }
        }
    }

    /**
     * @Then the name of object \/login\/ should be equal to \/вхід\/
     */
    public function theNameOfObjectLoginShouldBeEqualToVkhid2()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.login');
        foreach ($elements as $element) {
            if ($element->getText() == 'Вхід') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . $element->getText();
            }
        }
    }

    /**
     * @Then the name of object \/register\/ should be equal to \/Реєстрація\/
     */
    public function theNameOfObjectRegisterShouldBeEqualToReiestratsiia()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.registration');
        foreach ($elements as $element) {
            if ($element->getText() == 'Реєстрація') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @Given the user navigates to {https:\/\/birzha.tech\/login}
     */
    public function theUserNavigatesToHttpsBirzhaTechLogin()
    {
        $session = $this->getSession();
        $session->visit($this->locatePath('/'));
        echo $this->getSession()->getCurrentUrl();
    }


    /**
     * @Then the object \/page title\/ should be visible
     */
    public function theObjectPageTitleShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.h3');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the name of the object \/page title\/ should be equal to \/АВТОРИЗАЦІЯ\/
     */
    public function theNameOfTheObjectPageTitleShouldBeEqualToAvtorizatsiia()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.h3');
        foreach ($elements as $element) {
            if ($element->getText() == 'АВТОРИЗАЦІЯ') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . $element->getText();
            }
        }
    }

    /**
     * @Then the object \/inputLogin\/ should be visible
     */
    public function theObjectInputloginShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
//        $element = $page->findAll('css', '.inputLogin');
        $element = $page->findAll('xpath', '//*[@id="inputLogin"]');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the label for \/inputLogin\/ should be \/Логін\/
     */
    public function theLabelForInputloginShouldBeLogin()
    {

        $page = $this->getSession()->getPage();
        $elements = $page->findAll('xpath', '/html/body/main/div/div/form/label[1]');
        foreach ($elements as $element) {
            if ($element->getText() == 'Логін') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . $element->getText();
            }
        }

    }

    /**
     * @Then the value of of object \/inputLogin\/ should be equal to \/+:arg1(:arg2):arg3-:arg4-:arg5-:arg6\/
     */
    public function theValueOfOfObjectInputloginShouldBeEqualTo($arg1, $arg2, $arg3, $arg4, $arg5, $arg6)
    {
        throw new PendingException();
    }

    /**
     * @Then the object \/inputPassword\/ should be visible
     */
    public function theObjectInputpasswordShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('xpath', '//*[@id="inputPassword"]');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the label for \/inputPassword\/ should be \/Пароль\/
     */
    public function theLabelForInputpasswordShouldBeParol()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '//*[@id="registration_form_plainPassword"]');
            foreach ($elements as $element) {
                if ($element->getValue() == 'Пароль') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . $element->getValue();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of of object \/inputPassword\/ should be equal to NULL
     */
    public function theValueOfOfObjectInputpasswordShouldBeEqualToNull()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.inputPassword');
        foreach ($elements as $element) {
            if ($element->getText() == NULL) {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @Then the object \/checkBox\/ should be visible
     */
    public function theObjectCheckboxShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.checkbox');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the label  of of object \/checkBox\/ should be equal to \/Запам`ятати мене\/
     */
    public function theLabelOfOfObjectCheckboxShouldBeEqualToZapamIatatiMene()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.checkbbox');
        foreach ($elements as $element) {
            if ($element->getText() == 'Запам`ятати мене') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();

            }
        }
    }

    /**
     * @Then the button \/submit\/ should be visible
     */
    public function thenTheButtonSubmitShouldBeVisible()
    {
        $page = $this->getSession()->getPage();
        $element = $page->findAll('css', '.btn-primary');

        if ($element[0]->isVisible()) {
            echo 'VISIBLE';
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the name of object \/submit\/ should be equal to \/Авторизуватися\/
     */
    public function theNameOfObjectSubmitShouldBeEqualToKupuiut()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.btn-primary');
        foreach ($elements as $element) {
            if ($element->getText() == 'Авторизуватися') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @When the user clicks on object \/submit\/
     */
    public function theUserClicksOnObjectSubmit()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.btn-lg .btn-primary');
        foreach ($elements as $item) {
            if ($item->isVisible()) {
                $item->click();
            }
        }
        echo $this->getSession()->getCurrentUrl();
    }


    /**
     * @Given /^the value of of object \/inputLogin\/ should be equal to \/\+38\(000\)00\-00\-00\-0\/$/
     */
    public function theValueOfOfObjectInputLoginShouldBeEqualTo380000000000()
    {
        try {
            $page = $this->getSession()->getPage();
//            $elements = $page->findAll('css', '.inputLogin .data-mask');
            $elements = $page->findAll('xpath', '//*[@id="registration_form_login"]');
            foreach ($elements as $element) {
                if ($element[0]->getValue() == '+38(000)00-00-00-0') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . " " . $element->getValue();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to {https:\/\/birzha.tech\/login}
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTechLogin()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/login') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the current URL should be equal to \{https:\/\/birzha\.tech\/register\}$/
     */
    public function theCurrentURLShouldBeEqualToHttpsBirzhaTechRegister()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/register') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            } else {
                echo 'FALSE';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the name of the object \/page title\/ should be equal to \/РЕЄСТРАЦІЯ\/$/
     */
    public function theNameOfTheObjectPageTitleShouldBeEqualToРЕЄСТРАЦІЯ()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'h1');
            if ($elements->getText() == 'РЕЄСТРАЦІЯ') {
                echo 'PASSED' . " " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }

    /**
     * @Then /^the object \/inputEmail\/ should be visible$/
     */
    public function theObjectInputEmailShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="registration_form_email"]');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/inputEmail\/ should be \/Email\/$/
     */
    public function theLabelForInputEmailShouldBeEmail()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[2]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Email') {
                    echo 'PASSED' . " " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }

    /**
     * @Then /^the object \/termsCheckbox\/ should be visible$/
     */
    public function theObjectTermsCheckboxShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_agreeTerms"]');


            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label  of of object \/termsCheckbox\/ should be equal to \/Я підтверджую свою згоду\/$/
     */
    public function theLabelOfOfObjectTermsCheckboxShouldBeEqualToЯПідтверджуюСвоюЗгоду()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[4]/label');
            foreach ($elements as $element) {
                if ($element->getValue() == 'Я підтверджую свою згоду') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . " " . $element->getValue();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When /^the user clicks on object \/registerSubmit\/$/
     */
    public function theUserClicksOnObjectRegisterSubmit()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="registration_form_submit"]');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
                echo $this->getSession()->getCurrentUrl();
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the object \/register Page title\/ should be visible$/
     */
    public function theObjectRegisterPageTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();

            $element = $page->find('css', 'h1');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the object \/registerInputLogin\/ should be visible$/
     */
    public function theObjectRegisterInputLoginShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_login"]');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/registerInputLogin\/ should be \/Логін\/$/
     */
    public function theLabelForRegisterInputLoginShouldBeЛогін()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[1]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Логін') {
                    echo 'PASSED' . " " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/registerInputLogin\/ should be equal to \/\+38\(000\)00\-00\-00\-0\/$/
     */
    public function theValueOfOfObjectRegisterInputLoginShouldBeEqualTo380000000000()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.registration_form_login');
            foreach ($elements as $element) {
                if ($element[0]->getText() == '+38(000)00-00-00-0') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the object \/registerInputPassword\/ should be visible$/
     */
    public function theObjectRegisterInputPasswordShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');

            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/registerInputPassword\/ should be \/Пароль\/$/
     */
    public function theLabelForRegisterInputPasswordShouldBeПароль()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '//*[@id="registration_form"]/div[3]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Пароль') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/registerInputPassword\/ should be equal to NULL$/
     */
    public function theValueOfOfObjectRegisterInputPasswordShouldBeEqualToNULL()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');
            foreach ($elements as $element) {
                if ($element->getText() == NULL) {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/inputEmail\/ should be equal to NULL$/
     */
    public function theValueOfOfObjectInputEmailShouldBeEqualToNULL()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form_email"]');
            foreach ($elements as $element) {
                if ($element->getText() == NULL) {
                    echo 'PASSED';
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^fill the \/registerInputLogin\/ with value \/\+38\(067\)354\-85\-14\/$/
     */
    public function fillTheRegisterInputLoginWithValue380673548514()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_login"]');
            if ($element->isVisible()) {
                $element->setValue('+38(067)354-85-14');
                echo $element->getValue();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/registerInputPassword\/ with value \/test1111\/$/
     */
    public function fillTheRegisterInputPasswordWithValueTest1111()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');
            if ($element->isVisible()) {
                $element->setValue('123456789');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/inputEmail\/ with value \/whiletablesits@gmail\.com\/$/
     */
    public function fillTheInputEmailWithValueWhiletablesitsGmailCom()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_email"]');
            if ($element->isVisible()) {
                $element->setValue('whiletablesits@gmail.com');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^click on object \/termsCheckbox\/$/
     */
    public function clickOnObjectTermsCheckbox()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.checkbox');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^fill the \/inputLogin\/ with value \/\+38\(095\)470\-04\-86\/$/
     */
    public function fillTheInputLoginWithValue380673548514()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="inputLogin"]');

            if ($element->isVisible()) {
                $element->setValue('+38(095)470-04-86');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/inputPassword\/ with value \/123456789\/$/
     */
    public function fillTheInputPasswordWithValueTest1111()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="inputPassword"]');
            if ($element->isVisible()) {
                $element->setValue('123456789');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^click on object \/checkBox\/$/
     */
    public function clickOnObjectCheckBox()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.checkbox');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the object \/info\/ should be visible
     */
    public function theObjectInfoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.info');
            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the link \/info\/ should be visible
     */
    public function theLinkInfoShouldBeVisible()
    {

        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->isVisible()) {
            echo 'VISIBLE' . " " . $element->getText();
        } else {
            echo 'NOT FOUND';
        }
    }

    /**
     * @Then the value of attribute href of object \/info\/ should be equal to {\/register}
     */
    public function theValueOfAttributeHrefOfObjectInfoShouldBeEqualToRegister()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->getAttribute('href') == '/register') {
            echo 'PASSED' . " " . $element->getAttribute('href');
        } else {
            echo 'FALSE' . " " . $element->getAttribute('href');
        }
    }

    /**
     * @Then the name of link \/info\/ should be equal to \/Увійдіть\/
     */
    public function theNameOfLinkInfoShouldBeEqualToUviidit()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->getText() === 'Увійдіть') {
            echo 'PASSED' . " " . $element->getText();
        } else {
            echo 'FALSE' . " " . $element->getText();

        }
    }

    /**
     * @When the user clicks on link \/info\/
     */
    public function theUserClicksOnLinkInfo()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->isVisible()) {
            $element->click();
        }
        echo $this->getSession()->getCurrentUrl();
    }

    /**
     * @Then Then the button \/registerSubmit\/ should be visible
     */
    public function thenTheButtonRegistersubmitShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_submit"]');


            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the name of object \/registerSubmit\/ should be equal to \/Наступний крок\/
     */
    public function theNameOfObjectRegistersubmitShouldBeEqualToAvtorizuvatisia()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.submit');
        foreach ($elements as $element) {
            if ($element->getText() == 'Наступний крок') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @Then /^the current URL should be equal to \{https:\/\/birzha\.tech\}$/
     */
    public function theCurrentURLShouldBeEqualToHttpsBirzhaTech()
    {
        if ($this->getSession()->getCurrentUrl() == '/') {
            echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
        }
    }


    /**
     * @Given /^the name of object \/info\/ should be equal to \/Не маєш власного облікового запису\?\/$/
     */
    public function theNameOfObjectInfoShouldBeEqualToНеМаєшВласногоОбліковогоЗапису()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '/html/body/main/div/div/form/div[2]/span');
            if ($element->getValue() == 'Не маєш власного облікового запису?') {
                echo 'PASSED' . " " . $element->getValue();
            } else {
                echo 'FALSE' . " " . $element->getValue();
            }
        } catch (Error $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

}
