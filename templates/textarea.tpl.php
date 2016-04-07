
<label for="<?=$this->name;?>"><?=ucwords($this->name);?></label>
<textarea placeholder="Enter your message here" name="<?=$this->name;?>" id="<?=$this->name;?>" class="u-full-width"><?=htmlentities($this->value);?></textarea>
<?php if($this->error): ?>
  <em class="isNotValid" data-origin="server"><?=$this->error;?></em>
<?php endif; ?>
