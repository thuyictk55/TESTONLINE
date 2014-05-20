<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv='X-UA-Compatible' content='IE=EmulateIE7' />
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!--[if IE 7]>
              <style>
              p {
                line-height:20px;
                padding-bottom:0;
              }
              h1 {
                font-size:20px;
                font-weight:bold;
                color:#272e34;
                padding-bottom:0;
              }
              h2 {
                font-size:16px;
                font-weight:bold;
                color:#272e34;
                padding-bottom:0;
              }
            </style>
          <![endif]-->

        <link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css' type='text/css' />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    </head>
    <body class='wsite-theme-light wsite-page-index weeblypage-index'>
        <div id="wrapper">
            <div id="sitename"><span class='wsite-logo'><table style='height:80px'><tr><td><a href='#'><span id="wsite-title"><?php echo Yii::app()->name ?></span></a></td></tr></table></span></div>
            <div id="content-wrapper">
                <div id="navigation">
                    <div id="navigation-links">
                        <div id="menu-top">
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'activeCssClass' => 'active',
                                'activateParents' => true,
                                'items' => array(
                                    array('label' => 'Home', 'url' => array('/site/index')),
                                    array(
                                        'label' => 'Exam',
                                        'url' => array('/exam/index'),
                                        'linkOptions' => array('id' => 'menuExam'),
                                        'itemOptions' => array('id' => 'itemExam'),
                                        'items' => array(
                                            array('label' => 'Create Exam', 'url' => array('/exam/create')),
                                            array('label' => 'Manage Exam', 'url' => array('/exam/admin')),
                                        ),
                                    ),
                                    array(
                                        'label' => 'Question',
                                        'url' => array('/question/index'),
                                        'linkOptions' => array('id' => 'menuQuestion'),
                                        'itemOptions' => array('id' => 'itemQuestion'),
                                        'items' => array(
                                            array('label' => 'Create Question', 'url' => array('/question/create')),
                                            array('label' => 'Manage Question', 'url' => array('/question/admin')),
                                        ),
                                    ),
                                    array('label' => 'Grading', 'url' => array('/chamthi/examcode')),
                                    array(
                                        'label' => 'Test Online',
                                        'url' => array('/thitructiep/examcode'),
                                        'visible' => !Yii::app()->user->isGuest,
                                        'linkOptions' => array('id' => 'idtest'),
                                        'itemOptions' => array('id' => 'itemtest'),
                                        'items' => array(
                                            array('label' => 'Examination History', 'url' => array('userExam/index'), 'visible' => !Yii::app()->user->isGuest),
                                        ),
                                    ),
                                    array(
                                        'label' => 'Manage Account',
                                        'url' => array('/user/admin'),
                                        'visible' => !Yii::app()->user->isGuest
                                    ), /// ktra xem check visible la isAdmin ntn???
                                    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                    array(
                                        'label' => 'Sign Up',
                                        'url' => array('/user/create'),
                                        'visible' => Yii::app()->user->isGuest
                                    ),
                                    array(
                                        'label' => 'Logout (' . Yii::app()->user->name . ')',
                                        'url' => array('/site/logout'),
                                        'visible' => !Yii::app()->user->isGuest
                                    )
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                </div> 
                <div id="header-image">
                    <div id="image" class="wsite-header"></div>
                </div>
                <div id="contents-body">
                    <div id="contents"><div id='wsite-content' class='wsite-not-footer'>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
                <div id="footer">
                    <div id="footer-contents"><a href='#' target='_blank'><?php echo Yii::app()->name ?></a> by you<div>
                        </div>
                    </div>
                </div>

                </body>
                </html>
