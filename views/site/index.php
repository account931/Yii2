<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Basic Yii_2 Application';
?>
<div class="site-index">



    <div class="jumbotron">
        <h1> 
<!--Basic Yii_2 <img src="http://www.brightkidsbooks.com/wp-content/uploads/2014/05/sun-logo-300x300.jpg" style="width:15%;"/>-->
<?= Html::encode($this->title); echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/sun.jpg' , $options = ["margin-left"=>"3%","class"=>"sunimg","width"=>"12%",] ); ?>
 <!--MINE Sun Image-->
        </h1>

        <p class="lead"> Yii-powered application(downloaded).</p>
<!--<img src="https://upload.wikimedia.org/wikipedia/en/6/6b/Yii-logo-transparent.png" style="width:44%;"/>-->



<!-- .Com Image-->
<?=  Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/main1.jpg' , $options = ["margin-left"=>"","class"=>"","width"=>"98%",] ); ?>
<!--<img src="http://cyberfox.co.za/wp-content/uploads/2011/03/web-designer.jpg"/> -->
</br>
<img src="http://www.salonkinsmen.ca/ESW/Images/icone-bouton-internet-www-e46093.jpg"/>  



      <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Yii Concept</h2>

                <p>Like most PHP frameworks, Yii implements the MVC (Model-View-Controller) architectural pattern and promotes code organization based on that     pattern.
                   Yii takes the philosophy that code should be written in a simple yet elegant way. Yii will never try to over-design things mainly for the          purpose of strictly following some design pattern.
                Yii is a full-stack framework providing many proven and ready-to-use features: query builders and ActiveRecord for both relational and NoSQL databases; RESTful API development support; multi-tier caching support; and more.
                Yii is extremely extensible. You can customize or replace nearly every piece of the core's code. You can also take advantage of Yii's solid extension architecture to use or develop redistributable extensions.
               High performance is always a primary goal of Yii.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
               <!-- <h2>Heading</h2>-->
                   <img  src="http://napitwptech.com/wp-content/uploads/2016/01/php-logo.jpg"/>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>RESTful Web Services </h2>

                <p>Quick prototyping with support for common APIs for Active Record;
                   Response format negotiation (supporting JSON and XML by default);
                   Customizable object serialization with support for selectable output fields;
                   Proper formatting of collection data and validation errors;
                   Support for HATEOAS;
                   Efficient routing with proper HTTP verb check;
                   Built-in support for the OPTIONS and HEAD verbs;
                   Authentication and authorization;
                   Data caching and HTTP caching;
                   Rate limiting;</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>





</div>
