</thead>
<tbody>
<?php foreach ($zakaznici as $customers_item): ?>
<tr>
    <td><?php echo $customers_item['idZakaznika']; ?></td>
    <td><?php echo $customers_item['Meno']; ?></td>
    <td><?php echo $customers_item['Priezvisko']; ?></td>
    <td><?php echo $customers_item['Telefon']; ?></td>
    <td><?php echo $customers_item['Adresa']; ?></td>
    <td><?php echo $customers_item['Mesto']; ?></td>
    <td>
        <a class="btn btn-info btn-xs" href="<?php echo site_url('zakaznici/view/'.$customers_item['idZakaznika']);?>">Zobraziť</a>
        <a class="btn btn-success btn-xs" href="<?php echo site_url('zakaznici/edit/'.$customers_item['idZakaznika']);?>">Upraviť</a>
        <a class="btn btn-warning btn-xs" href="<?php echo site_url('zakaznici/delete/'.$customers_item['idZakaznika']);?>"
           onClick="return confirm('Ste si istý, že chcete daný záznam vymazať?')">Vymazať</a>
    </td>
</tr>
<?php endforeach; ?>;
</tbody>
