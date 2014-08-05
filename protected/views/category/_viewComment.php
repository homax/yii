<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('guest')); ?>:</b>
    <?php echo CHtml::encode($data->guest); ?>
    <br />
    <?php if($data->user_id!=false): ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->users->username); ?>
    <br />
    <?php endif; ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode(date('d.m.Y H:i:s', $data->created)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />


</div>