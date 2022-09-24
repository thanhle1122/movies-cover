<?php
include_once __DIR__ . '/../../dbconnect.php';
$a = $_POST['data'];
$sql = "SELECT epi.id, epi.moive_id, epi.linkphim,epi.episode, mv.title_movie
FROM episodes epi
JOIN movies mv ON epi.moive_id = mv.id WHERE mv.title_movie LIKE '%$a%'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($row = mysqli_fetch_array($query)) {
        // var_dump($row);die;
?>
        <tr>
            <td style="text-align: center;"><?= $row['id'] ?></td>
            <td><?= $row['title_movie'] ?></td>
            <td style="text-align: center;">
                <video width="50%" height="50%" loop="true" controls="controls" id="vid" muted>
                    <source src="/web-xem-phim/xem-phim/link-phim/<?= $row['linkphim'] ?>" type="video/mp4">
                </video>
            </td>
            <td style="text-align: center;"><?= $row['episode'] ?></td>
            <td style="justify-content: center">
                <div style="display: flex;">
                    <a title="Chỉnh sửa" href="update.php?episodes_id=<?= $row['id'] ?>" class="btn btn-warning">
                        <i class="material-icons">edit</i>
                    </a>
                    <div style="border:1px #ddd none;height:10px;width:10px "></div>
                    <button title="Xóa" type="button" class="btn btn-danger btnDelete" data-episodes_id="<?= $row['id'] ?>">
                        <i class="material-icons">delete_forever</i>
                    </button>
                </div>
            </td>
        </tr>
<?php
    }
}
?>