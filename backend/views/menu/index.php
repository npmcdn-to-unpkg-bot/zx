<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增菜单', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'title',
                'header'=>'标题',
                'format'=>'Raw',
                'value'=>function($model){
                    if($model['is_bottom']){
                        $span='<i data-mark="bottom" class="fa fa-minus-square-o">'.StringHelper::truncate($model['title'],15);
                    }else{
                        $span='<i class="fa fa-minus-square-o">'.StringHelper::truncate($model['title'],15).'</i>';
                    }

                    $class='Mmark'.implode('@Mmark',$model['plist']);
                    $class=explode('@',$class);
                    $class=implode(' ',$class);

                    return Html::tag('div',$span,[
                        'class'=>'Mtabeltoggle '.$class,
                        'style'=>'cursor:pointer;padding-left:15px;margin-left:'.(($model['level']-1)*20).'px;height:30px;line-height:30px;',
                        'data' => ['id' =>$model['id']],
                        'alt' =>$model['title'],
                        'title'=>$model['title'],
                    ]);
                }
            ],
            [
                'attribute'=>'typename',
                'header'=>'菜单类型',
            ],
            'sort_order'=>['class' => 'yii\grid\SortColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{manage}{tmpset}{createchild}{delete}',
                'buttons'=>[
                    'update'=>function ($url,$model,$key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '编辑'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['update','id'=>$model['id'],'mid'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'tmpset'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '模板管理'),
                            'aria-label' => Yii::t('yii', 'tmpset'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['tmpset','id'=>$model['id'],'mid'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-briefcase"></span>', $url, $options);
                    },
                    'manage'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '内容管理'),
                            'aria-label' => Yii::t('yii', 'Manage'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=[strtolower($model['controller']),'mid'=>$model['id']];
                        if(strtolower($model['controller'])=='menu/index'){
                            return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', $url, $options);
                        }else{
                            return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', $url, $options);
                        }
                    },
                    'createchild'=>function ($url, $model, $key) {
                        if($model['type']!=1){return;}
                        $options = array_merge([
                            'title' => Yii::t('yii', '添加子菜单'),
                            'aria-label' => Yii::t('yii', 'createchild'),
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['createchild','id'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, $options);
                    },
                    'delete'=>function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => Yii::t('yii', '删除'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', '你确定要删除这条记录吗'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'style'=>'margin-left:5px;'
                        ]);
                        $url=['delete','id'=>$model['id']];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                ]
            ],
            ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>
</div>
<script>
    /*start-菜单表格折叠*/
    $(".Mtabeltoggle").on("click",function(){
        var obj=$(this);
        var did=obj.attr('data-id');
        var fa=obj.find(".fa");
        if(fa.attr('data-mark')){return;}
        var subfalist=$(".Mmark"+did).find(".fa");
        var trline=$(".Mmark"+did).parent().parent();
        if(fa.hasClass('fa-minus-square-o')){
            trline.hide(500);
            subfalist.removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
            fa.removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
        }else{
            trline.show(500);
            subfalist.removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
            fa.removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
        }
    });
    /*end-菜单表格折叠*/
</script>
<style>
    .Mtabeltoggle{border-left: 0px dashed #d2322d;position: relative;}
    .menu-folder-line{float:left;width:20px;height:30px;border-left:1px dashed #d2322d;}
    .Mtabeltoggle:before{display: inline-block;content: "";position: absolute;  top: 0px;  left: 0px;  width: 15px;  height: 15px;  border-bottom: 1px dotted #666;  border-left:1px dotted #666;  z-index: 1;  }
</style>