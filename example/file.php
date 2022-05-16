<link rel="stylesheet" href="style.css">

<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <?php
        require __DIR__ . "/../src/Upfilers.php";
        require __DIR__ . "/../src/File.php";

        //$file = new GMSystem\Upfilers\File("uploads", "files", false); //SEM PASTAS DE ANO E MÊS
        $file = new GMSystem\Upfilers\File("uploads", "files");


        if ($_FILES) {
            try {
                $upload = $file->upload($_FILES['file'], $_POST['name']);
                echo "<p><a href='{$upload}' target='_blank'>@GMSystem</a></p>";
            } catch (Exception $e) {
                echo "<p>(!) {$e->getMessage()}</p>";
            }
        }
        ?>
        <input type="text" name="name" placeholder="File Name" required/>
        <input type="file" name="file" required/>
        <button>Send File</button>
    </form>
</div>