<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = '연락 정보';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="contact-page" class="container">
<div class="bg">
   <div class="row">    		
	<div class="col-sm-12">   		
    <h2 class="title2 text-center"><?= Html::encode($this->title) ?><strong> Us</strong></h2>
         </div>			 		
	    </div> 
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success">
            저희에게 연락해 줘서 고마워요. 가능한 한 빨리 답변 해 드리겠습니다.
        </div>
    <?php else: ?>
       <div class="row">  	
	    	<div class="col-sm-8">
	    		<div class="contact-form">
	    		<h2 class="title2 text-center">접촉</h2>
                <?php $form = ActiveForm::begin(['id' => 'contact-form', ] ); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->textInput(['placeholder' => '당신의 이름'])->label(false) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => '이메일'])->label(false) ?>
                    <?= $form->field($model, 'subject')->textInput(['placeholder' => '전화'])->label(false) ?>
                    <?= $form->field($model, 'body')->textArea(['rows' => 6])->textInput(['placeholder' => '메시지'])->label(false) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->label(false) ?>
                    <div class="form-group col-md-12">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
              <div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title2 text-center">연락처 정보</h2>
	    				<address>
	    					<p>서울7호점</p>
							<p>용산구 한강대로 405 </p>
							<p>서울 대한민국</p>
							<p>핸드폰: +0082 010 2438 3939</p>
							<p>팩스: 0082010 2438 3939</p>
							<p>이메일: seteca39@gmail.com</p>
	    				</address>
	    				</div>
    			</div>    			
	    	</div>  
    		
    <?php endif; ?>
    </div>
</div>
