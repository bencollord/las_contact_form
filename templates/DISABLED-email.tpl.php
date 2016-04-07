<label for="<?=$this->name;?>"><?=ucwords($this->name);?></label>
<input type="email" name="<?=$this->name;?>" id="<?=$this->name;?>" value="<?=htmlentities($this->value);?>" class="u-full-width" />
<?php if($this->error): ?>
  <em class="isNotValid" data-origin="server"><?=$this->error;?></em>
<?php endif; ?>
