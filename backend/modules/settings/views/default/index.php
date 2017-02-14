<?php
/**
 * @var $key_val array
 */
use yii\helpers\Html;

?>

<?php echo Html::beginForm(['/settings/default'],'post',['class' => 'form-horizontal']) ?>
<?php echo Html::label('Главная: заголовок','index_header', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_header', $key_val['index_header'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Главная: подзаголовок','index_subtitle', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_subtitle', $key_val['index_subtitle'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Главная: заголовок кнопки','index_button', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_button', $key_val['index_button'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Главная: цена','index_main_price', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_main_price', $key_val['index_main_price'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Главная: название книги','index_book_title', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_book_title', $key_val['index_book_title'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Главная: автор книги','index_book_autor', ['class'=>'control-label']) ?>
<?php echo Html::textInput('index_book_autor', $key_val['index_book_autor'],['class' => 'form-control', 'id'=>'dol']) ?>
<?php echo Html::label('Мы в социальных сетях','social_link_vk', ['class'=>'control-label']) ?>
<?php echo Html::textInput('social_link_vk', $key_val['social_link_vk'],['class' => 'form-control', 'id'=>'dol']) ?>

<br>
<?php echo Html::submitButton('Сохранить', ['class'=>'btn btn-success']) ?>
<?php echo Html::endForm() ?>
