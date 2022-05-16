<link rel="stylesheet" href="style.css">

<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <p>Envie um arquivo AI (postscript)</p>
        <?php
        require __DIR__ . "/../src/Upfilers.php";
        require __DIR__ . "/../src/Send.php";

        //$postscript = new GMSystem\Upfilers\Send("uploads", "postscript", [
        //    "application/postscript"
        //], ["ai"], false); //SEM PASTAS DE ANO E MÊS

        $postscript = new GMSystem\Upfilers\Send("uploads", "postscript", [
            "application/postscript"
        ], ["ai"]);

        if ($_FILES) {
            try {
                $upload = $postscript->upload($_FILES['file'], $_POST['name']);
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