<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div>
            <!--header--> 

            <div id="mainmenu">
                <div id = "menu-top">
                <?php
//                $this->widget('zii.widgets.CMenu', array(
//                    'items' => array(
//                        array('label' => 'Home', 'url' => array('/site/index')),
//                        array('label' => 'Create question', 'url' => array('/question/create')),
//                        array('label' => 'Create Exam', 'url' => array('/exam/create')),
//                        array('label' => 'Cham Thi', 'url' => array('/chamthi/examcode')),
//                        array('label' => 'Thi  truc tiep', 'url' => array('/thitructiep/examcode'),'visible' => !Yii::app()->user->isGuest),
//                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                        array('label' => 'Sign Up', 'url' => array('/user/create'), 'visible' => Yii::app()->user->isGuest),
//                        array('label' => 'Manage Account', 'url' => array('/user/admin'), 'visible' => !Yii::app()->user->isGuest), /// ktra xem check visible la isAdmin ntn???
//                        array('label'=>'Examination History','url'=>array('userExam/index'),'visible'=>!Yii::app()->user->isGuest),
//                        array('label' => 'Contact', 'url' => array('/site/contact')),
//                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
//                    ),
//                ));
                $this->widget('zii.widgets.CMenu', array(
                    'activeCssClass' => 'active',
                    'activateParents' => true,
                    'items' => array(
                        array(
                            'label' => 'Company',
                            'url' => array('/company/index'),
                            'linkOptions' => array('id' => 'menuCompany'),
                            'itemOptions' => array('id' => 'itemCompany'),
                            'items' => array(
                                array('label' => 'Our Mission', 'url' => array('/company/index')),
                                array('label' => 'About Us', 'url' => array('/company/aboutUs')),
                                array('label' => 'Careers', 'url' => array('/company/careers')),
                                array('label' => 'Contact Us', 'url' => array('/company/contactUs')),
                                array('label' => 'Store Locator', 'url' => array('/company/storeLocator')),
                            ),
                        ),
                        array(
                            'label' => 'Blog',
                            'url' => array('/blog/post/index'),
                            'linkOptions' => array('id' => 'menuBlog')
                        ),
                        array(
                            'label' => 'Change',
                            'url' => array('/change/index'),
                            'linkOptions' => array('id' => 'menuChange'),
                            'itemOptions' => array('id' => 'itemChange'),
                            'items' => array(
                                array('label' => 'Community Involvement', 'url' => array('/change/index')),
                                array('label' => 'Eco Responsibility', 'url' => array('/change/ecoPolicy')),
                                array('label' => 'Responsibility', 'url' => array('/change/responsibility')),
                            ),
                        ),
                        array(
                            'label' => 'Shop',
                            'url' => array('/shop'),
                            'linkOptions' => array('id' => 'menuBuy')
                        ),
                    ),
                ));
                ?>
            </div>
            ?>
        </div><!-- mainmenu -->
        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
        <?php endif ?>

<?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer">
            Administrators:
            <ul>Pham Thi Thu Thuy<br>
                    Do Xuan Thai
            </ul>
        </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
