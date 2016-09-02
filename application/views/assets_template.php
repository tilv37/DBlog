<?php echo $pagination; ?>

<?php if (isset($accounts)): foreach ($accounts as $item): ?>
    <tr>
        <td class="th table-check-cell"><input type="checkbox" name="contacts_id[]" id="table-selected-<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>"></td>
        <td><?php echo anchor('contacts/view/'.$item['id'], $item['title']);?></td>
        <td class="table-actions">
            <a href="#" title="Edit" class="with-tip"><img src="<?php echo base_url(); ?>images/icons/fugue/pencil.png" width="16" height="16"></a>
            <a href="#" title="Delete" class="with-tip"><img src="<?php echo base_url(); ?>images/icons/fugue/cross-circle.png" width="16" height="16"></a>
        </td>
    </tr>
<?php endforeach; endif; ?>


