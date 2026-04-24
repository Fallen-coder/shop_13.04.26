<div class="layout">
    <h1>Customer Directory</h1>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Born At</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $row): ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= htmlspecialchars($row->name) ?></td>
                    <td><?= $row->born_at ?? 'N/A' ?></td>
                    <td><strong><?= $row->points ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>