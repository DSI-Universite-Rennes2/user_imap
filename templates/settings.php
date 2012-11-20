<form id="imap" action="#" method="post">
       <fieldset class="personalblock">
               <legend><?php echo $l->t('IMAP'); ?></legend>
               <p><label for="imap_host"><?php echo $l->t('Host');?></label><input type="text" id="imap_host" name="imap_host" value="<?php echo $_['imap_host']; ?>"></p>
               <p><label for="imap_port"><?php echo $l->t('Port');?></label><input type="text" id="imap_port" name="imap_port" value="<?php echo $_['imap_port']; ?>" /></p>
               <p><input type="checkbox" id="imap_ssl" name="imap_ssl" value="1"<?php if ($_['imap_ssl']) echo ' checked'; ?>><label for="imap_ssl"><?php echo $l->t('Don\'t validate SSL certificate');?></label></p>
       <input type="submit" value="<?php echo $l->t('Save'); ?>" />
       </fieldset>
</form>
