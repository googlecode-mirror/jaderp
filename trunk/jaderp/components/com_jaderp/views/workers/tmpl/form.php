<?php // no direct access
defined('_JEXEC') or die('Restricted access');?>
<div id="JAdERPForm">
<form action="index.php" method="post" name="adminForm" id="adminForm">
  <div id="FormElementsGroup">
    <fieldset>
      <legend><?php echo JText::_('WORKER_PERSONAL_INFOS'); ?></legend>
      <!--Worker Code-->
      <div class="FormElements">
        <label for="mat"><?php echo JText::_('WORKER_CODE'); ?>:</label>
        <br />
        <input name="mat" type="text" id="mat" value="<?php echo $this->worker->mat;?>" />
      </div>
      <!--Worker Last Name-->
      <div class="FormElements">
        <label for="lastname"><?php echo JText::_('WORKER_LAST_NAME'); ?>:</label>
        <br />
        <input name="lastname" type="text" id="lastname" value="<?php echo $this->worker->lastname;?>"/>
      </div>
      <!--Worker First Name-->
      <div class="FormElements">
        <label for="firstname"><?php echo JText::_('WORKER_FIRST_NAME'); ?>:</label>
        <br />
        <input name="firstname" type="text" id="firstname" value="<?php echo $this->worker->firstname;?>"/>
      </div>
      <!--Worker N.I. Card Number-->
      <div class="FormElements">
        <label for="num_piece"><?php echo JText::_('WORKER_CIN_NUMBER'); ?>:</label>
        <br />
        <input name="num_piece" type="text" id="num_piece" value="<?php echo $this->worker->num_piece;?>" />
      </div>
      <!--Worker Email-->
      <div class="FormElements">
        <label for="email"><?php echo JText::_('WORKER_EMAIL'); ?>:</label>
        <br />
        <input name="email" type="text" id="email" value="<?php echo $this->worker->email;?>" />
      </div>
      <!--Worker Phone-->
      <div class="FormElements">
        <label for="phone"><?php echo JText::_('WORKER_PHONE'); ?>:</label>
        <br />
        <input name="phone" type="text" id="phone" value="<?php echo $this->worker->phone;?>"/>
      </div>
      <!--Worker Salary-->
      <div class="FormElements">
        <label for="salaire"><?php echo JText::_('WORKER_SALARY'); ?>:</label>
        <br />
        <input name="salaire" type="text" id="salaire" value="<?php echo $this->worker->salaire;?>"/>
      </div>
      <!--Worker Begin Date-->
      <div class="FormElements">
        <label for="startdate"><?php echo JText::_('WORKER_BEGIN_DATE'); ?>:</label>
        <br />
        <input onBlur = "validateDate(this)" name="startdate" type="text" id="startdate" value="<?php echo $this->worker->startdate;?>"/>
      </div>
      <!--Worker Note-->
      <div class="FormElements">
        <label for="note"><?php echo JText::_('WORKER_RATING'); ?>:</label>
        <br />
        <input name="note" type="text" id="note" value="<?php echo $this->worker->note;?>"/>
      </div>
      
      <div class="FormElements">
	      <label for="branch"><?php echo JText::_('WORKER_BRANCH'); ?>:</label>
	      <br />
			<select id="branch" name="branch">
				<?php
				//echo $this->acclevels->id;
				foreach ($this->branchs as $branch)
				{
					$selectd = $this->worker->branch ? 'selected="selected"':'';
					echo '<option '.$selectd.' value="'.$branch['id'].'">'.$branch['name'].'</option>';
				}
				?>
			</select>
	  </div>
      
      <div class="FormElements">
	      <label for="department"><?php echo JText::_('WORKER_DEPARTMENT'); ?>:</label>
	      <br />
			<select id="department" name="department">
				<?php
				//echo $this->acclevels->id;
				foreach ($this->departments as $dep)
				{
					$selectd = $this->worker->department ? 'selected="selected"':'';
					echo '<option '.$selectd.' value="'.$dep['id'].'">'.$dep['name'].'</option>';
				}
				?>
			</select>
	  </div>
      
      <!--Worker Role-->
      <div class="FormElements">
        <label for="position"><?php echo JText::_('WORKER_ROLE'); ?>:</label>
        <br />
        <input name="position" type="text" id="position" value="<?php echo $this->worker->position;?>"/>
      </div>
      <!--Worker Avability-->
      <div class="FormElements">
        <label for="present"><?php echo JText::_('WORKER_AVAIBILITY'); ?>:</label>
        <br />
        <input type="radio" name="present" id="present" value="1"  <?php echo $this->worker->present ? 'checked="checked"':'';?> />
        <label for="present"><?php echo JText::_('WORKER_AVAILABLE'); ?></label>
        <input type="radio" name="present" id="notpresent" value="0" <?php echo $this->worker->present ? '':'checked="checked"';?>/>
        <label for="notpresent"><?php echo JText::_('WORKER_NOT_AVAILABLE'); ?></label>
      </div>
      <div class="FormElements">
        <label for="canaccess"><?php echo JText::_('WORKER_ACCESS'); ?>:</label>
        <br />
        <input type="checkbox" name="canaccess" id="canaccess" onchange="$('#accessfields').toggle('slide', {direction: 'up' },800);" value="1"  <?php echo $this->worker->joomla_id > 0 ? 'checked="checked"':'';?> />
        <label for="canaccess"><?php echo JText::_('WORKER_CAN_ACCESS'); ?></label>
      </div>
      <div class="FormElements">
        <label for="iscontact"><?php echo JText::_('WORKER_CREAT_CONTACT'); ?>:</label>
        <br />
        <input type="checkbox" name="iscontact" id="iscontact" onchange="$('#contactfields').toggle('slide', {direction: 'up' },800);" value="1"  <?php echo $this->worker->iscontact ? 'checked="checked"':'';?> />
        <label for="iscontact"><?php echo JText::_('WORKER_IS_CONTACT'); ?></label>

      </div>
    </fieldset>
    

  </div>
  
  <div id="FormElementsGroup">
    <fieldset id="accessfields" style="display: <?php echo $this->worker->joomla_id > 0 ? 'block"':'none';?>;">
      <legend><?php echo JText::_('WORKER_ACCESS'); ?>:</legend>
      <div class="FormElements">
	      <label for="accesslevel"><?php echo JText::_('WORKER_ACCESS_LEVEL'); ?>:</label>
	      <br />
			<select id="access_level" name="access_level">
				<?php
				//echo $this->acclevels->id;
				foreach ($this->acclevels as $level)
				{
					$selectd = '';//$this->worker->access_level ? 'selected="selected"':'';
					echo '<option '.$selectd.' value="'.$level['id'].'">'.$level['access_label'].'</option>';
				}
				?>
			</select>
	  </div>
      <div class="FormElements">
	      <label for="password"><?php echo JText::_('WORKER_PASSWORD'); ?>:</label>
	      <br />
	      <input name="password" type="password" id="password" />
	  </div>
      <div class="FormElements">
	      <label for="password1"><?php echo JText::_('WORKER_CONFIRM_PASSWORD'); ?>:</label>
	      <br />
	      <input name="password1" type="password" id="password1" />
	  </div>
      <div class="FormElements">
        <br />
        <input type="checkbox" name="isblocked" id="isblocked" value="1"  <?php echo $this->worker->iscontact ? 'checked="checked"':'';?> />
        <label for="isblocked"><?php echo JText::_('WORKER_IS_BLOCKED'); ?></label>

      </div>	  
    </fieldset>
  </div>
  
  <div id="FormElementsGroup">
    <fieldset id="contactfields" style="display: <?php echo $this->worker->iscontact ? 'block"':'none';?>;">
      <legend><?php echo JText::_('WORKER_CONTACT'); ?>:</legend>
      <div class="FormElements">
	      <label for="password"><?php echo JText::_('WORKER_PASSWORD'); ?>:</label>
	      <br />
	      <input name="password" type="password" id="password" />
	  </div>
      <div class="FormElements">
	      <label for="password1"><?php echo JText::_('WORKER_CONFIRM_PASSWORD'); ?>:</label>
	      <br />
	      <input name="password1" type="password" id="password1" />
	  </div>
    </fieldset>
  </div>
  
 <div class="clr"></div>
<input type="hidden" value="<?php echo $this->worker->id;?>" name="id"/>
<input type="hidden" value="<?php echo $this->worker->id;?>" name="cid[]"/>
<input type="hidden" name="<?php echo JUtility::getToken(true);?>" value="1" />
<input type="hidden" name="option" value="com_jaderp" />
<input type="hidden" name="id" value="<?php echo $this->worker->id; ?>" />
<input type="hidden" name="task" value="" />
<?php
	$menuid = JRequest::getInt('menuid', 0);
	if ($menuid > 0)
		echo '<input type="hidden" name="menuid" value="'.$menuid.'" />';
?>
<input type="hidden" name="func" value="Workers" />
</form>
</div>