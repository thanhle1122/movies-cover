<?php
include_once __DIR__ . '/../../dbconnect.php';
$a = $_POST['data'];
$sql = "SELECT * FROM categories WHERE title LIKE '%$a%'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($row = mysqli_fetch_array($query)) {
?>
        <tr>
            <td style="text-align: center;"><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td style="text-align: center;">
                <?php if ($row['status'] == 1) : ?>
                    <?= $row['status'] = "Đã duyệt" ?>
                <?php else : ?>
                    <?= $row['status'] = "Chưa duyệt" ?>
                <?php endif; ?>
            </td>
            <td style="display: flex;justify-content: center;">
                <div style="display: flex;">
                    <a title="Chỉnh sửa" href="update.php?categories_id=<?= $row['id'] ?>" class="btn btn-warning">
                        <i class="material-icons">edit</i>
                    </a>
                    <div style="border:1px #ddd none;height:10px;width:10px "></div>
                    <button title="Xóa" type="button" class="btn btn-danger btnDelete" data-categories_id="<?= $row['id'] ?>">
                        <i class="material-icons">delete_forever</i>
                    </button>
                </div>
            </td>
        </tr>

<?php
    }
}
?>