<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Report') ?></h3>
        <?= $this->Form->create() ?>
    <table cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td>
            <?php echo $this->Form->input('year', [
                'options' => ['2016'=>'2016','2017'=>'2017'],
                'value'=>'2017'
                    ]); ?>
            <?= $this->Form->input('Month', ['type'=>'month','value'=>date("m"),'empty'=>false]);?>
            </td>
            <td style="text-align: right;">
            <?= $this->Form->button('Show report',['style'=>'margin-top:84px;margin-bottom:0px;']) ?>
            <?= $this->Form->end() ?>
            </td>
            <td>
        <?= $this->Html->link('Generate data','/transfers/generate',['class' => 'button','style'=>'margin-top:84px;margin-bottom:0px;']) ?>
            </td>
        </tr>
        </tbody>
    </table>

    <?php 
        if ( isset($companies) ):?>
            Report: <b><?= $month ?></b>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Used</th>
                        <th>Quota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($companies as $company) {
                        echo "<tr><td>".$company->name."</td>";
                        echo "<td>".round($company->data,1)."</td>";
                        echo "<td>".$company->quota."</td></tr>";
                    } ?>
                </tbody>
            </table>
     <?php   endif;
     ?>
</div>