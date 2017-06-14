<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Carousel; //  images
use yii\bootstrap\Tabs;  //Menu  tabs
use yii\bootstrap\Modal;  //  Model  window  pop-up;
use yii\bootstrap\Navbar;  //Not  working
use yii\bootstrap\Nav;    //Not  working
use yii\bootstrap\Collapse;  //  Collapse (hide/show)
use yii\bootstrap\ButtonDropdown;  //color  dropdown
use kartik\widgets\TouchSpin; //my Kartik //https://github.com/kartik-v/yii2-widgets;

use kartik\date\DatePicker;
use kartik\widgets\ActiveForm;

//https://nix-tips.ru/yii2-vse-plyushki-twitter-bootstrap.html


$this->title = 'Yii Bootstrap 3';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <h1>
   <?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/bstrap.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"14% ",] ); ?>
    <?= Html::encode($this->title) ?>

   </h1></br><hr></br>












<?php



//KARTIK

// A read only datepicker input (with default initial value)
echo '<label class="control-label">Anniversary</label>';
echo DatePicker::widget([
    'name' => 'anniversary',
    'value' => '08/10/2004',
    'readonly' => true,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'mm/dd/yyyy'
    ]
]);

// Usage with model and Active Form (with no default initial value)
/*echo $form->field($model, 'date_1')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]);*/
// END KARTIK






echo"</br></br>";



//saving  Corousel  into  variable  to use  it  in  tab in  short  form---
$v=Carousel::widget ( [
    'items' => [
    [
        'content' => '<img style="width:474px;height:296px" src="http://spaceplace.nasa.gov/templates/featured/sun/sunburn300.png"/>',
        'caption' => '<h2>Yii Gii</h2><p>Cosy  code  generator. Moduls, models  на основе таблиц в БД и, конечно же, CRUD</p>',
        'options' => []
    ],
     [
        'content' => '<img style="width:474px" src="http://vignette4.wikia.nocookie.net/uncyclopedia/images/5/55/Ar\'sun.gif"/>',
        'caption' => '<h2>Отличный отладчик</h2><p>Легко подключается, помнит все запросы http, БД и логи</p>',
        'options' => []
    ],
     [
        'content' => '<img style="width:474px" src="//nix-tips.ru/wp-content/uploads/2014/11/carousel001.jpg"/>',
        'caption' => '<h2>Быстрый старт</h2><p>Установка и обновление через composer</p>',
        'options' => []
    ]
    ],
       'options' => [
       'style' => 'width:474px;'  // Container  width 
                                   
    ]
]);
// End saving  Corousel  into  variable  to use  it  in  tab in  short  form-------












// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//START  TABS
echo "<h8>Menu Tabs</h8>";
echo Tabs::widget([
    'items' => [
        [
            'label' => 'Yii2',
            'content' => '</br><h4>Some  content</h4>',
            'active' => true,   'style' => 'font-size:8px;'

/*'options' => [
       'style' => 'font-size:8px;']  */

        ],




        [
            'label' => 'jQuery',
            'content' => '</br><h4>Object-oriented programming (OOP) is a programming paradigm based on the concept of "objects", which may contain data, in the form of fields, often known as attributes;</h4>'
        ],

        [
            'label' => 'OOP Concept',
            'content' => '</br><h4>Languages that support object-oriented programming typically use inheritance for code reuse and extensibility in the form of either classes or prototypes. Those that use classes support two main concepts:

Classes – the definitions for the data format and available procedures for a given type or class of object; may also contain data and procedures (known as class methods) themselves, i.e. classes contains the data members and member functions
Objects – instances of classes</h4>',
            'headerOptions' => [
                'id' => 'headerOptions'
            ],
            'options' => [
                'id' => 'options'
            ]
        ],
        [
            'label' => 'Addit  tabs',
            'content' => $v.'</br><h4>U  can  add  as  much  tab  as  u  want ,  just  add  them  to  array</h4>'
        ],
        [
            'label' => 'DropList  TAb',
            'items' => [
                [
                    'label' => 'SubTab_1',
                    'content' => '</br><h4>Yii 2 and Twitter Bootstrap. New possibilities  in a friendly  interface.</h4>'
                ],
                [
                    'label' => 'SubTab_2',
                    'content' => '</br><h4>The  second  dropDown Tab</h4>'
                ],
                [
                    'label' => 'SubTab_3',
                    'content' => '</br><h4>3rd dropDown Tab</h4>'
                ]
            ]
        ]
    ]
]);
//END  Menu TABS
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************











// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//START  COURUSEL
echo "</br></br><hr style='color:black;'>";
echo "<h2>BS  Gallery</h2>";
echo Carousel::widget ( [
    'items' => [
    [
        'content' => '<img style="width:474px;height:296px" src="http://www.gaebler.com/images/Categories/Technology.jpg"/>',
        'caption' => '<h2>Yii Gii</h2><p>Удобный встроенный генератор кода. Модули, модели на основе таблиц в БД и, конечно же, CRUD</p>',
        'options' => []
    ],
     [
        'content' => '<img style="width:474px" src="http://www.ikeni.net/wp-content/uploads/2015/05/Spesifikasi-Lenovo-Thinkpad-X250-474x296.jpg"/>',
        'caption' => '<h2>Отличный отладчик</h2><p>Легко подключается, помнит все запросы http, БД и логи</p>',
        'options' => []
    ],
     [
        'content' => '<img style="width:474px" src="http://www.teachmag.com/wp-content/uploads/2015/10/technophobe_636x362.jpg"/>',
        'caption' => '<h2>Быстрый старт</h2><p>Установка и обновление через composer</p>',
        'options' => []
    ]
    ],
       'options' => [
       'style' => 'width:474px;'  // Container  width   // ‘options’ => [‘class’ =>’slide’]   
    ],



]);
//END  Carousel
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************









echo"</br></br><hr>";






//Start Modal  Window
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 

Modal::begin([
    'header' => '<h2>Modal  window!</h2>',
    'toggleButton' => [
        'tag' => 'button',
        'class' => 'btn btn-lg btn-block btn-info',
        'label' => 'Click  here!',
    ]
]);
 
echo 'Ok,I  see  It.';
 
Modal::end();
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//  End  Modal  Window













//START NAV BAR  //  not  working  for  some  bizzare  reason, claiming  the  CLASS IS missing  ,  though  actually  it  is  included ???
// **************************************************************************************
// **************************************************************************************
//                                                                                     **



// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  NAV BAR





echo "</br></br><hr>";




//  Collapse (Hide/  show  options)
// **************************************************************************************
// **************************************************************************************
//                                                                                     **

echo Collapse::widget([
    'items' => [
        [
            'label' => 'Item 1',
            'content' => 'Item 1  Content ',
            // to  be  this  block open  by  default   de  comment  the  following 
            /*'contentOptions' => [
                'class' => 'in'
            ]*/
        ],
        [
            'label' => 'Item 2',
            'content' => 'Item 2  Content.',
            'contentOptions' => [],
            'options' => []
        ],
        [
            'label' => 'Item 3 ',
            'content' => 'Item  3  Content ',
            'contentOptions' => [],
            'options' => []
        ]
    ]
]);

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Collapse (Hide/  show  options)













// Start  Color  dropdown  Button
// **************************************************************************************
// **************************************************************************************
//                                                                                     **


echo ButtonDropdown::widget([
    'label' => 'Primary',
    'options' => [
        'class' => 'btn-lg btn-primary',
        'style' => 'margin:5px'
    ],
    'dropdown' => [
        'items' => [
            [
                'label' => 'Action 2',
                'url' => '#'
            ],
            [
                'label' => 'Action 3',
                'url' => '#'
            ],
            [
                'label' => '',
                'options' => [
                    'role' => 'presentation',
                    'class' => 'divider'
                ]
            ],
            [
                'label' => 'Action 4',
                'url' => '#'
            ]
        ]
    ]
]);
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Color  dropdown  Button





?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-------------   2  column bootstrap----------->
<div class="container-fluid">
  <h1>Bootstrap 2 -columns </h1>
  <p>Resize the browser window to see the effect.</p>
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-8" style="background-color:lavenderblush;">.col-sm-8
             </br><a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a></div>
    </div>
</div>
<!------------END 2  column bootstrap----------->

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>












 
</div>


