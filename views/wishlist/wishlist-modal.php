<?php if(!empty($session['wishlist'])): ?>
    <div class="table-responsive{-sm|-md|-lg|-xl} ytr">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>이름</th>
                    <th></th>
                     <th>크기</th>
                    <th>가격</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['wishlist'] as $id => $item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                    <td><h4><?= $item['name']?></h4></td>
                    <td><p><?= $item['size']?></p></td>
                    <td><p>$<?= $item['price']?></p></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
                 
            <?php endforeach?>
              
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>위시리스트가 비어 있습니다</h3>
<?php endif;?>
