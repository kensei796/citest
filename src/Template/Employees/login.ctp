<?php
echo $this->Form->create();
echo $this->Form->text('name');
echo $this->Form->text('pass');
echo $this->Form->submit('送信');
echo $this->Form->end();

?>
