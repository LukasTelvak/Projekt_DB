<div class="container">
    <h1>Zákazníci</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Číslo</th>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Telefón</th>
            <th>Adresa</th>
            <th>Mesto</th>
            <th>Možnosti</th>
        </tr>
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
                    <a class="btn btn-info btn-xs" href="<?php echo site_url('zakaznici/view/'.$customers_item['idZakaznika']);?>"><span class="glyphicon glyphicon-search"></span> Zobraziť</a>
                    <a class="btn btn-success btn-xs" href="<?php echo site_url('zakaznici/edit/'.$customers_item['idZakaznika']);?>"><span class="glyphicon glyphicon-ok"></span> Upraviť</a>
                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('zakaznici/delete/'.$customers_item['idZakaznika']);?>"
                       onClick="return confirm('Ste si istý, že chcete daný záznam vymazať?')"><span class="glyphicon glyphicon-remove"></span> Vymazať</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

