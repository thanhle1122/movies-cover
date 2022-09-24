<?php
include_once __DIR__ . '/../../dbconnect.php';
$a = $_POST['data'];
$sql = "SELECT * FROM movies WHERE title_movie LIKE '%$a%'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($row = mysqli_fetch_array($query)) {
?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title_movie'] ?></td>
            <td><?= $row['description'] ?></td>
            <td>
                <?php if ($row['status'] == 1) : ?>
                    <?= $row['status'] = "Đang tiến hành" ?>
                <?php else : ?>
                    <?= $row['status'] = "Hoàn thành" ?>
                <?php endif; ?>
            </td>
            <td>
                <img src="/web-xem-phim/assets/images/<?= $row['image'] ?>" class="img-fluid" alt="">
            </td>
            <td style="text-align: center;"><?= $row['year'] ?></td>
            <td style="text-align: center;"><?= $row['list_episodes'] ?></td>
            <td>
                <?php if ($row['category_id'] == 1) : ?>
                    <?= $row['category_id'] = "Phim đề cử" ?>
                <?php elseif ($row['category_id'] == 2) : ?>
                    <?= $row['category_id'] = "Phim mới cập nhật" ?>
                <?php else : ?>
                    <?= $row['category_id'] = "Phim phổ biến" ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($row['genre_id'] == 1) : ?>
                    <?= $row['genre_id'] = "Anime" ?>
                <?php elseif ($row['genre_id'] == 34) : ?>
                    <?= $row['genre_id'] = "CN Animation" ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($row['country_id'] == 1) : ?>
                    <?= $row['country_id'] = "Nhật Bản" ?>
                <?php else : ?>
                    <?= $row['country_id'] = "Trung Quốc" ?>
                <?php endif; ?>
            </td>
            <td>
                <div style="display: flex;">
                    <a title="Chỉnh sửa" href="update.php?movies_id=<?= $row['id'] ?>" class="btn btn-warning">
                        <i class="material-icons">edit</i>
                    </a>
                    <div style="border:1px #ddd none;height:10px;width:10px "></div>
                    <button title="Xóa" type="button" class="btn btn-danger btnDelete" data-movies_id="<?= $row['id'] ?>">
                        <i class="material-icons">delete_forever</i>
                    </button>
                </div>
            </td>
        </tr>

<?php
    }
}
?>