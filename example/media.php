<link rel="stylesheet" href="style.css">

<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <?php
        require __DIR__ . "/../src/Upfilers.php";
        require __DIR__ . "/../src/Media.php";

        //$media = new GMSystem\Upfilers\Media("uploads", "medias", false);  //SEM PASTAS DE ANO E MÊS
        $media = new GMSystem\Upfilers\Media("uploads", "medias");

        if ($_FILES) {
            try {
                $upload = $media->upload($_FILES['file'], $_POST['name']);
                echo "<p><a href='{$upload}' target='_blank'>@GMSystem</a></p>";
            } catch (Exception $e) {
                echo "<p>(!) {$e->getMessage()}</p>";
            }
        }
        ?>
        <input type="text" name="name" placeholder="File Name" required/>
        <input type="file" name="file" required/>
        <button>Send Media</button>
    </form>
</div>