<div class="rrcs form">
    <?php
    echo $this->Form->create('File', array('type' => 'file'));
    echo $this->Form->input('fileName', array('type' => 'file'));
    echo $this->Form->end('Upload');
    ?>


</div>
