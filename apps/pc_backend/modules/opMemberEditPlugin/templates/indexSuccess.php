<h2>プラグイン設定</h2>

メンバーID：<?php echo $member->id ?><br>
名前：<?php echo $member->name ?><br>

<form action="<?php echo url_for('opMemberEditPlugin/index') ?>" method="post">
<table>
<?php echo $form ?>
<tr>
<td colspan="2"><input type="submit" value="<?php echo __('設定変更') ?>" /></td>
</tr>
</table>
</form>

<?php if($done){
  echo '変更しました。<a href="member">管理画面メンバーリスト</a>へ';
} ?>


